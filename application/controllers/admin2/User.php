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
        
    }

}
