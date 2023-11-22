<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    function __construct() {
		parent::__construct();
		$this->load->model('m_news');
		$this->load->model('m_news_category');
		$this->load->model('m_gallery');
		$this->load->model('m_field');
		$this->load->model('m_siteplan');
         $this->load->model('m_cluster');
		$this->load->model('m_optical');
		$this->load->model('m_unit');
		$this->load->model('m_unit_gallery');
		$this->load->model('m_unit_gallery_category');
		$this->load->model('m_project');
		$this->load->model('m_project_gallery');
		$this->load->model('m_content');
	}

	// INFORMATION
    public function information(){
		$this->session->unset_userdata('sess_search_information');

        // PAGINATION
        $baseUrl    = base_url() . "page/information/".$this->uri->segment(3)."/".$this->uri->segment(4)."/";
        $totalRows  = count((array) $this->m_news->read('','','',$this->uri->segment(3),$this->uri->segment(4)));
        $perPage    = 12;
        $uriSegment = 5;
        $paging     = generatePaginationBlog($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
		// DATA
		$data['setting']             = getSetting();
		$data['news']                = $this->m_news->read($perPage, $page,'', $this->uri->segment(3),$this->uri->segment(4));
		$data['field']               = $this->m_field->read('','','');
		$data['recent']              = $this->m_news->read(4,0,'',1,'');
		$data['news_category']       = $this->m_news_category->read('','','');
		$data['news_category_name']  = $this->m_news_category->get($this->uri->segment(3));
		$data['unit']       = $this->m_unit->read('','','');
		$data['content']       = $this->m_content->read('','','');

		// TEMPLATE
		$view         = "landing_page/page/news";
		$viewCategory = "all";
		TemplateLandingPage($data, $view, $viewCategory);
	}

	public function information_search(){

		if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_information', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_information');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "page/information_search/".$this->uri->segment(3)."/".$this->uri->segment(4)."/".$data['search']."/";
        $totalRows  = count((array)$this->m_news->read('','',$data['search'],$this->uri->segment(3), $this->uri->segment(4)));
        $perPage    = 10;
        $uriSegment = 6;
        $paging     = generatePaginationBlog($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']             = getSetting();
        $data['news']                = $this->m_news->read($perPage, $page, $data['search'],$this->uri->segment(3), $this->uri->segment(4));
        $data['recent']              = $this->m_news->read(4,0,'',1,'');
        $data['news_category']       = $this->m_news_category->read('','','');
        $data['news_category_name']  = $this->m_news_category->get($this->uri->segment(3));
    	$data['unit']       = $this->m_unit->read('','','');
    	$data['content']       = $this->m_content->read('','','');
        

		// TEMPLATE
		$view         = "landing_page/page/news";
		$viewCategory = "all";
		TemplateLandingPage($data, $view, $viewCategory);
	}

	

    public function information_detail(){
		// DATA
		$data['setting']             = getSetting();
		$data['news']                = $this->m_news->getBySlug($this->uri->segment(5));
		$data['recent']              = $this->m_news->read(4,0,'',1,'');
		$data['news_category']       = $this->m_news_category->read('','','');
         $data['news_category_name']  = $this->m_news_category->get($this->uri->segment(3));
		$data['unit']       = $this->m_unit->read('','','');
		$data['content']       = $this->m_content->read('','','');

		// COUNT VIEW
		$news['news_id']         = $data['news'][0]->news_id;
		$news['news_count_view'] = ($data['news'][0]->news_count_view + 1);
		$this->m_news->update($news);
		
		
		// TEMPLATE
		$view         = "landing_page/page/news_detail";
		$viewCategory = "all";
		TemplateLandingPage($data, $view, $viewCategory);
	}


	// KONTAK/PESAN
    public function contact(){
		// DATA
		$data['setting']             = getSetting();
		$data['link']                = $this->m_link->read('','','');
		$data['news_category']       = $this->m_news_category->read('','','');
		$data['content']       = $this->m_content->read('','','');

		// TEMPLATE
		$view         = "landing_page/page/contact";
		$viewCategory = "all";
		TemplateLandingPage($data, $view, $viewCategory);
	}

	// UNIT TYPE
    public function unit_type(){
		// DATA
		$data['setting']             = getSetting();
		$data['unit']       = $this->m_unit->read('','','');
		$data['unit_detail']       = $this->m_unit->get($this->uri->segment(3));
		$data['unit_gallery']       = $this->m_unit_gallery->read_id($this->uri->segment(3));
		$data['category']       = $this->m_unit_gallery_category->read('','','');
		$data['news_category']       = $this->m_news_category->read('','','');
		$data['content']       = $this->m_content->read('','','');

		// TEMPLATE
		$view         = "landing_page/page/unittype";
		$viewCategory = "all";
		if($this->uri->segment(2) == 'unit_type'){
			TemplateLandingPageBlack($data, $view, $viewCategory);
		} else {
			TemplateLandingPage($data, $view, $viewCategory);}
	}

	// SITE PLAN
    public function siteplan(){
		// DATA
		$data['setting']       = getSetting();
		$data['optical']       = $this->m_optical->read('','','');
		$data['siteplan']      = $this->m_siteplan->read('','','');
		$data['cluster']       = $this->m_cluster->read('','','');
		$data['news_category']       = $this->m_news_category->read('','','');
		$data['unit']       = $this->m_unit->read('','','');
		$data['content']       = $this->m_content->read('','','');

		// TEMPLATE
		$view         = "landing_page/page/siteplan";
		$viewCategory = "all";
		TemplateLandingPage($data, $view, $viewCategory);
	}

	// PROJECT
    public function project(){
		// DATA
		$data['setting']             = getSetting();
		$data['project']       = $this->m_project->read('','','');
		$data['unit']       = $this->m_unit->read('','','');
		$data['news_category']       = $this->m_news_category->read('','','');
		$data['content']       = $this->m_content->read('','','');

		// TEMPLATE
		$view         = "landing_page/page/project";
		$viewCategory = "all";
		if($this->uri->segment(2) == 'project'){
			TemplateLandingPageBlack($data, $view, $viewCategory);
		} else {
			TemplateLandingPage($data, $view, $viewCategory);}
	}

	// PROJECT
	public function project_detail(){
		// DATA
		$data['setting']           = getSetting();
		$data['project']       		= $this->m_project->get($this->uri->segment(3));
		$data['project_gallery']       		= $this->m_project_gallery->read_id($this->uri->segment(3));
		$data['unit']       			= $this->m_unit->read('','','');
		$data['news_category']     = $this->m_news_category->read('','','');
		$data['content']       = $this->m_content->read('','','');

		// TEMPLATE
		$view         = "landing_page/page/project_detail";
		$viewCategory = "all";
		if($this->uri->segment(2) == 'project_detail'){
			TemplateLandingPageBlack($data, $view, $viewCategory);
		} else {
			TemplateLandingPage($data, $view, $viewCategory);}
	}

	// DEVELOPER
    public function developer(){
		// DATA
		$data['setting']             = getSetting();
		$data['developer']       = $this->m_content->get(7);
		$data['news_category']       = $this->m_news_category->read('','','');
		$data['unit']       = $this->m_unit->read('','','');
		$data['content']       = $this->m_content->read('','','');

		// TEMPLATE
		$view         = "landing_page/page/developer";
		$viewCategory = "all";
		if($this->uri->segment(1) == 'developer'){
			TemplateLandingPageBlack($data, $view, $viewCategory);
		} else {
			TemplateLandingPage($data, $view, $viewCategory);}
	}
	
	// DEVELOPER
    public function privacy_policy(){
		// DATA
		$data['setting']             = getSetting();
		$data['developer']       = $this->m_content->get(7);
		$data['news_category']       = $this->m_news_category->read('','','');
		$data['unit']       = $this->m_unit->read('','','');
		$data['content']       = $this->m_content->read('','','');

		// TEMPLATE
		$view         = "landing_page/page/privacy";
		$viewCategory = "all";
		if($this->uri->segment(1) == 'developer'){
			TemplateLandingPageBlack($data, $view, $viewCategory);
		} else {
			TemplateLandingPage($data, $view, $viewCategory);}
	}
	
    public function term_condition(){
		// DATA
		$data['setting']             = getSetting();
		$data['developer']       = $this->m_content->get(7);
		$data['news_category']       = $this->m_news_category->read('','','');
		$data['unit']       = $this->m_unit->read('','','');
		$data['content']       = $this->m_content->read('','','');

		// TEMPLATE
		$view         = "landing_page/page/terms";
		$viewCategory = "all";
		if($this->uri->segment(1) == 'developer'){
			TemplateLandingPageBlack($data, $view, $viewCategory);
		} else {
			TemplateLandingPage($data, $view, $viewCategory);}
	}

}
