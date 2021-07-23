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

  public function search($search_txt = '', $type = '', $limit = 8, $start = 0)
  {
    $str = $this->db->escape_str($search_txt);
    $sql = "
      SELECT * FROM (SELECT 
      CONCAT(desa.nama_desa,' - ',kecamatan.nama_kecamatan) AS `TEXT`,
      desa.id_desa AS `KEY`,
      desa.foto_desa AS `IMG`,
      'DESA' AS `TYPE`
      FROM kecamatan
      LEFT JOIN desa
      ON desa.id_kecamatan = kecamatan.id_kecamatan
      WHERE desa.nama_desa LIKE '%" . $str . "%'
      OR
      kecamatan.nama_kecamatan LIKE '%" . $str . "%'

      UNION ALL

      SELECT 
      desa_lagu.nama_lagu AS `TEXT`,
      desa_lagu.id_lagu AS `KEY`,
      desa_lagu.foto AS `IMG`,
      'LAGU' AS `TYPE`
      FROM desa_lagu
      WHERE
      desa_lagu.nama_lagu LIKE '%" . $str . "%'
      ) AS tb ";

    $sql .= "\n";


    if (!empty(trim($type))) {
      $sql .= " WHERE tb.TYPE = 'LAGU' ";
    }
    $sql .= "\n";

    $sql_nolimit = $sql;

    $sql .= " LIMIT " . intval($start) . "," . intval($limit) . " ";


    $this->total_row = $this->db->query($sql_nolimit)->num_rows();

    $db = $this->db->query($sql);
    $return = $db->result_array();
    return $return;
  }
}
