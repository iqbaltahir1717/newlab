<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simulation extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_content');
		$this->load->model('m_link');
		// $this->load->model('m_news_category');
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
		$location = "upload/upload_image/" . $filename;
		move_uploaded_file($_FILES['file']['tmp_name'], $location);

		// if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
		// 	$color = Imagecolorpicker($ext, $location);
		// 	echo $color;
		// } else {
		// 	echo 'Failure';
		// }

		// $rand = rand(111111111, 999999999);
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, 'https://api.remove.bg/v1.0/removebg');
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($ch, CURLOPT_POST, 1);
		// $post = array(
		// 	'image_file' => fopen($location, 'r'),
		// 	// 'image_url' => 'https://cdns.klimg.com/resized/1200x600/p/photonews/foto-cantik-menawan-cewek-ini-ternyata--576164.jpg',
		// 	'size' => 'auto'
		// );
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		// $headers = array();
		// $headers[] = 'X-Api-Key: hk4gPcAkLyPLne9FpMqgPt6R';
		// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		// $result = curl_exec($ch);
		// curl_close($ch);
		// $fp = fopen($rand . '.png', "wb");
		// fwrite($fp, $result);
		// fclose($fp);

		$data['sim_response_id']   = $this->uri->segment(3);
		$data['sim_image_upload'] = $filename;
		$data['updatetime']         = date('Y-m-d H:i:s');
		$this->m_sim_response->update($data);
	}

	public function crop_image()
	{
		$datas = $_POST["image"];
		$image_array_1 = explode(";", $datas);
		$image_array_2 = explode(",", $image_array_1[1]);
		$datas = base64_decode($image_array_2[1]);
		$filename = time() . '.png';
		$imageName = 'upload/crop_image/' . $filename;
		file_put_contents($imageName, $datas);

		$data['sim_response_id']   = $this->uri->segment(3);
		$data['sim_image_crop'] = $filename;
		$data['updatetime']         = date('Y-m-d H:i:s');
		$this->m_sim_response->update($data);
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
				if (!empty($data['sim_response'][0]->sim_image_crop) and file_exists('./upload/crop_image/' . $data['sim_response'][0]->sim_image_crop))
					$data['image_picker'] = Imagecolorpicker(explode('.', $data['sim_response'][0]->sim_image_crop)[1], './upload/crop_image/' . $data['sim_response'][0]->sim_image_crop);

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

		list($r, $g, $b) = sscanf('#' . $data['image_picker'], "#%02x%02x%02x");

		$arr_body = ['#FDEED6', '#F0D2A2', '#E3BB7B', '#DCA96D', '#D79D6A', '#C88652', '#B5774D', '#A35C34', '#794835', '#70513C'];
		for ($i = 0; $i < count($arr_body); $i++) {
			list($r_c, $g_c, $b_c) = sscanf($arr_body[$i], "#%02x%02x%02x");

			$p_r[] = $r_c . '-' . $g_c . '-' . $b_c;
			$p[] = 100 - round(sqrt(pow($r_c - $r, 2) + pow($g_c - $g, 2) + pow($b_c - $b, 2)) / 239.46 * 100, 2);
		}

		$data['level'] = array_keys($p, max($p))[0];
		if ($data['sim_response'][0]->problems_experienced == 'Skin')
			$data['set_image'] = (object) $this->check_skin(($data['level'] + 1) . '_' . $data['sim_response'][0]->sim_response_level);

		// echo '<pre>';
		// print_r($data['image_picker']);
		// echo '</pre>';

		// $p = [1, 2, 3, 4, 5];

		// echo '<pre>';
		// print_r(array_keys($p, max($p))[0]);
		// echo '</pre>';

		// echo '<pre>';
		// print_r($r . '-' . $g . '-' . $b);
		// echo '</pre>';

		// echo '<pre>';
		// print_r($p_r);
		// echo '</pre>';

		// echo '<pre>';
		// print_r($data['set_image']);
		// echo '</pre>';
		// die;

		// TEMPLATE
		$view         = "landing_page/simulation/form_successfully";
		$viewCategory = "all";
		TemplateForm($data, $view, $viewCategory);
	}

	function check_skin($value)
	{
		$arr = array(
			'1_1' => array(
				'vibrance' => 1,
				'saturation' => 1,
				'brightness' => 0,
				'contrast' => 0.3,
			),
			'1_2' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'1_3' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'1_4' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'1_5' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),

			'2_1' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'2_2' => array(
				'vibrance' => 0,
				'saturation' => 0,
				'brightness' => 0,
				'contrast' => 0,
			),
			'2_3' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'2_4' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'2_5' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),

			'3_1' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'3_2' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'3_3' => array(
				'vibrance' => 0,
				'saturation' => 0,
				'brightness' => 0,
				'contrast' => 0,
			),
			'3_4' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'3_5' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),

			'4_1' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'4_2' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'4_3' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'4_4' => array(
				'vibrance' => 0,
				'saturation' => 0,
				'brightness' => 0,
				'contrast' => 0,
			),
			'4_5' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),

			'5_1' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'5_2' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'5_3' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'5_4' => array(
				'vibrance' => 0.5,
				'saturation' => 0.5,
				'brightness' => 0.5,
				'contrast' => 0.5,
			),
			'5_5' => array(
				'vibrance' => 0,
				'saturation' => 0,
				'brightness' => 0,
				'contrast' => 0,
			),
		);
		return $arr[$value];
	}
}
