<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lagu extends CI_Controller
{

    private $title = "Lagu Desa";
    private $table_name = 'desa_lagu';
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
        // $auth = new Auth();
        $sess = $this->session->userdata();
        // print_r2($sess);

        //========== inisiasi =============
        $crud = new grocery_CRUD();
        $crud->unset_bootstrap();
        $crud->unset_jquery();
        $crud->set_theme('bootstrap');
        $crud->set_table($this->table_name);
        $crud->set_primary_key($this->primary_key, $this->table_name);

        $state = $crud->getState();
        $this->crud = $crud;
        //========== inisiasi =============

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

        $crud->display_as('id_desa', 'Desa');
        $crud->display_as('nama_lagu', 'Judul lagu');
        $crud->display_as('content', 'Keterangan');

        $crud->set_field_upload('lagu', 'assets/uploads/files');
        $crud->set_field_upload('foto', 'assets/uploads/files');

        $crud->fields('id_desa', 'nama_lagu', 'foto', 'lagu', 'content', 'no_urut');
        $crud->required_fields('id_desa', 'nama_lagu', 'foto', 'lagu');

        $crud->field_type('no_urut', 'hidden');

        $crud->callback_before_upload(array($this, '_callback_before_upload'));
        $crud->callback_before_delete(array($this, '_callback_before_delete'));

        $crud->callback_before_insert(array($this, '_callback_before_insert'));


        $output = $crud->render();

        $template_data['content'] = $output->output;
        $template_data['content_title'] = $this->title;
        $template_data['js_files'] = $output->js_files;
        $template_data['css_files'] = $output->css_files;

        $this->load->view('admin/template', $template_data);
    }

    function _callback_before_upload($files_to_upload, $field_info)
    {
        $return = false;

        if ($field_info->field_name == 'foto') {
            $file_type_image = array('image/jpeg', 'image/png');
            $type = $files_to_upload[$field_info->encrypted_field_name]['type'];
            if (in_array($type, $file_type_image)) {
                $return = true;
            } else {
                $return = "tipe foto hanya boleh png dan jpg";
            }

            $size = $files_to_upload[$field_info->encrypted_field_name]['size'];
            if (intval($size) < 1000000) {
                $return = true;
            } else {
                $return = "ukuran foto tidak boleh lebih dari 1MB";
            }
        }

        if ($field_info->field_name == 'lagu') {
            $file_type_image = array('mp3', 'mp4');

            $name = $files_to_upload[$field_info->encrypted_field_name]['name'];
            $name_arr = explode('.', $name);

            $type = strtolower(trim(end($name_arr)));

            if (in_array($type, $file_type_image)) {
                $return = true;
            } else {
                $return = "tipe file hanya boleh mp3,mp4";
            }
        }

        return $return;
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

    function _callback_before_insert($post_array)
    {

        $post_array['no_urut'] = get_increment('desa_lagu', 'no_urut');

        return $post_array;
    }
}
