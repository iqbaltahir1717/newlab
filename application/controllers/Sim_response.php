<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sim_response extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sim_response');
        $this->load->model('m_sim_question');
        $this->load->model('m_sim_q_option');
        $this->load->model('m_product');
        $this->load->model('m_sim_goals');
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
        $data['title']         = 'Simulation Response';
        $data['sim_response'] = $this->m_sim_response->read('', '', '');

        // TEMPLATE
        $view         = "simulation/sim_response";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function create_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Add Simulation';
        $data['sim_response'] = $this->m_sim_response->get($this->uri->segment(3));
        if ($data['sim_response']) {
            $data['sim_question'] = $this->m_sim_question->read('', '', '', $data['sim_response'][0]->problems_experienced);
            $data['sim_goals'] = $this->m_sim_goals->read('', '', '', $data['sim_response'][0]->problems_experienced);
        }

        // TEMPLATE
        $view         = "simulation/_create";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();


        $data['sim_response_name']   = $this->input->post('sim_response_name');
        $data['sim_response_gender']   = $this->input->post('sim_response_gender');
        $data['daily_activity']   = $this->input->post('daily_activity');
        $data['problems_experienced']   = $this->input->post('problems_experienced');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['updatetime']         = date('Y-m-d H:i:s');
        $data['createtime']         = date('Y-m-d H:i:s');

        if (empty($this->input->post('sim_response_id'))) {
            $id = $this->m_sim_response->create($data);
        } else {
            $data['sim_response_id']   = $this->input->post('sim_response_id');
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
                // print_r($arr);
                // echo '</pre>';
                // die;

                $data['sim_response_text'] = serialize($arr);
                $this->m_sim_response->update($data);
            }

            $id = $this->input->post('sim_response_id');

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil menambah data sim response ";
            getAlert($alertStatus, $alertMessage);

            redirect('sim_response');
        }

        // LOG
        $message    = $this->session->userdata('user_fullname') . " menambah data sim response ";
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data sim response ";
        getAlert($alertStatus, $alertMessage);

        redirect('sim_response/create_page/' . $id);
    }


    public function update()
    {
        csrfValidate();
        // POST


        $data['user_id'] = $this->session->userdata('user_id');
        $data['updatetime']         = date('Y-m-d H:i:s');

        $this->m_sim_response->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " mengubah data sim response dengan ID = " . $data['sim_response_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data sim response ";
        getAlert($alertStatus, $alertMessage);

        redirect('sim_response');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_sim_response->delete($this->input->post('sim_response_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data sim_response dengan ID : " . $this->input->post('sim_response_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data sim_response : " . $this->input->post('sim_response_id');
        getAlert($alertStatus, $alertMessage);

        redirect('sim_response');
    }
}
