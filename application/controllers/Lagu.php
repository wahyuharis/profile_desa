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

        $search = $this->input->get('search');

        $this->load->model('LaguDesa_model');
        $LaguDesa_model = new LaguDesa_model();
        $lagu_desa =  $LaguDesa_model->get_list_desa($search);

        // print_r2($lagu_desa);

        $content_data = array();
        $content_data['lagu_desa'] = $lagu_desa;
        $html = $frontend->load_view('frontend/lagu', $content_data);

        $frontend->set_content($html);
        $frontend->render();
    }

    public function daftar($id_desa){
        $frontend = new Frontend();
        $html = '';


        $this->load->model('LaguDesa_model');
        $LaguDesa_model = new LaguDesa_model();
        $lagu_desa =  $LaguDesa_model->daftar($id_desa);

        // print_r2($lagu_desa);

        $content_data = array();
        $content_data['lagu_desa'] = $lagu_desa;
        $html = $frontend->load_view('frontend/lagu_daftar', $content_data);

        $frontend->set_content($html);
        $frontend->render();
    }

    public function putar($id_lagu){
        $frontend = new Frontend();
        $html = '';

        $this->db->where('id_lagu',$id_lagu);
        $db=$this->db->get('desa_lagu');

        $lagu=$db->row_array();

        // print_r2($lagu);

        $ext = pathinfo( './assets/uploads/files/' .$lagu['lagu'], PATHINFO_EXTENSION);

        // print_r2($ext);

        $content_data = array();
        $content_data['lagu'] = $lagu;
        $content_data['ext'] = $ext;
        $html = $frontend->load_view('frontend/lagu_putar', $content_data);

        $frontend->set_content($html);
        $frontend->render();
    }
}
