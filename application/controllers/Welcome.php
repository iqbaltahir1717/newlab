<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index(){
		$this->load->view('welcome_message');
	}

	public function process()
	{
		// Handle image processing here
		// Get the coordinates from the POST data
		// Use these coordinates to crop the image

		$response = "Image processed successfully."; // Replace this with your logic

		echo $response;
	}
}

