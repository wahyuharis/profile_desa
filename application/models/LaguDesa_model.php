<?php
class LaguDesa_model  extends CI_Model
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
    public function get_list($where = "", $limit = 8, $start = 0)
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

        $sql .= "
        order BY kecamatan.nama_kecamatan, desa.nama_desa  asc
        ";


        $sql_no_limit = $sql;

        $sql .= "
        limit " . intval($start) . "," . intval($limit) . " 
        ";

        // print_r2($sql);

        $db2 = $this->db->query($sql_no_limit);
        $this->total_row = $db2->num_rows();

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

    function jml_lagu($id_desa)
    {
        $sql = "SELECT 
        desa.id_desa,
        desa.nama_desa,
        COUNT(desa_lagu.id_lagu) AS jml_lagu
        FROM desa
        LEFT JOIN desa_lagu ON desa_lagu.id_desa=desa.id_desa
        
        WHERE desa.id_desa=" . $this->db->escape($id_desa) . "
        
        GROUP BY desa.id_desa
        ORDER BY desa.nama_desa asc";

        $db = $this->db->query($sql);

        $return = $db->row_array()['jml_lagu'];

        return $return;
    }

    function desa_belum_ada_lagu()
    {
        $sql = "SELECT desa.id_desa FROM desa
        WHERE desa.id_desa NOT IN (SELECT desa_lagu.id_desa FROM desa_lagu )";

        $db = $this->db->query($sql);

        $result = $db->result_array();

        $return = array();

        foreach ($result as $row) {
            array_push($return, $row['id_desa']);
        }

        return $return;
    }
}
