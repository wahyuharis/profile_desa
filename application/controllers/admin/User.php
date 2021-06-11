<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    private $title = "User";
    private $table_name = '_user';
    private $primary_key = "id_user";
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
        $crud->set_theme('bootstrap');
        $crud->set_primary_key($this->primary_key, $this->table_name);
        $crud->set_table($this->table_name);
        $state = $crud->getState();
        $this->crud = $crud;


        $crud->fields('username', 'email', 'password',  'fullname', 'whatsapp', 'id_role', 'id_desa');
        $crud->columns('username', 'email', 'id_role', 'fullname', 'whatsapp', 'id_desa');
        $crud->display_as('id_role', "Role");
        $crud->display_as('id_desa', "Desa");

        $crud->set_relation('id_role', '_roles', 'role_name',null,'id_role desc');

        $crud->set_primary_key('id_desa', 'desa_kecamatan');
        $crud->set_relation('id_desa', 'desa_kecamatan', '{nama_desa} - Kec. {nama_kecamatan}');
        // $crud->set_relation('id_kecamatan', 'kecamatan', 'nama_kecamatan');

        $crud->set_subject($this->title);

        $crud->callback_before_update(array($this, '_encrypt_password_callback'));
        $crud->callback_before_insert(array($this, '_encrypt_password_callback'));
        $crud->callback_field('password', array($this, '_field_password'));
        $crud->callback_before_delete(array($this, '_callback_before_delete'));


        $required = array(
            'username',
            'email',
            'password',
            'id_role',
            'fullname',
            'whatsapp',
            'id_desa'
        );

        // print_r2($required);
        if ($state == 'update_validation' || $state== 'edit' || $state=='update' ) {
            unset($required[2]);
        }

        $crud->required_fields($required);


        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }

    function _encrypt_password_callback($post_array, $primary_key = null)
    {

        if (empty(trim($post_array['password']))) {
            $post_array['password'] = get_column('_user', ['id_user' => $primary_key], 'password');
        } else {
            $post_array['password'] = md5($post_array['password']);
        }

        return $post_array;
    }

    function _field_password($value = '', $primary_key = null)
    {
        return '<input type="password" value="" name="password" class="form-control">';
    }

    function _callback_before_delete($primary_key)
    {
        $return = true;

        if (get_column('_user', ['id_user' => $primary_key], 'lock') == 'Y') {
            $return = false;
        }

        $param = json_encode(get_row($this->table_name, [$this->primary_key => $primary_key]));
        $trash_insert = array(
            'table' => $this->table_name,
            'param' => $param
        );
        $this->db->insert('_trash', $trash_insert);

        return $return;
    }
}
