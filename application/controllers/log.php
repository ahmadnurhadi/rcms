<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Log extends CI_Controller
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
			$this->data['link_active']	= 'log';
			$this->load->model("groundstation_model");
		}
	}

	function index()
	{
		$this->data['listLog'] = $this->groundstation_model->getAllLog();
		
		
		
		$listLog = $this->groundstation_model->getAllLog();
		
		$this->data['listLog'] = array();
		for ($i = 0; $i < count($listLog); $i++) {
			$this->data['listLog'][$i]['id_log'] = $listLog[$i]['id_log'];
			$this->data['listLog'][$i]['host'] = $listLog[$i]['host'];
			$this->data['listLog'][$i]['key_oid'] = $listLog[$i]['key_oid'];
			$this->data['listLog'][$i]['value'] = $listLog[$i]['value'];
			$this->data['listLog'][$i]['status'] = $listLog[$i]['status'];
			$this->data['listLog'][$i]['date'] = $listLog[$i]['date'];
			$this->data['listLog'][$i]['time'] = $listLog[$i]['time'];
			$condition['id_host'] = $listLog[$i]['id_host'];
			$condition['key_oid'] = 'stationName';
			$this->data['listLog'][$i]['stationName'] = $this->groundstation_model->getSnmp($condition);
		}
		
		$this->load->view('shared/header_map', $this->data);
		$this->load->view('log/view', $this->data);
		$this->load->view('shared/footer_map', $this->data);
	
	}
	
	function delete($id)
	{	
		$condition['id_log'] = $id;
		$this->groundstation_model->deleteLog($condition);
		redirect('log');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */