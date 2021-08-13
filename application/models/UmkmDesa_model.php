<?php
class UmkmDesa_model  extends CI_Model
{

    private $total_row = 0;

    function __construct()
    {
        parent::__construct();
    }

    function get_total_row()
    {
        return $this->total_row;
    }

    function get_list($where = "", $limit = 8, $start = 0)
    {
        $sql = "SELECT * FROM desa_umkm
        LEFT JOIN desa
        ON desa.id_desa=desa_umkm.id_desa
        
        LEFT JOIN kecamatan
        ON kecamatan.id_kecamatan=desa.id_kecamatan
        
        WHERE desa_umkm.nama_umkm LIKE '%" . $this->db->escape_str($where) . "%'
        
        ORDER BY desa_umkm.no_urut asc
        ";

        $db2 = $this->db->query($sql);

        $sql .= "
        limit " . intval($start) . "," . intval($limit) . "
        ";

        $this->total_row = $db2->num_rows();

        $db = $this->db->query($sql);

        $return = $db->result_array();

        return $return;
    }


    function detail($id_umkm)
    {
        $sql = "SELECT * FROM desa_umkm
        LEFT JOIN desa
        ON desa.id_desa=desa_umkm.id_desa
        
        LEFT JOIN kecamatan
        ON kecamatan.id_kecamatan=desa.id_kecamatan
        
        WHERE desa_umkm.id_umkm=" . $id_umkm . " ";

        $db = $this->db->query($sql);

        $return = false;

        $return = $db->row_array();

        return $return;
    }

    function by_desa($id_desa = null)
    {
        $sql = "SELECT * FROM desa_umkm

        LEFT JOIN desa
        ON desa.id_desa=desa_umkm.id_desa
        
        LEFT JOIN kecamatan
        ON kecamatan.id_kecamatan=desa.id_kecamatan
        WHERE
        desa_umkm.id_desa=".$this->db->escape($id_desa)." ";


        $db = $this->db->query($sql);

        $return = $db->result_array();

        return $return;
    }
}
