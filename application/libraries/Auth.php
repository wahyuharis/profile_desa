<?php

class Auth
{

    function __construct()
    {
        $ci = &get_instance();
    }

    function login($email, $password)
    {
        $ci = &get_instance();

        $error_message = "";

        //============VALIDASI EMAIL===========================
        $db = $ci->db->where('email', $email)
            ->or_where('username', $email)
            ->get('_user');

        if ($db->num_rows() < 1) {
            $error_message = "Email Salah";
        } else {
            //============VALIDASI PASSWORD===========================
            $db = $ci->db
                ->group_start()
                     ->where('email', $email)
                     ->or_where('username', $email)
                ->group_end()

                ->where('password', md5($password))
                ->get('_user');

            if ($db->num_rows() < 1) {
                $error_message = "Password Salah";
            } else {
                $sess = array();

                $db = $ci->db->select('_user.*,_roles.role_name')
                    ->group_start()
                         ->where('email', $email)
                         ->or_where('username', $email)
                    ->group_end()

                    ->where('password', md5($password))
                    ->join('_roles', '_roles.id_role=_user.id_role', 'left')
                    ->get('_user');

                $sess = $db->row_array();


                $ci->session->set_userdata($sess);
            }
            //============VALIDASI PASSWORD===========================

        }
        //============VALIDASI EMAIL===========================
        return $error_message;
    }


    function is_logged_in()
    {
        $ci = &get_instance();

        $email = $ci->session->userdata('email');
        $password = $ci->session->userdata('password');

        $db = $ci->db ->group_start()
                         ->where('email', $email)
                         ->or_where('username', $email)
                    ->group_end()
            ->where('password', $password)
            ->get('_user');

        if ($db->num_rows() < 1) {
            $ci->session->set_flashdata('error_message', "Maaf Anda Belum Login");
            redirect('login');
        }

        return $this;
    }

    function is_admin()
    {
        //Administrator //user_level

        $ci = &get_instance();
        $user_level = $ci->session->userdata('role_name');

        if (!(strtolower($user_level) == strtolower('admin'))) {
            //pass
            $ci->session->set_flashdata('error_message', "Maaf Anda Tidak Memiliki Hak Akses Pada Menu Tsb");
            redirect('admin/home');
        }
    }
}
