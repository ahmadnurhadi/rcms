<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Network extends CI_Controller
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
			$this->data['link_active']	= 'network';
			$this->load->model("groundstation_model");
		}
	}

	function index($id_hostt)
	{
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'stationName';
		$this->data['checkstatusserver'] = $this->groundstation_model->checkedhoststatus($condition);
		
		$this->data['id_hostt']	= $id_hostt;
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('gSIPAddress', 'GS IP Address', 'required|xss_clean');
		$this->form_validation->set_rules('gSIPDefGW', 'GS IP Default Gateway', 'required|xss_clean');
		$this->form_validation->set_rules('gSIPNetmask', 'GS IP Netmask', 'required|xss_clean');
		$this->form_validation->set_rules('maxCommBitRate', 'Max Interface Bit Rate (kbps)', 'required|xss_clean');
		$this->form_validation->set_rules('ipRCMS', 'IP RCMS', 'required|xss_clean');
		$this->form_validation->set_rules('ipLCMS', 'IP LCMS', 'required|xss_clean');
		
		if ($this->form_validation->run() == TRUE) {
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gSIPAddress';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gSIPAddress'));
		
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gSIPDefGW';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gSIPDefGW'));

			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gSIPNetmask';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gSIPNetmask'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'maxCommBitRate';
			$this->groundstation_model->setSnmp($condition, $this->input->post('maxCommBitRate'));
		
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'ipRCMS';
			$this->groundstation_model->setSnmp($condition, $this->input->post('ipRCMS'));

			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'ipLCMS';
			$this->groundstation_model->setSnmp($condition, $this->input->post('ipLCMS'));

			redirect('network/index/'.$id_hostt);
			
		} else {
		
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['action'] = site_url('network/index/'.$id_hostt);
		
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
		$condition['key_oid'] = 'gSIPAddress';
		$this->data['gSIPAddress'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'gSIPDefGW';
		$this->data['gSIPDefGW'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'gSIPNetmask';
		$this->data['gSIPNetmask'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'maxCommBitRate';
		$this->data['maxCommBitRate'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'ipRCMS';
		$this->data['ipRCMS'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'ipLCMS';
		$this->data['ipLCMS'] = $this->groundstation_model->getSnmp($condition);
		
		$this->load->view('shared/header', $this->data);
		$this->load->view('shared/menu', $this->data);
		$this->load->view('network/view', $this->data);
		$this->load->view('shared/footer');
		}
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */