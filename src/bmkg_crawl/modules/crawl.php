<?PHP
/**
*   This CRAWL Class created by http://www.habibie.tk
*   email: habibie.tk@gmail.com
*
*   This class made for crawl weather forecast from http://www.bmkg.go.id
*/
require_once('simple_html_dom.php');
error_reporting(1);

class CRAWL{

    # URL utama yang akan di crawl
    protected static $MAIN_URL;
    protected static $NOMOR = 1;
    
    /**
    * Constructor
    * CLASS CRAWL
    */
    function __construct($url){
        # URL utama disimpan melalui konstruktor
        self::$MAIN_URL = $url;
    }

    /**
    * Get Access URL Connect
    * @return False or True
    */
    public function connect($url){
        $headers = @get_headers($url);
	    
        if($headers[0] == 'HTTP/1.1 200 OK'){
            return TRUE;
        }else{
            return FALSE;
        }
            
    }

    /**
    * Crawling Setiap Provinsi
    */
    public function crawl_prov(){        
        # Proses crawl URL 34 Prov yang sukses
        for($i = 1; $i <= 34; $i++){
            if( $this -> connect (self::$MAIN_URL.''.$i) ){ # Jika URL Respon OK
                $this -> get_data_prov($i);
            }
        }
    }

    /**
    * Get Data Per Provinsi
    * @return Arrays
    */
    public function get_data_prov($ID){
        # Menampung data 1 provinsi
        $data = array();

        # Crawling setiap URL dengan ID Provinsi
        $url = self::$MAIN_URL.''.$ID;
        $site = file_get_html($url);

        # Ambil Nama Provinsi
        $prov = $site->find('h2[class=blog-grid-title-lg]', 0);
        $prov = $prov->plaintext;

        # Cek Ketersediaan Data di TabPanePaneCuaca1
        $tab = $site->find('div[id=TabPaneCuaca1]');

        if( count($tab) == 1 ){
            # Berarti Data Prakiraan besok ada di TabPaneCuaca2
            $this -> data_in_table($site, '2', $prov, $ID);
        }else{
            # Berarti Data Prakiraan besok ada di TabPaneCuaca3
            $this -> data_in_table($site, '3', $prov, $ID);
        }

        return $data;
    }

    /**
    * Cetak Isi Data Tabel
    */
    function data_in_table($site, $no, $prov, $ID){
        # Tentukan TabPaneCuaca
        $tab = '#TabPaneCuaca'.$no;

        foreach($site->find($tab) as $table){
                $html = str_get_html($table->outertext);
                $i = 1;
                foreach($html->find('td') as $td){
                        # Untuk nomor baris di tabel
                        if($i == 1){
                            echo '<tr><td>'.self::$NOMOR.'</td><td>'.$prov.'</td>';
                            self::$NOMOR++;
                        }

                        # Ambil data nama Kota beserta prakiraan cuaca
                        $text = $td->plaintext;

                        switch($i){
                                case 1: echo '<td>'.$text.'</td>'; break;
                                case 2: echo '<td>'.$this->validasi_hujan( $text ).'</td>'; break;
                                case 3: echo '<td>'.$this->validasi_hujan( $text ).'</td>'; break;
                                case 4: echo '<td>'.$this->validasi_hujan( $text ).'</td>'; break;
                                case 5: echo '<td>'.$this->validasi_hujan( $text ).'</td>'; break;
                        }

                        $i++;
                        if($i == 8){ $i = 1; echo '<td>'.self::$MAIN_URL.''.$ID.'</td></tr>'; }
                }
        }        
    }

    /**
    * Validasi Hujan
    * Jika 'Hujan Petir' or 'Hujan Sedang' or 'Hujan Lebat' maka ditulis sebagai 'Hujan'
    */
    function validasi_hujan($cuaca){
        if ( strpos($cuaca, 'Hujan Petir') !== false ) {
            $cuaca = 'Hujan';
        }else if ( strpos($cuaca, 'Hujan Lebat') !== false ) {
            $cuaca = 'Hujan';
        }else if ( strpos($cuaca, 'Hujan Sedang') !== false ) {
            $cuaca = 'Hujan';
        }else{
            $cuaca = '-';
        }

        return $cuaca;
    }

} // END CRAWL Class

?>