<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{

    private $title = "Kecamatan";
    private $table_name = 'kecamatan';
    private $primary_key = "id_kecamatan";

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
        $crud->set_theme('bootstrap');
        $crud->set_table($this->table_name);
        $crud->set_subject($this->title);
        $crud->set_primary_key($this->primary_key);
        $state = $crud->getState();
        //========== inisiasi =============


        $crud->display_as('id_kecamatan', 'Kode');
        $crud->display_as('nama_kecamatan', 'Kecamatan');

        $crud->required_fields('id_kecamatan', 'nama_kecamatan');
        if ($state == 'insert_validation') {
            $crud->set_rules('id_kecamatan', 'Kode', 'trim|required|is_unique[kecamatan.id_kecamatan]');
        }

        $crud->callback_before_delete(array($this, '_callback_before_delete'));

        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }
    function _callback_before_delete($primary_key)
    {
        $param = json_encode(get_row($this->table_name, [$this->primary_key => $primary_key]));

        $trash_insert = array(
            'table' => $this->table_name,
            'param' => $param
        );

        $this->db->insert('_trash', $trash_insert);

        return true;
    }
}
