<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Desa extends CI_Controller
{

    private $title = "Desa";
    private $table_name = 'desa';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');

        $this->load->library('Auth');
        $auth = new Auth();
        $auth->is_logged_in()->is_admin();
    }

    public function index()
    {
        //========== inisiasi =============
        $crud = new grocery_CRUD();
        $crud->unset_bootstrap();
        $crud->unset_jquery();
        // $crud->set_theme('bootstrap');
        $state = $crud->getState();
        //========== inisiasi =============

        $crud->columns('id_desa','id_kecamatan','nama_desa');
        $crud->fields('id_kecamatan','foto_desa','nama_desa','url_website','keterangan');
        $crud->set_relation('id_kecamatan', 'kecamatan', 'nama_kecamatan');
        $crud->display_as('id_kecamatan', 'Kecamatan');
        $crud->display_as('nama_desa', 'Desa');
        $crud->display_as('id_desa', 'Kode');

        $crud->set_field_upload('foto_desa', 'assets/uploads/files');


        $crud->required_fields('id_kecamatan', 'nama_desa','foto_desa');
        // $crud->unique_fields(array('id_kecamatan'));

        $crud->callback_before_delete(array($this, '_callback_before_delete'));

        $crud->set_table($this->table_name);
        $crud->set_subject($this->title);

        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }

    function _callback_before_delete($primary_key)
    {
        $param= json_encode( get_row($this->table_name,['id_desa'=>$primary_key]) );

        $trash_insert=array(
            'table'=>$this->table_name,
            'param'=>$param
        );

        $this->db->insert('_trash',$trash_insert);

        return true;
    }
}
