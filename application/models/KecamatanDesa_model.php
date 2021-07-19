<?php
class KecamatanDesa_model  extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function get_list($where=null, $start=null, $limit=null)
    {
        $sql = "SELECT kecamatan.*,

        CONCAT(
          '[',
          GROUP_CONCAT(
            JSON_OBJECT(
              'id_desa', desa.id_desa,
              'nama_desa', desa.nama_desa
            )
          ),
          ']'
        )
        
        AS `JSON`
        FROM kecamatan
        LEFT JOIN desa
        ON desa.id_kecamatan = kecamatan.id_kecamatan
        GROUP BY kecamatan.id_kecamatan";

        $db = $this->db->query($sql);
        $return =  $db->result_array();

        return $return;
        // echo $sql;
    }
}
