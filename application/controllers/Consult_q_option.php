<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Consult_q_option extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_consult_q_option');
        $this->load->library('upload');
        if (!($this->session->userdata('user_id'))) {
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
        $data['title']         = 'Selected Answer';
        $data['consult_q_option'] = $this->m_consult_q_option->read('', '', '', $this->uri->segment(3));

        // TEMPLATE
        $view         = "consult/consult_q_option";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        $data['consult_q_option_id']   = '';
        $data['consult_q_option_text'] = $this->input->post('consult_q_option_text');
        $data['consult_question_id'] = $this->input->post('consult_question_id');
        $this->m_consult_q_option->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " menambah data consult_q_option " . $data['consult_q_option_text'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data consult_q_option " . $data['consult_q_option_text'];
        getAlert($alertStatus, $alertMessage);

        redirect('consult_q_option/index/' . $this->input->post('consult_question_id'));
    }


    public function update()
    {
        csrfValidate();
        // POST

        $data['consult_q_option_id']   = $this->input->post('consult_q_option_id');
        $data['consult_q_option_text'] = $this->input->post('consult_q_option_text');
        $data['consult_question_id'] = $this->input->post('consult_question_id');

        $this->m_consult_q_option->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " mengubah data consult_q_option dengan ID - nama = " . $data['consult_q_option_id'] . " - " . $data['consult_q_option_text'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data consult_q_option : " . $data['consult_q_option_text'];
        getAlert($alertStatus, $alertMessage);

        redirect('consult_q_option/index/' . $this->input->post('consult_question_id'));
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_consult_q_option->delete($this->input->post('consult_q_option_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data consult_q_option dengan ID : " . $this->input->post('consult_q_option_id') . " - " . $this->input->post('consult_q_option_text');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data consult_q_option : " . $this->input->post('consult_q_option_id');
        getAlert($alertStatus, $alertMessage);

        redirect('consult_q_option/index/' . $this->input->post('consult_question_id'));
    }
}
