<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class adsb extends CI_Controller {

    function __construct(){
        parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('tank_auth');
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} 
		else{
			$this->data['user_id']	= $this->tank_auth->get_user_id();
			$this->data['username']	= $this->tank_auth->get_username();
			$this->data['link_active']	= 'adsb';
			$this->load->model("groundstation_model");
		}
    }

    public function index(){
		$listGroundstation = $this->groundstation_model->getAllGroundstation();
		
		$this->data['listGroundstation'] = array();
		for ($i = 0; $i < count($listGroundstation); $i++) {
			$this->data['listGroundstation'][$i]['host'] = $listGroundstation[$i]['host'];
			$this->data['listGroundstation'][$i]['id_host'] = $listGroundstation[$i]['id_host'];
			$condition['id_host'] = $listGroundstation[$i]['id_host'];
			$condition['key_oid'] = 'stationName';
			$this->data['listGroundstation'][$i]['stationName'] = $this->groundstation_model->getSnmp($condition);
			$this->data['listGroundstation'][$i]['host_status'] = $this->groundstation_model->checkedhoststatus($condition);
			$condition1['id_host'] = $listGroundstation[$i]['id_host'];
			$condition1['key_oid'] = 'gSLongitude';
			$this->data['listGroundstation'][$i]['host_longitude'] = $this->groundstation_model->getSnmp($condition1);
			$condition2['id_host'] = $listGroundstation[$i]['id_host'];
			$condition2['key_oid'] = 'gSLatitude';
			$this->data['listGroundstation'][$i]['host_latitude'] = $this->groundstation_model->getSnmp($condition2);
		}
		
        $this->load->view('shared/header_map', $this->data);
        $this->load->view('adsb/view', $this->data);
        $this->load->view('shared/footer_map', $this->data);
    }
}
