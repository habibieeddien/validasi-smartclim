<?php
require_once("class_db.php");

// buat objek DB baru
$db = new DB();

$id_kabkota = intval($_GET['id']);
$id_kabkota = $db -> validate_data($id_kabkota);

// SELECT provinsi dari DB
$select_banjir = $db -> select("SELECT * FROM `prediksi_potensi_banjir` kode_kab = ".$id_kabkota);

if($select_banjir){
	foreach($select_banjir as $banjir){		
		echo("
            <tr>".$banjir['tgl_prediksi']."</tr>
        ");		
	}
}else{
    echo("
                <tr>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[0]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[1]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[2]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[3]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[4]\" value=\"1\" ></center></td>
                  <td style=\"background-color:white;\"><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[5]\" value=\"1\" ></center></td>
                  <td style=\"background-color:white;\"><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[6]\" value=\"1\" ></center></td>
                  <td style=\"background-color:white;\"><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[7]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[8]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[9]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[10]\" value=\"1\" ></center></td>
                </tr>
    ");
}


?>