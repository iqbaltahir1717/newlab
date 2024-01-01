<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Consult_response extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_consult_response');
        $this->load->model('m_consult_question');
        $this->load->model('m_consult_q_option');
        $this->load->library('upload');
        // SESSION
        if (!$this->session->userdata('user_id') or $this->session->userdata('user_group') != 1 and $this->session->userdata('user_group') != 2) {
            // ALERT
            $alertStatus  = 'failed';
            $alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
            getAlert($alertStatus, $alertMessage);
            redirect('auth');
        }
    }


    public function index()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Consultation Response';
        $data['consult_response'] = $this->m_consult_response->read('', '', '');

        // TEMPLATE
        $view         = "consult/consult_response";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function create_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Add Consultation';
        $data['consult_question'] = $this->m_consult_question->read('', '', '');

        // TEMPLATE
        $view         = "consult/_create";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        $data['consult_response_id']   = '';
        $arr = array();
        for ($i = 0; $i < count($this->input->post('response')); $i++) {
            $arr[] = array(
                'q' => $this->input->post('question')[$i],
                'r' => $this->input->post('response')[$i],
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

        redirect('consult_response');
    }


    public function update()
    {
        csrfValidate();
        // POST

        $data['consult_response_id']   = $this->input->post('consult_response_id');
        $data['consult_response_text'] = $this->input->post('consult_response_text');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['updatetime']         = date('Y-m-d H:i:s');

        $this->m_consult_response->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " mengubah data consult response dengan ID = " . $data['consult_response_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data consult response ";
        getAlert($alertStatus, $alertMessage);

        redirect('consult_response');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_consult_response->delete($this->input->post('consult_response_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data consult_response dengan ID : " . $this->input->post('consult_response_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data consult_response : " . $this->input->post('consult_response_id');
        getAlert($alertStatus, $alertMessage);

        redirect('consult_response');
    }
}
