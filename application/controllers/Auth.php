<?php defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
		$this->load->model('m_user');
	}

    public function imagecolorpicker($extension, $image)
	{
		if ($extension == 'png')
			$image = imagecreatefrompng($image);
		else
			$image = imagecreatefromjpeg($image);
		$thumb = imagecreatetruecolor(1, 1);
		imagecopyresampled($thumb, $image, 0, 0, 0, 0, 1, 1, imagesx($image), imagesy($image));
		$mainColor = strtoupper(dechex(imagecolorat($thumb, 0, 0)));
		echo $mainColor;
	}

	public function index()
	{
		// check session data
		if ($this->session->userdata('user_id')) {
			// ALERT
			$alertStatus  = 'success';
			$alertMessage = 'Selamat Datang, ' . $this->session->userdata('user_fullname');
			getAlert($alertStatus, $alertMessage);
			redirect('dashboard');
		} else {
			// DATA
			$data['setting'] = getSetting();

			// TEMPLATE
			$view         = "auth/login";
			$viewCategory = "single";
			TemplateApp($data, $view, $viewCategory);
		}
	}


	public function validate()
	{
		csrfValidate();
		if ($_POST) {
			$result           = $this->m_auth->validate(str_replace(' ', '', $this->db->escape_str($this->input->post('username'))));
			if (!!($result)) {
				if (password_verify($this->input->post('password'), $result[0]->user_password)) {
					// SESSION DATA
					$data = array(
						'user_id'         => $result[0]->user_id,
						'user_name'       => $result[0]->user_name,
						'user_fullname'   => $result[0]->user_fullname,
						'user_photo'      => $result[0]->user_photo,
						'user_email'      => $result[0]->user_email,
						'user_group'      => $result[0]->group_id,
						'user_createtime' => $result[0]->createtime,
						'user_gender' => $result[0]->user_gender,
						'sess_rowpage'    => 10,
						'IsAuthorized'    => true
					);
					$this->session->set_userdata($data);

					// LOG
					$logMessage = $data['user_fullname'] . " melakukan login ke sistem";
					createLog($logMessage);

					// ALERT
					$alertStatus  = 'success';
					$alertMessage = 'Selamat Datang, ' . $this->session->userdata('user_fullname');
					getAlert($alertStatus, $alertMessage);

					redirect('dashboard');
				} else {
					// ALERT
					$alertStatus  = 'failed';
					$alertMessage = 'Username atau Password salah';
					getAlert($alertStatus, $alertMessage);
					redirect('auth');
				}
			} else {
				// ALERT
				$alertStatus  = 'failed';
				$alertMessage = 'Akun tidak valid';
				getAlert($alertStatus, $alertMessage);
				redirect('auth');
			}
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
	
	
	public function logout_consultation()
	{
		$this->session->sess_destroy();
		redirect('login/index/consultation');
	}
	
	public function logout_simulation()
	{
		$this->session->sess_destroy();
		redirect('login/index/simulation');
	}
}
