$("#btn-selesai").addClass("disabled");
$("#btn-viewfile").addClass("disabled");

$(document).on("click", ".btn-viewfile", function (e) {
    e.preventDefault();
    viewfile();
});

$(document).on("click", ".btn-pencarian", function (e) {
    e.preventDefault();
    datapasien();
});

$(document).on("click", ".btn-pencariandoc", function (e) {
    e.preventDefault();
    createddropbox();
});

$("#pencariandoc").on("change", function (e) {
    e.preventDefault();
    createddropbox();
});

$(document).on("click", ".btn-pilihtransaksi", function (e) {
    e.preventDefault();

    $("#btn-selesai").removeClass("disabled");
    $("#btn-viewfile").removeClass("disabled");
    $("#btn-cari").addClass("disabled");

    getdata($(this));
    getsession();
    $('#pilihpasien').modal('hide');

    $filename = url + $("input[name='urlsimpan']").val();
    var $response = jQuery.ajax({ url: $filename, type: 'HEAD', async: false }).status;

    if ($response != 200) {
        toastr["info"]('Folder Tidak Di Temukan, Proses Pembuatan Folder', "INFORMATION");
        createdfolder();
    }

    createddropbox();
});

$(document).on("click", ".btn-view", function (e) {
    e.preventDefault();
    getfilename($(this));
});

$(document).on("click", ".btn-hapusdok", function (e) {
    e.preventDefault();
    getdatahapus($(this));
});

$(function () {
    $('.connectedSortable').sortable({
        placeholder: 'sort-highlight',
        connectWith: '.connectedSortable',
        handle: '.dropzone',
        forcePlaceholderSize: true,
        zIndex: 999999
    })
    $('.connectedSortable .dropzone').css('cursor', 'move')
});

function getdatahapus(btn) {
    var pasienid = btn.attr("data-pasienid");
    var episodeid = btn.attr("data-episodeid");
    var jnsdoc = btn.attr("data-jnsdoc");
    var filename = btn.attr("data-filename");

    $(":hidden[name='pasienid']").val(pasienid);
    $(":hidden[name='episodeid']").val(episodeid);
    $(":hidden[name='jnsdoc']").val(jnsdoc);
    $(":hidden[name='namafile']").val(filename);
}

function getdata(btn) {
    var pasienid = btn.attr("data-pasienid");
    var episodeid = btn.attr("data-episodeid");
    var jenisepisode = btn.attr("data-jenisepisode");
    var jenistransaksi = btn.attr("data-jenistransaksi");
    var mrpas = btn.attr("data-mrpas");
    var namapas = btn.attr("data-namapas");
    var namadokter = btn.attr("data-namadokter");
    var asalpasien = btn.attr("data-asalpasien");
    var tglmasuk = btn.attr("data-tglmasuk");
    var tglkeluar = btn.attr("data-tglkeluar");
    var dirurl = btn.attr("data-dirurl");
    var dirfile = btn.attr("data-dirfile");
    var urlsimpan = btn.attr("data-urlsimpan");

    $(":hidden[name='pasienid']").val(pasienid);
    $(":hidden[name='episodeid']").val(episodeid);
    $(":hidden[name='jenisepisode']").val(jenisepisode);
    $(":hidden[name='urlsimpan']").val(urlsimpan);
    $(":hidden[name='dirurl']").val(dirurl);
    $(":hidden[name='dirfile']").val(dirfile);

    $("#notransaksi").html(episodeid);
    $("#mrpas").html(mrpas);
    $("#namapas").html(namapas);
    $("#namadokter").html(namadokter);
    $("#asalpasien").html(asalpasien);
    $("#tglmasuk").html(tglmasuk);
    $("#tglkeluar").html(tglkeluar);
    $("#jenistransaksi").html(jenistransaksi);
}

function getfilename(btn) {
    var filename = btn.attr("data-dirfile");
    var file = btn.attr("data-filename");
    var extension = file.split('.');
    extension = extension[1];
    console.log(extension);
    var responsefile = jQuery.ajax({ url: filename, type: 'HEAD', async: false }).status;


    if (responsefile === 200) {
        if (extension === 'pdf') {
            viewfile = "<embed src='" + filename + "#toolbar=0&navpanes=0' width='100%' height='100%' type='application/pdf' id='view'>";
        } else {
            viewfile = "<img src='" + filename + "#toolbar=0&navpanes=0' width='100%' id='view'>";
        }
    } else {
        viewfile = "<div class='alert alert-info alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h5><i class='far fa-comment-dots'></i> Information!</h5>Mohon Maaf File Tidak Di Temukan Dalam Sistem</div>";
    }

    $("#viewfile").html(viewfile);
}

function datapasien() {
    var pencarian = $("input[name='pencarian']").val();
    $.ajax({
        url: url + "index.php/upload/datapasien",
        data: { 'pencarian': pencarian },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var listpasien = "";
                var getvariable = "";
                var hasil = data.responResult;

                for (var i in hasil) {

                    getvariable = "  data-pasienid='" + hasil[i].PASIEN_ID + "'" +
                        "  data-episodeid='" + hasil[i].EPISODE_ID + "'" +
                        "  data-jenisepisode='" + hasil[i].JENIS_EPISODE + "'" +
                        "  data-jenistransaksi='" + hasil[i].JENISEPISODE + "'" +
                        "  data-mrpas='" + hasil[i].MRPAS + "'" +
                        "  data-namapas='" + hasil[i].NAMAPASIEN + "'" +
                        "  data-namadokter='" + hasil[i].NAMADOKTER + "'" +
                        "  data-asalpasien='" + hasil[i].ASALPASIEN + "'" +
                        "  data-tglmasuk='" + hasil[i].TGLMASUK + "'" +
                        "  data-tglkeluar='" + hasil[i].TGLKELUAR + "'" +
                        "  data-dirurl='" + hasil[i].DIRURL + "'" +
                        "  data-dirfile='" + hasil[i].DIRFILE + "'" +
                        "  data-urlsimpan='" + hasil[i].URLSIMPAN + "'";

                    listpasien += "<tr>";
                    listpasien += "<td class='text-center align-middle'><a href='#' class='btn-pilihtransaksi' " + getvariable + "><strong>" + hasil[i].EPISODE_ID + "</strong></a></td>";
                    listpasien += "<td class='text-center align-middle'>" + hasil[i].MRPAS + "</td>";
                    listpasien += "<td class='text-left align-middle'>" + hasil[i].NAMAPASIEN + "</td>";
                    listpasien += "<td class='text-left align-middle'>" + hasil[i].ASALPASIEN + "</td>";
                    listpasien += "<td class='text-left align-middle'>" + hasil[i].NAMADOKTER + "</td>";
                    listpasien += "<td class='text-left align-middle'>" + hasil[i].TGLMASUK + "</td>";

                    if (hasil[i].STATUS_EPISODE != '00') {
                        listpasien += "<td class='text-left align-middle'>" + hasil[i].TGLKELUAR + "</td>";
                    } else {
                        listpasien += "<td class='text-left align-middle table-danger'></td>";
                    }

                    listpasien += "</tr>";
                }

                $("#listpasien").html(listpasien);
            }
        }
    });
    return false;
}

function viewfile() {
    $.ajax({
        url: url + "index.php/upload/viewfile",
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var listview = "";
                var getvariable = "";
                var hasil = data.responResult;

                for (var i in hasil) {
                    getvariable = "  data-dirfile='" + url + hasil[i].URLSIMPAN +
                        "' data-pasienid='" + hasil[i].PASIEN_ID +
                        "' data-episodeid='" + hasil[i].EPISODE_ID +
                        "' data-jnsdoc='" + hasil[i].JNS_DOC +
                        "' data-filename='" + hasil[i].NM_FILE +
                        "'>";

                    listview += "<tr>";

                    if (hasil[i].STATUS === '1') {
                        listview += "<td class='text-center'><a class='btn btn-xs btn-hapusdok' data-toggle='modal' data-target='#hapusdokumen' title='Klik Untuk Menghapus Lampiran' " + getvariable + "<i class='far fa-trash-alt text-danger'></i></a></td>";
                    } else {
                        listview += "<td class='text-center'></td>";
                    }

                    listview += "<td class='text-center'>" + hasil[i].TANGGAL + "</td>";
                    listview += "<td><a href='' class='btn-view' " + getvariable + "<strong>" + hasil[i].NAMADOKUMEN + "</strong></a></td>";
                    listview += "</tr>";
                }

                $("#listview").html(listview);
            }
        }
    });
    return false;
}

function getsession() {
    var urlsimpan = $("input[name='urlsimpan']").val();
    var dirurl = $("input[name='dirurl']").val();
    var dirfile = $("input[name='dirfile']").val();
    var pasienid = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    var jenisepisode = $("input[name='jenisepisode']").val();

    $.ajax({
        url: url + "index.php/upload/getsession",
        data: { 'urlsimpan': urlsimpan, 'dirurl': dirurl, 'dirfile': dirfile, 'pasienid': pasienid, 'episodeid': episodeid, 'jenisepisode': jenisepisode },
        method: "POST",
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["error"](data.responDesc, "INFORMATION");
            } else {
                toastr["info"](data.responDesc, "INFORMATION");
            }
        }
    });
    return false;
}

function createddropbox() {
    var pencariandoc = $("input[name='pencariandoc']").val();
    $.ajax({
        url: url + "index.php/upload/createdropbox",
        data: { 'pencariandoc': pencariandoc },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["error"](data.responDesc, "INFORMATION");
            } else {
                $script = "Dropzone.autoDiscover = false;" + data.srcdropzone;
                $("#dropbox").html(data.listdrop);
                $("#scripdropbox").html($script);
            }
        }
    });
}

function createdfolder() {
    $.ajax({
        url: url + "index.php/upload/createfolder",
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["error"](data.responDesc, "INFORMATION");
            } else {
                toastr["info"](data.responDesc, "INFORMATION");
            }
        }
    });
}

$(document).on("submit", "#formhapusdok", function (e) {
    e.preventDefault();
    toastr["info"]('Mohon Menunggu Kami Sedang Melakukan Penyimpanan Data', "INFORMATION");
    var form = $(this), url = $(this).attr("action");
    $.ajax({
        url: url,
        data: form.serialize(),
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            toastr.clear();
            toastr[data.responHead](data.responDesc, "INFORMATION");

            if (data.responCode == "00") {
                viewfile();
            };

            $('#hapusdokumen').modal('hide');
        },
        error: function (jqXHR, exception) {
            console.log(jqXHR);
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = jqXHR.statusText + " [ " + jqXHR.status + " ] ";
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            toastr["error"](msg, "Sorry !");
        }
    });
});