<?php

require_once("class_db.php");

// buat objek DB baru
$db = new DB();

if(isset($_POST['save_data']) && isset($_POST['idprov'])){
    
    $id_prov = intval($_POST['idprov']);
    $id_prov = $db -> validate_data($id_prov);

    // SELECT provinsi dari DB
    $select_kabkota = $db -> select("SELECT kode_kab FROM `kabupaten` WHERE kode_prov = ".$id_prov);
    $today = date('Y-m-d');

    # INPUT Data Banjir
    foreach($select_kabkota as $kabkota){
        $data = $_POST['banjirkab'.$kabkota['kode_kab']];
        $kode_kab = $kabkota['kode_kab'];
        $isFill = false;

        # Cek Apakah ada data dari index ke-2 sampai ke-10, jika tidak SKIP
        for($j = 2; $j <= 10; $j++){
            if(isset($data[$j])){
                $isFill = true;
                break;
            }
        }

        # Jika Data tidak ada, maka data kab/kota index ini SKIP
        if(!$isFill){
            continue;
        }

        /*
        *   11 --> ada 11 checkbox untuk input data,
        *   index ke-2 sampai ke-10 merupakan BMKG Jam 7 sampai SMARTCLIM Jam 19
        */
        for($i = 0; $i < 11; $i++){
            if(!isset($data[$i])){
                $data[$i] = '0';
            }
        }

        $post_data = $db->query("INSERT INTO `prediksi_potensi_banjir` (
                                                    `tgl_prediksi`,
                                                    `kode_kab`,
                                                    `awas_banjir_pu`,
                                                    `awas_banjir_sc`,
                                                    `bmkg_7`,
                                                    `bmkg_13`,
                                                    `bmkg_19`, 
                                                    `sc_cuaca_7`, 
                                                    `sc_cuaca_13`, 
                                                    `sc_cuaca_19`, 
                                                    `sc_warning_7`, 
                                                    `sc_warning_13`, 
                                                    `sc_warning_19`)
                                        
                                        VALUES (
                                                    '$today',
                                                    '$kode_kab', 
                                                    '$data[0]', 
                                                    '$data[1]', 
                                                    '$data[2]', 
                                                    '$data[3]', 
                                                    '$data[4]', 
                                                    '$data[5]', 
                                                    '$data[6]', 
                                                    '$data[7]', 
                                                    '$data[8]', 
                                                    '$data[9]', 
                                                    '$data[10]')");
            
        if($post_data){
            echo("<center><h3>INPUT DATA BANJIR ".$kode_kab." BERHASIL!</h3></center><hr>");
        }else{
            echo("<center><h3>INPUT DATA BANJIR ".$kode_kab." <b>GAGAL</b>!</h3></center><hr>");
        }
    
    }// END foreach "# INPUT Data Banjir"
    
    ################################################################################

    # INPUT Data Longsor
    foreach($select_kabkota as $kabkota){
        $data = $_POST['longsorkab'.$kabkota['kode_kab']];
        $kode_kab = $kabkota['kode_kab'];
        $isFill = false;

        # Cek Apakah ada data dari index ke-2 sampai ke-10, jika tidak SKIP
        for($j = 2; $j <= 10; $j++){
            if(isset($data[$j])){
                $isFill = true;
                break;
            }
        }

        # Jika Data tidak ada, maka data kab/kota index ini SKIP
        if(!$isFill){
            continue;
        }

        /*
        *   11 --> ada 11 checkbox untuk input data,
        *   index ke-2 sampai ke-10 merupakan BMKG Jam 7 sampai SMARTCLIM Jam 19
        */
        for($i = 0; $i < 11; $i++){
            if(!isset($data[$i])){
                $data[$i] = '0';
            }
        }

        $post_data = $db->query("INSERT INTO `prediksi_potensi_longsor` (
                                                    `tgl_prediksi`,
                                                    `kode_kab`,
                                                    `awas_longsor_pu`,
                                                    `awas_longsor_sc`,
                                                    `bmkg_7`,
                                                    `bmkg_13`,
                                                    `bmkg_19`, 
                                                    `sc_cuaca_7`, 
                                                    `sc_cuaca_13`, 
                                                    `sc_cuaca_19`, 
                                                    `sc_warning_7`, 
                                                    `sc_warning_13`, 
                                                    `sc_warning_19`)
                                        
                                        VALUES (
                                                    '$today',
                                                    '$kode_kab', 
                                                    '$data[0]', 
                                                    '$data[1]', 
                                                    '$data[2]', 
                                                    '$data[3]', 
                                                    '$data[4]', 
                                                    '$data[5]', 
                                                    '$data[6]', 
                                                    '$data[7]', 
                                                    '$data[8]', 
                                                    '$data[9]', 
                                                    '$data[10]')");
            
        if($post_data){
            echo("<center><h3>INPUT DATA LONGSOR ".$kode_kab." BERHASIL!</h3></center><hr>");
        }else{
            echo("<center><h3>INPUT DATA LONGSOR ".$kode_kab." <b>GAGAL</b>!</h3></center><hr>");
        }
    
    }// END foreach "# INPUT Data Longsor"

}else{

    // Jika gagal POST data ke DB
    echo("Gagal menyimpan data ke Database. Silahkan kontak Developer: (Habibie Ed Dien) +62811-3200-670. :-)");

}

?>