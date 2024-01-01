<?php
defined('BASEPATH') or exit('No direct script access allowed');
class sim_q_option extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sim_q_option');
        $this->load->model('m_sim_question');
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
        $data['title']         = 'Selected Answer';
        $data['sim_q_option'] = $this->m_sim_q_option->read('', '', '', $this->uri->segment(3));
        $data['sim_question'] = $this->m_sim_question->get($this->uri->segment(3));

        // TEMPLATE
        $view         = "simulation/sim_q_option";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        if (!empty($_FILES['sim_q_option_text']['name'])) {
            $config['upload_path']   = './upload/option';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000000000000';
            $config['file_name'] =  'option-' . date('YmdHis') . "-" . rand(1000, 9999);

            $this->upload->initialize($config);
            if ($this->upload->do_upload('sim_q_option_text')) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $data['sim_q_option_text'] = $filename;
            }
        } else {
            $data['sim_q_option_text'] = $this->input->post('sim_q_option_text');
        }

        $data['sim_question_id'] = $this->input->post('sim_question_id');
        $this->m_sim_q_option->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " menambah data sim_q_option " . $data['sim_q_option_text'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data sim_q_option " . $data['sim_q_option_text'];
        getAlert($alertStatus, $alertMessage);

        redirect('sim_q_option/index/' . $this->input->post('sim_question_id'));
    }


    public function update()
    {
        csrfValidate();
        // POST
        if (!empty($_FILES['sim_q_option_text']['name'])) {
            $config['upload_path']   = './upload/option';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '50000000000000';
            $config['file_name'] =  'option-' . date('YmdHis') . "-" . rand(1000, 9999);

            $this->upload->initialize($config);
            if ($this->upload->do_upload('sim_q_option_text')) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $data['sim_q_option_text'] = $filename;
            }
        } elseif (!empty($this->input->post('sim_q_option_text'))) {
            $data['sim_q_option_text'] = $this->input->post('sim_q_option_text');
        }

        $data['sim_q_option_id']   = $this->input->post('sim_q_option_id');
        $data['sim_question_id'] = $this->input->post('sim_question_id');

        $this->m_sim_q_option->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " mengubah data sim_q_option dengan ID - nama = " . $data['sim_q_option_id'] . " - " . $data['sim_q_option_text'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data sim_q_option : " . $data['sim_q_option_text'];
        getAlert($alertStatus, $alertMessage);

        redirect('sim_q_option/index/' . $this->input->post('sim_question_id'));
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_sim_q_option->delete($this->input->post('sim_q_option_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data sim_q_option dengan ID : " . $this->input->post('sim_q_option_id') . " - " . $this->input->post('sim_q_option_text');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data sim_q_option : " . $this->input->post('sim_q_option_id');
        getAlert($alertStatus, $alertMessage);

        redirect('sim_q_option/index/' . $this->input->post('sim_question_id'));
    }
}
