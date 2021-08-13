<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('Frontend');
    }

    public function index()
    {
        $frontend = new Frontend();
        $html = '';

        $this->load->model('WisataDesa_model');
        $wisata_desa_model = new WisataDesa_model();

        $page = $this->input->get('page');
        $limit = 8;
        $start = page_to_start($page, $limit);

        $wisata_desa_data = $wisata_desa_model->get_list('', $limit, $start);

        $this->load->library('pagination');
        $config['base_url'] = base_url('wisata/index');
        $config['total_rows'] = $wisata_desa_model->get_total_row();
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);


        $content_data = array();
        $content_data['pagination'] = $this->pagination->create_links();
        $content_data['wisata_desa_data'] = $wisata_desa_data;
        $html = $frontend->load_view('frontend/wisata', $content_data);

        $breadcrump = array(
            'Home' => '',
            "Wisata Desa" => '',
        );

        $frontend->set_breadcrump($breadcrump);
        $frontend->set_content($html);
        $frontend->render();
    }

    public function lihat($id_wisata)
    {
        $frontend = new Frontend();
        $html = '';

        $this->load->model('WisataDesa_model');
        $wisata_desa_model = new WisataDesa_model();



        $wisata_desa_detail = $wisata_desa_model->detail($id_wisata);

        // print_r2($wisata_desa_detail);

        $nama_wisata = $wisata_desa_detail['nama_wisata'] . " - " . $wisata_desa_detail['nama_desa'] . " - " . $wisata_desa_detail['nama_kecamatan'];


        $content_data = array();
        $content_data['wisata_desa_detail'] = $wisata_desa_detail;
        $html = $frontend->load_view('frontend/wisata_detail', $content_data);

        $breadcrump = array(
            'Home' => '',
            "Wisata Desa" => 'wisata',
            "Desa " . $wisata_desa_detail['nama_desa'] => 'wisata/by_desa/' . $wisata_desa_detail['id_desa'],
            $nama_wisata => "",
        );

        $frontend->set_breadcrump($breadcrump);
        $frontend->set_content($html);
        $frontend->render();
    }

    public function by_desa($id_desa)
    {
        $frontend = new Frontend();
        $html = '';

        $this->load->model('WisataDesa_model');
        $wisata_desa_model = new WisataDesa_model();

        $wisata_desa_data = $wisata_desa_model->detail_byDesa($id_desa);



        $desa = $this->db->where('id_desa', $id_desa)->get('desa')->row_array();

        $content_data = array();
        $content_data['wisata_desa_data'] = $wisata_desa_data;
        $content_data['desa'] = $desa;
        $html = $frontend->load_view('frontend/wisata_daftar', $content_data);

        $breadcrump = array(
            'Home' => '',
            'Wisata Desa' => "wisata",
            "Desa " . $desa['nama_desa'] => 'desa/detail/' . $desa['id_desa'],

        );

        $frontend->set_breadcrump($breadcrump);
        $frontend->set_content($html);
        $frontend->render();
    }
}
