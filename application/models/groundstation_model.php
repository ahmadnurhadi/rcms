<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Groundstation_model extends CI_Model  {
		function __construct() { parent::__construct(); }

		function getAllGroundstation() {
			$this->db->from("host");

			$query = $this->db->get();
			return $query->result_array();
		}
		
		function getAllLog() {
			$this->db->select("l.*, h.*, o.*");
			$this->db->from("log AS l");
			$this->db->join('host AS h', 'l.id_host = h.id_host');
			$this->db->join('oid AS o', 'l.id_oid = o.id_oid');
			
			$query = $this->db->get();
			return $query->result_array();
		}
		
		function getGroundstation ($id) {
			$this->db->where('id_host', $id);
			$this->db->select("*");
			$this->db->from("host");
			$query = $this->db->get();
			$res = $query->result();
			return $res[0];
		}
		
		function addGroundstation($data) {
			$this->db->insert('host', $data);
		}
		
		function updateGroundstation($data, $condition) {
			$this->db->where($condition);
			$this->db->update('host', $data);
		}
		
		function deleteGroundstation($condition) {
			$this->db->where($condition);
			$this->db->delete('host');
		}
		
		function getConfig($key_config) {
			$this->db->where('key_config', $key_config);
			$this->db->select("*");
			$this->db->from("config");
			$query = $this->db->get();
			$res = $query->result();
			return $res[0];
		}
		
		function updateConfig($data, $condition) {
			$this->db->where($condition);
			$this->db->update('config', $data);
		}
		
		function getAllAsterixEdition() {
			$this->db->from("asterix_edition");

			return $this->db->get();
		}
		
		function checkValue($id_oid, $id_host) {
			$array = array('id_oid' => $id_oid, 'id_host' => $id_host);
			
			$this->db->where($array); 
			$this->db->order_by("date","desc");
			$this->db->order_by("time","desc");
			$this->db->select("*");
			$this->db->from("log");

			$query = $this->db->get();
			$res = $query->result();
			if(!empty($res[0]->value)){
				$last_value = $res[0]->value;
			}
			else {
				$last_value = '';
			}
			return $last_value;
		}
		
		function checkedhoststatus($condition) {
			$community = "public";
			$timeout = 1000000;
			$retries = 2;
			
			$this->db->select("id_oid, oid, snmp_key_oid");
			$this->db->where($condition);
			$this->db->from("oid");
			$query = $this->db->get();
			$res = $query->result();
			
			$this->db->where('id_host', $condition['id_host']);
			$this->db->select("host");
			$this->db->from("host");
			$query2 = $this->db->get();
			$res2 = $query2->result();
			
			$data = @snmp2_get($res2[0]->host, $community, $res[0]->oid,$timeout,$retries);
			if(!empty($data)){
				return 'Active';
			}
			else{
				return 'Deactive';
			}
		}
		
		function getSnmp($condition) {
			$community = "public";
			$timeout = 1000000;
			$retries = 2;
			
			$this->db->select("id_oid, oid, snmp_key_oid");
			$this->db->where($condition);
			$this->db->from("oid");
			$query = $this->db->get();
			$res = $query->result();
			
			$this->db->where('id_host', $condition['id_host']);
			$this->db->select("host");
			$this->db->from("host");
			$query2 = $this->db->get();
			$res2 = $query2->result();
			
			$data = @snmp2_get($res2[0]->host, $community, $res[0]->oid,$timeout,$retries);
			
			$data_explode = explode(": ", $data);
			if(!empty($data_explode[1])){
				$hasil = str_replace("\"","", $data_explode[1]);
			}
			else{
				$hasil = str_replace("\"","", $data_explode[0]);
			}

			$lastvalue = $this->checkValue($res[0]->id_oid, $condition['id_host']);
			if (empty($hasil)){
				$hasil = $lastvalue;
			}
			else {
				if($hasil != $lastvalue){
					$data_value = array(
						'id_host' => $condition['id_host'],
						'id_oid' => $res[0]->id_oid,
						'value' => $hasil,
						'status' => 'config',
						'date' => date("Y-m-d"),
						'time' => date("H:i:s")
					);
					$this->db->insert('log', $data_value);
				}
			}
			return $hasil;
		}
		
		function getSnmpMonitoring($condition) {
			$community = "public";
			$timeout = 1000000;
			$retries = 2;
			
			$this->db->select("id_oid, oid, snmp_key_oid");
			$this->db->where($condition);
			$this->db->from("oid");
			$query = $this->db->get();
			$res = $query->result();
			
			$this->db->where('id_host', $condition['id_host']);
			$this->db->select("host");
			$this->db->from("host");
			$query2 = $this->db->get();
			$res2 = $query2->result();
			
			$data = @snmp2_get($res2[0]->host, $community, $res[0]->oid,$timeout,$retries);
			
			$data_explode = explode(": ", $data);
			if(!empty($data_explode[1])){
				$hasil = str_replace("\"","", $data_explode[1]);
			}
			else{
				$hasil = str_replace("\"","", $data_explode[0]);
			}
			$lastvalue = $this->checkValue($res[0]->id_oid, $condition['id_host']);
			if (empty($hasil)){
				$hasil = $lastvalue;
			}
			else {
				$data_value = array(
					'id_host' => $condition['id_host'],
					'id_oid' => $res[0]->id_oid,
					'value' => $hasil,
					'status' => 'monitoring',
					'date' => date("Y-m-d"),
					'time' => date("H:i:s")
				);
				$this->db->insert('log', $data_value);
			}
			return $hasil;
		}
		
		function setSnmp($condition, $value) {
			$community = "public";
			$community2 = "private";
			$timeout = 1000000;
			$retries = 2;
			
			$this->db->select("id_oid, oid, snmp_key_oid");
			$this->db->where($condition);
			$this->db->from("oid");
			$query = $this->db->get();
			$res = $query->result();
			
			$this->db->where('id_host', $condition['id_host']);
			$this->db->select("host");
			$this->db->from("host");
			$query2 = $this->db->get();
			$res2 = $query2->result();
			
			$data = @snmp2_get($res2[0]->host, $community, $res[0]->oid,$timeout,$retries);
			
			$data_explode = explode(": ", $data);
			
			if($data_explode[0] == "INTEGER") {
				$param = 'i';
			}
			elseif($data_explode[0] == "unsigned INTEGER"){
				$param = 'u';
			}
			elseif($data_explode[0] == "TIMETICKS"){
				$param = 't';
			}
			elseif($data_explode[0] == "IPADDRESS"){
				$param = 'a';
			}
			elseif($data_explode[0] == "OBJID"){
				$param = 'o';
			}
			elseif($data_explode[0] == "STRING"){
				$param = 's';
			}
			elseif($data_explode[0] == "HEX STRING"){
				$param = 'x';
			}
			elseif($data_explode[0] == "DECIMAL STRING"){
				$param = 'd';
			}
			elseif($data_explode[0] == "unsigned int64"){
				$param = 'U';
			}
			elseif($data_explode[0] == "signed int64"){
				$param = 'I';
			}
			elseif($data_explode[0] == "float"){
				$param = 'F';
			}
			elseif($data_explode[0] == "double"){
				$param = 'D';
			}
			@snmp2_set($res2[0]->host, $community2, $res[0]->oid, $param, $value, $timeout,$retries);
			
			$lastvalue = $this->checkValue($res[0]->id_oid, $condition['id_host']);
			if($value != $lastvalue){
				$data_value = array(
					'id_host' => $condition['id_host'],
					'id_oid' => $res[0]->id_oid,
					'value' => $value,
					'status' => 'config',
					'date' => date("Y-m-d"),
					'time' => date("H:i:s")
				);
				$this->db->insert('log', $data_value);
			}
		}
	}
?>