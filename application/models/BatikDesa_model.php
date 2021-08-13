<?php
class KecamatanDesa_model  extends CI_Model
{

    private $total_row = 0;

    function __construct()
    {
        parent::__construct();
    }

    public function get_total_row()
    {
        return $this->total_row;
    }

    public function get_list($where = null, $start = null, $limit = null)
    {
        $sql = "SELECT * FROM desa_batik

        LEFT JOIN desa
        ON desa.id_desa=desa_batik.id_desa
        
        LEFT JOIN kecamatan
        ON kecamatan.id_kecamatan=desa.id_kecamatan";

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
