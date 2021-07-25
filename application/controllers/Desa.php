<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Desa extends CI_Controller
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

	public function detail($id_desa = '')
	{
		if (empty(trim($id_desa))) {
			show_404();
		}

		$frontend = new Frontend();
		$html = '';

		$this->db->where('id_desa', $id_desa);
		$db = $this->db->get('desa');

		$desa = $db->row_array();

		// print_r2($desa);

		$content_data = array();
		$content_data['desa'] = $desa;
		$html = $frontend->load_view('frontend/desa', $content_data);


		$breadcrump = array(
			'Home' => '',
			"Desa ". ucwords( $desa['nama_desa']) => '',

		);
		$frontend->set_breadcrump($breadcrump);

		$frontend->set_content($html);
		$frontend->render();
	}
}
