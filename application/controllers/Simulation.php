<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simulation extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_content');
		$this->load->model('m_link');
		$this->load->model('m_news_category');
	}

	public function index()
	{
		// DATA
		$data['setting']             = getSetting();

		// TEMPLATE
		$view         = "landing_page/simulation/index";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}

	public function form_data_user()
	{
		// DATA
		$data['setting']             = getSetting();
		$data['consult']                = $this->m_link->read('', '', '');

		// TEMPLATE
		$view         = "landing_page/simulation/form_data_user";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}

	public function form_simulation()
	{
		// DATA
		$data['setting']             = getSetting();
		$data['consult']                = $this->m_link->read('', '', '');

		// TEMPLATE
		$view         = "landing_page/simulation/form_data_user";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}

	public function form_successfully()
	{
		// DATA
		$data['setting']             = getSetting();
		$data['consult']                = $this->m_link->read('', '', '');

		// TEMPLATE
		$view         = "landing_page/simulation/form_successfully";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}
}
