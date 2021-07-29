<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends CI_Controller
{

    private $title = "Wisata Desa";
    private $table_name = 'desa_wisata';
    private $primary_key = "id_wisata";
    private $crud = null;
    private $primary_key_val2 = false;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');

        $this->load->library('Auth');
        $auth = new Auth();
        $auth->is_logged_in();
    }

    public function index()
    {
        $sess = $this->session->userdata();

        $crud = new grocery_CRUD();
        $crud->unset_bootstrap();
        $crud->unset_jquery();
        $crud->set_theme('bootstrap');
        $crud->set_table($this->table_name);
        $crud->set_primary_key($this->primary_key, $this->table_name);

        $state = $crud->getState();
        $state_info = $crud->getStateInfo();
        $this->crud = $crud;

        $crud->set_subject($this->title);




        $where2 = null;
        if (intval($sess['id_role']) == 2) {
            $where = array();
            $where['desa_lagu.id_desa'] = $sess['id_desa'];
            $where2['id_desa'] = $sess['id_desa'];
            $crud->where($where);
        }
        $crud->set_primary_key('id_desa', 'desa_kecamatan');
        $crud->set_relation('id_desa', 'desa_kecamatan', '{nama_desa} - Kec. {nama_kecamatan}', $where2);

        $crud->columns('no_urut','id_desa','nama_wisata','foto');
        $crud->fields('no_urut','id_desa','nama_wisata','foto1','foto2','foto3','content','maps');
        $crud->required_fields('id_desa','nama_wisata','foto1');

        $crud->display_as('id_desa', 'Desa');
        $crud->display_as('content', 'Keterangan');
        $crud->display_as('maps', 'Sematkan Peta');

        $crud->set_field_upload('foto1', 'assets/uploads/files');
        $crud->set_field_upload('foto2', 'assets/uploads/files');
        $crud->set_field_upload('foto3', 'assets/uploads/files');

        $crud->unset_texteditor('maps');

        if ($state == 'add') {
            $crud->field_type('no_urut', 'hidden');
        }

        if (intval($sess['id_role']) == 2) {
            $crud->field_type('no_urut', 'hidden');
        }

        if ($state == 'update_validation' || $state == 'update' || $state=='edit' ) {
            $this->primary_key_val2 = $state_info->primary_key;
            $crud->set_rules('no_urut', 'No Urut', 'trim|required|callback_is_uniqe_nourut');
        }

        $crud->callback_before_insert(array($this, '_callback_before_insert'));


        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);

    }

    public function is_uniqe_nourut($str)
    {

        $no_urut = $this->input->post('no_urut');
        $primary_key = $this->primary_key_val2;
        $return = false;

        $this->db->where('no_urut', $no_urut);
        $this->db->where( $this->primary_key.' <>', $primary_key);
        $db = $this->db->get($this->table_name);


        if ($db->num_rows() > 0) {
            $return = false;
            $this->form_validation->set_message('is_uniqe_nourut', 'Maaf {field} Di isi dengan nomor urut yang sudah ada');
        } else {
            $return = true;
        }

        return  $return;
    }

    function _callback_before_insert($post_array)
    {

        $post_array['no_urut'] = get_increment($this->table_name, 'no_urut');

        return $post_array;
    }
}