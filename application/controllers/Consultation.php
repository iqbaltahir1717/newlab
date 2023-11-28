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
		$this->load->model('m_consult_response');
		$this->load->model('m_consult_question');
		$this->load->model('m_consult_q_option');

		if (!$this->session->userdata('user_id')) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('login/index/consultation');
		}
	}

	public function index()
	{
		// DATA
		$data['setting']             = getSetting();

		// TEMPLATE
		$view         = "landing_page/consultation/index";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}

	public function form_data_user()
	{
		// DATA
		$data['setting']             = getSetting();
		$data['consult']                = $this->m_link->read('', '', '');
		$data['consult_question'] = $this->m_consult_question->read('', '', '');

		// TEMPLATE
		$view         = "landing_page/consultation/form_data_user";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}

	public function create()
	{
		csrfValidate();

		$arr = array();
		for ($i = 0; $i < count($this->input->post('question')); $i++) {
			$arr[] = array(
				'q' => $this->input->post('question')[$i],
				'r' => $this->input->post('response' . $i),
			);
		}
		$data['consult_response_text'] = serialize($arr);
		$data['user_id'] = $this->session->userdata('user_id');
		$data['updatetime']         = date('Y-m-d H:i:s');
		$data['createtime']         = date('Y-m-d H:i:s');
		$this->m_consult_response->create($data);

		// LOG
		$message    = $this->session->userdata('user_fullname') . " menambah data consult response ";
		createLog($message);

		// ALERT
		$alertStatus  = "success";
		$alertMessage = "Berhasil menambah data consult response ";
		getAlert($alertStatus, $alertMessage);

		redirect('consultation/form_successfully');
	}

	public function form_successfully()
	{
		// DATA
		$data['setting']             = getSetting();
		$data['consult']                = $this->m_link->read('', '', '');

		// TEMPLATE
		$view         = "landing_page/consultation/form_successfully";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}
}
