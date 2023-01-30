//untuk mengecek apakah lib jquery ter-load
function check() {
    if(window.jQuery){
        alert("jquery is loaded");
    }
    else {
        alert("jquery is not loaded");
    }
};

//function-function yang diperlukan
function bukaKamera() {
    $("#dialogbox_kamera").removeClass("hidden");
    Webcam.set({
        image_format: 'png',
        png_quality: 90
    });
    Webcam.attach('#kamera_popup');
};

function tutupKamera() {
    $("#dialogbox_kamera").addClass("hidden");
    $("#btn_simpan_gambar").hide();
    $("#btn_batal_gambar").hide();
    $("#btn_ambil_gambar").show();
    Webcam.reset();
};

function ambilGambar() {
    $("#btn_simpan_gambar").show();
    $("#btn_batal_gambar").show();
    $("#btn_ambil_gambar").hide();
    Webcam.freeze();
};

function batalGambar() {
    Webcam.unfreeze();
    $("#btn_simpan_gambar").hide();
    $("#btn_batal_gambar").hide();
    $("#btn_ambil_gambar").show();
};

function simpanGambar() {
    //cek apakah sudah ada foto sebelumnya, jika ada maka hapus dulu
    if($("#gbr_form").length) {
        $("#gbr_form").remove();
    };

    $("#canvas").attr({
        "width": $("#kamera_popup").css("width"),
        "height": $("#kamera_popup").css("height")
    })

    var canvas_ctx = document.getElementById("canvas").getContext("2d");
    Webcam.snap( function(data_uri) {
        var image = new Image();
        image.onload = function() {
            canvas_ctx.drawImage(image, 0, 0);
        };
        image.src = data_uri;	
        $('#div_gbr_form').append('<img src="'+data_uri+'" id="gbr_form" class="object-cover">');	
    });
    $("#foto").val("ada");
    $("#icon_gbr_form").hide();
    //$("#canvas").show();
    $("#dialogbox_kamera").addClass("hidden");
    $("#btn_simpan_gambar").hide();
    $("#btn_batal_gambar").hide();
    $("#btn_ambil_gambar").show();
    Webcam.reset();
}

//Memunculkan input text ketika user memilih opsi "Lainnya"
function pekerjaanLain(e) {
    if (e.target.value == "lainnya") {
        var elm1 = document.getElementById("div_pekerjaan_lain");
        var elm2 = document.getElementById("pekerjaan");
        elm1.classList.remove("hidden");
        elm2.classList.add("hidden");
    }
};

function backPekerjaanLain() {
    document.getElementById("pekerjaan_lain").value = "";
    var elm1 = document.getElementById("div_pekerjaan_lain");
    var elm2 = document.getElementById("pekerjaan");
    elm1.classList.add("hidden");
    elm2.classList.remove("hidden");
};

function keperluanLain(e) {
    if (e.target.value == "lainnya") {
        var elm1 = document.getElementById("div_keperluan_lain");
        var elm2 = document.getElementById("keperluan");
        elm1.classList.remove("hidden");
        elm2.classList.add("hidden");
    }
};

function backKeperluanLain() {
    document.getElementById("keperluan_lain").value = "";
    var elm1 = document.getElementById("div_keperluan_lain");
    var elm2 = document.getElementById("keperluan");
    elm1.classList.add("hidden");
    elm2.classList.remove("hidden");
}

function instansiLain(e) {
    if (e.target.value == "lainnya") {
        var elm1 = document.getElementById("div_instansi_lain");
        var elm2 = document.getElementById("instansi");
        elm1.classList.remove("hidden");
        elm2.classList.add("hidden");
    }
};

function backInstansiLain() {
    document.getElementById("instansi_lain").value = "";
    var elm1 = document.getElementById("div_instansi_lain");
    var elm2 = document.getElementById("instansi");
    elm1.classList.add("hidden");
    elm2.classList.remove("hidden");
};

var is_all_validate = true;

function validateNoHP(nomor) {
    const re = /^\d*[.]?\d*$/;
    return re.test(String(nomor));
};

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

// FUnction ketika form di-submit
$("#form_tamu").off("submit").on("submit", function(event) {
    var foto = $("#foto");
    var nama = $("#nama");
    var no_hp = $("#no_hp");
    var email = $("#email");
    var alamat = $("#alamat");
    var pekerjaan = $("#pekerjaan").find(":selected");
    var pekerjaan_lain = $("#pekerjaan_lain");
    var keperluan = $("#keperluan").find(":selected");
    var keperluan_lain = $("#keperluan_lain");
    var instansi = $("#instansi").find(":selected");
    var instansi_lain = $("#instansi_lain");
    
    var canvas = document.getElementById("canvas");
    var dataURL = canvas.toDataURL();

    //validasi isian form
    if (foto.val() === "") {
        error = foto.parent().children("p.error");
        error.text("mohon lengkapi dengan foto anda");
        error.show();
        is_all_validate = false;
    } else {
        error = foto.parent().children("p.error");
        error.hide();
    }

    if (nama.val() === "") {
        error = nama.parent().children("p.error");
        error.text("mohon lengkapi nama anda");
        error.show();
        is_all_validate = false;
    } else {
        error = nama.parent().children("p.error");
        error.hide();
    }

    if (no_hp.val() === "") {
        error = no_hp.parent().children("p.error");
        error.text("mohon lengkapi nomor hp anda");
        error.show();
        is_all_validate = false;
    } else if (!validateNoHP(no_hp.val())) {
        error = no_hp.parent().children("p.error");
        error.text("masukan nomor hp dengan benar");
        error.show();
        is_all_validate = false;
    } else {
        error = no_hp.parent().children("p.error");
        error.hide();
    }

    if (email.val() === "") {
        error = email.parent().children("p.error");
        error.text("mohon lengkapi email anda");
        error.show();
        is_all_validate = false;
    } else if (!validateEmail(email.val())) {
        error = email.parent().children("p.error");
        error.text("masukan email dengan benar");
        error.show();
        is_all_validate = false;
    } else {
        error = email.parent().children("p.error");
        error.hide();
    }

    if (alamat.val() === "") {
        error = alamat.parent().children("p.error");
        error.text("mohon lengkapi alamat anda");
        error.show();
        is_all_validate = false;
    } else {
        error = alamat.parent().children("p.error");
        error.hide();
    }

    if (pekerjaan.val() === "") {
        error = pekerjaan.parent().parent().children("p.error");
        error.text("mohon lengkapi pekerjaan anda");
        error.show();
        is_all_validate = false;
    } else if (pekerjaan.val() === "lainnya" && pekerjaan_lain.val() === "") {
        error = pekerjaan.parent().parent().children("p.error");
        error.text("mohon lengkapi pekerjaan anda");
        error.show();
        is_all_validate = false;
    } else {
        error = pekerjaan.parent().parent().children("p.error");
        error.hide();
    }

    if (keperluan.val() === "") {
        error = keperluan.parent().parent().children("p.error");
        error.text("mohon lengkapi keperluan anda");
        error.show();
        is_all_validate = false;
    } else if (keperluan.val() === "lainnya" && keperluan_lain.val() === "") {
        error = keperluan.parent().parent().children("p.error");
        error.text("mohon lengkapi keperluan anda");
        error.show();
        is_all_validate = false;
    } else {
        error = keperluan.parent().parent().children("p.error");
        error.hide();
    }

    if (instansi.val() === "") {
        error = instansi.parent().parent().children("p.error");
        error.text("mohon lengkapi instansi anda");
        error.show();
        is_all_validate = false;
    } else if (instansi.val() === "lainnya" && instansi_lain.val() === "") {
        error = instansi.parent().parent().children("p.error");
        error.text("mohon lengkapi instansi anda");
        error.show();
        is_all_validate = false;
    } else {
        error = instansi.parent().parent().children("p.error");
        error.hide();
    }
    
    if (is_all_validate) {
        var data = $("#form_tamu").serialize() + '&img=' + dataURL + '&datauri=' + $("#gbr_form").attr("src ");
        $.ajax({
            type: 'POST',
            url: "aksi.php",
            data: data,
            success: function() {
                $('#container_daftar_pengunjung').load("tampil.php").delay(1000);
                location.reload(true);
                //$(document).load("index.php");
            }
        }).done(function(msg) {
            alert("Data Tersimpan: " + msg);
        });
        event.preventDefault();
		event.stopPropagation();
    } else {
        event.preventDefault();
		event.stopPropagation();
    }
    
});


//Function untuk menghapus data
var id_data = "";
var img_src = "";

$(".btn_hapus").on("click", function() {
    $("#dialogbox_hapus").show();
    id_data = $(this).parent().find("p").attr("id").replace("id_data_","");
    img_src = $(this).parent().parent().parent().find("img").attr("src");
});

$("#btn_batal_hapus").on("click", function() {
    $("#dialogbox_hapus").hide();
    id_data = "";
    img_src = "";
});

$("#btn_hapus_data").off("click").on("click", function(event) {
    event.preventDefault();
	event.stopPropagation();
    data = "id_data=" + id_data + "&img_src=" + img_src;
    $.ajax({
        url: "delete.php",
        type: "POST",
        data: data,
        error: function() {
            alert("Terjadi kesalahan saat menghapus data!");
        },
        success: function() {
            $('#container_daftar_pengunjung').load("tampil.php");
            //alert("Hapus data sukses!");  
        }
    });
    id_data = "";
    img_src = "";
    $("#dialogbox_hapus").hide();
});


$(document).ready(function() {

    //memunculkan ilustrasi ketika data kosong
    if ($('#container_daftar_pengunjung').is(':empty')){
        $("#div_takada_pengunjung").show();
    } else {
        $("#div_takada_pengunjung").hide();
    }


    //fucntion untuk pagination
    $(".page_item").off("click").on("click", function () {
        var mode = this.id.split('_');
        var page = mode[0];
        var records = mode[1];
        $.ajax({
            url: "paging.php",
            method: "POST",
            data: { page: page, records: records },
            success: function (data) {
                $('#container_daftar_pengunjung').html(data);

            }
        })
    });
})





