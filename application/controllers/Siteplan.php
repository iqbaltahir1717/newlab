<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siteplan extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('m_siteplan');

        $this->load->model('m_cluster');

        $this->load->model('m_optical');

        $this->load->library('upload');



        if (!($this->session->userdata('user_id'))) {

			// ALERT

			$alertStatus  = 'failed';

			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';

			getAlert($alertStatus, $alertMessage);

			redirect('auth');

		}

    }

    

    public function index() {

        //DATA

        $data['setting']   = getSetting();

        $data['siteplan']   = $this->m_siteplan->get(1);

		

        // TEMPLATE

        $view         = "content/siteplan";

		$viewCategory = "all";

		TemplateApp($data, $view, $viewCategory);

    }



    public function cluster() {

        //DATA

        $data['setting']   = getSetting();

        $data['title']       = 'Cluster Amenities';

        $data['cluster']   = $this->m_cluster->read('','','');

		

        // TEMPLATE

        $view         = "content/cluster";

		$viewCategory = "all";

		TemplateApp($data, $view, $viewCategory);

    }



    public function optical() {

        //DATA

        $data['setting']   = getSetting();

        $data['title']       = 'Optimal Strategic Layout';

        $data['optical']   = $this->m_optical->read('','','');

		

        // TEMPLATE

        $view         = "content/optical";

		$viewCategory = "all";

		TemplateApp($data, $view, $viewCategory);

    }





    public function update() {

        csrfValidate();

        if($_FILES['siteplan_image1']['name']!=""){  

            $filename_1              = "siteplan_image1".'-'.date('YmdHis');

            $config['upload_path']   = "./upload/siteplan/";

            $config['allowed_types'] = "jpg|png|jpeg|avif|webp";

            $config['overwrite']     = "true";

            $config['max_size']      = "3000";

            $config['max_width']     = "10000";

            $config['max_height']    = "10000";

            $config['file_name']     = '' . $filename_1;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('siteplan_image1')) {

                // ALERT

                $alertStatus  = "failed";

                $alertMessage = $this->upload->display_errors();

                getAlert($alertStatus, $alertMessage);

                redirect('siteplan');

            } else {

                $dat  = $this->upload->data();

                $data['siteplan_image1']  = $dat['file_name'];

                unlink('./upload/siteplan/'. $this->input->post('siteplan_image1_old'));

            }

        }

        

        if($_FILES['siteplan_image2']['name']!=""){  

            $filename_2              = "siteplan_image1".'-'.date('YmdHis');

            $config2['upload_path']   = "./upload/siteplan/";

            $config2['allowed_types'] = "jpg|png|jpeg|avif|webp";

            $config2['overwrite']     = "true";

            $config2['max_size']      = "3000";

            $config2['max_width']     = "10000";

            $config2['max_height']    = "10000";

            $config2['file_name']     = '' . $filename_2;

            $this->upload->initialize($config2);

            if (!$this->upload->do_upload('siteplan_image2')) {

                // ALERT

                $alertStatus  = "failed";

                $alertMessage = $this->upload->display_errors();

                getAlert($alertStatus, $alertMessage);

                redirect('siteplan');

            } else {

                $dat2  = $this->upload->data();

                $data['siteplan_image2']   = $dat2['file_name'];

                unlink('./upload/unit/'. $this->input->post('siteplan_image2_old'));

            }

        }



        $data['siteplan_id']   = $this->input->post('siteplan_id');

        $data['siteplan_image1_description'] = $this->input->post('siteplan_image1_description');

        $data['siteplan_image2_description'] = $this->input->post('siteplan_image2_description');

        $data['siteplan_cluster'] = $this->input->post('siteplan_cluster');

        $data['siteplan_optical'] = $this->input->post('siteplan_optical');



        $this->m_siteplan->update($data);



         // LOG

        $message    = $this->session->userdata('user_fullname') . " mengubah data siteplan";

        createLog($message);



        // ALERT

        $alertStatus  = "success";

        $alertMessage = "Berhasil mengubah data siteplan";

        getAlert($alertStatus, $alertMessage);



       

        redirect('siteplan');

    }



    // CREATE DATA CLUSTER

    public function add_cluster()

    {

        csrfValidate();



        $filename_1              = "cluster-" . date('YmdHis');

        $config['upload_path']   = "./upload/cluster/";

        $config['allowed_types'] = "jpg|png|jpeg|avif|webp";

        $config['overwrite']     = "true";

        $config['max_size']      = "2000";

        $config['max_width']     = "10000";

        $config['max_height']    = "10000";

        $config['file_name']     = '' . $filename_1;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('cluster_cover')) {

            // ALERT

            $alertStatus  = "failed";

            $alertMessage = $this->upload->display_errors();

            getAlert($alertStatus, $alertMessage);

            redirect('cluster');

        } else {

            $dat  = $this->upload->data();

            $data['cluster_cover']       = $dat['file_name'];

        }



        // POST

        $data['cluster_id']   = "";

        $data['cluster_name'] = $this->input->post('cluster_name');

        $data['createtime']  = date('Y-m-d H:i:s');

        $this->m_cluster->create($data);



        // LOG

        $message    = $this->session->userdata('user_fullname') . " menambah data cluster " . $this->input->post('cluster_name'). " dengan ID - nama : " . $data['cluster_id'] . " - " . $data['cluster_name'];

        createLog($message);



        // ALERT

        $alertStatus  = "success";

        $alertMessage = "Berhasil menambah data cluster " . $this->input->post('cluster_name'). " dengan nama : " . $data['cluster_name'];

        getAlert($alertStatus, $alertMessage);



        redirect('cluster');

    }



    public function update_cluster()

    {



        csrfValidate();



        if($_FILES['cluster_cover']['name']!=""){  

            $filename_1              = "cluster-".$this->input->post('cluster_id').'-'.date('YmdHis');

            $config['upload_path']   = "./upload/cluster/";

            $config['allowed_types'] = "jpg|png|jpeg|avif|webp";

            $config['overwrite']     = "true";

            $config['max_size']      = "2000";

            $config['max_width']     = "10000";

            $config['max_height']    = "10000";

            $config['file_name']     = '' . $filename_1;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('cluster_cover')) {

                // ALERT

                $alertStatus  = "failed";

                $alertMessage = $this->upload->display_errors();

                getAlert($alertStatus, $alertMessage);

                redirect('cluster');

            } else {

                $dat  = $this->upload->data();

                $data['cluster_cover']  = $dat['file_name'];

                unlink('./upload/cluster/'.$this->input->post('cluster_cover_old'));

            }

        }



        // POST

        $data['cluster_id']   = $this->input->post('cluster_id');

        $data['cluster_name'] = $this->input->post('cluster_name');

        $this->m_cluster->update($data);



         // LOG

        $message    = $this->session->userdata('user_fullname') . " mengubah data cluster : " . $data['cluster_name'];

        createLog($message);



        // ALERT

        $alertStatus  = "success";

        $alertMessage = "Berhasil mengubah data cluster dengan nama : " . $data['cluster_name'];

        getAlert($alertStatus, $alertMessage);



        redirect('cluster');

    }



    // DELETE DATA Gallery

    public function delete_cluster()

    {

        csrfValidate();

        // POST

        $this->m_cluster->delete($this->input->post('cluster_id'));

     

        // LOG

        $message    = $this->session->userdata('user_fullname') . " menghapus data cluster dengan ID : " . $this->input->post('cluster_id');

        createLog($message);



        // ALERT

        $alertStatus  = "failed";

        $alertMessage = "Menghapus data cluster dengan ID : " . $this->input->post('cluster_id') . " - " . $this->input->post('cluster_name') ;

        getAlert($alertStatus, $alertMessage);



        redirect('cluster');

    }



    // CREATE DATA OPRICAL

    public function add_optical()

    {

        csrfValidate();



        $filename_1              = "optical-".date('YmdHis');

        $config['upload_path']   = "./upload/optical/";

        $config['allowed_types'] = "jpg|png|jpeg|avif|webp";

        $config['overwrite']     = "true";

        $config['max_size']      = "2000";

        $config['max_width']     = "10000";

        $config['max_height']    = "10000";

        $config['file_name']     = '' . $filename_1;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('optical_cover')) {

            // ALERT

            $alertStatus  = "failed";

            $alertMessage = $this->upload->display_errors();

            getAlert($alertStatus, $alertMessage);

            redirect('optical');

        } else {

            $dat  = $this->upload->data();

            $data['optical_cover']       = $dat['file_name'];

        }



        // POST

        $data['optical_id']   = "";

        $data['optical_name'] = $this->input->post('optical_name');

        $data['optical_distance'] = $this->input->post('optical_distance');

        $data['optical_distance_walk'] = $this->input->post('optical_distance_walk');

        $data['optical_distance_vehicle'] = $this->input->post('optical_distance_vehicle');

        $data['createtime']  = date('Y-m-d H:i:s');

        $this->m_optical->create($data);



        // LOG

        $message    = $this->session->userdata('user_fullname') . " menambah data optical " . $this->input->post('optical_name'). " dengan ID - nama : " . $data['optical_id'] . " - " . $data['optical_name'];

        createLog($message);



        // ALERT

        $alertStatus  = "success";

        $alertMessage = "Berhasil menambah data cluster dengan nama : " . $data['optical_name'];

        getAlert($alertStatus, $alertMessage);



        redirect('optical');

    }



    public function update_optical()

    {



        csrfValidate();



        if($_FILES['optical_cover']['name']!=""){  

            $filename_1              = "optical-".$this->input->post('optical_id').'-'.date('YmdHis');

            $config['upload_path']   = "./upload/optical/";

            $config['allowed_types'] = "jpg|png|jpeg|avif|webp";

            $config['overwrite']     = "true";

            $config['max_size']      = "2000";

            $config['max_width']     = "10000";

            $config['max_height']    = "10000";

            $config['file_name']     = '' . $filename_1;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('optical_cover')) {

                // ALERT

                $alertStatus  = "failed";

                $alertMessage = $this->upload->display_errors();

                getAlert($alertStatus, $alertMessage);

                redirect('optical');

            } else {

                $dat  = $this->upload->data();

                $data['optical_cover']  = $dat['file_name'];

                unlink('./upload/optical/'.$this->input->post('optical_cover_old'));

            }

        }



        // POST

        $data['optical_id']   = $this->input->post('optical_id');

        $data['optical_name'] = $this->input->post('optical_name');

        $data['optical_distance'] = $this->input->post('optical_distance');

        $data['optical_distance_walk'] = $this->input->post('optical_distance_walk');

        $data['optical_distance_vehicle'] = $this->input->post('optical_distance_vehicle');

        $this->m_optical->update($data);



         // LOG

        $message    = $this->session->userdata('user_fullname') . " mengubah data tempat : " . $data['optical_name'];

        createLog($message);



        // ALERT

        $alertStatus  = "success";

        $alertMessage = "Berhasil mengubah data tempat dengan nama : " . $data['optical_name'];

        getAlert($alertStatus, $alertMessage);



        redirect('optical');

    }



    // DELETE DATA Tempat

    public function delete_optical()

    {

        csrfValidate();

        // POST

        $this->m_optical->delete($this->input->post('optical_id'));

     

        // LOG

        $message    = $this->session->userdata('user_fullname') . " menghapus data tempat dengan ID : " . $this->input->post('optical_id');

        createLog($message);



        // ALERT

        $alertStatus  = "failed";

        $alertMessage = "Menghapus data tempat dengan ID : " . $this->input->post('optical_id') . " - " . $this->input->post('optical_name') ;

        getAlert($alertStatus, $alertMessage);



        redirect('optical');

    }

    

}

?>