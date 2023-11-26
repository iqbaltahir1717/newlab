<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Consultation extends CI_Controller
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
		$data['link']                = $this->m_link->read('', '', '');
		$data['content']             = $this->m_content->get('sejarah');
		$data['news_category']       = $this->m_news_category->read('', '', '');

		// TEMPLATE
		$view         = "landing_page/consultation/index";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}

	public function form_data_user()
	{
		// DATA
		$data['setting']             = getSetting();
		$data['link']                = $this->m_link->read('', '', '');
		$data['content']             = $this->m_content->get('sejarah');
		$data['news_category']       = $this->m_news_category->read('', '', '');

		// TEMPLATE
		$view         = "landing_page/consultation/form_1";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}
}
