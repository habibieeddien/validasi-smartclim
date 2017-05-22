<?php
/*
Main URL    : http://www.bmkg.go.id/cuaca/prakiraan-cuaca-indonesia.bmkg?prov=35
prov=1-34   : Merupakan 34 Prov Se-Indonesia
prov=35     : Menampilkan kota-kota besar di setiap prov
*/
ini_set('max_execution_time', 300); #300 seconds = 5 minutes
ini_set('display_errors', 'On'); 
require_once("modules/crawl.php");

# Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

# Generate tanggal besok
$datetime = new DateTime('tomorrow');
$besok = $datetime->format('d-m-Y');

# Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=prakiraan-cuaca-bmkg-untuk-".$besok.".xls");

?>
<table border="1">
	<tr><td colspan="8">Prakiraan Cuaca Untuk Tanggal <?php echo $besok; ?> dari BMKG</td></tr>
    <tr>
		<th>NO.</th>
		<th>PROVINSI</th>
		<th>KOTA</th>
		<th>PAGI</th>
        <th>SIANG</th>
        <th>MALAM</th>
        <th>DINI HARI</th>
        <th>KETERANGAN</th>
	</tr>

<?PHP
# Script START
#$rustart = getrusage();

# TIME_START
$time_start = microtime(true);

# Crawling
$crawl = new CRAWL('http://www.bmkg.go.id/cuaca/prakiraan-cuaca-indonesia.bmkg?prov=');
$crawl->crawl_prov();

# TIME_END
$time_end = microtime(true);
/*
# Script END
function rutime($ru, $rus, $index) {
    return ($ru["ru_$index.tv_sec"]*1000 + intval($ru["ru_$index.tv_usec"]/1000))
     -  ($rus["ru_$index.tv_sec"]*1000 + intval($rus["ru_$index.tv_usec"]/1000));
}

$ru = getrusage();
echo "This process used " . rutime($ru, $rustart, "utime") .
    " ms for its computations\n";
echo "It spent " . rutime($ru, $rustart, "stime") .
    " ms in system calls\n";
*/
//the execution time in seconds
$execution_time = $time_end - $time_start;

//execution time of the script
echo '<tr><td colspan="8"><b>Total Execution Time:</b> '.$execution_time.' seconds</td></tr>';
?>

</table>