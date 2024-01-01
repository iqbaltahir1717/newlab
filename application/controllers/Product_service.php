<?php
defined('BASEPATH') or exit('No direct script access allowed');
class product_service extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_product');
        $this->load->model('m_product_service');
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
        $data['title']         = 'product description';
        $data['product']          = $this->m_product->get($this->uri->segment(3));
        $data['product_service'] = $this->m_product_service->read('', '', '', $this->uri->segment(3));

        // TEMPLATE
        $view         = "product_service/data";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function create_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Tambah Product Service';
        $data['product']          = $this->m_product->get($this->uri->segment(3));

        // TEMPLATE
        $view         = "product_service/_create";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function update_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Ubah Product Service';
        $data['product']          = $this->m_product->get($this->uri->segment(3));
        $data['product_service']          = $this->m_product_service->get($this->uri->segment(4));

        // TEMPLATE
        $view         = "product_service/_update";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function detail_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Detail Product Service';
        $data['product']          = $this->m_product->get($this->uri->segment(3));
        $data['product_service']          = $this->m_product_service->get($this->uri->segment(4));

        // TEMPLATE
        $view         = "product_service/_detail";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }



    public function create()
    {
        csrfValidate();
        // POST
        $data['product_service_id']   = '';
        $data['product_service_name'] = $this->input->post('product_service_name');
        $data['product_service_description'] = $this->input->post('product_service_description');
        $data['product_service_status'] = $this->input->post('product_service_status');
        $data['product_id'] = $this->input->post('product_id');
        $data['updatetime']         = date('Y-m-d H:i:s');
        $data['createtime']         = date('Y-m-d H:i:s');
        $this->m_product_service->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " menambah data product_service " . $data['product_service_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data product_service " . $data['product_service_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('product_service/index/' . $this->input->post('product_id'));
    }


    public function update()
    {
        csrfValidate();
        // POST
        $data['product_service_id']   = $this->input->post('product_service_id');
        $data['product_service_name'] = $this->input->post('product_service_name');
        $data['product_service_description'] = $this->input->post('product_service_description');
        $data['product_service_status'] = $this->input->post('product_service_status');
        $data['product_id'] = $this->input->post('product_id');
        $data['updatetime']         = date('Y-m-d H:i:s');
        $this->m_product_service->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " mengubah data product_service dengan ID - nama = " . $data['product_service_id'] . " - " . $data['product_service_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data product_service : " . $data['product_service_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('product_service/index/' . $this->input->post('product_id'));
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_product_service->delete($this->input->post('product_service_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data product_service dengan ID : " . $this->input->post('product_service_id') . " - " . $this->input->post('product_service_name');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data product_service : " . $this->input->post('product_service_id');
        getAlert($alertStatus, $alertMessage);

        redirect('product_service/index/' . $this->input->post('product_id'));
    }
}
