<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Google extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
        $this->load->model('m_user');
    }

    public function index()
    {
        include_once APPPATH . "../vendor/autoload.php";
        $google_client = new Google_Client();
        $google_client->setClientId('332796968225-407u02j6ftod68mv1fvq0ejlriep0h61.apps.googleusercontent.com'); //masukkan ClientID anda 
        $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
        if (empty($this->uri->segment(3)))
            $google_client->setRedirectUri(base_url('newlab/google')); //Masukkan Redirect Uri anda
        else
            $google_client->setRedirectUri(base_url('newlab/google/' . $this->uri->segment(3))); //Masukkan Redirect Uri anda
        $google_client->addScope('email');
        $google_client->addScope('profile');
        $google_client->createAuthUrl();
        // if ($google_client->createAuthUrl()) {
        if (isset($_GET["code"])) {

            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
            // print_r($token);
            // die;
            if (!isset($token["error"])) {

                $google_client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();
                $current_datetime = date('Y-m-d H:i:s');
                $user_data = array(
                    'user_fullname' => $data['given_name'] . ' ' . $data['family_name'],
                    'user_name' => $data['email'],
                    'user_password' => password_hash($data['email'], PASSWORD_BCRYPT),
                    'user_email' => $data['email'],
                    'group_id' => 4,
                    'createtime' => $current_datetime,
                    'user_photo' => '',
                );
                $result = $this->m_user->get_email($data['email']);
                if (!$result) {
                    $this->m_user->create($user_data);
                }
                $result = $this->m_user->get_email($data['email']);

                $data = array(
                    'user_id'         => $result[0]->user_id,
                    'user_name'       => $result[0]->user_name,
                    'user_fullname'   => $result[0]->user_fullname,
                    'user_photo'      => $result[0]->user_photo,
                    'user_email'      => $result[0]->user_email,
                    'user_group'      => $result[0]->group_id,
                    'user_createtime' => $result[0]->createtime,
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
                if ($this->uri->segment(3) == 'consultation')
                    redirect('consultation');
                elseif ($this->uri->segment(3) == 'simulation')
                    redirect('simulation');
                else
                    redirect('dashboard');
            }
        }
        // }
        // $login_button = '';
        // if (!$this->session->userdata('access_token')) {

        //     $login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';
        //     $data['login_button'] = $login_button;
        //     $this->load->view('google_login', $data);
        // } else {
        //     // uncomentar kode dibawah untuk melihat data session email
        //     // echo json_encode($this->session->userdata('access_token')); 
        //     // echo json_encode($this->session->userdata('user_data'));
        //     echo "Login success";
        // }
    }
    // public function logout()
    // {
    //     $this->session->unset_userdata('access_token');

    //     $this->session->unset_userdata('user_data');
    //     echo "Logout berhasil";
    // }
}
