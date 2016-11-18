<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Contoh_model extends CI_Model  {
		function __construct() { parent::__construct(); }

		function contoh() {
			$this->db->where('id_oid', 1);
			$this->db->order_by("date","desc");
			$this->db->order_by("time","desc");
			$this->db->select("*");
			$this->db->from("log");

			$query = $this->db->get();
			$res = $query->result();
			print_r($res[0]);
			die();

		}

	}
?>