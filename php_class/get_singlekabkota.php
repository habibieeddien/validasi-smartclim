<?php
require_once("class_db.php");

// buat objek DB baru
$db = new DB();

$id_prov = intval($_GET['id']);
$id_prov = $db -> validate_data($id_prov);

// SELECT provinsi dari DB
$select_kabkota = $db -> select("SELECT kode_kab, kabupaten FROM `kabupaten` WHERE kode_prov = ".$id_prov);

foreach($select_kabkota as $kabkota){
    echo("<option value=\"".$kabkota['kode_kab']."\">".$kabkota['kode_kab']." - ".$kabkota['kabupaten']."</option>");
}

?>