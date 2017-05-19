<?PHP
/*
Main URL    : http://www.bmkg.go.id/cuaca/prakiraan-cuaca-indonesia.bmkg?prov=35
prov=1-34   : Merupakan 34 Prov Se-Indonesia
prov=35     : Menampilkan kota-kota besar di setiap prov
*/
ini_set('display_errors', 'On'); 
require_once("crawl.php");

# Script START
$rustart = getrusage();

# TIME_START
$time_start = microtime(true);

# Crawling
$crawl = new CRAWL('http://www.bmkg.go.id/cuaca/prakiraan-cuaca-indonesia.bmkg?prov=');
$crawl->crawl_prov();

# TIME_END
$time_end = microtime(true);

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

//the execution time in seconds
$execution_time = $time_end - $time_start;

//execution time of the script
echo '<br><b>Total Execution Time:</b> '.$execution_time.' seconds';
?>