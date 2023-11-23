<?php
defined('BASEPATH') or exit('No direct script access allowed');
class product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data['title']         = 'Product';
        $data['product'] = $this->m_product->read('', '', '');

        // TEMPLATE
        $view         = "product/data";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function create_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Tambah Product';

        // TEMPLATE
        $view         = "product/_create";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function update_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Ubah Product';
        $data['product']          = $this->m_product->get($this->uri->segment(3));

        // TEMPLATE
        $view         = "product/_update";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function detail_page()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Detail Product';
        $data['product']          = $this->m_product->get($this->uri->segment(3));

        // TEMPLATE
        $view         = "product/_detail";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();
        // POST
        $filename_1              = "thumbnailproduct-" . date('YmdHis');
        $config['upload_path']   = "./upload/product/";
        $config['allowed_types'] = "jpg|png|jpeg|avif|webp";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['max_width']     = "10000";
        $config['max_height']    = "10000";
        $config['file_name']     = '' . $filename_1;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('product_cover')) {
            // ALERT
            $alertStatus  = "failed";
            $alertMessage = $this->upload->display_errors();
            getAlert($alertStatus, $alertMessage);
        } else {
            $dat  = $this->upload->data();
            // compressImages($config['upload_path'], $dat['file_name']);
            $data['product_cover']       = $dat['file_name'];
        }

        $data['product_id']   = '';
        $data['product_name'] = $this->input->post('product_name');
        $data['product_description'] = $this->input->post('product_description');
        $data['product_status'] = $this->input->post('product_status');
        $data['updatetime']         = date('Y-m-d H:i:s');
        $data['createtime']         = date('Y-m-d H:i:s');
        $this->m_product->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " menambah data product " . $data['product_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data product " . $data['product_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('product');
    }


    public function update()
    {
        csrfValidate();
        // POST
        if ($_FILES['product_cover']['name'] != '') {
            $filename_1              = "thumbnailproduct-" . date('YmdHis');
            $config['upload_path']   = "./upload/product/";
            $config['allowed_types'] = "jpg|png|jpeg|avif|webp";
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename_1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('product_cover')) {
                // ALERT
                $alertStatus  = "failed";
                $alertMessage = $this->upload->display_errors();
                getAlert($alertStatus, $alertMessage);
            } else {
                $dat  = $this->upload->data();
                // compressImages($config['upload_path'], $dat['file_name']);
                $data['product_cover']       = $dat['file_name'];
            }
        }

        $data['product_id']   = $this->input->post('product_id');
        $data['product_name'] = $this->input->post('product_name');
        $data['product_description'] = $this->input->post('product_description');
        $data['product_status'] = $this->input->post('product_status');
        $data['updatetime']         = date('Y-m-d H:i:s');
        $this->m_product->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " mengubah data product dengan ID - nama = " . $data['product_id'] . " - " . $data['product_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data product : " . $data['product_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('product');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_product->delete($this->input->post('product_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data product dengan ID : " . $this->input->post('product_id') . " - " . $this->input->post('product_name');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data product : " . $this->input->post('product_id');
        getAlert($alertStatus, $alertMessage);

        redirect('product');
    }
}
