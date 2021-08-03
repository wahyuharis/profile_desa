<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Umkm extends CI_Controller
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

        $breadcrump = array(
            'Home' => '',
            'Lagu Desa' => 'lagu',
        );
        $frontend->set_breadcrump($breadcrump);

		$frontend->set_content($html);
		$frontend->render();
	}
}