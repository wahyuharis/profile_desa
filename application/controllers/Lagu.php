<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lagu extends CI_Controller
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

        $this->load->model('LaguDesa_model');
        $lagu_desa_model = new LaguDesa_model();



        $page = $this->input->get('page');
        $limit = 8;
        $start = page_to_start($page, $limit);

        $lagu_desa_data = $lagu_desa_model->get_list('', $limit, $start);

        $this->load->library('pagination');
        $config['base_url'] = base_url('lagu/index');
        $config['total_rows'] = $lagu_desa_model->get_total_row();
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);

        // print_r2($lagu_desa_data);

        $content_data = array();
		$content_data['pagination'] = $this->pagination->create_links();
		$content_data['lagu_desa_data'] = $lagu_desa_data;


        $html = $frontend->load_view('frontend/lagu_list', $content_data);

        $breadcrump = array(
            'Home' => '',
            'Lagu Desa' => 'lagu',
        );
        $frontend->set_breadcrump($breadcrump);

        $frontend->set_content($html);
        $frontend->render();
    }

    public function daftar_perdesa()
    {
        $frontend = new Frontend();
        $html = '';

        $search = $this->input->get('search');

        $this->load->model('LaguDesa_model');
        $LaguDesa_model = new LaguDesa_model();
        $lagu_desa =  $LaguDesa_model->get_list_desa($search);

        // print_r2($lagu_desa);

        $content_data = array();
        $content_data['lagu_desa'] = $lagu_desa;
        $html = $frontend->load_view('frontend/lagu', $content_data);


        $breadcrump = array(
            'Home' => '',
            'Lagu Desa' => 'lagu/daftar_perdesa',
        );
        $frontend->set_breadcrump($breadcrump);

        $frontend->set_content($html);
        $frontend->render();
    }

    public function daftar($id_desa)
    {
        $frontend = new Frontend();
        $html = '';


        $this->load->model('LaguDesa_model');
        $LaguDesa_model = new LaguDesa_model();
        $lagu_desa =  $LaguDesa_model->daftar($id_desa);

        // print_r2($lagu_desa);

        $desa = $this->db->where('id_desa', $id_desa)->get('desa')->row_array();
        // print_r2($desa);


        $content_data = array();
        $content_data['lagu_desa'] = $lagu_desa;
        $content_data['desa'] = $desa;

        $html = $frontend->load_view('frontend/lagu_daftar', $content_data);
        $breadcrump = array(
            'Home' => '',
            'Lagu Desa' => 'lagu',
            'Desa ' . $desa['nama_desa'] => 'daftar/' . $id_desa,
        );
        $frontend->set_breadcrump($breadcrump);
        $frontend->set_content($html);
        $frontend->render();
    }

    public function putar($id_lagu)
    {
        $frontend = new Frontend();
        $html = '';

        $this->db->where('id_lagu', $id_lagu);
        $db = $this->db->get('desa_lagu');

        $lagu = $db->row_array();

        // print_r2($lagu);

        $desa = $this->db->where('id_desa', $lagu['id_desa'])->get('desa')->row_array();
        // print_r2($desa);

        $ext = pathinfo('./assets/uploads/files/' . $lagu['lagu'], PATHINFO_EXTENSION);

        $content_data = array();
        $content_data['lagu'] = $lagu;
        $content_data['ext'] = $ext;
        $html = $frontend->load_view('frontend/lagu_putar', $content_data);

        $breadcrump = array(
            'Home' => '',
            'Lagu Desa' => 'lagu',
            'Desa ' . $desa['nama_desa'] => 'lagu/daftar/' . $lagu['id_desa'],
            $lagu['nama_lagu'] => 'lagu/putar',
        );
        $frontend->set_breadcrump($breadcrump);

        $frontend->set_content($html);
        $frontend->render();
    }

    public function log_played($id_lagu)
    {
        $id_lagu = intval($id_lagu);
        $kali_diputar = 0;
        $db = $this->db->where('id_lagu', $id_lagu)->get('desa_lagu');
        if ($db->num_rows() > 0) {
            $kali_diputar = $db->row_array()['kali_diputar'];

            $kali_diputar2 = $kali_diputar + 1;
            $this->db->set('kali_diputar', $kali_diputar2);
            $this->db->where('id_lagu', $id_lagu);
            $this->db->update('desa_lagu');
        }
    }
}
