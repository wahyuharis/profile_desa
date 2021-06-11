<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lagu extends CI_Controller
{

    private $title = "Lagu & Profile Desa";
    private $table_name = 'lagu';
    private $primary_key = "id_lagu";
    private $crud = null;

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
        //========== inisiasi =============
        $crud = new grocery_CRUD();
        $crud->unset_bootstrap();
        $crud->unset_jquery();
        $crud->set_theme('bootstrap');
        $state = $crud->getState();
        //========== inisiasi =============

        $crud->set_table($this->table_name);
        $crud->set_subject($this->title);

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
        $param = json_encode(get_row($this->table_name, ['id_desa' => $primary_key]));

        $trash_insert = array(
            'table' => $this->table_name,
            'param' => $param
        );

        $this->db->insert('_trash', $trash_insert);

        return true;
    }
}
