<?php
class LaguDesa_model  extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_list_desa($where = "")
    {
        $sql = "SELECT * FROM
        desa_lagu
        LEFT JOIN desa
        ON desa.id_desa=desa_lagu.id_desa
        LEFT JOIN kecamatan
        ON kecamatan.id_kecamatan=desa.id_kecamatan
        
        WHERE desa_lagu.nama_lagu LIKE '%" . $this->db->escape_str($where) . "%'
        OR
        desa.nama_desa LIKE '%" . $this->db->escape_str($where) . "%'
        OR
        kecamatan.nama_kecamatan LIKE '%" . $this->db->escape_str($where) . "%' 
        GROUP BY desa.id_desa";

        $db = $this->db->query($sql);
        $return =  $db->result_array();

        return $return;
        // echo $sql;
    }
    public function get_list($where = "")
    {
        $sql = "SELECT * FROM
        desa_lagu
        LEFT JOIN desa
        ON desa.id_desa=desa_lagu.id_desa
        LEFT JOIN kecamatan
        ON kecamatan.id_kecamatan=desa.id_kecamatan
        
        WHERE desa_lagu.nama_lagu LIKE '%" . $this->db->escape_str($where) . "%'
        OR
        desa.nama_desa LIKE '%" . $this->db->escape_str($where) . "%'
        OR
        kecamatan.nama_kecamatan LIKE '%" . $this->db->escape_str($where) . "%' ";

        $db = $this->db->query($sql);
        $return =  $db->result_array();

        return $return;
        // echo $sql;
    }

    function daftar($id_desa)
    {
        $this->db->where('id_desa', $id_desa);
        $db = $this->db->get('desa_lagu');

        $return =  $db->result_array();

        return $return;
    }
}
