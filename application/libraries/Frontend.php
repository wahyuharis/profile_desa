<?php

class Frontend
{

    private $title = "J-Kraf";
    private $meta_img = "assets/kominfo.png";
    private $content = "";
    private $favicon = "assets/logo_admin.ico";
    private $breadcrump = array(
        'Home'=> ''
    );

    function __construct()
    {
        $ci = &get_instance();
    }

    function set_breadcrump($breadcrump)
    {
        $this->breadcrump = $breadcrump;
        return $this;
    }
    function set_title($title)
    {
        $this->title = $title;
        return $this;
    }
    function set_meta_img($meta_img)
    {
        $this->meta_img = $meta_img;
        return $this;
    }
    function set_content($content)
    {
        $this->content = $content;
        return $this;
    }
    function set_favicon($favicon)
    {
        $this->favicon = $favicon;
        return $this;
    }


    function load_view($view, $data)
    {
        $ci = &get_instance();
        $return = "";
        $return = $ci->load->view($view, $data, true);

        return $return;
    }


    function render()
    {
        $ci = &get_instance();

        $data = array();

        $data['content'] = $this->content;
        $data['title'] = $this->title;
        $data['meta_img'] = $this->meta_img;
        $data['favicon'] = $this->favicon;
        $data['breadcrump'] = $this->breadcrump;

        $ci->load->view('frontend/template', $data);
    }
}
