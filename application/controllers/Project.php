<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Project extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();



        // LOAD MODEL

        $this->load->model('m_project');

        $this->load->model('m_project_gallery');

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

        $data['title']       = 'Projects Data';

        $data['project']        = $this->m_project->read('', '', '');



        // TEMPLATE

        $view         = "project/index";

        $viewCategory = "all";

        TemplateApp($data, $view, $viewCategory);

    }



    public function create_page()

    {

        //DATA

        $data['setting']       = getSetting();

        $data['title']         = 'Add Project';



        // TEMPLATE

        $view         = "project/add";

        $viewCategory = "all";

        TemplateApp($data, $view, $viewCategory);

    }



    

    public function add_photos()

    {

        //DATA

        $data['setting']       = getSetting();

        $data['title']         = 'Add Photos';



        $data['project']        = $this->m_project->get($this->uri->segment(3));



        // TEMPLATE

        $view         = "project/add_photos";

        $viewCategory = "all";

        TemplateApp($data, $view, $viewCategory);

    }



    public function gallery_page()

    {

        //DATA

        $data['setting']       = getSetting();

        $data['title']         = 'Gallery Project';

        $data['project']        = $this->m_project->get($this->uri->segment(3));

        $data['gallery']        = $this->m_project_gallery->read('','',$this->uri->segment(3));



        // TEMPLATE

        $view         = "project/gallery";

        $viewCategory = "all";

        TemplateApp($data, $view, $viewCategory);

    }



    public function update_page()

    {

        //DATA

        $data['setting']     = getSetting();

        $data['title']       = 'Upodate Data';

        $data['project']        = $this->m_project->get($this->uri->segment(3));



        // TEMPLATE

        $view         = "project/update";

        $viewCategory = "all";

        TemplateApp($data, $view, $viewCategory);

    }



    // CREATE DATA project

    public function create()

    {



        csrfValidate();



        $filename_1              = "project-". date('YmdHis');

        $config['upload_path']   = "./upload/project/";

        $config['allowed_types'] = "jpg|png|jpeg|avif|webp";

        $config['overwrite']     = "true";

        $config['max_size']      = "2000";

        $config['max_width']     = "10000";

        $config['max_height']    = "10000";

        $config['file_name']     = '' . $filename_1;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('project_cover')) {

            // ALERT

            $alertStatus  = "failed";

            $alertMessage = $this->upload->display_errors();

            getAlert($alertStatus, $alertMessage);

            redirect('project/create_page');

        } else {

            $dat  = $this->upload->data();

            $data['project_cover']       = $dat['file_name'];

        }



        // POST

        $data['project_id']   = "";

        $data['project_name'] = $this->input->post('project_name');

        $data['project_bedroom'] = $this->input->post('project_bedroom');

        $data['project_bathroom'] = $this->input->post('project_bathroom');

        $data['project_luas'] = $this->input->post('project_luas');

        $data['project_price'] = $this->input->post('project_price');

        $data['project_description'] = $this->input->post('project_description');

        $data['update_at'] = date('Y-m-d H:i:s');

        $data['createtime']  = date('Y-m-d H:i:s');

        $this->m_project->create($data);



        // LOG

        $message    = $this->session->userdata('user_fullname') . " menambah data project dengan nama : " . $data['project_name'];

        createLog($message);



        // ALERT

        $alertStatus  = "success";

        $alertMessage = "Berhasil menambah data project dengan nama : " . $data['project_name'];

        getAlert($alertStatus, $alertMessage);



        redirect('project');

    }





    public function update()

    {



        csrfValidate();



        if($_FILES['project_cover']['name']!=""){  

            $filename_1              = "project-".date('YmdHis');

            $config['upload_path']   = "./upload/project/";

            $config['allowed_types'] = "jpg|png|jpeg|avif|webp";

            $config['overwrite']     = "true";

            $config['max_size']      = "2000";

            $config['max_width']     = "10000";

            $config['max_height']    = "10000";

            $config['file_name']     = '' . $filename_1;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('project_cover')) {

                // ALERT

                $alertStatus  = "failed";

                $alertMessage = $this->upload->display_errors();

                getAlert($alertStatus, $alertMessage);

                redirect('project/update_page/'. $this->input->post('project_id'));

            } else {

                $dat  = $this->upload->data();

                $data['project_cover']  = $dat['file_name'];

                unlink('./upload/project/'. $this->input->post('project_cover_old'));

            }

        }



        $data['project_id']   = $this->input->post('project_id');

        $data['project_name'] = $this->input->post('project_name');

        $data['project_price'] = $this->input->post('project_price');

        $data['project_bedroom'] = $this->input->post('project_bedroom');

        $data['project_bathroom'] = $this->input->post('project_bathroom');

        $data['project_luas'] = $this->input->post('project_luas');

        $data['project_description'] = $this->input->post('project_description');

        $data['update_at'] = date('Y-m-d H:i:s');



        $this->m_project->update($data);



         // LOG

        $message    = $this->session->userdata('user_fullname') . " mengubah data project : " . $data['project_id'] . " - " . $data['project_name'];

        createLog($message);



        // ALERT

        $alertStatus  = "success";

        $alertMessage = "Berhasil mengubah data project dengan nama : " . $data['project_name'];

        getAlert($alertStatus, $alertMessage);



       

        redirect('project');

    }



    // DELETE DATA project

    public function delete()

    {

        csrfValidate();

        // POST

        $this->m_project->delete($this->input->post('project_id'));

     

        // LOG

        $message    = $this->session->userdata('user_fullname') . " menghapus data project dengan ID : " . $this->input->post('project_id');

        createLog($message);



        // ALERT

        $alertStatus  = "failed";

        $alertMessage = "Menghapus data project dengan ID : " . $this->input->post('project_id');

        getAlert($alertStatus, $alertMessage);



        redirect('project');

    }



    // DELETE DATA Gallery

    public function delete_gallery()

    {

        csrfValidate();

        // POST

        $this->m_project_gallery->delete($this->input->post('project_gallery_id'));

     

        // LOG

        $message    = $this->session->userdata('user_fullname') . " menghapus data gallery dengan ID : " . $this->input->post('project_gallery_id');

        createLog($message);



        // ALERT

        $alertStatus  = "failed";

        $alertMessage = "Menghapus data gallery dengan ID : " . $this->input->post('project_gallery_id') . " - " . $this->input->post('project_gallery_image') ;

        getAlert($alertStatus, $alertMessage);



        redirect('project/gallery_page/' .  $this->input->post('project_id'));

    }



    // AJAX

   

	public function ajaxupload(){

        $config['upload_path']   = './upload/project_gallery';

        $config['allowed_types'] = 'jpeg|jpg|png|avif|webp';

        $config['file_name']     = 'photo'.$this->uri->segment(3).'-'.date('YmdHis')."-".rand(1000,9999);

        $this->upload->initialize($config);

        if($this->upload->do_upload('userfile')){

        	

        	$data['project_gallery_image']  = $this->upload->data('file_name');

        	$data['project_gallery_token'] = $this->input->post('token');

        	$data['project_id']          = $this->uri->segment(3);

        	$data['createtime']          = date('Y-m-d H:i:s');

        	$this->m_project_gallery->create_gallery($data);

        }

	}



    public function ajaxremove(){

		$token = $this->input->post('token');

		$image = $this->db->get_where('tbl_project_gallery', array('project_gallery_token'=>$token));



		if($image->num_rows()>0){

			$getImage    = $image->row();

			$geImageName = $getImage->project_gallery_image;

			if(file_exists($file='./upload/project_gallery/'.$geImageName)){

				unlink($file);

			}

			$this->m_project_gallery->delete_gallery($token);

		}

		echo "{}";

	}

}

