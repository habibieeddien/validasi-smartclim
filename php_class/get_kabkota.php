<?php
require_once("class_db.php");

// buat objek DB baru
$db = new DB();

$id_prov = intval($_GET['id']);
$id_prov = $db -> validate_data($id_prov);

// SELECT provinsi dari DB
$select_kabkota = $db -> select("SELECT kode_kab, kabupaten FROM `kabupaten` WHERE kode_prov = ".$id_prov);

# Tabel untuk Data Banjir
echo("<div id=\"banjir\" class=\"tab-pane fade in active\">
          <div class=\"ccfield-prepend container\">
            <table border=\"1\" id=\"data_banjir\" name=\"data_banjir\" class=\"table table-hover\" style=\"margin-top:33px;font-size:11pt; width:100%\">
              <thead>
                <tr>
                  <th style=\"text-align: center; vertical-align:middle;\" rowspan=\"3\"><b>Kode</b></th>
                  <th style=\"text-align: center; vertical-align:middle;\" rowspan=\"3\"><b>Kab./Kota</b></th>
                  <th style=\"text-align: center; vertical-align:middle;\" rowspan=\"3\"><b>PU</b></th>
                  <th style=\"text-align: center; vertical-align:middle;\" rowspan=\"3\"><b>SmartClim</b></th>
                  <th style=\"text-align: center; vertical-align:middle;\" colspan=\"3\" rowspan=\"2\"><b>BMKG</b><br>&#9745; : Hujan Lebat</th>
                  <th style=\"text-align: center; vertical-align:middle;\" colspan=\"6\"><b>SMARTCLIM</b></th>
                </tr>
                <tr>
                  <th style=\"text-align: center; vertical-align:middle; background-color:white;\" colspan=\"3\"><b>Cuaca</b><br>&#9745; : Hujan</th>
                  <th style=\"text-align: center; vertical-align:middle;\" colspan=\"3\"><b>Warning</b><br>&#9745; : Awas</th>
                </tr>
                <tr>
                  <th>7:00</th>
                  <th>13:00</th>
                  <th>19:00</th>
                  <th style=\"background-color:white;\">7:00</th>
                  <th style=\"background-color:white;\">13:00</th>
                  <th style=\"background-color:white;\">19:00</th>
                  <th>7:00</th>
                  <th>13:00</th>
                  <th>19:00</th>
                </tr>
            </thead>
            <tbody>
");


// loop checkbox tabel data banjir
foreach($select_kabkota as $kabkota){
	
	echo("
        <tr>
                  <td>".$kabkota['kode_kab']."</td>
                  <td>".$kabkota['kabupaten']."</td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[0]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[1]\" value=\"1\" checked></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[2]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[3]\" value=\"1\" ></center></td>
                  <td>
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[4]\" value=\"1\" ></center>
                  </td>
                  <td style=\"background-color:white;\">
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[5]\" value=\"1\" ></center>
                  </td>
                  <td style=\"background-color:white;\">
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[6]\" value=\"1\" ></center>
                  </td>
                  <td style=\"background-color:white;\">
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[7]\" value=\"1\" ></center>
                  </td>
                  <td>
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[8]\" value=\"1\" ></center>
                  </td>
                  <td>
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[9]\" value=\"1\" ></center>
                  </td>
                  <td>
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"banjirkab".$kabkota['kode_kab']."[10]\" value=\"1\" ></center>
                  </td>
                </tr>
    ");
	
}
// END foreach tabel data banjir

# Tabel untuk Data Longsor
echo("
              </tbody>
            </table>
          </div>
        </div>
        <div id=\"longsor\" class=\"tab-pane fade\">
          <div class=\"ccfield-prepend container\">
            <table border=\"1\" id=\"data_longsor\" class=\"table table-hover\" style=\"margin-top:33px;font-size:11pt; width:100%\">
              <thead>
                <tr>
                  <th style=\"text-align: center; vertical-align:middle;\" rowspan=\"3\"><b>Kode</b></th>
                  <th style=\"text-align: center; vertical-align:middle;\" rowspan=\"3\"><b>Kab./Kota</b></th>
                  <th style=\"text-align: center; vertical-align:middle;\" rowspan=\"3\"><b>PU</b></th>
                  <th style=\"text-align: center; vertical-align:middle;\" rowspan=\"3\"><b>SmartClim</b></th>
                  <th style=\"text-align: center; vertical-align:middle;\" colspan=\"3\" rowspan=\"2\"><b>BMKG</b><br>&#9745; : Hujan Lebat</th>
                  <th style=\"text-align: center; vertical-align:middle;\" colspan=\"6\"><b>SMARTCLIM</b></th>
                </tr>
                <tr>
                  <th style=\"text-align: center; vertical-align:middle; background-color:white;\" colspan=\"3\"><b>Cuaca</b><br>&#9745; : Hujan</th>
                  <th style=\"text-align: center; vertical-align:middle;\" colspan=\"3\"><b>Warning</b><br>&#9745; : Awas</th>
                </tr>
                <tr>
                  <th>7:00</th>
                  <th>13:00</th>
                  <th>19:00</th>
                  <th style=\"background-color:white;\">7:00</th>
                  <th style=\"background-color:white;\">13:00</th>
                  <th style=\"background-color:white;\">19:00</th>
                  <th>7:00</th>
                  <th>13:00</th>
                  <th>19:00</th>
                </tr>
            </thead>
            <tbody>
");


// loop checkbox tabel data longsor
foreach($select_kabkota as $kabkota){
	
	echo("
        <tr>
                  <td>".$kabkota['kode_kab']."</td>
                  <td>".$kabkota['kabupaten']."</td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"longsorkab".$kabkota['kode_kab']."[0]\" value=\"1\"></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"longsorkab".$kabkota['kode_kab']."[1]\" value=\"1\" checked></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"longsorkab".$kabkota['kode_kab']."[2]\" value=\"1\" ></center></td>
                  <td><center><input class=\"my-checkbox\" type=\"checkbox\" name=\"longsorkab".$kabkota['kode_kab']."[3]\" value=\"1\" ></center></td>
                  <td>
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"longsorkab".$kabkota['kode_kab']."[4]\" value=\"1\" ></center>
                  </td>
                  <td style=\"background-color:white;\">
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"longsorkab".$kabkota['kode_kab']."[5]\" value=\"1\" ></center>
                  </td>
                  <td style=\"background-color:white;\">
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"longsorkab".$kabkota['kode_kab']."[6]\" value=\"1\" ></center>
                  </td>
                  <td style=\"background-color:white;\">
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"longsorkab".$kabkota['kode_kab']."[7]\" value=\"1\" ></center>
                  </td>
                  <td>
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"longsorkab".$kabkota['kode_kab']."[8]\" value=\"1\" ></center>
                  </td>
                  <td>
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"longsorkab".$kabkota['kode_kab']."[9]\" value=\"1\" ></center>
                  </td>
                  <td>
                    <center><input class=\"my-checkbox\" type=\"checkbox\" name=\"longsorkab".$kabkota['kode_kab']."[10]\" value=\"1\" ></center>
                  </td>
                </tr>
    ");
	
}
// END foreach tabel data banjir

echo("
              </tbody>
            </table>
          </div>
        </div>
");


?>