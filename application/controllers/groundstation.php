<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Groundstation extends CI_Controller
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
			$this->data['link_active']	= 'groundstation';
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
		$this->form_validation->set_rules('testTargetAlertPower', 'Test Target Alert Power Threshold', 'required|xss_clean');
		$this->form_validation->set_rules('testTargetFailPower', 'Test Target Fail Power Threshold', 'required|xss_clean');
		$this->form_validation->set_rules('masterSlaveSelection', 'Master Slave Selection', 'required|xss_clean');
		
		if ($this->form_validation->run() == TRUE) {
			/* $condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'systemMode';
			$this->groundstation_model->setSnmp($condition, $this->input->post('testTargetAlertPower')); */
		
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'testTargetAlertPower';
			$this->groundstation_model->setSnmp($condition, $this->input->post('testTargetAlertPower'));

			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'testTargetFailPower';
			$this->groundstation_model->setSnmp($condition, $this->input->post('testTargetFailPower'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'masterSlaveSelection';
			$this->groundstation_model->setSnmp($condition, $this->input->post('masterSlaveSelection'));
			
			redirect('groundstation/index/'.$id_hostt);
			
		} else {
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('groundstation/index/'.$id_hostt);
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
			$condition['key_oid'] = 'systemMode';
			$this->data['systemMode'] = $this->groundstation_model->getSnmp($condition);
		
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'testTargetAlertPower';
			$this->data['testTargetAlertPower'] = $this->groundstation_model->getSnmp($condition);
		
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'testTargetFailPower';
			$this->data['testTargetFailPower'] = $this->groundstation_model->getSnmp($condition);
		
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'masterSlaveSelection';
			$this->data['masterSlaveSelection'] = $this->groundstation_model->getSnmp($condition);
		
			$this->data['listGroundstation'] = $this->groundstation_model->getAllGroundstation();
			$this->load->view('shared/header', $this->data);
			$this->load->view('shared/menu', $this->data);
			$this->load->view('groundstation/view', $this->data);
			$this->load->view('shared/footer');
		}
	}
	function add()
	{	
		$id_hostt = '1';
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'stationName';
		$this->data['stationName'] = $this->groundstation_model->getSnmp($condition);
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('host[]', 'Host Name', 'required|xss_clean');
	
		if ($this->form_validation->run() == TRUE) {
			$jumlah_host = count($this->input->post('host'));
			$host = $this->input->post('host');
			for($x = 0; $x < $jumlah_host; $x++) {
				$data = array(
					'host' => $host[$x]
				);
				$this->groundstation_model->addGroundstation($data);
			}
			redirect('groundstation');
			
		} else {
			$this->data['host']= $this->input->post('host');
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('groundstation/add');
			
			$this->load->view('shared/header', $this->data);
			$this->load->view('shared/menu', $this->data);
			$this->load->view('groundstation/form_add', $this->data);
			$this->load->view('shared/footer');
		
		}
	}
	function update($id)
	{	
		$id_hostt = '1';
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'stationName';
		$this->data['stationName'] = $this->groundstation_model->getSnmp($condition);
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('host', 'Nama host', 'required|xss_clean');
		
		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'host' => $this->input->post('host')
			);
			$condition['id_host'] = $id;
			$this->groundstation_model->updateGroundstation($data, $condition);
			redirect('groundstation');
			
		} else {
			$this->data['host']= $this->input->post('host');
			
			$groundstation = $this->groundstation_model->getGroundstation($id);
			
			$this->data['host']= $groundstation->host;
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('groundstation/update/'.$id);
			$this->data['title'] = "Update Host";
			
			$this->load->view('shared/header', $this->data);
			$this->load->view('shared/menu', $this->data);
			$this->load->view('groundstation/form', $this->data);
			$this->load->view('shared/footer');
		
		}
	}
	function delete($id)
	{	
		$condition['id_host'] = $id;
		$this->groundstation_model->deleteGroundstation($condition);
		redirect('groundstation');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */