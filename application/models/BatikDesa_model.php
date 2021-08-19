<?php
class BatikDesa_model  extends CI_Model
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
        $sql = "SELECT * FROM desa_batik
        LEFT JOIN desa
        ON desa.id_desa=desa_batik.id_desa
        LEFT JOIN kecamatan
        ON kecamatan.id_kecamatan=desa.id_kecamatan
        
        ORDER BY desa_batik.no_urut asc
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

    function detail($id_batik)
    {

        $sql = "SELECT * FROM desa_batik
        left JOIN desa 
        ON desa.id_desa=desa_batik.id_desa
        
        LEFT JOIN kecamatan
        ON kecamatan.id_kecamatan=desa.id_kecamatan
        
        WHERE desa_batik.id_batik=" . $this->db->escape($id_batik) . "
            ";

        $db = $this->db->query($sql);

        $return = false;

        if ($db->num_rows() > 0) {
            $return = $db->row_array();
        }

        return $return;
    }


    function detail_byDesa($id_desa)
    {
        $sql = "SELECT * FROM desa_batik
        left JOIN desa 
        ON desa.id_desa=desa_batik.id_desa
        
        LEFT JOIN kecamatan
        ON kecamatan.id_kecamatan=desa.id_kecamatan
        
        WHERE desa.id_desa=" . $this->db->escape($id_desa) . " ";

        $db = $this->db->query($sql);

        $return = $db->result_array();

        return $return;
    }
}
