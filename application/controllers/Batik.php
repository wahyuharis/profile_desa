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

		$this->load->model('BatikDesa_model');
		$batik_desa_model = new BatikDesa_model();

		$batik_desa_list = $batik_desa_model->get_list('', 8, 0);

		// print_r2($batik_desa_list);

		$content_data = array();
		$content_data['batik_desa_list'] = $batik_desa_list;
		$html = $frontend->load_view('frontend/batik_list', $content_data);

		$breadcrump = array(
			'Home' => '',
			'Batik Desa' => 'batik',
		);
		$frontend->set_breadcrump($breadcrump);

		$frontend->set_content($html);
		$frontend->render();
	}

	public function lihat($id_batik)
    {
        $frontend = new Frontend();
        $html = '';

        $this->load->model('BatikDesa_model');
        $batik_desa_model = new BatikDesa_model();



        $batik_desa_detail = $batik_desa_model->detail($id_batik);

        // print_r2($wisata_desa_detail);

        $nama_batik = $batik_desa_detail['nama_batik'] . " - " . $batik_desa_detail['nama_desa'] . " - " . $batik_desa_detail['nama_kecamatan'];


        $content_data = array();
        $content_data['batik_desa_detail'] = $batik_desa_detail;
        $html = $frontend->load_view('frontend/batik_detail', $content_data);

        $breadcrump = array(
            'Home' => '',
            "Desain Batik" => 'batik',
            "Desa " . $batik_desa_detail['nama_desa'] => 'batik/by_desa/' . $batik_desa_detail['id_desa'],
            $nama_batik => "",
        );

        $frontend->set_breadcrump($breadcrump);
        $frontend->set_content($html);
        $frontend->render();
    }

}