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
		$this->load->model('m_sim_response');
		$this->load->model('m_sim_question');
		$this->load->model('m_sim_q_option');
		$this->load->model('m_product');
		$this->load->model('m_product_service');
		$this->load->model('m_sim_goals');
		$this->load->library('upload');
		if (!($this->session->userdata('user_id'))) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('login/index/simulation');
		}
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

		// TEMPLATE
		$view         = "landing_page/simulation/form_data_user";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}

	public function create()
	{
		csrfValidate();
		$data['sim_response_name']   = $this->input->post('sim_response_name');
		$data['sim_response_gender']   = $this->input->post('sim_response_gender');
		$data['daily_activity']   = $this->input->post('daily_activity');
		$data['problems_experienced']   = $this->input->post('problems_experienced');
		$data['user_id'] 			= $this->session->userdata('user_id');
		$data['updatetime']         = date('Y-m-d H:i:s');
		$data['createtime']         = date('Y-m-d H:i:s');
		$id = $this->m_sim_response->create($data);


		// LOG
		$message    = $this->session->userdata('user_fullname') . " menambah data sim response ";
		createLog($message);

		// ALERT
		$alertStatus  = "success";
		$alertMessage = "Berhasil menambah data sim response ";
		getAlert($alertStatus, $alertMessage);

		redirect('simulation/form_simulation/'  . encrypt_url($id));
	}

	public function form_simulation()
	{
		// DATA
		$data['setting']             = getSetting();

		$data['sim_response'] = $this->m_sim_response->get(decrypt_url($this->uri->segment(3)));
		$data['sim_question'] = $this->m_sim_question->read('', '', '', $data['sim_response'][0]->problems_experienced);
		$data['sim_goals'] = $this->m_sim_goals->read('', '', '', $data['sim_response'][0]->problems_experienced);

		// TEMPLATE
		$view         = "landing_page/simulation/form_simulation";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}

	public function upload_image()
	{
		$filename = $_FILES['file']['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$location = "upload/scan_image/" . $filename;
		if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
			$color = Imagecolorpicker($ext, $location);
			echo $color;
		} else {
			echo 'Failure';
		}
	}

	public function create_simulation()
	{
		csrfValidate();

		$data['sim_response_id']   = decrypt_url($this->input->post('sim_response_id'));
		$data['sim_response_level'] = $this->input->post('sim_response_level');
		$data['updatetime']         = date('Y-m-d H:i:s');
		$arr = array();

		if (!empty($this->input->post('question'))) {
			for ($i = 0; $i < count($this->input->post('question')); $i++) {
				if (str_replace(' ', '', $this->input->post('sim_question_type')[$i]) == 'file') {
					if (!empty($_FILES['response' . $i]['name'])) {
						$config['upload_path']   = './upload/simulation';
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$config['max_size'] = '50000000000000';
						$config['file_name'] = str_replace(' ', '-', strtolower($this->input->post('sim_response_name'))) . '-' . str_replace(' ', '-', strtolower($this->input->post('problems_experienced'))) . '-' . date('YmdHis') . "-" . rand(1000, 9999);

						$this->upload->initialize($config);
						if ($this->upload->do_upload('response' . $i)) {
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$r = $filename;
						}
					}
				} else {
					if (str_replace(' ', '', $this->input->post('sim_question_multi')[$i]) == 'Y') {
						$rr  = $this->input->post('response' . $i);
						$a = [];
						if ($rr) {
							for ($j = 0; $j < count($rr); $j++) {
								$a[] = $rr[$j];
							}
						}
						$r = implode(';', $a);
					} else {
						$r  = $this->input->post('response' . $i);
					}
				}
				$arr[] = array(
					'q' => $this->input->post('question')[$i],
					'r' => $r,
				);
			}
			// echo '<pre>';
			// print_r($this->input->post('sim_response_level'));
			// echo '</pre>';
			// die;

			$data['sim_response_text'] = serialize($arr);
			$this->m_sim_response->update($data);
		}

		// ALERT
		$alertStatus  = "success";
		$alertMessage = "Berhasil menambah data sim response ";
		getAlert($alertStatus, $alertMessage);

		redirect('simulation/form_successfully/' . $this->input->post('sim_response_id'));
	}

	public function form_successfully()
	{
		// DATA
		$data['setting']             = getSetting();
		$data['sim_response'] = $this->m_sim_response->get(decrypt_url($this->uri->segment(3)));
		// $data['sim_question'] = $this->m_sim_question->read('', '', '', $data['sim_response'][0]->problems_experienced);
		$data['product_rekomendation'] = [];
		$data['image_picker'] = '';
		$data['part_of_body'] = '';
		$rekomendasi = [];
		$arr = unserialize($data['sim_response'][0]->sim_response_text);

		if ($arr) {
			foreach ($arr as $value) {
				$ar = explode(';', $value['r']);
				for ($i = 0; $i < count($ar); $i++) {
					$goals = $this->m_sim_goals->get($ar[$i]);
					if ($goals) {
						$product = explode(';', $goals[0]->product);
						for ($j = 0; $j < count($product); $j++) {
							$rekomendasi[] = $product[$j];
						}
					}
				}
				// check image
				if (!empty($value['r']) and file_exists('./upload/simulation/' . $value['r']))
					$data['image_picker'] = Imagecolorpicker(explode('.', $value['r'])[1], './upload/simulation/' . $value['r']);

				if (!empty($value['q']) and str_replace(' ', '', $value['q']) == str_replace(' ', '', 'Which part of the body has issues?'))
					$data['part_of_body'] = $value['r'];
				else if ($data['sim_response'][0]->problems_experienced == 'Teeth')
					$data['part_of_body'] = 'Teeth';
			}
		}

		if ($rekomendasi) {
			$rekomendasi = array_unique($rekomendasi);
			foreach ($rekomendasi as $key) {
				$product = $this->m_product->get($key);
				if ($product)
					$data['product_rekomendation'][] = $product[0];
			}
		}

		// echo '<pre>';
		// print_r($data['sim_response']);
		// echo '</pre>';
		// die;

		// TEMPLATE
		$view         = "landing_page/simulation/form_successfully";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}
}
