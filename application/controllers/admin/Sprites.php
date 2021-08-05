<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sprites extends CI_Controller
{
    private $title = "Logo";
    private $table_name = 'sprites';
    private $primary_key = "id_sprites";
    private $crud = null;

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
        $crud = new grocery_CRUD();
        $crud->unset_bootstrap();
        $crud->unset_jquery();
        // $crud->set_theme('bootstrap');
        $crud->set_primary_key($this->primary_key, $this->table_name);
        $crud->set_table($this->table_name);
        $state = $crud->getState();
        $state_info = $crud->getStateInfo();

        $this->crud = $crud;

        $crud->fields('name', 'img', 'caption');
        $crud->columns('name', 'img', 'caption');

        $crud->set_field_upload('img', 'assets/uploads/files');

        if ($state == 'edit') {
            $is_text =  get_column($this->table_name, [$this->primary_key => $state_info->primary_key], 'is_text');
            if ($is_text == 'N') {
                $crud->unset_texteditor('caption');
            }
        }

        $crud->unset_add();
        $crud->unset_delete();

        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }
}
