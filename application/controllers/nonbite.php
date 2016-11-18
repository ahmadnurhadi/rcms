<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Nonbite extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
		else{			
			$this->data['user_id']	= $this->tank_auth->get_user_id();
			$this->data['username']	= $this->tank_auth->get_username();
			$this->data['link_active']	= 'nonbite';
			$this->load->model("groundstation_model");
		}
	}

	function index($id_hostt)
	{		
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'stationName';
			$this->data['checkstatusserver'] = $this->groundstation_model->checkedhoststatus($condition);
			
			$this->data['id_hostt']	= $id_hostt;
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'stationName';
			$this->data['stationName'] = $this->groundstation_model->getSnmp($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'systemIdentificationCode';
			$this->data['systemIdentificationCode'] = $this->groundstation_model->getSnmp($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'systemAreaCode';
			$this->data['systemAreaCode'] = $this->groundstation_model->getSnmp($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'groundStationState';
			$this->data['groundStationState'] = $this->groundstation_model->getSnmpMonitoring($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'receiverSensitivity';
			$this->data['receiverSensitivity'] = $this->groundstation_model->getSnmpMonitoring($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'testTransmissionLoss';
			$this->data['testTransmissionLoss'] = $this->groundstation_model->getSnmpMonitoring($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'decoderTest';
			$this->data['decoderTest'] = $this->groundstation_model->getSnmpMonitoring($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'statusOfIndividualLRU';
			$this->data['statusOfIndividualLRU'] = $this->groundstation_model->getSnmpMonitoring($condition);
	
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			
			$this->load->view('shared/header', $this->data);
			$this->load->view('shared/menu', $this->data);
			$this->load->view('nonbite/view', $this->data);
			$this->load->view('shared/footer');
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */