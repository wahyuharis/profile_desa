<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['use_page_numbers'] = TRUE;
$config['query_string_segment'] = 'page';
$config['page_query_string'] = TRUE;
$config['reuse_query_string'] = true;

$config['next_link']        = '<i class="fas fa-chevron-right"></i>';
$config['prev_link']        = '<i class="fas fa-chevron-left"></i>';
$config['first_link']       = '<i class="fas fa-chevron-left"></i> <i class="fas fa-chevron-left"></i>';
$config['last_link']        = '<i class="fas fa-chevron-right"></i> <i class="fas fa-chevron-right"></i>';
$config['full_tag_open']    = '<div class="btn-group">';
$config['full_tag_close']   = '</div>';
$config['attributes']       = ['class' => 'btn btn-secondary'];
// $config['first_tag_open']   = '<li class="page-item">';
// $config['first_tag_close']  = '</li>';
// $config['prev_tag_open']    = '<li class="page-item">';
// $config['prev_tag_close']   = '</li>';
// $config['next_tag_open']    = '<li class="page-item">';
// $config['next_tag_close']   = '</li>';
// $config['last_tag_open']    = '<li class="page-item">';
// $config['last_tag_close']   = '</li>';
$config['cur_tag_open']     = '<span class="btn btn-primary" >';
$config['cur_tag_close']    = '</span>';
// $config['num_tag_open']     = '<li class="page-item">';
// $config['num_tag_close']    = '</li>';
