SELECT 

LOWER(
REPLACE(
CONCAT(desa.nama_desa,'_',kecamatan.nama_kecamatan) 
,' ','')
)
AS username,

CONCAT(
LOWER(
REPLACE(
CONCAT(desa.nama_desa,'_',kecamatan.nama_kecamatan) 
,' ','')
)
,'@jemberkab.go.id')

 AS email,
 MD5('weswayahe123') AS `password`,
 '2' AS id_role,
 desa.id_desa

FROM desa
LEFT JOIN kecamatan ON kecamatan.id_kecamatan=desa.id_kecamatan
