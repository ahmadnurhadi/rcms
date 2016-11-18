<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Host extends CI_Controller
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
			$this->data['link_active']	= 'host';
			$this->load->model("groundstation_model");
		}
	}

	function index()
	{		
		$this->data['action'] = site_url('host/updateperiode');
		
		$listGroundstation = $this->groundstation_model->getAllGroundstation();
		
		$this->data['listGroundstation'] = array();
		for ($i = 0; $i < count($listGroundstation); $i++) {
			$this->data['listGroundstation'][$i]['host'] = $listGroundstation[$i]['host'];
			$this->data['listGroundstation'][$i]['id_host'] = $listGroundstation[$i]['id_host'];
			$condition['id_host'] = $listGroundstation[$i]['id_host'];
			$condition['key_oid'] = 'stationName';
			$this->data['listGroundstation'][$i]['stationName'] = $this->groundstation_model->getSnmp($condition);
			$this->data['listGroundstation'][$i]['host_status'] = $this->groundstation_model->checkedhoststatus($condition);
		}
		
		$this->data['configperiode'] = $this->groundstation_model->getConfig('periode');
		
		$this->load->view('shared/header_map', $this->data);
		$this->load->view('host/view', $this->data);
		$this->load->view('shared/footer_map', $this->data);
	
	}
	function add()
	{	
		/*$id_hostt = '1';
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'stationName';
		$this->data['stationName'] = $this->groundstation_model->getSnmp($condition);*/
		
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
			redirect('host');
			
		} else {
			$this->data['host']= $this->input->post('host');
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('host/add');
			
			$this->load->view('shared/header_map', $this->data);
			/* $this->load->view('shared/menu', $this->data); */
			$this->load->view('host/form_add', $this->data);
			$this->load->view('shared/footer_map', $this->data);
		
		}
	}
	
	function update($id)
	{			
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('host', 'Name host', 'required|xss_clean');
		
		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'host' => $this->input->post('host')
			);
			$condition['id_host'] = $id;
			$this->groundstation_model->updateGroundstation($data, $condition);
			redirect('host');
			
		} else {
			$this->data['host']= $this->input->post('host');
			
			$groundstation = $this->groundstation_model->getGroundstation($id);
			
			$this->data['host']= $groundstation->host;
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('host/update/'.$id);
			$this->data['title'] = "Update Host";
			
			$this->load->view('shared/header_map', $this->data);
			$this->load->view('host/form', $this->data);
			$this->load->view('shared/footer_map', $this->data);
		
		}
	}
	
	function delete($id)
	{	
		$condition['id_host'] = $id;
		$this->groundstation_model->deleteGroundstation($condition);
		redirect('host');
	}
	
	function updateperiode()
	{			
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('configperiode', 'Periode', 'required|xss_clean');
		
		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'value' => $this->input->post('configperiode')
			);
			$condition['key_config'] = "periode";
			$this->groundstation_model->updateConfig($data, $condition);
			redirect('host');
			
		} else {
			$this->data['action'] = site_url('host/updateperiode');
			$this->data['listGroundstation'] = $this->groundstation_model->getAllGroundstation();
			
			$this->data['configperiode'] = $this->input->post('configperiode');
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			
			$this->load->view('shared/header_map', $this->data);
			$this->load->view('host/view', $this->data);
			$this->load->view('shared/footer_map', $this->data);		
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */