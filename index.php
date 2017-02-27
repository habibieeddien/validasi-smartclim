<!--/*
*   source: https://colorlib.com/wp/free-html5-contact-form-templates/
*   editor online: http://codepen.io/codeconvey/pen/rgiLB/
*/-->

<?php 
date_default_timezone_set("Asia/Jakarta");
setlocale (LC_TIME, 'INDONESIA'); // untuk OS Windows
/*setlocale (LC_TIME, 'id_ID'); //untuk OS Linux */
require_once("php_class/class_db.php");  

// buat objek DB baru
$db = new DB();

// SELECT provinsi dari DB
$provinsi = $db -> select("SELECT * FROM `provinsi` ORDER BY kode_prov"); 

?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Validasi SMARTCLIM</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  </head>

  <body>

    <header class="ccheader">
      <h1>Validasi SMARTCLIM</h1>
      <h5>Tim Pemantau PASTIGANA<br><?php echo date('l, j F Y'); ?></h5>
    </header>

    <div class="wrapper">
      <form method="post" action="php_class/save_data.php" class="ccform">

        <div class="ccfield-prepend">
          <select id="provinsi" name="provinsi" class="ccformfield" placeholder="Pilih Provinsi" onchange="showKabKota(this.value)">
          <option value="" selected disabled>Pilih Provinsi</option>
          <?php foreach($provinsi as $prov){ echo("<option value=\"".$prov['kode_prov']."\">".$prov['kode_prov']." - ".$prov['provinsi']."</option>"); } ?>
      </select>
        </div>

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#banjir">BANJIR</a></li>
          <li><a data-toggle="tab" href="#longsor">LONGSOR</a></li>
        </ul>

        <div class="tab-content" id="data_tabel">
          <div id="banjir" class="tab-pane fade in active">
            <div class="ccfield-prepend container">
              <table border="1" id="data_banjir" name="data_banjir" class="table table-hover" style="margin-top:33px;font-size:11pt; width:100%">
                <thead>
                  <tr>
                    <th style="text-align: center; vertical-align:middle;" rowspan="3"><b>Kode</b></th>
                    <th style="text-align: center; vertical-align:middle;" rowspan="3"><b>Kab./Kota</b></th>
                    <th style="text-align: center; vertical-align:middle;" rowspan="3"><b>PU</b></th>
                    <th style="text-align: center; vertical-align:middle;" rowspan="3"><b>SmartClim</b></th>
                    <th style="text-align: center; vertical-align:middle;" colspan="3" rowspan="2"><b>BMKG</b><br>&#9745; : Hujan Lebat</th>
                    <th style="text-align: center; vertical-align:middle;" colspan="6"><b>SMARTCLIM</b></th>
                  </tr>
                  <tr>
                    <th style="text-align: center; vertical-align:middle;" colspan="3"><b>Cuaca</b><br>&#9745; : Hujan</th>
                    <th style="text-align: center; vertical-align:middle;" colspan="3"><b>Warning</b><br>&#9745; : Awas</th>
                  </tr>
                  <tr>
                    <th>7:00</th>
                    <th>13:00</th>
                    <th>19:00</th>
                    <th>7:00</th>
                    <th>13:00</th>
                    <th>19:00</th>
                    <th>7:00</th>
                    <th>13:00</th>
                    <th>19:00</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
          <div id="longsor" class="tab-pane fade">
            <div class="ccfield-prepend container">
              <table border="1" id="data_longsor" class="table table-hover" style="margin-top:33px;font-size:11pt; width:100%">
                <thead>
                  <tr>
                    <th style="text-align: center; vertical-align:middle;" rowspan="3"><b>Kode</b></th>
                    <th style="text-align: center; vertical-align:middle;" rowspan="3"><b>Kab./Kota</b></th>
                    <th style="text-align: center; vertical-align:middle;" rowspan="3"><b>PU</b></th>
                    <th style="text-align: center; vertical-align:middle;" rowspan="3"><b>SmartClim</b></th>
                    <th style="text-align: center; vertical-align:middle;" colspan="3" rowspan="2"><b>BMKG</b><br>&#9745; : Hujan</th>
                    <th style="text-align: center; vertical-align:middle;" colspan="6"><b>SMARTCLIM</b></th>
                  </tr>
                  <tr>
                    <th style="text-align: center; vertical-align:middle;" colspan="3"><b>Cuaca</b><br>&#9745; : Hujan</th>
                    <th style="text-align: center; vertical-align:middle;" colspan="3"><b>Warning</b><br>&#9745; : Awas</th>
                  </tr>
                  <tr>
                    <th>7:00</th>
                    <th>13:00</th>
                    <th>19:00</th>
                    <th>7:00</th>
                    <th>13:00</th>
                    <th>19:00</th>
                    <th>7:00</th>
                    <th>13:00</th>
                    <th>19:00</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="ccfield-prepend">
          <input id="idprov" name="idprov" type="hidden" value="">
          <!-- Trigger the modal with a button -->
          <button type="button" class="ccbtn" data-toggle="modal" data-target="#konfirmasi">Simpan Data</button>

          <!-- Modal -->
          <div class="modal fade" id="konfirmasi" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <center><h4 class="modal-title"><strong>Konfirmasi</strong></h4></center>
                </div>
                <div class="modal-body">
                  <p>Anda Yakin ingin menyimpan data ini ?</p>
                </div>
                <div class="modal-footer">
                  <input class="btn btn-danger btn-lg" type="submit" value="Simpan Data" name="save_data" id="save_data">
                  <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">Batal</button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </form>
    </div>

    <div class="credit">
      <p>Programmer <a href="http://habibie.tk/" target="_blank">Habibie Ed Dien</a> | DB Designer
        <a href="#" target="_blank">Asep Syarif Hidayat</a>
      </p>
    </div>
  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/myjs.js"></script>

  </html>