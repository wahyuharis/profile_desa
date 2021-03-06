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

		// print_r2($kecamatan_desa);


		$kecamatan_desa2 = array();

		foreach ($kecamatan_desa as $row) {
			$buff = array();
			$buff['id_kecamatan'] = $row['id_kecamatan'];
			$buff['nama_kecamatan'] = $row['nama_kecamatan'];
			$buff['JSON'] = json_decode($row['JSON'], true);
			array_push($kecamatan_desa2, $buff);
		}

		// print_r2($kecamatan_desa2);

		$slider = array();
		$slider = $this->db->get('slider')->result_array();

		# ===================== #
		$this->load->model('LaguDesa_model');
		$lagu_desa_model = new LaguDesa_model();
		$lagu_desa = $lagu_desa_model->get_list('', 8, 0);


		$this->load->model('WisataDesa_model');
		$wisata_desa_model = new WisataDesa_model();
		$wisata_desa = $wisata_desa_model->get_list('', 8, 0);

		$this->load->model('UmkmDesa_model');
		$umkm_desa_model = new UmkmDesa_model();
		$umkm_desa = $umkm_desa_model->get_list('', 8, 0);

		$this->load->model('BatikDesa_model');
		$batik_desa_model = new BatikDesa_model();
		$batik_desa = $batik_desa_model->get_list('', 8, 0);
		# ===================== #



		$content_data = array();
		$content_data['kecamatan_desa'] = $kecamatan_desa2;
		$content_data['slider'] = $slider;
		
		$content_data['lagu_desa'] = $lagu_desa;
		$content_data['wisata_desa'] = $wisata_desa;
		$content_data['umkm_desa'] = $umkm_desa;
		$content_data['batik_desa'] = $batik_desa;

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

		$page = $this->input->get('page');
		$limit = 8;
		$start = page_to_start($page, $limit);

		$kecamatandesa_model = new KecamatanDesa_model();
		$search_txt = $this->input->get('search');
		$type = $this->input->get('jenis');
		$search_res = $kecamatandesa_model->search($search_txt, $type, $limit, $start);

		// print_r2($search_res);

		$this->load->library('pagination');
		$config['base_url'] = base_url('home/search/');
		$config['total_rows'] = $kecamatandesa_model->get_total_row();
		$config['per_page'] = $limit;

		$this->pagination->initialize($config);


		$content_data['search_res'] = $search_res;
		$content_data['pagination'] = $this->pagination->create_links();

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
