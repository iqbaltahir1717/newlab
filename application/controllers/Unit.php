<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();



        // LOAD MODEL

        $this->load->model('m_unit');

        $this->load->model('m_unit_gallery');

        $this->load->model('m_unit_gallery_category');

        $this->load->library('upload');



        // SESSION

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

        $data['setting']     = getSetting();

        $data['title']       = 'Data Unit Rumah';

        $data['unit']        = $this->m_unit->read('', '', '');



        // TEMPLATE

        $view         = "unit/index";

        $viewCategory = "all";

        TemplateApp($data, $view, $viewCategory);

    }



    public function create_page()

    {

        //DATA

        $data['setting']       = getSetting();

        $data['title']         = 'Tambah Data';



        // TEMPLATE

        $view         = "unit/add";

        $viewCategory = "all";

        TemplateApp($data, $view, $viewCategory);

    }



    public function gallery_page()

    {

        //DATA

        $data['setting']       = getSetting();

        $data['title']         = 'Gallery Unit';

        $data['unit']        = $this->m_unit->get($this->uri->segment(3));

        $data['gallery']        = $this->m_unit_gallery->read('','',$this->uri->segment(3));

        $data['gallery_category']        = $this->m_unit_gallery_category->read('','','');



        // TEMPLATE

        $view         = "unit/gallery";

        $viewCategory = "all";

        TemplateApp($data, $view, $viewCategory);

    }



    public function update_page()

    {

        //DATA

        $data['setting']     = getSetting();

        $data['title']       = 'Ubah Data';

        $data['unit']        = $this->m_unit->get($this->uri->segment(3));



        // TEMPLATE

        $view         = "unit/update";

        $viewCategory = "all";

        TemplateApp($data, $view, $viewCategory);

    }



    // CREATE DATA UNIT

    public function create()

    {



        csrfValidate();



        $filename_1              = "unit-preview-1".$this->input->post('unit_id').'-'.date('YmdHis');

        $config['upload_path']   = "./upload/unit/";

        $config['allowed_types'] = "jpg|png|jpeg|avif|webp";

        $config['overwrite']     = "true";

        $config['max_size']      = "2000";

        $config['max_width']     = "10000";

        $config['max_height']    = "10000";

        $config['file_name']     = '' . $filename_1;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('unit_preview1')) {

            // ALERT

            $alertStatus  = "failed";

            $alertMessage = $this->upload->display_errors();

            getAlert($alertStatus, $alertMessage);

            redirect('unit/create_page');

        } else {

            $dat  = $this->upload->data();

            $data['unit_preview1']       = $dat['file_name'];

        }



        $filename_2              = "unit-preview-2".'-'.date('YmdHis');

        $config2['upload_path']   = "./upload/unit/";

        $config2['allowed_types'] = "jpg|png|jpeg|avif|webp";

        $config2['overwrite']     = "true";

        $config2['max_size']      = "2000";

        $config2['max_width']     = "10000";

        $config2['max_height']    = "10000";

        $config2['file_name']     = '' . $filename_2;

        $this->upload->initialize($config2);

        if (!$this->upload->do_upload('unit_preview2')) {

            // ALERT

            $alertStatus  = "failed";

            $alertMessage = $this->upload->display_errors();

            getAlert($alertStatus, $alertMessage);

            redirect('unit/create_page');

        } else {

            $dat2  = $this->upload->data();

            $data['unit_preview2']       = $dat2['file_name'];

        }



        // POST

        $data['unit_id']   = "";

        $data['unit_name'] = $this->input->post('unit_name');

        $data['unit_bedroom'] = $this->input->post('unit_bedroom');

        $data['unit_bathroom'] = $this->input->post('unit_bathroom');

        $data['unit_luas'] = $this->input->post('unit_luas');

        $data['unit_description'] = $this->input->post('unit_description');

        $data['update_at'] = date('Y-m-d H:i:s');

        $data['createtime']  = date('Y-m-d H:i:s');

        $this->m_unit->create($data);



        // LOG

        $message    = $this->session->userdata('user_fullname') . " menambah data unit dengan ID - nama : " . $data['unit_id'] . " - " . $data['unit_name'];

        createLog($message);



        // ALERT

        $alertStatus  = "success";

        $alertMessage = "Berhasil menambah data unit dengan nama : " . $data['unit_name'];

        getAlert($alertStatus, $alertMessage);



        redirect('unit');

    }





    public function update()

    {



        csrfValidate();



        if($_FILES['unit_preview1']['name']!=""){  

            $filename_1              = "unit-preview-1".'-'.date('YmdHis');

            $config['upload_path']   = "./upload/unit/";

            $config['allowed_types'] = "jpg|png|jpeg|avif|webp";

            $config['overwrite']     = "true";

            $config['max_size']      = "2000";

            $config['max_width']     = "10000";

            $config['max_height']    = "10000";

            $config['file_name']     = '' . $filename_1;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('unit_preview1')) {

                // ALERT

                $alertStatus  = "failed";

                $alertMessage = $this->upload->display_errors();

                getAlert($alertStatus, $alertMessage);

                redirect('unit/update_page/'. $this->input->post('unit_id'));

            } else {

                $dat  = $this->upload->data();

                $data['unit_preview1']  = $dat['file_name'];

                unlink('./upload/unit/'. $this->input->post('unit_preview1_old'));

            }

        }

        

        if($_FILES['unit_preview2']['name']!=""){  

            $filename_2              = "unit-preview-2".'-'.date('YmdHis');

            $config2['upload_path']   = "./upload/unit/";

            $config2['allowed_types'] = "jpg|png|jpeg|avif|webp";

            $config2['overwrite']     = "true";

            $config2['max_size']      = "2000";

            $config2['max_width']     = "10000";

            $config2['max_height']    = "10000";

            $config2['file_name']     = '' . $filename_2;

            $this->upload->initialize($config2);

            if (!$this->upload->do_upload('unit_preview2')) {

                // ALERT

                $alertStatus  = "failed";

                $alertMessage = $this->upload->display_errors();

                getAlert($alertStatus, $alertMessage);

                redirect('unit/update_page/'. $this->input->post('unit_id'));

            } else {

                $dat2  = $this->upload->data();

                $data['unit_preview2']   = $dat2['file_name'];

                unlink('./upload/unit/'. $this->input->post('unit_preview2_old'));

            }

        }



        $data['unit_id']   = $this->input->post('unit_id');

        $data['unit_name'] = $this->input->post('unit_name');

        $data['unit_bedroom'] = $this->input->post('unit_bedroom');

        $data['unit_bathroom'] = $this->input->post('unit_bathroom');

        $data['unit_luas'] = $this->input->post('unit_luas');

        $data['unit_description'] = $this->input->post('unit_description');

        $data['update_at'] = date('Y-m-d H:i:s');



        $this->m_unit->update($data);



         // LOG

        $message    = $this->session->userdata('user_fullname') . " mengubah data unit : " . $data['unit_id'] . " - " . $data['unit_name'];

        createLog($message);



        // ALERT

        $alertStatus  = "success";

        $alertMessage = "Berhasil mengubah data unit dengan nama : " . $data['unit_name'];

        getAlert($alertStatus, $alertMessage);



       

        redirect('unit');

    }



    // DELETE DATA UNIT

    public function delete()

    {

        csrfValidate();

        // POST

        $this->m_unit->delete($this->input->post('unit_id'));

     

        // LOG

        $message    = $this->session->userdata('user_fullname') . " menghapus data unit dengan ID : " . $this->input->post('unit_id');

        createLog($message);



        // ALERT

        $alertStatus  = "failed";

        $alertMessage = "Menghapus data unit dengan ID : " . $this->input->post('unit_id');

        getAlert($alertStatus, $alertMessage);



        redirect('unit');

    }



    // CREATE DATA UNIT GALLERY

    public function add_gallery()

    {

        csrfValidate();



        $filename_1              = "gallery-".$this->input->post('unit_id').'-'.date('YmdHis');

        $config['upload_path']   = "./upload/unit_gallery/";

        $config['allowed_types'] = "jpg|png|jpeg|avif|webp";

        $config['overwrite']     = "true";

        $config['max_size']      = "2000";

        $config['max_width']     = "10000";

        $config['max_height']    = "10000";

        $config['file_name']     = '' . $filename_1;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gallery_image')) {

            // ALERT

            $alertStatus  = "failed";

            $alertMessage = $this->upload->display_errors();

            getAlert($alertStatus, $alertMessage);

            redirect('unit/gallery_page/' .  $this->input->post('unit_id'));

        } else {

            $dat  = $this->upload->data();

            $data['gallery_image']       = $dat['file_name'];

        }



        // POST

        $data['gallery_id']   = "";

        $data['gallery_name'] = $this->input->post('gallery_name');

        $data['gallery_description'] = $this->input->post('gallery_description');

        $data['unit_id'] = $this->input->post('unit_id');

        $data['gallery_category_id'] = $this->input->post('gallery_category_id');

        $data['createtime']  = date('Y-m-d H:i:s');

        $this->m_unit_gallery->create($data);



        // LOG

        $message    = $this->session->userdata('user_fullname') . " menambah data unit " . $this->input->post('unit_name'). " gallery dengan ID - nama : " . $data['gallery_id'] . " - " . $data['gallery_name'];

        createLog($message);



        // ALERT

        $alertStatus  = "success";

        $alertMessage = "Berhasil menambah data foto unit " . $this->input->post('unit_name'). " dengan nama : " . $data['gallery_name'];

        getAlert($alertStatus, $alertMessage);



        redirect('unit/gallery_page/' .  $this->input->post('unit_id'));

    }



    public function update_gallery()

    {



        csrfValidate();



        if($_FILES['gallery_image']['name']!=""){  

            $filename_1              = "gallery-".$this->input->post('unit_id').'-'.date('YmdHis');

            $config['upload_path']   = "./upload/unit_gallery/";

            $config['allowed_types'] = "jpg|png|jpeg|avif|webp";

            $config['overwrite']     = "true";

            $config['max_size']      = "2000";

            $config['max_width']     = "10000";

            $config['max_height']    = "10000";

            $config['file_name']     = '' . $filename_1;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gallery_image')) {

                // ALERT

                $alertStatus  = "failed";

                $alertMessage = $this->upload->display_errors();

                getAlert($alertStatus, $alertMessage);

                redirect('unit/gallery_page/'. $this->input->post('unit_id'));

            } else {

                $dat  = $this->upload->data();

                $data['gallery_image']  = $dat['file_name'];

                unlink('./upload/unit_galery/'. $this->input->post('gallery_image_old'));

            }

        }



        // POST

        $data['gallery_id']   = $this->input->post('gallery_id');

        $data['gallery_name'] = $this->input->post('gallery_name');

        $data['gallery_description'] = $this->input->post('gallery_description');

        $data['unit_id'] = $this->input->post('unit_id');

        $data['gallery_category_id'] = $this->input->post('gallery_category_id');

        $this->m_unit_gallery->update($data);



         // LOG

        $message    = $this->session->userdata('user_fullname') . " mengubah data gallery unit : " . $data['gallery_name'];

        createLog($message);



        // ALERT

        $alertStatus  = "success";

        $alertMessage = "Berhasil mengubah data gallery unit dengan nama : " . $data['gallery_name'];

        getAlert($alertStatus, $alertMessage);



        redirect('unit/gallery_page/' .  $this->input->post('unit_id'));

    }



    // DELETE DATA Gallery

    public function delete_gallery()

    {

        csrfValidate();

        // POST

        $this->m_unit_gallery->delete($this->input->post('gallery_id'));

     

        // LOG

        $message    = $this->session->userdata('user_fullname') . " menghapus data gallery dengan ID : " . $this->input->post('gallery_id');

        createLog($message);



        // ALERT

        $alertStatus  = "failed";

        $alertMessage = "Menghapus data gallery dengan ID : " . $this->input->post('gallery_id') . " Judul : " . $this->input->post('gallery_name') ;

        getAlert($alertStatus, $alertMessage);



        redirect('unit/gallery_page/' .  $this->input->post('unit_id'));

    }

}

