$('#lampiran').on('hidden.bs.modal', function () {
    $("#viewfile").html('');
});

$(document).on("click", ".btn-cari", function (e) {
    e.preventDefault();
    $("#riwayatri > tr").remove();
    riwayatpasien();
});

$('#pencarian').keypress(function (event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        $("#riwayatri > tr").remove();
        riwayatpasien();
    }
});

$(document).on("click", ".btn-lampiran", function (e) {
    e.preventDefault();
    $("#riwayatlampiran > tr").remove();
    getdata($(this));
    lampiran();
});

$(document).on("click", ".btn-rincianbilling", function (e) {
    e.preventDefault();
    $("#tbrincianpasien > tr").remove();
    getdata($(this));
    rincianbilling();
});

$(document).on("click", ".btn-lab", function (e) {
    e.preventDefault();
    $("#listorder > tr").remove();
    $("#resultlab > tr").remove();
    getdata($(this));
    orderlab();
});

$(document).on("click", ".btn-rad", function (e) {
    e.preventDefault();
    $("#listorderrad > tr").remove();
    $("#detailorder > tr").remove();
    getdata($(this));
    orderrad();
});

$(document).on("click", ".btn-detailorderrad", function (e) {
    e.preventDefault();
    gettranscorad($(this));
    detailrad();
});

$(document).on("click", ".btn-expertise", function (e) {
    e.preventDefault();
    gettransrad($(this));
    hasilrad();
});

$(document).on("click", ".btn-result", function (e) {
    e.preventDefault();
    $("#resultlab > tr").remove();
    getpasienidlab($(this));
    resultlab();
});

$(document).on("click", ".btn-chartlab", function (e) {
    e.preventDefault();
    getdatachart($(this));
    chartlab();
});

$(document).on("click", ".btn-konsul", function (e) {
    e.preventDefault();
    $("#konsultasi").html('');
    getdata($(this));
    konsul();
});

$(document).on("click", ".btn-opr", function (e) {
    e.preventDefault();
    $("#laporanok").html('');
    getdata($(this));
    laporanok();
});

$(document).on("click", ".btn-resumeri", function (e) {
    e.preventDefault();
    $("#diagnosa > tr").remove();
    $("#tindakanmedis > tr").remove();
    $("#resumeri > tr").remove();
    $("#lab > tr").remove();
    $("#rad > tr").remove();
    $("#obat > tr").remove();
    $("#tindaklanjut > tr").remove();
    $("#lainnya > tr").remove();
    getdata($(this));
    resumediagnosa();
    resumetindakan();
    resumelab();
    resumerad();
    resumeobat();
    resumeri();
});

$(document).on("click", ".btn-view", function (e) {
    e.preventDefault();
    getfilename($(this));
});

$(document).on("click", ".btn-triase", function (e) {
    e.preventDefault();
    getdata($(this));
    triase();
});

function formaterdesimal(bilangan) {
    var reverse = bilangan.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
}

function getdata(btn) {
    var pasienid = btn.attr("data-pasienid");
    var episodeid = btn.attr("data-episodeid");
    var mrpasien = btn.attr("data-mrpasien");
    var nobpjs = btn.attr("data-nobpjs");
    var namapasien = btn.attr("data-namapasien");
    var tgllahir = btn.attr("data-tgllahir");
    var nosep = btn.attr("data-nosep");
    var politujuan = btn.attr("data-politujuan");
    var namadokter = btn.attr("data-namadokter");
    var provider = btn.attr("data-provider");
    var jenisopr = btn.attr("data-jenisopr");
    var tglkunjungan = btn.attr("data-tglkunjungan");
    var triaseigd = btn.attr("data-triaseigd");


    $(":hidden[name='pasienid']").val(pasienid);
    $(":hidden[name='episodeid']").val(episodeid);
    $(":hidden[name='provider']").val(provider);
    $(":hidden[name='jenisopr']").val(jenisopr);
    $(":hidden[name='triaseigd']").val(triaseigd)

    $("#mrpasienlampiran").html(mrpasien);
    $("#nobpjslampiran").html(nobpjs);
    $("#namapasienlampiran").html(namapasien);
    $("#tgllahirlampiran").html(tgllahir);
    $("#noseplampiran").html(nosep);
    $("#politujuanlampiran").html(politujuan);
    $("#namadokterlampiran").html(namadokter);
    $("#tglkunjunganlampiran").html(tglkunjungan);

    $("#mrpasienbilling").html(mrpasien);
    $("#nobpjsbilling").html(nobpjs);
    $("#namapasienbilling").html(namapasien);
    $("#tgllahirbilling").html(tgllahir);
    $("#nosepbilling").html(nosep);
    $("#politujuanbilling").html(politujuan);
    $("#namadokterbilling").html(namadokter);
    $("#tglkunjunganbilling").html(tglkunjungan);

    $("#mrpasienlab").html(mrpasien);
    $("#nobpjslab").html(nobpjs);
    $("#namapasienlab").html(namapasien);
    $("#tgllahirlab").html(tgllahir);
    $("#noseplab").html(nosep);
    $("#politujuanlab").html(politujuan);
    $("#namadokterlab").html(namadokter);
    $("#tglkunjunganlab").html(tglkunjungan);

    $("#mrpasienrad").html(mrpasien);
    $("#nobpjsrad").html(nobpjs);
    $("#namapasienrad").html(namapasien);
    $("#tgllahirrad").html(tgllahir);
    $("#noseprad").html(nosep);
    $("#politujuanrad").html(politujuan);
    $("#namadokterrad").html(namadokter);
    $("#tglkunjunganrad").html(tglkunjungan);

    $("#mrpasienresume").html(mrpasien);
    $("#nobpjsresume").html(nobpjs);
    $("#namapasienresume").html(namapasien);
    $("#tgllahirresume").html(tgllahir);
    $("#nosepresume").html(nosep);
    $("#politujuanresume").html(politujuan);
    $("#namadokterresume").html(namadokter);
    $("#tglkunjunganresume").html(tglkunjungan);

    $("#mrpasientriase").html(mrpasien);
    $("#nobpjstriase").html(nobpjs);
    $("#namapasientriase").html(namapasien);
    $("#tgllahirtriase").html(tgllahir);
    $("#noseptriase").html(nosep);
    $("#politujuantriase").html(politujuan);
    $("#namadoktertriase").html(namadokter);
    $("#tglkunjungantriase").html(tglkunjungan);

    $("#mrpasienkonsul").html(mrpasien);
    $("#nobpjskonsul").html(nobpjs);
    $("#namapasienkonsul").html(namapasien);
    $("#tgllahirkonsul").html(tgllahir);
    $("#nosepkonsul").html(nosep);
    $("#politujuankonsul").html(politujuan);
    $("#namadokterkonsul").html(namadokter);
    $("#tglkunjungankonsul").html(tglkunjungan);

    $("#mrpasienlapok").html(mrpasien);
    $("#nobpjslapok").html(nobpjs);
    $("#namapasienlapok").html(namapasien);
    $("#tgllahirlapok").html(tgllahir);
    $("#noseplapok").html(nosep);
    $("#politujuanlapok").html(politujuan);
    $("#namadokterlapok").html(namadokter);
    $("#tglkunjunganlapok").html(tglkunjungan);
}

function getpasienidlab(btn) {
    var pasienidlab = btn.attr("data-pasienidlab");
    var sampleid = btn.attr("data-sampleid");

    $(":hidden[name='pasienidlab']").val(pasienidlab);
    $(":hidden[name='sampleid']").val(sampleid);
}

function gettranscorad(btn) {
    var transcorad = btn.attr("data-transcorad");
    $(":hidden[name='transcorad']").val(transcorad);
}

function gettransrad(btn) {
    var transrad = btn.attr("data-transrad");
    $(":hidden[name='transrad']").val(transrad);
}

function getdatachart(btn) {
    var pasienidlab = btn.attr("data-pasienidlab");
    var testid = btn.attr("data-testid");
    var pasienid = btn.attr("data-pasienid");
    var episodeid = btn.attr("data-episodeid");

    $(":hidden[name='pasienidlab']").val(pasienidlab);
    $(":hidden[name='testid']").val(testid);
    $(":hidden[name='pasienid']").val(pasienid);
    $(":hidden[name='episodeid']").val(episodeid);
}

function getfilename(btn) {
    var filename = btn.attr("data-filename");
    var responsefile = jQuery.ajax({ url: filename, type: 'HEAD', async: false }).status;

    if (responsefile === 200) {
        viewfile = "<embed src='" + filename + "#toolbar=0&navpanes=0' width='100%' height='580px' type='application/pdf' id='view'>";
    } else {
        viewfile = "<div class='alert alert-info alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h5><i class='far fa-comment-dots'></i> Information!</h5>Mohon Maaf File Tidak Di Temukan Dalam Sistem</div>";
    }

    $("#viewfile").html(viewfile);
}


function triase() {
    var triaseigd = $("input[name='triaseigd']").val();
    $.ajax({
        url: url + "index.php/ri/triase",
        data: { 'triaseigd': triaseigd },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var hasil = data.responResult;

                for (var i in hasil) {

                    if (hasil[i].ASAL_POS === 'False') {
                        rujuk1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' ><label for='lbltl1' class='custom-control-label'>Puskesmas</label></div>";
                    } else {
                        rujuk1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Puskesmas</label></div>";
                    }

                    if (hasil[i].ASAL_KLI === 'False') {
                        rujuk2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2'><label for='lbltl2' class='custom-control-label'>Klinik</label></div>";
                    } else {
                        rujuk2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2' checked><label for='lbltl2' class='custom-control-label'>Klinik</label></div>";
                    }

                    if (hasil[i].ASAL_RB === 'False') {
                        rujuk3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl3'><label for='lbltl3' class='custom-control-label'>Rumah Bersalin</label></div>";
                    } else {
                        rujuk3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl3' checked><label for='lbltl3' class='custom-control-label'>Rumah Bersalin</label></div>";
                    }

                    if (hasil[i].ASAL_RS === 'False') {
                        rujuk4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>RS / RSUD</label></div>";
                    } else {
                        rujuk4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>RS / RSUD</label></div>";
                    }

                    if (hasil[i].ASAL_LAIN === 'False') {
                        rujuk5 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>Lain-lain</label></div>";
                    } else {
                        rujuk5 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Lain-lain : " + hasil[i].ASAL_LAIN_KET + "</label></div>";
                    }


                    if (hasil[i].MACAM_TRAU === 'False') {
                        kasus1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Trauma</label></div>";
                    } else {
                        kasus1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Trauma</label></div>";
                    }

                    if (hasil[i].MACAM_NONTRAU === 'False') {
                        kasus2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2'><label for='lbltl2' class='custom-control-label'>Non Trauma</label></div>";
                    } else {
                        kasus2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2' checked><label for='lbltl2' class='custom-control-label'>Non Trauma</label></div>";
                    }

                    if (hasil[i].MACAM_VISUM === 'False') {
                        kasus3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl3'><label for='lbltl3' class='custom-control-label'>Permintaan Visum et Repeturn</label></div>";
                    } else {
                        kasus3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl3' checked><label for='lbltl3' class='custom-control-label'>Permintaan Visum et Repeturn</label></div>";
                    }

                    if (hasil[i].MACAM_KLL === 'False') {
                        kasus4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>KLL</label></div>";
                    } else {
                        kasus4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>KLL</label></div>";
                    }

                    if (hasil[i].MACAM_KDRT === 'False') {
                        kasus5 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>KDRT</label></div>";
                    } else {
                        kasus5 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>KDRT</label></div>";
                    }

                    if (hasil[i].MACAM_CHILD === 'False') {
                        kasus6 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4''><label for='lbltl4' class='custom-control-label'>Child Abuse (Kekerasan Anak)</label></div>";
                    } else {
                        kasus6 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Child Abuse (Kekerasan Anak)</label></div>";
                    }

                    if (hasil[i].MACAM_KECELAKAAN === 'False') {
                        kasus7 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>Kecelakaan Kerja</label></div>";
                    } else {
                        kasus7 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Kecelakaan Kerja</label></div>";
                    }

                    if (hasil[i].ALERGI_TIDAK === 'False') {
                        alergi1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>Tidak Ada</label></div>";
                    } else {
                        alergi1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Tidak Ada</label></div>";
                    }

                    if (hasil[i].ALERGI_ADA === 'False') {
                        alergi2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>Ada</label></div>";
                    } else {
                        alergi2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Ada : " + hasil[i].ALERGI_KET + "</label></div>";
                    }

                    if (hasil[i].KU_BAIK === 'False') {
                        ku1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>Baik</label></div>";
                    } else {
                        ku1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Baik</label></div>";
                    }

                    if (hasil[i].KU_SEDANG === 'False') {
                        ku2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>Sedang</label></div>";
                    } else {
                        ku2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Sedang</label></div>";
                    }

                    if (hasil[i].KU_BURUK === 'False') {
                        ku3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>Buruk</label></div>";
                    } else {
                        ku3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Buruk</label></div>";
                    }

                    if (hasil[i].RESIKO_JATUH === 'False') {
                        jatuh = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>Resiko Jatuh</label></div>";
                    } else {
                        jatuh = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Resiko Jatuh</label></div>";
                    }

                    if (hasil[i].AIR_BEBAS === 'False') {
                        airway1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Bebas</label></div>";
                    } else {
                        airway1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Bebas</label></div>";
                    }

                    if (hasil[i].AIR_ASING === 'False') {
                        airway2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2'><label for='lbltl2' class='custom-control-label'>Benda Asing</label></div>";
                    } else {
                        airway2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2' checked><label for='lbltl2' class='custom-control-label'>Benda Asing</label></div>";
                    }

                    if (hasil[i].AIR_SPUTUM === 'False') {
                        airway3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl3'><label for='lbltl3' class='custom-control-label'>Sputum</label></div>";
                    } else {
                        airway3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl3' checked><label for='lbltl3' class='custom-control-label'>Sputum</label></div>";
                    }

                    if (hasil[i].AIR_DARAH === 'False') {
                        airway4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>Darah</label></div>";
                    } else {
                        airway4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Darah</label></div>";
                    }

                    if (hasil[i].AIR_LIDAH === 'False') {
                        airway5 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>Lidah</label></div>";
                    } else {
                        airway5 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Lidah</label></div>";
                    }

                    if (hasil[i].CIRC_PK_KURANG === 'False') {
                        kap1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' ><label for='lbltl1' class='custom-control-label'>Kurang Dari 3 Detik</label></div>";
                    } else {
                        kap1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Kurang Dari 3 Detik</label></div>";
                    }

                    if (hasil[i].CIRC_PK_LEBIH === 'False') {
                        kap2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2' ><label for='lbltl2' class='custom-control-label'>Lebih Dari 3 Detik</label></div>";
                    } else {
                        kap2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2' checked><label for='lbltl2' class='custom-control-label'>Lebih Dari 3 Detik</label></div>";
                    }

                    if (hasil[i].CIRC_EK_HANGAT === 'False') {
                        eks1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Akral Hangat</label></div>";
                    } else {
                        eks1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Akral Hangat</label></div>";
                    }

                    if (hasil[i].CIRC_EK_DINGIN === 'False') {
                        eks2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2'><label for='lbltl2' class='custom-control-label'>Akral Dingin</label></div>";
                    } else {
                        eks2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2' checked><label for='lbltl2' class='custom-control-label'>Akral Dingin</label></div>";
                    }

                    if (hasil[i].CIRC_EK_PUCAT === 'False') {
                        eks3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl3'><label for='lbltl3' class='custom-control-label'>Pucat</label></div>";
                    } else {
                        eks3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl3' checked><label for='lbltl3' class='custom-control-label'>Pucat</label></div>";
                    }

                    if (hasil[i].CIRC_EK_SIANOSIS === 'False') {
                        eks4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>Sianosis</label></div>";
                    } else {
                        eks4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Sianosis</label></div>";
                    }

                    if (hasil[i].KAT_MERAH === 'False') {
                        assessment1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>EMERGENCY (MERAH)</label></div>";
                    } else {
                        assessment1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>EMERGENCY (MERAH)</label></div>";
                    }

                    if (hasil[i].KAT_KUNING === 'False') {
                        assessment2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2'><label for='lbltl2' class='custom-control-label'>URGENT (KUNING)</label></div>";
                    } else {
                        assessment2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2' checked><label for='lbltl2' class='custom-control-label'>URGENT (KUNING)</label></div>";
                    }

                    if (hasil[i].KAT_HIJAU === 'False') {
                        assessment3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl3'><label for='lbltl3' class='custom-control-label'>NON URGENT (HIJAU)</label></div>";
                    } else {
                        assessment3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl3' checked><label for='lbltl3' class='custom-control-label'>NON URGENT (HIJAU)</label></div>";
                    }

                    if (hasil[i].KAT_HITAM === 'False') {
                        assessment4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>MENINGGAL (HITAM)</label></div>";
                    } else {
                        assessment4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>MENINGGAL (HITAM)</label></div>";
                    }

                    if (hasil[i].TIND_PERIKSA === 'False') {
                        tl1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Periksa ke Ruang Pelayanan Non Urgent (False Emergency / Poliklinik / Rawat Jalan)</label></div>";
                    } else {
                        tl1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Periksa ke Ruang Pelayanan Non Urgent (False Emergency / Poliklinik / Rawat Jalan)</label></div>";
                    }

                    if (hasil[i].TIND_PERAWATAN_OBSER === 'False') {
                        tl2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2'><label for='lbltl2' class='custom-control-label'>Perawatan ke Ruang Observasi Pasien Semi Kritis (Urgent / Kuning)</label></div>";
                    } else {
                        tl2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl2' checked><label for='lbltl2' class='custom-control-label'>Perawatan ke Ruang Observasi Pasien Semi Kritis (Urgent / Kuning)</label></div>";
                    }

                    if (hasil[i].TIND_PERIKSA_RESUITASI === 'False') {
                        tl3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl3'><label for='lbltl3' class='custom-control-label'>Perawatan ke Ruang Resuitasi / Kritis (Emergency / Merah)</label></div>";
                    } else {
                        tl3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl3' checked><label for='lbltl3' class='custom-control-label'>Perawatan ke Ruang Resuitasi / Kritis (Emergency / Merah)</label></div>";
                    }

                    if (hasil[i].TIND_JENAZAH === 'False') {
                        tl4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4'><label for='lbltl4' class='custom-control-label'>Kirim ke Ruang Jenazah</label></div>";
                    } else {
                        tl4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl4' checked><label for='lbltl4' class='custom-control-label'>Kirim ke Ruang Jenazah/label></div>";
                    }

                    if (hasil[i].NYERI_1 === 'False') {
                        nyeri1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Skala Nyeri 1</label></div>";
                    } else {
                        nyeri1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Skala Nyeri 1</label></div>";
                    }

                    if (hasil[i].NYERI_2 === 'False') {
                        nyeri2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Skala Nyeri 2</label></div>";
                    } else {
                        nyeri2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Skala Nyeri 2</label></div>";
                    }

                    if (hasil[i].NYERI_3 === 'False') {
                        nyeri3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Skala Nyeri 3</label></div>";
                    } else {
                        nyeri3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Skala Nyeri 3</label></div>";
                    }

                    if (hasil[i].NYERI_4 === 'False') {
                        nyeri4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Skala Nyeri 4</label></div>";
                    } else {
                        nyeri4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Skala Nyeri 4</label></div>";
                    }

                    if (hasil[i].NYERI_5 === 'False') {
                        nyeri5 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Skala Nyeri 5</label></div>";
                    } else {
                        nyeri5 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Skala Nyeri 5</label></div>";
                    }

                    if (hasil[i].NYERI_6 === 'False') {
                        nyeri6 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Skala Nyeri 6</label></div>";
                    } else {
                        nyeri6 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Skala Nyeri 6</label></div>";
                    }

                    if (hasil[i].NYERI_7 === 'False') {
                        nyeri7 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Skala Nyeri 7</label></div>";
                    } else {
                        nyeri7 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Skala Nyeri 7</label></div>";
                    }

                    if (hasil[i].NYERI_8 === 'False') {
                        nyeri8 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Skala Nyeri 8</label></div>";
                    } else {
                        nyeri8 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Skala Nyeri 8</label></div>";
                    }

                    if (hasil[i].NYERI_9 === 'False') {
                        nyeri9 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Skala Nyeri 9</label></div>";
                    } else {
                        nyeri9 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Skala Nyeri 9</label></div>";
                    }

                    if (hasil[i].NYERI_10 === 'False') {
                        nyeri10 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Skala Nyeri 10</label></div>";
                    } else {
                        nyeri10 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Skala Nyeri 10</label></div>";
                    }

                    if (hasil[i].BREAT_IP_NORMAL === 'False') {
                        ip1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Normal Teratur</label></div>";
                    } else {
                        ip1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Normal Teratur</label></div>";
                    }

                    if (hasil[i].BREAT_IP_TACHI === 'False') {
                        ip2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Tachipneu</label></div>";
                    } else {
                        ip2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Tachipneu</label></div>";
                    }

                    if (hasil[i].BREAT_IP_BRAD === 'False') {
                        ip3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Bradipneu</label></div>";
                    } else {
                        ip3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Bradipneu</label></div>";
                    }

                    if (hasil[i].BREAT_IP_APNEU === 'False') {
                        ip4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Apneu</label></div>";
                    } else {
                        ip4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Apneu</label></div>";
                    }

                    if (hasil[i].BREAT_BN_NORMAL === 'False') {
                        nt1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Normal Teratur</label></div>";
                    } else {
                        nt1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Normal Teratur</label></div>";
                    }

                    if (hasil[i].BREAT_BN_WHEE === 'False') {
                        nt2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Wheezing</label></div>";
                    } else {
                        nt2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Wheezing</label></div>";
                    }

                    if (hasil[i].BREAT_BN_STRIDOR === 'False') {
                        nt3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Stridor</label></div>";
                    } else {
                        nt3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Stridor</label></div>";
                    }

                    if (hasil[i].BREAT_BN_RHONKI === 'False') {
                        nt4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Rhonki</label></div>";
                    } else {
                        nt4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Rhonki</label></div>";
                    }

                    if (hasil[i].BREAT_PP_SIMETRIS === 'False') {
                        paru1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Simetris</label></div>";
                    } else {
                        paru1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Simetris</label></div>";
                    }

                    if (hasil[i].BREAT_PP_ASIMETRIS === 'False') {
                        paru2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Asimetris</label></div>";
                    } else {
                        paru2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Asimetris</label></div>";
                    }

                    if (hasil[i].BREAT_OTOT_BAHU === 'False') {
                        otot1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Bahu di Angkat</label></div>";
                    } else {
                        otot1 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Bahu di Angkat</label></div>";
                    }

                    if (hasil[i].BREAT_OTOT_DADA === 'False') {
                        otot2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Pernafasan Dada</label></div>";
                    } else {
                        otot2 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Pernafasan Dada</label></div>";
                    }

                    if (hasil[i].BREAT_OTOT_HIDUNG === 'False') {
                        otot3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Cuping Hidung</label></div>";
                    } else {
                        otot3 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Cuping Hidung</label></div>";
                    }

                    if (hasil[i].BREAT_OTOT_PERUT === 'False') {
                        otot4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1'><label for='lbltl1' class='custom-control-label'>Pernafasan Perut</label></div>";
                    } else {
                        otot4 = "<div class='custom-control custom-checkbox'><input class='custom-control-input' type='checkbox' id='lbltl1' checked><label for='lbltl1' class='custom-control-label'>Pernafasan Perut</label></div>";
                    }

                    $("#rujuk").html(rujuk1 + rujuk2 + rujuk3 + rujuk4 + rujuk5);
                    $("#kasus").html(kasus1 + kasus2 + kasus3 + kasus4 + kasus5 + kasus6 + kasus7);
                    $("#alergi").html(alergi1 + alergi2);
                    $("#anam").html(hasil[i].ANAMNESIS);
                    $("#ku").html(ku1 + ku2 + ku3);
                    $("#e").html(hasil[i].K_E);
                    $("#m").html(hasil[i].K_V);
                    $("#v").html(hasil[i].K_M);
                    $("#bb").html(hasil[i].BB + " Kg");
                    $("#tb").html(hasil[i].TB + " Cm");
                    $("#nadi").html(hasil[i].FND + " x/menit");
                    $("#nafas").html(hasil[i].FNF + " x/menit");
                    $("#td").html(hasil[i].TD + "/" + hasil[i].DISTOL + " mmHg");
                    $("#suhu").html(hasil[i].SUHU + " &degC");
                    $("#jatuh").html(jatuh);
                    $("#nyeri").html(nyeri1 + nyeri2 + nyeri3 + nyeri4 + nyeri5 + nyeri6 + nyeri7 + nyeri8 + nyeri9 + nyeri10);
                    $("#airway").html(airway1 + airway2 + airway3 + airway4 + airway5);
                    $("#ip").html(ip1 + ip2 + ip3 + ip4);
                    $("#nt").html(nt1 + nt2 + nt3 + nt4);
                    $("#paru").html(paru1 + paru2);
                    $("#otot").html(otot1 + otot2 + otot3 + otot4);
                    $("#kap").html(kap1 + kap2);
                    $("#eks").html(eks1 + eks2 + eks3 + eks4);
                    $("#assesment").html(assessment1 + assessment2 + assessment3 + assessment4);
                    $("#tl").html(tl1 + tl2 + tl3 + tl4);

                    $("#tgljambuat").html(hasil[i].JAMBUAT);
                    $("#dibuatoleh").html(hasil[i].DIBUATOLEH);
                }
            }
        }
    });
    return false;
}

function riwayatpasien() {
    var search = $("input[name='pencarian']").val();
    $.ajax({
        url: url + "index.php/ri/riwayatpasienri",
        data: { 'search': search },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var riwayatri = "";
                var groupbtn = "";
                var btnlampiran = "";
                var btnrincianbilling = "";
                var btnlab = "";
                var btnrad = "";
                var btntriase = "";
                var btnresume = "";
                var btnkonsul = "";
                var btnopr = "";
                var btnlap = "";
                var getvariable = "";
                var hasil = data.responResult;

                for (var i in hasil) {

                    getvariable = "  data-pasienid='" + hasil[i].PASIEN_ID + "'" +
                        "  data-episodeid='" + hasil[i].EPISODE_ID + "'" +
                        "  data-mrpasien='" + hasil[i].REKAM_MEDIS + "'" +
                        "  data-nobpjs='" + hasil[i].BPJS_NO + "'" +
                        "  data-namapasien='" + hasil[i].NAMA_PASIEN + "'" +
                        "  data-tgllahir='" + hasil[i].TGLLAHIR + "'" +
                        "  data-nosep='" + hasil[i].SEP + "'" +
                        "  data-politujuan='" + hasil[i].RUANG_RAWAT + "'" +
                        "  data-namadokter='" + hasil[i].DOKTER + "'" +
                        "  data-provider='" + hasil[i].REKANAN + "'" +
                        "  data-jenisopr='" + hasil[i].JENISOPERASI + "'" +
                        "  data-triaseigd='" + hasil[i].TRANSIDTRIASE + "'" +
                        "  data-tglkunjungan='" + hasil[i].TGLMASUK + "'";

                    btnlampiran = "<a class='btn btn-danger btn-sm btn-lampiran text-white' data-toggle='modal' data-target='#lampiran' " + getvariable + "><i class='far fa-file-pdf'></i> ATTACH</a>";
                    btnrincianbilling = "<a class='btn btn-success btn-sm btn-rincianbilling text-white' data-toggle='modal' data-target='#rincianbilling' " + getvariable + "><i class='fas fa-coins'></i> BILLING</a>";

                    if (hasil[i].JMLLAB != '0') {
                        btnlab = "<a class='btn btn-warning btn-sm btn-lab' data-toggle='modal' data-target='#orderlab' " + getvariable + "><i class='fas fa-flask'></i> LAB</a>";
                    } else {
                        btnlab = "";
                    }

                    if (hasil[i].JMLRAD != '0') {
                        btnrad = "<a class='btn btn-primary btn-sm btn-rad text-white' data-toggle='modal' data-target='#orderrad' " + getvariable + "><i class='fas fa-radiation'></i> RAD</a>";
                    } else {
                        btnrad = "";
                    }

                    if (hasil[i].JMLRESUME != '0') {
                        btnresume = "<a class='btn btn-secondary btn-sm btn-resumeri text-white' data-toggle='modal' data-target='#resumerj' " + getvariable + "><i class='fas fa-file-medical'></i> RESUME</a>";
                    } else {
                        btnresume = "";
                    }

                    if (hasil[i].JMLKONSUL != '0') {
                        btnkonsul = "<a class='btn btn-primary btn-sm btn-konsul text-white' data-toggle='modal' data-target='#konsul' " + getvariable + "><i class='fas fa-user-md'></i> KONSUL</a>";
                    } else {
                        btnkonsul = "";
                    }

                    if (hasil[i].JMLOPR === '0') {
                        btnopr = "";
                    } else {
                        if (hasil[i].JENISOPERASI === '01') {
                            btnopr = "<a class='btn btn-warning btn-sm btn-opr' data-toggle='modal' data-target='#oprri' " + getvariable + "><i class='fas fa-procedures'></i> PERSALINAN</a>";
                        } else {
                            btnopr = "<a class='btn btn-warning btn-sm btn-opr' data-toggle='modal' data-target='#oprri' " + getvariable + "><i class='fas fa-procedures'></i> OPERASI</a>";
                        }
                    }

                    if (hasil[i].TRANSIDTRIASE != null) {
                        btntriase = "<a class='btn btn-primary btn-sm btn-triase text-white' data-toggle='modal' data-target='#triase' " + getvariable + "><i class='fas fa-file-medical'></i> TRIASE IGD</a>";
                    } else {
                        btntriase = "";
                    }

                    groupbtn = "<div class='btn-group'>" +
                        btnrincianbilling +
                        btnkonsul +
                        btnopr +
                        btntriase +
                        btnlampiran +
                        "</div>";

                    riwayatri += "<tr>";
                    riwayatri += "<td class='text-left align-middle'><div>MR : " + hasil[i].REKAM_MEDIS + "</div><hr class='my-1'><div>NO BPJS : " + hasil[i].BPJS_NO + "</div><hr class='my-1'><div>NAMA : " + hasil[i].NAMA_PASIEN + "</div></td>";

                    if (hasil[i].SEP != null) {
                        riwayatri += "<td class='text-left align-middle'><div>NO EPISODE : " + hasil[i].EPISODE_ID + "</div><hr class='my-1'><div>NO SEP : " + hasil[i].SEP + "</div></td>";
                    } else {
                        riwayatri += "<td class='text-left align-middle'><div>NO EPISODE : " + hasil[i].EPISODE_ID + "</div><hr class='my-1'><div>NO SEP : -</div></td>";
                    }

                    riwayatri += "<td class='text-left align-middle'><div>" + hasil[i].RUANG_RAWAT + "</div><hr class='my-1'><div>" + hasil[i].DOKTER + "</div></td>";
                    riwayatri += "<td class='text-center align-middle'>" + hasil[i].TGLMASUK + "</td>";
                    riwayatri += "<td class='text-center align-middle'>" + hasil[i].TGLKELUAR + "</td>";

                    if (hasil[i].ACC_CSMX === 'Y') {
                        riwayatri += "<td class='align-middle'>" + groupbtn + "</td>";
                    } else {
                        riwayatri += "<td class='align-middle font-italic font-weight-bold'>Menunggu Approval Casemix</td>";
                    }

                    riwayatri += "</tr>";
                }

                $("#riwayatri").html(riwayatri);
            }
        }
    });
    return false;
}
$(document).on("change", "#itemlampiran", function () {
    var l = $("[id='itemlampiran']:checked").length;
    if ($("[id='itemlampiran']:checked").length === $("[id='itemlampiran']").length) {
        $("#checkalllampiran").prop('checked', true);
    } else {
        $("#checkalllampiran").prop('checked', false);
    }
    if (l > 0) {
        $("#download-lampiran").prop('disabled', false);
    } else {
        $("#download-lampiran").prop('disabled', true);
    }
})
$(document).on("click", "#download-lampiran", function (e) {
    var listattach = [];
    var nosep = $("#noseplampiran").text();
    $("[id='itemlampiran']:checked").each(function (i) {
        var namadokumen = $(this).attr("data-namadokumen");
        var namefile = $(this).attr("data-namefile");
        var urldir = $(this).attr("data-urldir");
        var nosep = $(this).attr("data-nosep");
        /*   if (namadokumen === 'SEP') {
              createdsep(nosep, urldir, namefile);
          } */
        listattach[i] = $(this).attr('data-file');
    })
    setTimeout(() => {
        location.href = url + 'index.php/Rj/mergepdf?name=' + nosep + '&listattach=' + listattach.join(',');
    }, 1000);
});
$(document).on('change', '#checkalllampiran', function () {
    if ($(this).is(':checked')) {
        $("[id='itemlampiran']").prop('checked', true);
    } else {
        $("[id='itemlampiran']").prop('checked', false);
    }
    var l = $("[id='itemlampiran']:checked").length;
    if (l > 0) {
        $("#download-lampiran").prop('disabled', false);
    } else {
        $("#download-lampiran").prop('disabled', true);
    }
})
function lampiran() {
    $("#checkalllampiran").prop('checked', true);
    $("#download-lampiran").prop('disabled', false);
    var pasienid = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    var nosep = $("#noseplampiran").text();
    $.ajax({
        url: url + "index.php/rj/lampiran",
        data: { 'pasienid': pasienid, 'episodeid': episodeid, nosep: nosep },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            console.log(data);
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var urls = "http://simrs.rsudpm.local/e-research/";
                var riwayatlampiran = "";
                var getvariable = "";
                var hasil = data.responResult;

                for (var i in hasil) {
                    var urllink = '';

                    if (hasil[i].NAMEFILE === 'RADIOLOGI') {
                        getvariable = "  data-filename='" + url + hasil[i].FILENAME + "'";
                        urllink = hasil[i].FILENAME;
                    } else {
                        if (hasil[i].NAMEFILE === 'EKLAIMNEW') {
                            urllink = url + "index.php/rj/showeklaim?nosep=" + hasil[i].SEP;
                            getvariable = "  data-filename='" + urllink + "'";
                        } else {
                            getvariable = "  data-filename='" + url + hasil[i].FILENAME + "'";
                            urllink = url + hasil[i].FILENAME;
                        }
                    }


                    riwayatlampiran += "<tr>";
                    if (jenisuser !== 'JLEV7') {
                        riwayatlampiran += `<td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="itemlampiran" value="option1" ` + getvariable + ` checked data-file="` + urllink + `">
                                                <label class="form-check-label">
                                                    <a href='#' class='btn-view' ` + getvariable + `>` + hasil[i].NAMADOKUMEN + `</a>
                                                </label>
                                            </div>
                                        </td>`
                    } else {
                        if (hasil[i].NAMEFILE !== 'RADIOLOGI' && hasil[i].NAMADOKUMEN !== 'TRIAGE') {
                            riwayatlampiran += "<td><strong><a href='#' class='btn-view' " + getvariable + ">" + hasil[i].NAMADOKUMEN + "</a></strong></td>";
                        }
                    }
                    riwayatlampiran += "</tr>";
                }

                $("#riwayatlampiran").html(riwayatlampiran);
            }
        }
    });
    return false;
}

function rincianbilling() {
    var pasienid = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
        url: url + "index.php/ri/rincianbilling",
        data: { 'pasienid': pasienid, 'episodeid': episodeid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var rincianbilling = "";
                var hasil = data.responResult;

                for (var i in hasil) {
                    rincianbilling += "<tr>";
                    if (hasil[i].JENIS === '1') {
                        rincianbilling += "<td class='text-center align-middle table-danger font-weight-bold' colspan='7'>" + hasil[i].KODE + "</td>";
                    } else {
                        if (hasil[i].JENIS === '2') {
                            rincianbilling += "<td class='text-center align-middle'>" + hasil[i].TRANS_ID + "</td>";
                            rincianbilling += "<td class='text-center align-middle'>" + hasil[i].TANGGAL + "</td>";
                            if (hasil[i].TYPE === '00' || hasil[i].TYPE === '02') {
                                if (hasil[i].SIGNADOKTER != null) {
                                    rincianbilling += "<td class='text-left align-middle'><div>" + hasil[i].KETERANGAN + "</div><div class='text-left font-weight-bold font-italic'>" + hasil[i].SIGNADOKTER + "</div></td>";
                                } else {
                                    rincianbilling += "<td class='text-left align-middle'>" + hasil[i].KETERANGAN + "</td>";
                                }
                            } else {
                                rincianbilling += "<td class='text-left align-middle'>" + hasil[i].KETERANGAN + "</td>";
                            }
                            rincianbilling += "<td class='text-center align-middle'>" + formaterdesimal(hasil[i].QTY) + "</td>";
                            if (hasil[i].KODE === 'FARMASI') {
                                if (hasil[i].SATUAN != null) {
                                    rincianbilling += "<td class='text-center align-middle'>" + hasil[i].SATUAN + "</td>";
                                } else {
                                    rincianbilling += "<td class='text-center align-middle'></td>";
                                }
                            } else {
                                rincianbilling += "<td class='text-center align-middle'></td>";
                            }
                            rincianbilling += "<td class='text-right align-middle'>" + formaterdesimal(hasil[i].HARGA_SATUAN) + "</td>";
                            rincianbilling += "<td class='text-right align-middle'>" + formaterdesimal(hasil[i].SUBTOTAL) + "</td>";
                        } else {
                            if (hasil[i].JENIS === '3') {
                                rincianbilling += "<td class='text-right font-weight-bold align-middle table-danger' colspan='6'>SUB TOTAL " + hasil[i].KODE + " </td>";
                                rincianbilling += "<td class='text-right font-weight-bold align-middle table-danger'>" + formaterdesimal(hasil[i].SUBTOTAL) + "</td>";
                            } else {
                                rincianbilling += "<td class='text-right font-weight-bold align-middle table-primary' colspan='6'>GRAND TOTAL</td>";
                                rincianbilling += "<td class='text-right font-weight-bold align-middle table-primary'>" + formaterdesimal(hasil[i].SUBTOTAL) + "</td>";
                            }
                        }
                    }
                    rincianbilling += "</tr>";
                }

                $("#tbrincianpasien").html(rincianbilling);
            }
        }
    });
    return false;
}

function orderlab() {
    var pasienid = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
        url: url + "index.php/rj/orderlab",
        data: { 'pasienid': pasienid, 'episodeid': episodeid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var orderlab = "";
                var getvariable = "";
                var hasil = data.responResult;

                for (var i in hasil) {
                    getvariable = "  data-pasienidlab='" + hasil[i].PASIENIDLAB + "'" +
                        "  data-sampleid='" + hasil[i].SAMPELID + "'";

                    orderlab += "<tr>";
                    orderlab += "<td class='text-center'><strong><a href='#' class='btn-result'" + getvariable + ">" + hasil[i].TRANS_CO + "</a></strong></td>";
                    orderlab += "<td>" + hasil[i].DOKTER + "</td>";
                    // orderlab +="<td class='text-center'>"+hasil[i].TANGGAL+"</td>";
                    orderlab += "</tr>";
                }

                $("#listorder").html(orderlab);
            }
        }
    });
    return false;
}

function resultlab() {
    var pasienidlab = $("input[name='pasienidlab']").val();
    var sampleid = $("input[name='sampleid']").val();
    $.ajax({
        url: url + "index.php/rj/resultlab",
        data: { 'pasienidlab': pasienidlab, 'sampleid': sampleid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var resultlab = "";
                var btnchart = "";
                var getvariable = "";
                var hasil = data.responResult;

                for (var i in hasil) {
                    getvariable = "  data-pasienidlab='" + hasil[i].PASIEN_ID + "'" +
                        "  data-testid='" + hasil[i].TEST_ID + "'" +
                        "  data-pasienid='" + hasil[i].PASIENID + "'" +
                        "  data-episodeid='" + hasil[i].EPISODEID + "'";

                    if (hasil[i].JML === '0') {
                        btnchart = "";
                    } else {
                        btnchart = "<a class='btn btn-sm btn-chartlab' data-toggle='modal' data-target='#chartlab' title='CHART'" + getvariable + "><i class='fas fa-chart-line text-success'></i></a>";
                    }

                    resultlab += "<tr>";
                    if (hasil[i].DONE_STATUS === null) {
                        if (hasil[i].ITEM_LEVEL === '2') {
                            resultlab += "<td class='text-left align-middle font-weight-bold' colspan='7'>" + hasil[i].NAMA_TES + "</td>";
                        } else {
                            resultlab += "<td class='text-left align-middle font-weight-bold font-italic' colspan='7'>" + hasil[i].NAMA_TES + "</td>";
                        }
                    } else {
                        if (hasil[i].ITEM_LEVEL === '3') {
                            resultlab += "<td class='text-left align-middle'> - " + hasil[i].NAMA_TES + "</td>";
                        } else {
                            resultlab += "<td class='text-left align-middle'> * " + hasil[i].NAMA_TES + "</td>";
                        }

                        resultlab += "<td class='text-center align-middle'>" + hasil[i].RESULT_VALUE + "</td>";

                        if (hasil[i].UNITS === null) {
                            resultlab += "<td></td>";
                        } else {
                            resultlab += "<td class='text-center align-middle'>" + hasil[i].UNITS + "</td>";
                        }

                        if (hasil[i].ANGKA_NORMAL != null) {
                            if (hasil[i].RESULT_FLAG === 'H') {
                                resultlab += "<td class='text-center align-middle'><i class='fas fa-arrow-circle-up text-danger'></i></td>";
                            } else {
                                if (hasil[i].RESULT_FLAG === 'L') {
                                    resultlab += "<td class='text-center align-middle'><i class='fas fa-arrow-circle-down text-danger'></i></td>";
                                } else {
                                    resultlab += "<td class='text-center align-middle'><i class='fas fa-check-circle text-success'></i></td>";
                                }
                            }
                        } else {
                            resultlab += "<td></td>";
                        }

                        if (hasil[i].ANGKA_NORMAL === null) {
                            resultlab += "<td></td>";
                        } else {
                            resultlab += "<td class='text-center align-middle'>" + hasil[i].ANGKA_NORMAL + "</td>";
                        }
                        resultlab += "<td class='text-center'>" + btnchart + "</td>";
                    }
                    resultlab += "</tr>";
                }

                $("#resultlab").html(resultlab);
            }
        }
    });
    return false;
}

function chartlab() {
    var chart = document.getElementById('chartlaboratory').getContext('2d');
    var pasienidlab = $("input[name='pasienidlab']").val();
    var testid = $("input[name='testid']").val();
    var pasienid = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
        url: url + "index.php/rj/chartlab",
        data: { 'pasienidlab': pasienidlab, 'testid': testid, 'pasienid': pasienid, 'episodeid': episodeid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var label = [];
                var nilai1 = [];
                var listchartlab = "";
                var hasil = data.responResult;

                for (var i in hasil) {
                    label.push(hasil[i].CREATED_DATE);
                    nilai1.push(hasil[i].HASIL);

                    listchartlab += "<tr>";
                    listchartlab += "<td class='text-center align-middle'>" + hasil[i].SAMPEL_ID + "</td>";
                    listchartlab += "<td class='text-left align-middle'>" + hasil[i].NAME1 + "</td>";
                    listchartlab += "<td class='text-center align-middle'>" + hasil[i].HASIL + "</td>";
                    if (hasil[i].FLAG === 'H') {
                        listchartlab += "<td class='text-center align-middle'><i class='fas fa-arrow-circle-up text-danger'></i></td>";
                    } else {
                        if (hasil[i].FLAG === 'L') {
                            listchartlab += "<td class='text-center align-middle'><i class='fas fa-arrow-circle-down text-danger'></i></td>";
                        } else {
                            listchartlab += "<td class='text-center align-middle'><i class='fas fa-check-circle text-success'></i></td>";
                        }
                    }
                    listchartlab += "<td class='text-center align-middle'>" + hasil[i].CREATED_DATE + "</td>";
                    listchartlab += "</tr>";
                }

                $("#listchartlab").html(listchartlab);

                if (myLineChart != null) {
                    myLineChart.destroy();
                }

                var myLineChart = new Chart(chart, {
                    type: 'line',
                    data: {
                        datasets: [
                            {
                                data: nilai1,
                                backgroundColor: 'rgba(153, 102, 255,1)',
                                borderColor: 'rgba(153, 102, 255,1)',
                                pointStyle: 'dot',
                                pointBackgroundColor: 'rgba(153, 102, 255,1)',
                                pointBorderColor: 'rgba(153, 102, 255,1)',
                                pointRadius: 3,
                                fill: false,
                                borderWidth: 3
                            }
                        ],
                        labels: label
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Graphic Result'
                        },
                        legend: {
                            display: false,
                            labels: {
                                fontColor: 'rgb(255, 255, 255)'
                            }
                        },
                        tooltips: {
                            titleFontFamily: 'Open Sans',
                            mode: 'index',
                            intersect: false,

                        },
                        animation: {
                            easing: 'easeInBounce',
                            duration: 2000
                        },
                        scales: {
                            xAxes: [{
                                stacked: false,
                                ticks: {
                                    // fontColor: "#FFF"
                                },
                                gridLines: {
                                    display: false,
                                    // color :'rgb(255, 255, 255)'
                                }
                            }],
                            yAxes: [{
                                stacked: false,
                                ticks: {
                                    callback: function (value, index, values) {
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    },
                                    // fontColor: "#FFF"
                                },
                                gridLines: {
                                    display: true,
                                    // color :'rgb(255, 255, 255)'
                                }
                            }]
                        }
                    }
                });
            }
        }
    });
    return false;
}

function orderrad() {
    var pasienid = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
        url: url + "index.php/rj/orderrad",
        data: { 'pasienid': pasienid, 'episodeid': episodeid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var orderrad = "";
                var getvariable = "";
                var hasil = data.responResult;

                for (var i in hasil) {
                    getvariable = "  data-transcorad='" + hasil[i].TRANS_CO + "'";

                    orderrad += "<tr>";
                    orderrad += "<td class='text-center'><strong><a href='#' class='btn-detailorderrad'" + getvariable + ">" + hasil[i].TRANS_CO + "</a></strong></td>";
                    orderrad += "<td>" + hasil[i].NAMADOKTER + "</td>";
                    orderrad += "</tr>";
                }

                $("#listorderrad").html(orderrad);
            }
        }
    });
    return false;
}

function detailrad() {
    var episodeid = $("input[name='episodeid']").val();
    var transcorad = $("input[name='transcorad']").val();
    $.ajax({
        url: url + "index.php/rj/detailrad",
        data: { 'transcorad': transcorad, 'episodeid': episodeid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var detailorderrad = "";
                var getvariable = "";
                var hasil = data.responResult;

                for (var i in hasil) {
                    getvariable = "  data-transrad='" + hasil[i].TRANS_RAD + "'";

                    detailorderrad += "<tr>";
                    detailorderrad += "<td class='text-center'><strong><a href='#' class='btn-expertise'" + getvariable + ">" + hasil[i].TRANS_RAD + "</a></strong></td>";
                    detailorderrad += "<td>" + hasil[i].NAMAPELAYANAN + "</td>";
                    detailorderrad += "</tr>";
                }

                $("#detailorder").html(detailorderrad);
            }
        }
    });
    return false;
}

function hasilrad() {
    var transrad = $("input[name='transrad']").val();
    $.ajax({
        url: url + "index.php/rj/hasilrad",
        data: { 'transrad': transrad },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            var tbp = "";
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var hasil = data.responResult;
                tbp = hasil;
                $("#resultrad").html(tbp);
            }
        }
    });
    return false;
}

function resumediagnosa() {
    var episodeid = $("input[name='episodeid']").val();
    var provider = $("input[name='provider']").val();
    $.ajax({
        url: url + "index.php/rj/resumediagnosa",
        data: { 'episodeid': episodeid, 'provider': provider },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var diagnosa = "";
                var hasil = data.responResult;

                diagnosa = "<tr><td class='font-weight-bold font-italic table-info' colspan='3'>DIAGNOSA</td></tr>";

                for (var i in hasil) {
                    diagnosa += "<tr>";
                    if (hasil[i].JENIS === '1' || hasil[i].JENIS === '3') {
                        diagnosa += "<td>Diagnosa Utama</td>";
                        diagnosa += "<td class='text-center'>:</td>";
                        diagnosa += "<td><strong>" + hasil[i].KODEICD + " / " + hasil[i].DIAGNOSA + "</strong></td>";
                    } else {
                        diagnosa += "<td>Diagnosa Sekunder</td>";
                        diagnosa += "<td class='text-center'>:</td>";
                        diagnosa += "<td><strong>" + hasil[i].KODEICD + " / " + hasil[i].DIAGNOSA + "</strong></td>";
                    }
                    diagnosa += "</tr>";
                }

                $("#diagnosa").html(diagnosa);
            }
        }
    });
    return false;
}

function resumetindakan() {
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
        url: url + "index.php/rj/resumetindakan",
        data: { 'episodeid': episodeid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var tindakanmedis = "";
                var hasil = data.responResult;

                tindakanmedis = "<tr><td class='font-weight-bold font-italic table-info' colspan='3'>TINDAKAN MEDIS</td></tr>";

                for (var i in hasil) {
                    tindakanmedis += "<tr>";
                    tindakanmedis += "<td>Penatalaksanaan</td>";
                    tindakanmedis += "<td class='text-center'>:</td>";
                    tindakanmedis += "<td><strong>" + hasil[i].KODEICD + " / " + hasil[i].DIAGNOSA + "</strong></td>";
                    tindakanmedis += "</tr>";
                }

                $("#tindakanmedis").html(tindakanmedis);
            }
        }
    });
    return false;
}

function resumelab() {
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
        url: url + "index.php/ri/resumelab",
        data: { 'episodeid': episodeid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var resumelab = "";
                var hasil = data.responResult;

                resumelab = "<tr><td class='font-weight-bold font-italic table-info' colspan='6'>PEMERIKSAAN PENUNJANG LABORATORIUM</td></tr>";

                for (var i in hasil) {
                    resumelab += "<tr>";
                    if (hasil[i].RESULT_VALUE === null) {
                        resumelab += "<td colspan='6'><strong>" + hasil[i].NAMA_TEST + "</strong></td>";
                    } else {
                        resumelab += "<td> - " + hasil[i].NAMA_TEST + "</td>";
                        resumelab += "<td class='text-center'>:</td>";
                        resumelab += "<td style='width:200px;' class='text-center'>" + hasil[i].RESULT_VALUE + "</td>";

                        if (hasil[i].UNIT === null) {
                            resumelab += "<td></td>";
                        } else {
                            resumelab += "<td class='text-center'>" + hasil[i].UNIT + "</td>";
                        }

                        if (hasil[i].RESULT_FLAG === null) {
                            resumelab += "<td></td>";
                        } else {
                            if (hasil[i].RESULT_FLAG === 'H') {
                                resumelab += "<td class='text-center'><i class='fas fa-arrow-circle-up text-danger'></i></td>";
                            } else {
                                if (hasil[i].RESULT_FLAG === 'L') {
                                    resumelab += "<td class='text-center'><i class='fas fa-arrow-circle-down text-danger'></i></td>";
                                } else {
                                    resumelab += "<td class='text-center'>" + hasil[i].RESULT_FLAG + "</td>";
                                }
                            }
                        }

                        if (hasil[i].ANGKA_NORMAL === null) {
                            resumelab += "<td></td>";
                        } else {
                            resumelab += "<td class='text-center'>" + hasil[i].ANGKA_NORMAL + "</td>";
                        }
                    }
                    resumelab += "</tr>";
                }

                $("#lab").html(resumelab);
            }
        }
    });
    return false;
}

function resumerad() {
    var pasienid = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
        url: url + "index.php/ri/resumerad",
        data: { 'pasienid': pasienid, 'episodeid': episodeid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var resumerad = "";
                var hasil = data.responResult;

                resumerad = "<tr><td class='font-weight-bold font-italic table-info' colspan='3'>PEMERIKSAAN PENUNJANG PENCITRAAN DIAGNOSTIK</td></tr>";

                for (var i in hasil) {
                    resumerad += "<tr>";
                    resumerad += "<td>Nama Pemeriksaan</td>";
                    resumerad += "<td>:</td>";
                    resumerad += "<td><strong>" + hasil[i].NAMAPELAYANAN + "</strong></td>";
                    resumerad += "</tr>";
                }

                $("#rad").html(resumerad);
            }
        }
    });
    return false;
}

function resumeobat() {
    var pasienid = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
        url: url + "index.php/rj/resumeobat",
        data: { 'pasienid': pasienid, 'episodeid': episodeid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var obat = "";
                var hasil = data.responResult;

                obat = "<tr><td class='font-weight-bold font-italic table-info' colspan='6'>TERAPI MEDIKA MENTOSA / OBAT SELAMA PERAWATAN</td></tr>";

                for (var i in hasil) {
                    obat += "<tr>";

                    if (hasil[i].TYPE === '00') {
                        obat += "<td class='text-center'>-</td>";
                        obat += "<td class='font-italic' colspan='3'><strong>" + hasil[i].NAMA_OBAT + "</strong></td>";
                        obat += "<td class='text-center'><strong>" + hasil[i].QTY + "</strong></td>";
                        obat += "<td><strong>" + hasil[i].SATUAN + "</strong></td>";
                    } else {
                        if (hasil[i].TYPE === '01') {
                            obat += "<td class='text-center'>-</td>";
                            obat += "<td class='font-italic text-primary' colspan='3'><strong>" + hasil[i].NAMA_OBAT + "</strong></td>";
                            obat += "<td class='text-center'><strong>" + hasil[i].QTY + "</strong></td>";
                            obat += "<td><strong>" + hasil[i].SATUAN + "</strong></td>";
                        } else {
                            if (hasil[i].TYPE === '02') {
                                obat += "<td></td>";
                                obat += "<td class='text-center'>-</td>";
                                obat += "<td class='font-italic text-success' colspan='2'><strong>" + hasil[i].NAMA_OBAT + "</strong></td>";
                                obat += "<td class='text-center'><strong>" + hasil[i].QTY + "</strong></td>";
                                obat += "<td><strong>" + hasil[i].SATUAN + "</strong></td>";
                            } else {
                                obat += "<td colspan='2'></td>";
                                obat += "<td class='text-center'>-</td>";
                                obat += "<td class='font-italic'><strong>" + hasil[i].NAMA_OBAT + "</strong></td>";
                                obat += "<td class='text-center'><strong>" + hasil[i].QTY + "</strong></td>";
                                obat += "<td><strong>" + hasil[i].SATUAN + "</strong></td>";
                            }

                        }

                    }


                    obat += "</tr>";
                }

                $("#obat").html(obat);
            }
        }
    });
    return false;
}

function resumeri() {
    var pasienid = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
        url: url + "index.php/ri/resumeri",
        data: { 'pasienid': pasienid, 'episodeid': episodeid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var resumeri = "";
                var tindaklanjut = "";
                var lainnya = "";
                var hasil = data.responResult;


                for (var i in hasil) {
                    if (hasil[i].KELUHAN != null) {
                        var keluhan = hasil[i].KELUHAN;
                        keluhan = keluhan.replace(/\n/g, "<br />");
                    } else {
                        keluhan = "-";
                    }

                    if (hasil[i].GEJALA != null) {
                        var gejala = hasil[i].GEJALA;
                        gejala = gejala.replace(/\n/g, "<br />");
                    } else {
                        gejala = "-";
                    }

                    if (hasil[i].STATUS != null) {
                        var status = hasil[i].STATUS;
                        status = status.replace(/\n/g, "<br />");
                    } else {
                        status = "-";
                    }

                    if (hasil[i].LAINNYA != null) {
                        var lainnya = hasil[i].LAINNYA;
                        lainnya = lainnya.replace(/\n/g, "<br />");
                    } else {
                        lainnya = "-";
                    }

                    if (hasil[i].RIWAYATPS != null) {
                        var riwayatps = hasil[i].RIWAYATPS;
                        riwayatps = riwayatps.replace(/\n/g, "<br />");
                    } else {
                        riwayatps = "-";
                    }

                    if (hasil[i].RIWAYATPD != null) {
                        var riwayatpd = hasil[i].RIWAYATPD;
                        riwayatpd = riwayatpd.replace(/\n/g, "<br />");
                    } else {
                        riwayatpd = "-";
                    }

                    if (hasil[i].VITAL != null) {
                        var vital = hasil[i].VITAL;
                        vital = vital.replace(/\n/g, "<br />");
                    } else {
                        vital = "-";
                    }

                    if (hasil[i].INDIKASI != null) {
                        var indikasi = hasil[i].INDIKASI;
                        indikasi = indikasi.replace(/\n/g, "<br />");
                    } else {
                        indikasi = "-";
                    }

                    if (hasil[i].OBATP != null) {
                        var obat = hasil[i].OBATP;
                        obat = obat.replace(/\n/g, "<br />");
                    } else {
                        obat = "-";
                    }

                    if (hasil[i].KONTROL != null) {
                        var kontrol = hasil[i].KONTROL;
                        kontrol = kontrol.replace(/\n/g, "<br />");
                    } else {
                        kontrol = "-";
                    }

                    if (hasil[i].INTRUKSI != null) {
                        var instruksi = hasil[i].INTRUKSI;
                        instruksi = instruksi.replace(/\n/g, "<br />");
                    } else {
                        instruksi = "-";
                    }

                    if (hasil[i].KONDISI != null) {
                        var kondisi = hasil[i].KONDISI;
                        kondisi = kondisi.replace(/\n/g, "<br />");
                    } else {
                        kondisi = "-";
                    }

                    if (hasil[i].SEVERITY != null) {
                        var severity = hasil[i].SEVERITY;
                        severity = severity.replace(/\n/g, "<br />");
                    } else {
                        severity = "-";
                    }

                    var dll = hasil[i].DLL;
                    if (dll === null) {
                        dll = "";
                    } else {
                        dll = dll.replace(/\n/g, "<br />");
                    }

                    resumeri = "<tr><td class='font-weight-bold font-italic table-info' colspan='3'>RINGKASAN RIWAYAT PENYAKIT</td></tr>";
                    resumeri += "<tr><td>Keluhan Utama</td><td class='text-center'>:</td><td><strong>" + keluhan + "</strong></td></tr>";
                    resumeri += "<tr><td>Gejala Penyerta</td><td class='text-center'>:</td><td><strong>" + gejala + "</strong></td></tr>";
                    resumeri += "<tr><td>Riwayat Penyakit Sekarang</td><td class='text-center'>:</td><td><strong>" + riwayatps + "</strong></td></tr>";
                    resumeri += "<tr><td>Riwayat Penyakit Dahulu</td><td class='text-center'>:</td><td><strong>" + riwayatpd + "</strong></td></tr>";
                    resumeri += "<tr><td class='font-weight-bold font-italic table-info' colspan='3'>PEMERIKSAAN FISIK</td></tr>";
                    resumeri += "<tr><td>Tanda-tanda Fisik</td><td class='text-center'>:</td><td><strong>" + vital + "</strong></td></tr>";
                    resumeri += "<tr><td>Status Lokalis</td><td class='text-center'>:</td><td><strong>" + status + "</strong></td></tr>";

                    tindaklanjut = "<tr><td class='font-weight-bold font-italic table-info' colspan='3'>TINDAK LANJUT DAN LAIN - LAIN</td></tr>";
                    tindaklanjut += "<tr><td>Obat Pulang</td><td class='text-center'>:</td><td><strong>" + obat + "</strong></td></tr>";
                    tindaklanjut += "<tr><td>Kontrol Ulang</td><td class='text-center'>:</td><td><strong>" + kontrol + "</strong></td></tr>";
                    tindaklanjut += "<tr><td>Segera Bawa Ke Rumah Sakit Bila</td><td class='text-center'>:</td><td><strong>" + instruksi + "</strong></td></tr>";
                    tindaklanjut += "<tr><td>Kondisi Pulang</td><td class='text-center'>:</td><td><strong>" + kondisi + "</strong></td></tr>";
                    tindaklanjut += "<tr><td>Tingkat Keparahan</td><td class='text-center'>:</td><td><strong>" + severity + "</strong></td></tr>";
                    tindaklanjut += "<tr><td>Lain-lain</td><td class='text-center'>:</td><td><strong>" + dll + "</strong></td></tr>";

                    lainnya = "<tr><td>Lainnya</td><td class='text-center'>:</td><td><strong>" + lainnya + "</strong></td></tr>";
                }

                $("#resumeri").html(resumeri);
                $("#tindaklanjut").html(tindaklanjut);
                $("#lainnya").html(lainnya);
            }
        }
    });
    return false;
}

function konsul() {
    var pasienid = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
        url: url + "index.php/ri/konsul",
        data: { 'pasienid': pasienid, 'episodeid': episodeid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {
            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var konsul = "";
                var hasil = data.responResult;

                for (var i in hasil) {

                    var s = hasil[i].S;
                    s = s.replace(/\n/g, "<br />");
                    var o = hasil[i].O;
                    o = o.replace(/\n/g, "<br />");
                    var a = hasil[i].A;
                    a = a.replace(/\n/g, "<br />");
                    var p = hasil[i].P;
                    p = p.replace(/\n/g, "<br />");

                    konsul += "<div class='row'>";
                    konsul += "<div class='col-md-2 text-primary small'><strong>NAMA DOKTER</strong></div>";
                    konsul += "<div class='col-md-10 text-primary small'><strong> : " + hasil[i].NAMADOKTER + "</strong></div>";
                    konsul += "</div>";
                    konsul += "<div class='row'>";
                    konsul += "<div class='col-md-2 text-primary small'><strong>TANGGAL DAN JAM</strong></div>";
                    konsul += "<div class='col-md-10 text-primary small'><strong> : " + hasil[i].CREATED_DATE + "</strong></div>";
                    konsul += "</div>";
                    konsul += "<hr class='mt-2 mb-2'>";
                    konsul += "<table class='ml-4'>";
                    konsul += "<tbody>";
                    konsul += "<tr>";
                    konsul += "<td style='width:50px; font-weight:bold;' class='align-top'>S</td>";
                    konsul += "<td style='width:30px; font-weight:bold;' class='align-top'>:</td>";
                    konsul += "<td>" + s + "</td>";
                    konsul += "</tr>";
                    konsul += "<br>";
                    konsul += "<tr>";
                    konsul += "<td style='width:50px; font-weight:bold;' class='align-top'>O</td>";
                    konsul += "<td style='width:30px; font-weight:bold;' class='align-top'>:</td>";
                    konsul += "<td>" + o + "</td>";
                    konsul += "</tr>";
                    konsul += "<tr>";
                    konsul += "<td style='width:50px; font-weight:bold;' class='align-top'>A</td>";
                    konsul += "<td style='width:30px; font-weight:bold;' class='align-top'>:</td>";
                    konsul += "<td>" + a + "</td>";
                    konsul += "</tr>";
                    konsul += "<tr>";
                    konsul += "<td style='width:50px; font-weight:bold;' class='align-top'>P</td>";
                    konsul += "<td style='width:30px; font-weight:bold;' class='align-top'>:</td>";
                    konsul += "<td>" + p + "</td>";
                    konsul += "</tr>";
                    konsul += "</tbody>";
                    konsul += "</table>";
                    konsul += "</div>";
                    konsul += "<br>";
                    konsul += "<hr class='mt-2 mb-2' style='border: 1px solid blue'>";
                    konsul += "<br>";
                }

                $("#konsultasi").html(konsul);
            }
        }
    });
    return false;
}

function laporanok() {
    var jenisopr = $("input[name='jenisopr']").val();
    var pasienid = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
        url: url + "index.php/ri/laporanok",
        data: { 'jenisopr': jenisopr, 'pasienid': pasienid, 'episodeid': episodeid },
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function (data) {

            if (data.responCode == "01") {
                toastr["info"](data.responDesc, "INFORMATION");
            } else {
                var tbp = "";
                var hasil = data.responResult;

                for (var i in hasil) {

                    var laporan = hasil[i].LAPORAN;
                    laporan = laporan.replace(/\n/g, "<br /><br />");


                    tbp += "<table>";
                    tbp += "<tbody>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>NAMA AHLI BEDAH</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";
                    if (hasil[i].JENISOPERASI === '01') {
                        if (hasil[i].JENISOPERASI != null) {
                            tbp += "<td colspan='4'>" + hasil[i].AHLI_BEDAH + "</td>";
                        } else {
                            tbp += "<td colspan='4'>-</td>";
                        }
                    } else {
                        if (hasil[i].PENOLONG != null) {
                            tbp += "<td colspan='4'>" + hasil[i].PENOLONG + "</td>";
                        } else {
                            tbp += "<td colspan='4'>-</td>";
                        }
                    }
                    tbp += "</tr>";


                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>NAMA ASSISTEN</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";
                    tbp += "<td colspan='4'>" + hasil[i].ASISTEN + "</td>";
                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>NAMA PERAWAT</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";
                    tbp += "<td colspan='4'>" + hasil[i].PERAWAT + "</td>";
                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>NAMA AHLI ANASTESI</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";

                    if (hasil[i].AHLI_ANESTESI != null) {
                        tbp += "<td colspan='4'>" + hasil[i].AHLI_ANESTESI + "</td>";
                    } else {
                        tbp += "<td colspan='4'>-</td>";
                    }

                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>JENIS ANASTESI</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";
                    tbp += "<td colspan='4'>" + hasil[i].JNS_ANES + "</td>";
                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>DIAGNOSIS PRA OPERASI</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";
                    tbp += "<td colspan='4'>" + hasil[i].DIAGNOSIS_PRA + "</td>";
                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>DIAGNOSIS PASCA OPERASI</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";
                    tbp += "<td colspan='4'>" + hasil[i].DIAGNOSIS_PASCA + "</td>";
                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>NAMA / MACAM OPERASI</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";
                    tbp += "<td colspan='4'>" + hasil[i].MACAM + "</td>";
                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>JARINGAN YANG DIEKSISI / INSISI</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";

                    if (hasil[i].JARINGAN != null) {
                        tbp += "<td colspan='4'>" + hasil[i].JARINGAN + "</td>";
                    } else {
                        tbp += "<td colspan='4'>-</td>";
                    }

                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>DIKIRIM UNTUK PEMERIKSAAN PA</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";

                    if (hasil[i].PA != null) {
                        tbp += "<td colspan='4'>" + hasil[i].PA + "</td>";
                    } else {
                        tbp += "<td colspan='4'>-</td>";
                    }

                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>KOMPLIKASI</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";

                    if (hasil[i].KOMPLIKASI != null) {
                        tbp += "<td colspan='4'>" + hasil[i].KOMPLIKASI + "</td>";
                    } else {
                        tbp += "<td colspan='4'>-</td>";
                    }

                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>JUMLAH PENDARAHAN</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";

                    if (hasil[i].PENDARAHAN != null) {
                        tbp += "<td colspan='4'>" + hasil[i].PENDARAHAN + "</td>";
                    } else {
                        tbp += "<td colspan='4'>-</td>";
                    }

                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>TANGGAL OPERASI</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";
                    tbp += "<td colspan='4'>" + hasil[i].TANGGAL + "</td>";
                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>JAM MULAI</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";
                    tbp += "<td>" + hasil[i].JAM_MULAI + "</td>";
                    tbp += "<td style='width:100px;' class='align-top'><strong>JAM SELESAI</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";
                    tbp += "<td>" + hasil[i].JAM_AKHIR + "</td>";
                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>LAMA OPERASI BERLANGSUNG</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";
                    tbp += "<td colspan='4'>" + hasil[i].LAMA + "</td>";
                    tbp += "</tr>";

                    tbp += "<tr>";
                    tbp += "<td style='width:300px;' class='align-top'><strong>LAPORAN OPERASI</strong></td>";
                    tbp += "<td style='width:30px;' class='align-top'>:</td>";
                    tbp += "<td colspan='4'>" + laporan + "</td>";
                    tbp += "</tr>";

                    tbp += "</tbody>";
                    tbp += "</table>";


                }

                $("#laporanok").html(tbp);
            }
        }
    });
    return false;
}