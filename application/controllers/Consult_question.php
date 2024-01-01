<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Consult_question extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_consult_question');
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
        $data['title']         = 'Consultation Questions';
        $data['consult_question'] = $this->m_consult_question->read('', '', '');

        // TEMPLATE
        $view         = "consult/consult_question";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        $data['consult_question_id']   = '';
        $data['consult_question_text'] = $this->input->post('consult_question_text');
        $data['consult_question_type'] = $this->input->post('consult_question_type');
        $data['consult_question_multi'] = $this->input->post('consult_question_multi');
        $data['updatetime']         = date('Y-m-d H:i:s');
        $data['createtime']         = date('Y-m-d H:i:s');
        $this->m_consult_question->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " menambah data consult_question " . $data['consult_question_text'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data consult_question " . $data['consult_question_text'];
        getAlert($alertStatus, $alertMessage);

        redirect('consult_question');
    }


    public function update()
    {
        csrfValidate();
        // POST

        $data['consult_question_id']   = $this->input->post('consult_question_id');
        $data['consult_question_text'] = $this->input->post('consult_question_text');
        $data['consult_question_type'] = $this->input->post('consult_question_type');
        $data['consult_question_multi'] = $this->input->post('consult_question_multi');
        $data['updatetime']         = date('Y-m-d H:i:s');

        $this->m_consult_question->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " mengubah data consult_question dengan ID - nama = " . $data['consult_question_id'] . " - " . $data['consult_question_text'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data consult_question : " . $data['consult_question_text'];
        getAlert($alertStatus, $alertMessage);

        redirect('consult_question');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_consult_question->delete($this->input->post('consult_question_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data consult_question dengan ID : " . $this->input->post('consult_question_id') . " - " . $this->input->post('consult_question_text');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data consult_question : " . $this->input->post('consult_question_id');
        getAlert($alertStatus, $alertMessage);

        redirect('consult_question');
    }
}
