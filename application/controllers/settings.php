<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
		error_reporting(E_ALL);
		
		$this->load->helper('url');
		
		#Check session login
		if(!$this->session->userdata('is_login')) redirect($this->config->base_url());
		
		$this->load->model('page_setup_model','page_setup');
		
		date_default_timezone_set('Asia/Manila');
	}
	
	public function index()
	{	
		$data['menu_id'] = 10;
		$data['row'] = $this->page_setup->get_page_setup();
		
		// convert vacant_hours from format in database to minutes format
		$converted_vacant_hours = explode(':',$data['row']->vacant_hours);
		$data['row']->vacant_hours = ($converted_vacant_hours[0] * 60) + ($converted_vacant_hours[1]);
		$this->load->view('settings_view', $data);
	}
	
	public function update_page_setup($data = '') {
		// change the format of vacant hours for database
		$calculated_vacant_hours = date('H:i', mktime(0, $this->input->post('vacant_hours')));
		
		$update_data = array(
			'per_person_price' => $this->input->post('per_person_price'),
			'corkage_price' => $this->input->post('corkage_price'),
			'vacant_hours' => $calculated_vacant_hours,
			'allowed_idle_mins' => $this->input->post('allowed_idle_mins'),
		);
		
		$this->page_setup->update_page_setup($update_data);
	}
}