<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gps extends CI_Controller
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
			$this->data['link_active']	= 'gps';
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
		$this->form_validation->set_rules('gSLatitude', 'GS Latitude', 'required|xss_clean');
		$this->form_validation->set_rules('gSLatitudeRef', 'GS Latitude (reference)', 'required|xss_clean');
		$this->form_validation->set_rules('gSLongitude', 'GS Longitude', 'required|xss_clean');
		$this->form_validation->set_rules('gSLongitudeRef', 'GS Longitude (reference)', 'required|xss_clean');
		$this->form_validation->set_rules('coastingTImeout', 'GS Coasting Timeout (Min)', 'required|xss_clean');
		$this->form_validation->set_rules('gPSQualityThd', 'GS Quality Threshold', 'required|xss_clean');
		$this->form_validation->set_rules('gPSSatelitQty', 'GS Satelit Quality', 'required|xss_clean');
		$this->form_validation->set_rules('gPSPositionRangethd', 'GS Position Range Threshold', 'required|xss_clean');
		$this->form_validation->set_rules('gPSStatus', 'GS Status', 'required|xss_clean');
		
		if ($this->form_validation->run() == TRUE) {
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gSLatitude';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gSLatitude'));
		
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gSLatitudeRef';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gSLatitudeRef'));
		
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gSLongitude';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gSLongitude'));

			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gSLongitudeRef';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gSLongitudeRef'));

			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'coastingTImeout';
			$this->groundstation_model->setSnmp($condition, $this->input->post('coastingTImeout'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gPSQualityThd';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gPSQualityThd'));
		
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gPSSatelitQty';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gPSSatelitQty'));

			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gPSPositionRangethd';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gPSPositionRangethd'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gPSStatus';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gPSStatus'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'satelliteQntyCountInThd';
			$this->groundstation_model->setSnmp($condition, $this->input->post('satelliteQntyCountInThd'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'satelliteQntyCountOutThd';
			$this->groundstation_model->setSnmp($condition, $this->input->post('satelliteQntyCountOutThd'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gpsQltyCountInThd';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gpsQltyCountInThd'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'positionRangeCountInThd';
			$this->groundstation_model->setSnmp($condition, $this->input->post('positionRangeCountInThd'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'gpsQltyCountOutThd';
			$this->groundstation_model->setSnmp($condition, $this->input->post('gpsQltyCountOutThd'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'positionRangeCountOutThd';
			$this->groundstation_model->setSnmp($condition, $this->input->post('positionRangeCountOutThd'));
			
			$condition['id_host'] = $id_hostt;
			$condition['key_oid'] = 'positionRangeThd';
			$this->groundstation_model->setSnmp($condition, $this->input->post('positionRangeThd'));

			
			redirect('gps/index/'.$id_hostt);
			
		} else {
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->data['action'] = site_url('gps/index/'.$id_hostt);
		
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
		$condition['key_oid'] = 'gSLatitude';
		$this->data['gSLatitude'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'gSLatitudeRef';
		$this->data['gSLatitudeRef'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'gSLongitudeRef';
		$this->data['gSLongitudeRef'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'gSLongitude';
		$this->data['gSLongitude'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'coastingTImeout';
		$this->data['coastingTImeout'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'gPSQualityThd';
		$this->data['gPSQualityThd'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'gPSSatelitQty';
		$this->data['gPSSatelitQty'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'gPSPositionRangethd';
		$this->data['gPSPositionRangethd'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'gPSStatus';
		$this->data['gPSStatus'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'satelliteQntyCountInThd';
		$this->data['satelliteQntyCountInThd'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'satelliteQntyCountOutThd';
		$this->data['satelliteQntyCountOutThd'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'gpsQltyCountInThd';
		$this->data['gpsQltyCountInThd'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'positionRangeCountInThd';
		$this->data['positionRangeCountInThd'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'gpsQltyCountOutThd';
		$this->data['gpsQltyCountOutThd'] = $this->groundstation_model->getSnmp($condition);
		
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'positionRangeCountOutThd';
		$this->data['positionRangeCountOutThd'] = $this->groundstation_model->getSnmp($condition);
	
		$condition['id_host'] = $id_hostt;
		$condition['key_oid'] = 'positionRangeThd';
		$this->data['positionRangeThd'] = $this->groundstation_model->getSnmp($condition);
	
		$this->load->view('shared/header', $this->data);
		$this->load->view('shared/menu', $this->data);
		$this->load->view('gps/view', $this->data);
		$this->load->view('shared/footer');
		}
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
