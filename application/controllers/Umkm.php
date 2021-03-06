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

		$this->load->model('UmkmDesa_model');
		$umkm_desa_model = new UmkmDesa_model();

		$umkm_desa_list = $umkm_desa_model->get_list('', 8, 0);

		// print_r2($umkm_desa_list);

		$content_data = array();
		$content_data['umkm_desa_list'] = $umkm_desa_list;
		$html = $frontend->load_view('frontend/umkm_list', $content_data);

		$breadcrump = array(
			'Home' => '',
			'Lagu Desa' => 'lagu',
		);
		$frontend->set_breadcrump($breadcrump);

		$frontend->set_content($html);
		$frontend->render();
	}

	public function lihat($id_wisata)
	{
		$frontend = new Frontend();
		$html = '';

		$this->load->model('UmkmDesa_model');
		$umkm_desa_model = new UmkmDesa_model();

		$umkm_desa_detail = $umkm_desa_model->detail($id_wisata);

		// print_r2($umkm_desa_detail);

		$nama_umkm = $umkm_desa_detail['nama_umkm'] . " - " . $umkm_desa_detail['nama_desa'] . " - " . $umkm_desa_detail['nama_kecamatan'];


		$content_data = array();
		$content_data['umkm_desa_detail'] = $umkm_desa_detail;
		$html = $frontend->load_view('frontend/umkm_detail', $content_data);

		$breadcrump = array(
			'Home' => '',
			"Umkm Unggulan" => 'umkm',
			"Desa " . $umkm_desa_detail['nama_desa'] => 'umkm/by_desa/' . $umkm_desa_detail['id_desa'],
			$nama_umkm => "",
		);

		$frontend->set_breadcrump($breadcrump);
		$frontend->set_content($html);
		$frontend->render();
	}

	function by_desa($id_desa = null)
	{

		if (empty(trim($id_desa))) {
			show_404();
		}

		$frontend = new Frontend();
		$html = '';

		$this->load->model('UmkmDesa_model');

        $desa = $this->db->where('id_desa', $id_desa)->get('desa')->row_array();


		$umkm_desa_model = new UmkmDesa_model();
		$umkm_desa_list = $umkm_desa_model->by_desa($id_desa);

		// print_r2($umkm_desa_data);

		$content_data = array();
		$content_data['umkm_desa_list'] = $umkm_desa_list;
		$content_data['desa'] = $desa;
		$html = $frontend->load_view('frontend/umkm_daftar', $content_data);

		$breadcrump = array(
			'Home' => '',
			'UMKM Unggulan' => "umkm",
			"Desa " . $desa['nama_desa'] => 'desa/detail/' . $desa['id_desa'],
		);


		$frontend->set_breadcrump($breadcrump);
		$frontend->set_content($html);
		$frontend->render();
	}
}
