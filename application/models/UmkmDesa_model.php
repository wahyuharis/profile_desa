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

    function get_list($where = "", $limit, $start)
    {
        $sql = "SELECT * FROM desa_umkm
        LEFT JOIN desa
        ON desa.id_desa=desa_umkm.id_desa
        
        WHERE desa_umkm.nama_umkm LIKE '%".$this->db->escape_str($where)."%'
        
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

}