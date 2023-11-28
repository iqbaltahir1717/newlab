<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sim_question extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sim_question');
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
        $data['title']         = 'Simulation Questions';
        $data['sim_question'] = $this->m_sim_question->read('', '', '');

        // TEMPLATE
        $view         = "simulation/sim_question";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        if (!empty($_FILES['sim_question_image']['name'])) {
            $config['upload_path']   = './upload/question';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000000000000';
            $config['file_name'] =  'question-' . date('YmdHis') . "-" . rand(1000, 9999);

            $this->upload->initialize($config);
            if ($this->upload->do_upload('sim_question_image')) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $data['sim_question_image'] = $filename;
            }
        }

        $data['sim_question_text'] = $this->input->post('sim_question_text');
        $data['sim_question_type'] = $this->input->post('sim_question_type');
        $data['sim_question_multi'] = $this->input->post('sim_question_multi');
        $data['sim_question_part'] = $this->input->post('sim_question_part');
        $data['updatetime']         = date('Y-m-d H:i:s');
        $data['createtime']         = date('Y-m-d H:i:s');
        $this->m_sim_question->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " menambah data sim_question " . $data['sim_question_text'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data sim_question " . $data['sim_question_text'];
        getAlert($alertStatus, $alertMessage);

        redirect('sim_question');
    }


    public function update()
    {
        csrfValidate();
        // POST

        if (!empty($_FILES['sim_question_image']['name'])) {
            $config['upload_path']   = './upload/question';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000000000000';
            $config['file_name'] =  'question-' . date('YmdHis') . "-" . rand(1000, 9999);

            $this->upload->initialize($config);
            if ($this->upload->do_upload('sim_question_image')) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $data['sim_question_image'] = $filename;
            }
        }

        $data['sim_question_id']   = $this->input->post('sim_question_id');
        $data['sim_question_text'] = $this->input->post('sim_question_text');
        $data['sim_question_type'] = $this->input->post('sim_question_type');
        $data['sim_question_multi'] = $this->input->post('sim_question_multi');
        $data['sim_question_part'] = $this->input->post('sim_question_part');
        $data['updatetime']         = date('Y-m-d H:i:s');

        $this->m_sim_question->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " mengubah data sim_question dengan ID - nama = " . $data['sim_question_id'] . " - " . $data['sim_question_text'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data sim_question : " . $data['sim_question_text'];
        getAlert($alertStatus, $alertMessage);

        redirect('sim_question');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_sim_question->delete($this->input->post('sim_question_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data sim_question dengan ID : " . $this->input->post('sim_question_id') . " - " . $this->input->post('sim_question_text');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data sim_question : " . $this->input->post('sim_question_id');
        getAlert($alertStatus, $alertMessage);

        redirect('sim_question');
    }
}
