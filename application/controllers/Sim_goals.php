<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sim_goals extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sim_goals');
        $this->load->model('m_product');
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
        $data['title']         = 'Goals Simulation';
        $data['sim_goals'] = $this->m_sim_goals->read('', '', '');
        $data['product'] = $this->m_product->read('', '', '');

        // TEMPLATE
        $view         = "simulation/sim_goals";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function update_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Ubah Goals';
        $data['sim_goals']          = $this->m_sim_goals->get($this->uri->segment(3));
        $data['product'] = $this->m_product->read('', '', '');

        // TEMPLATE
        $view         = "simulation/_sim_goals_update";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        for ($i = 0; $i < count($this->input->post('product')); $i++) {
            $arr[] = $this->input->post('product')[$i];
        }

        $data['product'] = implode(';', $arr);
        $data['sim_goals_text'] = $this->input->post('sim_goals_text');
        $data['sim_goals_part'] = $this->input->post('sim_goals_part');
        $data['updatetime']         = date('Y-m-d H:i:s');
        $data['createtime']         = date('Y-m-d H:i:s');
        $this->m_sim_goals->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " menambah data sim_goals " . $data['sim_goals_text'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data sim_goals " . $data['sim_goals_text'];
        getAlert($alertStatus, $alertMessage);

        redirect('sim_goals');
    }


    public function update()
    {
        csrfValidate();
        // POST
        // print_r($this->input->post('product'));die;
        for ($i = 0; $i < count($this->input->post('product')); $i++) {
            $arr[] = $this->input->post('product')[$i];
        }

        $data['product'] = implode(';', $arr);
        $data['sim_goals_id']   = $this->input->post('sim_goals_id');
        $data['sim_goals_text'] = $this->input->post('sim_goals_text');
        $data['sim_goals_part'] = $this->input->post('sim_goals_part');
        $data['updatetime']         = date('Y-m-d H:i:s');

        $this->m_sim_goals->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " mengubah data sim_goals dengan ID - nama = " . $data['sim_goals_id'] . " - " . $data['sim_goals_text'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data sim_goals : " . $data['sim_goals_text'];
        getAlert($alertStatus, $alertMessage);

        redirect('sim_goals');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_sim_goals->delete($this->input->post('sim_goals_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data sim_goals dengan ID : " . $this->input->post('sim_goals_id') . " - " . $this->input->post('sim_goals_text');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data sim_goals : " . $this->input->post('sim_goals_id');
        getAlert($alertStatus, $alertMessage);

        redirect('sim_goals');
    }
}
