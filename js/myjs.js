function showKabKota(str) {
    if (str == "") {
        document.getElementById("data_tabel").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("data_tabel").innerHTML = this.responseText;
                $("#idprov").attr("value", str);
            }
        };
        xmlhttp.open("GET", "./php_class/get_kabkota.php?id=" + str, true);
        xmlhttp.send();
    }
}

$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();
/*
    $("#save_data").click(function (event) {
        if (!confirm('Apakah Anda Yakin ingin menyimpan Data?'))
            event.preventDefault();
    });
*/
});