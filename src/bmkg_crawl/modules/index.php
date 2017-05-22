<html>
    <?php
	date_default_timezone_set('Asia/Jakarta');
        # Generate tanggal besok
        $datetime = new DateTime('tomorrow');
        $besok = $datetime->format('d-m-Y');
    ?>
    <head>
        <title>Crawl Prakiraan Cuaca BMKG Besok</title>
    </head>
    <body>
        <h3>Proses Ekstraksi Data Prakiraan Cuaca BMKG untuk Besok Tanggal <?php echo $besok; ?></h3>
        <iframe src="http://siaga.bnpb.go.id/bmkg/" width="0%" height="0%"></iframe>
    </body>
</html>
