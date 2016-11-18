<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asterix extends CI_Controller
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
			$this->data['link_active']	= 'asterix';
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
			$this->form_validation->set_rules('aSTERIXDestIPAddr', 'ASTERIX Report Destination IP Address', 'required|xss_clean');
			$this->form_validation->set_rules('aSTERIXDestPort', 'ASTERIX Report Destination UDP Port', 'required|xss_clean');
			$this->form_validation->set_rules('aSTERIXTTL', 'ASTERIX Report IP TTL', 'required|xss_clean');
			$this->form_validation->set_rules('periodicReportInterval', 'Periodic Report Interval', 'required|xss_clean');
			$this->form_validation->set_rules('cat23ReportInterval', 'ASTERIX Category 023 Ground Station Status Reporting Interval', 'required|xss_clean');
			$this->form_validation->set_rules('cat23ServiceReportInterval', 'ASTERIX Category 023 Service Status Reporting Interval', 'required|xss_clean');
			$this->form_validation->set_rules('versionReportInterval', 'ASTERIX Category 247 Reporting Interval', 'required|xss_clean');
			
			if ($this->form_validation->run() == TRUE) {
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'aSTERIXDestIPAddr';
			$this->groundstation_model->setSnmp($condition, $this->input->post('aSTERIXDestIPAddr'));
		
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'aSTERIXDestPort';
			$this->groundstation_model->setSnmp($condition, $this->input->post('aSTERIXDestPort'));

			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'aSTERIXTTL';
			$this->groundstation_model->setSnmp($condition, $this->input->post('aSTERIXTTL'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'periodicReportInterval';
			$this->groundstation_model->setSnmp($condition, $this->input->post('periodicReportInterval'));
		
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'cat23ReportInterval';
			$this->groundstation_model->setSnmp($condition, $this->input->post('cat23ReportInterval'));

			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'cat23ServiceReportInterval';
			$this->groundstation_model->setSnmp($condition, $this->input->post('cat23ServiceReportInterval'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'versionReportInterval';
			$this->groundstation_model->setSnmp($condition, $this->input->post('versionReportInterval'));

			redirect('asterix/index/'.$id_hostt);
			
		} else {
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('asterix/index/'.$id_hostt);
			
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
			$condition['key_oid'] = 'aSTERIXDestIPAddr';
			$this->data['aSTERIXDestIPAddr'] = $this->groundstation_model->getSnmp($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'aSTERIXDestPort';
			$this->data['aSTERIXDestPort'] = $this->groundstation_model->getSnmp($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'aSTERIXTTL';
			$this->data['aSTERIXTTL'] = $this->groundstation_model->getSnmp($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'aSTERIXReportMode';
			$this->data['aSTERIXReportMode'] = $this->groundstation_model->getSnmp($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'aSTERIX21Edition';
			$this->data['aSTERIX21Edition'] = $this->groundstation_model->getSnmp($condition);
			
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'periodicReportInterval';
			$this->data['periodicReportInterval'] = $this->groundstation_model->getSnmp($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'cat23ReportInterval';
			$this->data['cat23ReportInterval'] = $this->groundstation_model->getSnmp($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'cat23ServiceReportInterval';
			$this->data['cat23ServiceReportInterval'] = $this->groundstation_model->getSnmp($condition);
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'versionReportInterval';
			$this->data['versionReportInterval'] = $this->groundstation_model->getSnmp($condition);
			
			$this->data['listEdition'] = $this->groundstation_model->getAllAsterixEdition();
			
			$this->load->view('shared/header', $this->data);
			$this->load->view('shared/menu', $this->data);
			$this->load->view('asterix/view', $this->data);
			$this->load->view('shared/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */