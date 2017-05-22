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

function getSingleKabKota(str) {
    if (str == "") {
        document.getElementById("kabkota").innerHTML = "<option value=\"\" selected disabled>Pilih Kab./Kota</option>";
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
                document.getElementById("kabkota").innerHTML = this.responseText;
                document.getElementById("tabel_banjir").innerHTML = "";
            }
        };
        xmlhttp.open("GET", "./php_class/get_singlekabkota.php?id=" + str, true);
        xmlhttp.send();
    }
}

function getSingleDataKabKota(str){
    if (str == "") {
        document.getElementById("tabel_banjir").innerHTML = "";
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
                document.getElementById("tabel_banjir").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "./php_class/get_singledatakabkota.php?id=" + str + "&kabkota=" + $("#kabkota").val(), true);
        xmlhttp.send();
    }
}

function getTglPrediksi(str){
    if (str == "") {
        document.getElementById("tglprediksi").innerHTML = "";
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
                document.getElementById("tglprediksi").innerHTML = this.responseText;
                document.getElementById("tabel_banjir").innerHTML = "";
            }
        };
        xmlhttp.open("GET", "./php_class/get_tglprediksi.php?id=" + str, true);
        xmlhttp.send();
    }
}