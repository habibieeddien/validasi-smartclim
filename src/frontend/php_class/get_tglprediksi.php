<?php
require_once("class_db.php");

// buat objek DB baru
$db = new DB();

$id_prov = intval($_GET['id']);
$id_prov = $db -> validate_data($id_prov);

// SELECT provinsi dari DB
$select_tgl = $db -> select("SELECT tgl_prediksi FROM `prediksi_potensi_banjir` WHERE kode_kab = ".$id_prov);

if($select_tgl){
    echo("<option value=\"\" selected disabled>Pilih Tanggal Prediksi</option>");
    foreach($select_tgl as $tgl){
        echo("<option value=\"".$tgl['tgl_prediksi']."\">".$tgl['tgl_prediksi']."</option>");
    }
}else{
    echo("<option value=\"null\" selected>Belum Ada Data</option>");
}

?>