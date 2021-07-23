<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
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

		$this->load->model('KecamatanDesa_model');
		$kecamatandesa_model = new KecamatanDesa_model();
		$kecamatan_desa = $kecamatandesa_model->get_list();

		$kecamatan_desa2 = array();

		foreach ($kecamatan_desa as $row) {
			$buff = array();
			$buff['id_kecamatan'] = $row['id_kecamatan'];
			$buff['nama_kecamatan'] = $row['nama_kecamatan'];
			$buff['JSON'] = json_decode($row['JSON'], true);
			array_push($kecamatan_desa2, $buff);
		}

		// print_r2($kecamatan_desa2);

		$content_data = array();
		$content_data['kecamatan_desa'] = $kecamatan_desa2;
		$html = $frontend->load_view('frontend/home', $content_data);
		$frontend->set_content($html);
		$frontend->render();
	}

	public function search()
	{
		$frontend = new Frontend();
		$html = '';

		$content_data = array();
		$this->load->model('KecamatanDesa_model');

		$kecamatandesa_model = new KecamatanDesa_model();
		$search_res = $kecamatandesa_model->search();

		// print_r2($search_res);

		$content_data['search_res'] = $search_res;

		$html = $frontend->load_view('frontend/search', $content_data);

		$breadcrump = array(
			'Home' => '',
			'search' => '',

		);
		$frontend->set_breadcrump($breadcrump);
		$frontend->set_content($html);
		$frontend->render();
	}
}
