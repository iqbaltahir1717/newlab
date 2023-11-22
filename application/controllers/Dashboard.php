<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	function __construct() {
        parent::__construct();
		// Load Model
        $this->load->model('m_unit');
		$this->load->model('m_unit_gallery');
		$this->load->model('m_unit_gallery_category');
		$this->load->model('m_project');
		$this->load->model('m_news');

        // check session data
		if (!$this->session->userdata('user_id')) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
	}
		
	public function index(){

		// DATA
		$data['setting'] = getSetting();
		$data['title']   = 'Dashboard';
		$data['unit']  = $this->m_unit->widget();
		$data['gallery']  = $this->m_unit_gallery->widget();
		$data['project']  = $this->m_project->widget();
		$data['news']  = $this->m_news->widget();

		// TEMPLATE
		$view         = "dashboard/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
	}
}
