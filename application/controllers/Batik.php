<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Batik extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Frontend');
	}
	public function index() 
	{
		$frontend = new Frontend();
		$html = '';

		$content_data = array();
		// $html = $frontend->load_view('frontend/desa', $content_data);
		$frontend->set_content($html);
		$frontend->render();
	}

}