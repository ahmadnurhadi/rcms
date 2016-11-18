<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class contoh extends CI_Controller {

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
			$this->data['link_active']	= 'host';
		}
		
		$this->load->model("contoh_model");
    }

    public function index(){
     	$this->contoh_model->contoh();
     }
}
