<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Desa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Frontend');
	}
	public function index()
	{
		$frontend = new Frontend();
		$html = '';

		$content_data = array();
		$frontend->set_content($html);
		$frontend->render();
	}

	public function detail($id_desa = '')
	{
		if (empty(trim($id_desa))) {
			show_404();
		}

		$frontend = new Frontend();
		$html = '';

		$this->db->where('id_desa', $id_desa);
		$db = $this->db->get('desa');

		$this->db->where('id_desa', $id_desa);
		$this->db->order_by('id_lagu', 'desc');
		$db2 = $this->db->get('desa_lagu');

		$desa = $db->row_array();



		$lagu = $db2->row_array();

		$ext='mp3';
		
		if ($db2->num_rows() > 0) {
			$ext = pathinfo('./assets/uploads/files/' . $lagu['lagu'], PATHINFO_EXTENSION);
		}else{
			$lagu=array(
				'id_lagu'=>'',
				'no_urut'=>'',
				'id_desa'=>'',
				'foto'=>'',
				'nama_lagu'=>'',
				'lagu'=>'',
				'link_youtube'=>'',
				'content'=>'',
				'kali_diputar'=>'',
			);
		}


		// print_r2($lagu);

		$content_data = array();
		$content_data['desa'] = $desa;
		$content_data['lagu'] = $lagu;
		$content_data['ext'] = $ext;
		$html = $frontend->load_view('frontend/desa', $content_data);


		$breadcrump = array(
			'Home' => '',
			"Desa " . ucwords($desa['nama_desa']) => '',
		);

		$frontend->set_breadcrump($breadcrump);

		$frontend->set_content($html);
		$frontend->render();
	}
}
