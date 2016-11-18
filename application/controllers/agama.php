<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Agama extends CI_Controller
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
			$this->data['link_active']	= 'agama';
			$this->load->model("menu_model");
			$this->data['listMenu'] = $this->menu_model->getAcaraPined();
			$this->load->model("agama_model");
		}
	}

	function index()
	{	

		$this->data['listAgama'] = $this->agama_model->getAllAgama();
		$this->load->view('shared/header', $this->data);
		$this->load->view('shared/menu', $this->data);
		$this->load->view('agama/view', $this->data);
		$this->load->view('shared/footer');
	}
	
	function add()
	{	
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_agama', 'Nama agama', 'required|xss_clean');
	
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nama_agama' => $this->input->post('nama_agama'),
				'date_insert' => date("Y-m-d"),
				'insert_by' => $this->data['username']
			);
			$this->agama_model->addAgama($data);
			redirect('agama');
			
		} else {
			$this->data['nama_agama']= $this->input->post('nama_agama');
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('agama/add');
			$this->data['title'] = "Tambah Agama";
			
			$this->load->view('shared/header', $this->data);
			$this->load->view('shared/menu', $this->data);
			$this->load->view('agama/form', $this->data);
			$this->load->view('shared/footer');
		
		}
	}
	function update($id)
	{	
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_agama', 'Nama agama', 'required|xss_clean');
		
		if ($this->form_validation->run() == TRUE) {
			
			$data = array(
				'nama_agama' => $this->input->post('nama_agama')
			);
			$condition['id_agama'] = $id;
			$this->agama_model->updateAgama($data, $condition);
			redirect('agama');
			
		} else {
			$this->data['nama_agama']= $this->input->post('nama_agama');
			
			$agama = $this->agama_model->getAgama($id);
			
			$this->data['nama_agama']= $agama->nama_agama;
			
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['action'] = site_url('agama/update/'.$id);
			$this->data['title'] = "Update Agama";
			
			$this->load->view('shared/header', $this->data);
			$this->load->view('shared/menu', $this->data);
			$this->load->view('agama/form', $this->data);
			$this->load->view('shared/footer');
		
		}
	}
	function delete($id)
	{	
		$condition['id_agama'] = $id;
		$this->agama_model->deleteAgama($condition);
		redirect('agama');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */