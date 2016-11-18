<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sitemonitor extends CI_Controller
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
			$this->data['link_active']	= 'sitemonitor';
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
			$this->form_validation->set_rules('siteMonitorAddress', 'Site Monitor Mode S Address', 'required|xss_clean');
			
		if ($this->form_validation->run() == TRUE) {
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'siteMonitorAddress';
			$this->groundstation_model->setSnmp($condition, $this->input->post('siteMonitorAddress'));

			redirect('sitemonitor/index/'.$id_hostt);
			
		} else {
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('sitemonitor/index/'.$id_hostt);
			
			
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
			$condition['key_oid'] = 'siteMonitorAddress';
			$this->data['siteMonitorAddress'] = $this->groundstation_model->getSnmp($condition);
			
			$this->load->view('shared/header', $this->data);
			$this->load->view('shared/menu', $this->data);
			$this->load->view('sitemonitor/view', $this->data);
			$this->load->view('shared/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */