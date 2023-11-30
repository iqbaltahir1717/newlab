<?php defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// Load Model
		$this->load->model('m_unit');
		$this->load->model('m_unit_gallery');
		$this->load->model('m_unit_gallery_category');
		$this->load->model('m_project');
		$this->load->model('m_news');
		$this->load->model('m_widget');

		// check session data
		if (!$this->session->userdata('user_id') and $this->session->userdata('user_group') != 4) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
	}

	public function index()
	{
		// print_r($this->session->userdata('user_group'));die;
		if ($this->session->userdata('user_group') == 4)
			redirect('login');
		// DATA
		$data['setting'] = getSetting();
		$data['title']   = 'Dashboard';

		// TEMPLATE
		$view         = "dashboard/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
	}
}
