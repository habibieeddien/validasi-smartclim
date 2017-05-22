<?php
require_once("class_db.php");

// buat objek DB baru
$db = new DB();

$id_kabkota = intval($_GET['kabkota']);
$id = $db -> validate_data($id_kabkota);

$tgl_prediksi = $_GET['id'];
$tgl_prediksi = $db -> validate_data($tgl_prediksi);

// SELECT provinsi dari DB
$banjir = $db -> select_array("SELECT * FROM `prediksi_potensi_banjir` WHERE kode_kab = ".$id." AND tgl_prediksi = ".$tgl_prediksi);

if($banjir){
    # Buat Array kosong untuk menampung teks 'Hujan' atau 'Awas'
    $data = array();
    # Isi data dari waktu BMKG dan SMARTCLIM
    for($i = 5; $i < 14; $i++){
        # Jika indeks < 11 dan data banjir == 1, maka set teks = 'Hujan'
        if($banjir[$i] == 1 && $i < 11){
            $data[$i] = 'Hujan';
        }elseif($banjir[$i] == 0 && $i < 11){
            $data[$i] = '-';
        }elseif($banjir[$i] == 1){ # Jika indeks >= 11 dan data banjir == 1, maka set teks = 'Awas' (mulai indeks ini Data Warning SMARTCLIM)
            $data[$i] = 'Awas';
        }else{
            $data[$i] = '-';
        }
    }

    echo("
            <tr>
                  <td><center>".$data['5']."</center></td>
                  <td><center>".$data['6']."</center></td>
                  <td><center>".$data['7']."</center></td>
                  <td style=\"background-color:white;\"><center>".$data['8']."</center></td>
                  <td style=\"background-color:white;\"><center>".$data['9']."</center></td>
                  <td style=\"background-color:white;\"><center>".$data['10']."</center></td>
                  <td><center>".$data['11']."</center></td>
                  <td><center>".$data['12']."</center></td>
                  <td><center>".$data['13']."</center></td>
                  <td style=\"background-color:white;\"><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$id_kabkota."[0]\" value=\"1\" ></center></td>
                  <td style=\"background-color:white;\"><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$id_kabkota."[1]\" value=\"1\" ></center></td>
                  <td style=\"background-color:white;\"><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$id_kabkota."[2]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$id_kabkota."[3]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$id_kabkota."[4]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$id_kabkota."[5]\" value=\"1\" ></center></td>
            </tr>
    ");
	
}else{
    echo("<tr>tidak ada data</tr>
                <tr>
                  <td><center>-</center></td>
                  <td><center>-</center></td>
                  <td><center>-</center></td>
                  <td style=\"background-color:white;\"><center>-</center></td>
                  <td style=\"background-color:white;\"><center>-</center></td>
                  <td style=\"background-color:white;\"><center>-</center></td>
                  <td><center>-</center></td>
                  <td><center>-</center></td>
                  <td><center>-</center></td>
                  <td style=\"background-color:white;\"><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$id_kabkota."[0]\" value=\"1\" ></center></td>
                  <td style=\"background-color:white;\"><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$id_kabkota."[1]\" value=\"1\" ></center></td>
                  <td style=\"background-color:white;\"><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$id_kabkota."[2]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$id_kabkota."[3]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$id_kabkota."[4]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$id_kabkota."[5]\" value=\"1\" ></center></td>
                </tr>
    ");
}


?>