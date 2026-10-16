var episodeid = '';
var pasienid = '';
var transco = '';
var poliid = '';
var dokterid = '';
var ruangrwtid = '';
var transid = '';
var nosep = '';
var norm = '';
var nokartu = '';
var namapasien = '';
var listdiag = [];
var listtindak = [];
var listdiagdr = [];
var listtindakdr = [];
var processDialog = bootbox.dialog({
    message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Sedang memproses. Harap tunggu...</div>',
    closeButton: false,
    show: false,
    animate: false,
});

listpasien();
function listpasien() {
    $.ajax({
        url: url + "index.php/ranap/listpasien",
        method: "POST",
        dataType: "JSON",
        data: {
            pencarian: $("#pencarian").val()
        },
        cache: false,
        success: function (data) {
            console.log(data);
            var table = '';
            data.forEach((e, i) => {
                /* var diagnosa = e.DIAGNOSA;
                var icd10 = e.ICD10;
                var tindakan = e.TINDAKAN;
                var icd9 = e.ICD9; */
                /* if (diagnosa) {
                    if (icd10) {
                        diagnosa = icd10 + '-' + diagnosa;
                    }
                } else {
                    diagnosa = '-';
                } */
                var diagnosapenyerta = '';
                /* if (e.LISTDIAG) {
                    diagex = e.LISTDIAG.split("::");
                    diagnosapenyerta += '<ol class="pl-4">';
                    diagex.forEach((f, i) => {
                        diagex2 = f.split('^');
                        diagnosapenyerta += '<li>' + (diagex2[1] ? (diagex2[1] + ' - ' + diagex2[2]) : diagex2[2]) + '</li> ';
                    })
                    diagnosapenyerta += '</ol>';
                } else {
                    diagnosapenyerta = '-';
                }

                if (tindakan) {
                    if (icd9) {
                        tindakan = icd9 + '-' + tindakan;
                    }
                } else {
                    tindakan = '-';
                } */
                var tindakanpenyerta = '';
                /*  if (e.LISTTINDAK) {
                     tindakex = e.LISTTINDAK.split("::");
                     tindakanpenyerta += '<ol class="pl-4">';
                     tindakex.forEach((f, i) => {
                         tindakex2 = f.split('^');
                         tindakanpenyerta += '<li>' + (tindakex2[1] ? (tindakex2[1] + ' - ' + tindakex2[2]) : tindakex2[2]) + '</li> ';
                     })
                     tindakanpenyerta += '</ol>';
                 } else {
                     tindakanpenyerta = '-';
                 }
                 var inacbg = '';
                 if (e.S_INACBG) {
                     inacbg = '<input type="text" class="form-control form-control-sm" value="' + e.S_INACBG + '"/>';
                 } */
                var diagdokter = '<i class="fa fa-minus-circle text-danger"></i>';
                var diagcoder = '<i class="fa fa-minus-circle text-danger"></i>';
                var tindakdokter = '<i class="fa fa-minus-circle text-danger"></i>';
                var tindakcoder = '<i class="fa fa-minus-circle text-danger"></i>';
                if (e.DIAGDOKTER) {
                    diagdokter = '<i class="fa fa-circle-check text-success"></i>'
                }
                if (e.DIAGCODER) {
                    diagcoder = '<i class="fa fa-circle-check text-success"></i>'
                }
                if (e.TINDAKDOKTER) {
                    tindakdokter = '<i class="fa fa-circle-check text-success"></i>'
                }
                if (e.TINDAKCODER) {
                    tindakcoder = '<i class="fa fa-circle-check text-success"></i>'
                }
                table += '<tr>';
                table += `  <td class="text-center">` + (i + 1) + `</td>`;
                table += `  <td><button type="button" class="btn btn-primary" onclick="ubahdiag(this)" episode-id="` + e.EPISODE_ID + `" pasien-id="` + e.PASIEN_ID + `" trans-co="` + e.TRANS_CO + `">Ubah</button></td>`;
                table += `  <td>` + e.NAMAPASIEN + `</td>`;
                table += `  <td>` + e.INT_PASIEN_ID + `</td>`;
                table += `  <td>` + e.TGL_LAHIR + `</td>`;
                table += `  <td>` + e.UMUR + `</td>`;
                table += `  <td>` + e.RUANGRWT_ID + `</td>`;
                table += `  <td>` + e.NAMADOKTER + `</td>`;
                table += `  <td>` + e.TGLMASUK + `</td>`;
                table += `  <td>` + (e.TGL_KELUAR ? e.TGL_KELUAR : '-') + `</td>`;
                /* table += `  <td>` + inacbg + `</td>`; */
                table += `  <td class="text-center">` + diagdokter + `</td>`;
                table += `  <td class="text-center">` + diagcoder + `</td>`;
                table += `  <td class="text-center">` + tindakdokter + `</td>`;
                table += `  <td class="text-center">` + tindakcoder + `</td>`;
                /* table += `  <td>
                                <div class="font-weight-bold">Diagnosa Utama</div>
                                <div>`+ diagnosa + `</div>
                                <div class="font-weight-bold">Diagnosa Penyerta</div>
                                <div>`+ diagnosapenyerta + `</div>
                            </td>`;
                table += `  <td>
                                <div class="font-weight-bold">Tindakan Utama</div>
                                <div>`+ tindakan + `</div>
                                <div class="font-weight-bold">Tindakan Penyerta</div>
                                <div>`+ tindakanpenyerta + `</div>
                            </td>`;
 */
                table += '</tr>';
            });
            $("#tableranap").html(table);
            /*  var $rows = $('#tableranap tr'); */
            $('#formcari').on('submit', function (e) {
                e.preventDefault();
                listpasien();
                /* var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                $rows.show().filter(function () {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide(); */
            });
        }
    });
}


function ubahdiag(e) {
    listdiag = [];
    listtindak = [];
    nosep = '';
    $("[id='diagutama']").val('');
    $('[id="icd10utama"]').empty().trigger('change');
    $("[id='tindakutama']").val('');
    $('[id="icd9utama"]').empty().trigger('change');
    $("[id='catatanperubahan']").val('');
    episodeid = $(e).attr('episode-id');
    pasienid = $(e).attr('pasien-id');
    transco = $(e).attr('trans-co');
    $.ajax({
        url: url + "index.php/ranap/diagnosa",
        type: 'POST',
        data: {
            episodeid: episodeid,
            pasienid: pasienid
        },
        dataType: 'JSON',
        beforeSend: function () {
            processDialog.modal('show');
        },
        success: function (res) {
            console.log(res);
            processDialog.modal('hide');
            nosep = res.SEP_NOMOR;
            norm = res.INT_PASIEN_ID;
            nokartu = res.NOKARTU;
            namapasien = res.NAMAPASIEN;
            $("#modaldiag").modal('show');
            $("#namapasien").html(res.NAMAPASIEN);
            $("#norm").html(res.INT_PASIEN_ID);
            $("#nosep").html(nosep);
            $("#catatanperubahan").val(res.CATATAN);
            dokterid = res.DOKTER_ID;
            poliid = res.POLI_ID;
            ruangrwtid = res.RUANGRWT_ID;
            transid = res.TRANS_ID;
            if (res.ICD10 || res.DIAGNOSA) {
                if (res.ICD10) {
                    $("#diagnosautamadokter").html(res.KODEICD + ' - ' + res.DIAGNOSA);
                } else {
                    $("#diagnosautamadokter").html(res.DIAGNOSA);
                }
            } else {
                $("#diagnosautamadokter").html('');
            }
            if (res.ICD10_UTAMA || res.ICD10NM) {
                if (res.ICD10NM) {
                    /*  $("#icd10select").show();
                     $("[id='diagutama']").hide(); */
                    var data = {
                        id: res.ICD10_UTAMA,
                        text: res.ICD10_UTAMA + ' - ' + res.ICD10NM,
                        nama: res.ICD10NM
                    };
                    var option = new Option(data.text, data.id, true, true);
                    $(option).data('data', data);
                    $('[id="icd10utama"]').append(option).trigger('change');
                    /* $("#btndiagutama").attr('data-tipe', 'manual');
                    $("#btndiagutama").text('Manual'); */
                }/*  else {
                    $("#icd10select").hide();
                    $("[id='diagutama']").show();
                    $("[id='diagutama']").val(res.ICD10_UTAMA);
                    $("#btndiagutama").attr('data-tipe', 'icd');
                    $("#btndiagutama").text('ICD 10')
                } */
            }/*  else {
                $("#icd10select").show();
                $("[id='diagutama']").hide();
                $("#btndiagutama").attr('data-tipe', 'manual');
                $("#btndiagutama").text('Manual');
            } */
            var diagpenyertadr = res.LISTDIAG;

            if (diagpenyertadr) {
                listdiagdr = JSON.parse(diagpenyertadr);
            } else {
                listdiagdr = [];
            }
            var diagpenyerta = res.ICD10_SEKUNDER;
            if (diagpenyerta) {
                listdiag = JSON.parse(diagpenyerta);
            } else {
                listdiag = [];
            }
            diagtabel();
            diagtabeldr();
            if (res.ICD9 || res.TINDAKAN) {
                if (res.ICD9) {
                    $("#tindutamadokter").html(res.KODEICD9 + ' - ' + res.TINDAKAN);
                } else {
                    $("#tindutamadokter").html(res.TINDAKAN);
                }
            } else {
                $("#tindutamadokter").html('');
            }
            if (res.ICD9_UTAMA || res.ICD9NM) {
                if (res.ICD9NM) {
                    /*  $("#icd9select").show();
                     $("[id='tindakutama']").hide(); */
                    var data = {
                        id: res.ICD9_UTAMA,
                        text: res.ICD9_UTAMA + ' - ' + res.ICD9NM,
                        nama: res.ICD9NM
                    };
                    var option = new Option(data.text, data.id, true, true);
                    $(option).data('data', data);
                    $('[id="icd9utama"]').append(option).trigger('change');
                    /* $("#btntindakutama").attr('data-tipe', 'manual');
                    $("#btntindakutama").text('Manual'); */
                } /* else {
                    $("#icd9select").hide();
                    $("[id='tindakutama']").show();
                    $("[id='tindakutama']").val(res.ICD9_UTAMA);
                    $("#btntindakutama").attr('data-tipe', 'icd');
                    $("#btntindakutama").text('ICD 9')
                } */
            }/*  else {
                $("#icd9select").show();
                $("[id='tindakutama']").hide();
                $("#btntindakutama").attr('data-tipe', 'manual');
                $("#btntindakutama").text('Manual');
            } */
            var tindakpenyertadr = res.LISTTINDAK;
            if (tindakpenyertadr) {
                listtindakdr = JSON.parse(tindakpenyertadr);
            } else {
                listtindakdr = [];
            }
            var tindakpenyerta = res.ICD9_TINDAKAN;
            if (tindakpenyerta) {
                listtindak = JSON.parse(tindakpenyerta);
            } else {
                listtindak = [];
            }
            tindaktabel();
            tindaktabeldr();
            $("#btn-ubah-diag").prop('disabled', false);
        }
    });
    $('.select-diag').select2({
        allowClear: true,
        width: '100%',
        dropdownParent: $('#modaldiag'),
        placeholder: 'Cari ICD 10',
        minimumInputLength: 2,
        ajax: {
            url: url + "index.php/ranap/geticd10",
            type: 'POST',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('.select-tindak').select2({
        allowClear: true,
        width: '100%',
        dropdownParent: $('#modaldiag'),
        placeholder: 'Cari ICD 9',
        minimumInputLength: 2,
        ajax: {
            url: url + "index.php/ranap/geticd9",
            type: 'POST',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}
function diagtabel() {
    var tabeldiag = '';
    if (listdiag.length > 0) {
        tabeldiag += `<table class="table table-sm">`;
        tabeldiag += `  <thead>
                            <tr>
                                <th></th>
                                <th width="350">Diagnosa</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>`;
        listdiag.forEach((e, i) => {
            if (e.type !== 'delete') {
                tabeldiag += `<tr>`;
                tabeldiag += `  <td class="text-center">` + (i + 1) + `</td>`;
                tabeldiag += `  <td>` + (e.kode_icd ? e.kode_icd + ' - ' : '') + ` ` + e.diagnosa + `</td>`;
                tabeldiag += `  <td class="text-center"><button type="button" class="btn btn-danger btn-xs" onclick="hapusdiag(this)" data-index="` + i + `" kode="` + e.kode + `" icd10="` + e.kode_icd + `" transdiag="` + (e.trans_diag ? e.trans_diag : '') + `">Hapus</button></td>`;
                tabeldiag += `<tr>`;
            }
        })
        tabeldiag += `</tbody>
                    </table>`;
    }
    $("#tabeldiag").html(tabeldiag);
}
function diagtabeldr() {
    var tabeldiag = '';
    if (listdiagdr.length > 0) {
        tabeldiag += `<table class="table table-sm">`;
        tabeldiag += `  <thead>
                            <tr>
                                <th></th>
                                <th width="350">Diagnosa</th>
                            </tr>
                        </thead>
                        <tbody>`;
        listdiagdr.forEach((e, i) => {
            if (e.type !== 'delete') {
                tabeldiag += `<tr>`;
                tabeldiag += `  <td class="text-center">` + (i + 1) + `</td>`;
                tabeldiag += `  <td>` + (e.kode_icd ? e.kode_icd + ' - ' : '') + ` ` + e.diagnosa + `</td>`;
                tabeldiag += `<tr>`;
            }
        })
        tabeldiag += `</tbody>
                    </table>`;
    }
    $("#diagnosapenyertadokter").html(tabeldiag);
}
function tindaktabeldr() {
    var tabeltindak = '';
    if (listtindakdr.length > 0) {
        tabeltindak += `<table class="table table-sm">`;
        tabeltindak += `  <thead>
                            <tr>
                                <th></th>
                                <th width="350">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>`;
        listtindakdr.forEach((e, i) => {
            if (e.type !== 'delete') {
                tabeltindak += `<tr>`;
                tabeltindak += `  <td class="text-center">` + (i + 1) + `</td>`;
                tabeltindak += `  <td>` + (e.kode_icd ? e.kode_icd + ' - ' : '') + ` ` + e.tindakan + `</td>`;
                tabeltindak += `<tr>`;
            }
        })
        tabeltindak += `</tbody>
                    </table>`;
    }
    $("#tindpenyertadokter").html(tabeltindak);
}
function tindaktabel() {
    console.log(listtindak);
    var tabeltindak = '';
    if (listtindak.length > 0) {
        tabeltindak += `<table class="table table-sm">`;
        tabeltindak += `  <thead>
                            <tr>
                                <th></th>
                                <th width="350">Tindakan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>`;
        listtindak.forEach((e, i) => {
            if (e.type !== 'delete') {
                tabeltindak += `<tr>`;
                tabeltindak += `  <td class="text-center">` + (i + 1) + `</td>`;
                tabeltindak += `  <td>` + (e.kode_icd ? e.kode_icd + ' - ' : '') + ` ` + e.tindakan + `</td>`;
                tabeltindak += `  <td class="text-center"><button type="button" class="btn btn-danger btn-xs" onclick="hapustindak(this)" data-index="` + i + `" kode="` + e.kode + `" icd10="` + e.kode_icd + `" trans_tin="` + (e.trans_tin ? e.trans_tin : '') + `">Hapus</button></td>`;
                tabeltindak += `<tr>`;
            }
        })
        tabeltindak += `</tbody>
                    </table>`;
    }
    $("#tabeltindak").html(tabeltindak);
}

function hapusdiag(e) {
    var index = $(e).attr('data-index');
    var kode = $(e).attr('kode');
    var icd10 = $(e).attr('icd10');
    var transdiag = $(e).attr('transdiag');
    diaghapus = {
        /* kode: kode,
        kode_icd: icd10, */
        type: 'delete',
        transdiag: transdiag
    }

    listdiag.splice(index, 1);
    listdiag.push(diaghapus);
    diagtabel();
}
function hapustindak(e) {
    var index = $(e).attr('data-index');
    var kode = $(e).attr('kode');
    var icd10 = $(e).attr('icd10');
    var trans_tin = $(e).attr('trans_tin');
    /* tindakhapus = {
        type: 'delete',
        trans_tin: trans_tin
    } */

    listtindak.splice(index, 1);
    /* listtindak.push(tindakhapus); */
    tindaktabel();
}
$(document).on('click', '#btndiagutama', function () {
    var tipe = $(this).attr('data-tipe');
    var pr = $(this).closest('.itemdiag');
    if (tipe === 'icd') {
        pr.find('#diagutama').hide();
        pr.find('#icd10select').show();
        $(this).attr('data-tipe', 'manual');
        $(this).text('Manual');
    } else {
        pr.find('#icd10select').hide();
        pr.find('#diagutama').show();
        $(this).attr('data-tipe', 'icd');
        $(this).text('ICD 10');
    }
})
$(document).on('click', '#btndiagpenyerta', function () {
    var tipe = $(this).attr('data-tipe');
    var pr = $(this).closest('.itemdiag');
    if (tipe === 'icd') {
        pr.find('#diagpenyerta').hide();
        pr.find('#icd10penyertaselect').show();
        $(this).attr('data-tipe', 'manual');
        $(this).text('Manual');
    } else {
        pr.find('#icd10penyertaselect').hide();
        pr.find('#diagpenyerta').show();
        $(this).attr('data-tipe', 'icd');
        $(this).text('ICD 10');
    }
})
$(document).on('keypress', '#diagpenyerta', function (e) {
    if (e.key === 'Enter') {
        var val = $(this).val();
        var diag = {
            kode: '',
            kode_icd: '',
            diagnosa: val,
            type: 'new'
        }
        listdiag.push(diag);
        diagtabel();
        $(this).val('');
    }
})
$(document).on('select2:select', '#icd10penyerta', function (e) {
    var selectdata = e.params.data;
    var seldiagpenyerta = {
        kode: selectdata.id,
        kode_icd: selectdata.kode_icd,
        diagnosa: selectdata.nama,
        type: 'new'
    }
    listdiag.push(seldiagpenyerta);
    diagtabel();
    $(this).val('').trigger('change');
})

$(document).on('click', '#btntindakutama', function () {
    var tipe = $(this).attr('data-tipe');
    var pr = $(this).closest('.itemtindak');
    if (tipe === 'icd') {
        pr.find('#tindakutama').hide();
        pr.find('#icd9select').show();
        $(this).attr('data-tipe', 'manual');
        $(this).text('Manual');
    } else {
        pr.find('#icd9select').hide();
        pr.find('#tindakutama').show();
        $(this).attr('data-tipe', 'icd');
        $(this).text('ICD 9');
    }
})
$(document).on('click', '#btntindakpenyerta', function () {
    var tipe = $(this).attr('data-tipe');
    var pr = $(this).closest('.itemtindak');
    if (tipe === 'icd') {
        pr.find('#tindakpenyerta').hide();
        pr.find('#icd9penyertaselect').show();
        $(this).attr('data-tipe', 'manual');
        $(this).text('Manual');
    } else {
        pr.find('#icd9penyertaselect').hide();
        pr.find('#tindakpenyerta').show();
        $(this).attr('data-tipe', 'icd');
        $(this).text('ICD 9');
    }
})
$(document).on('keypress', '#tindakpenyerta', function (e) {
    if (e.key === 'Enter') {
        var val = $(this).val();
        var tindak = {
            kode: '',
            kode_icd: '',
            tindakan: val,
            type: 'new'
        }
        listtindak.push(tindak);
        tindaktabel();
        $(this).val('');
    }
})
$(document).on('select2:select', '#icd9penyerta', function (e) {
    var selectdata = e.params.data;
    var seltindakpenyerta = {
        kode: selectdata.id,
        kode_icd: selectdata.kode_icd,
        tindakan: selectdata.nama,
        type: 'new'
    }
    listtindak.push(seltindakpenyerta);
    tindaktabel();
    $(this).val('').trigger('change');
})

$(document).on('click', '#btn-ubah-diag', function () {
    var diagutama = $("#diagutama").val();
    var kodeicd = '';
    var nmdicd = '';
    var icd10utama = $("#icd10utama").select2('data')[0];
    if (icd10utama) {
        kodeicd = icd10utama.id;
        nmdicd = icd10utama.nama;
    }
    if ($('#diagutama').is(':visible')) {
        diagutama = diagutama;
    } else {
        diagutama = '';
    }
    if ($('#icd10select').is(':visible')) {
        kodeicd = kodeicd;
        nmdicd = nmdicd;
    } else {
        var kodeicd = '';
        var nmdicd = '';
    }

    var tindakutama = $("#tindakutama").val();
    var kodeicd9 = '';
    var nmdicd9 = '';
    var icd9utama = $("#icd9utama").select2('data')[0];
    if (icd9utama) {
        kodeicd9 = icd9utama.id;
        nmdicd9 = icd9utama.nama;
    }
    if ($('#tindakutama').is(':visible')) {
        tindakutama = tindakutama;
    } else {
        tindakutama = '';
    }
    if ($('#icd9select').is(':visible')) {
        kodeicd9 = kodeicd9;
        nmdicd9 = nmdicd9;
    } else {
        var kodeicd9 = '';
        var nmdicd9 = '';
    }
    if (!icd10utama) {
        toastr.clear();
        toastr["error"]('Diagnosa Utama Wajib diisi', "INFORMATION");
        return;
    }
    var catatanperubahan = $("#catatanperubahan").val();
    if (!catatanperubahan) {
        toastr.clear();
        toastr["error"]('Catatan Perubahan wajib diisi', "INFORMATION");
        return;
    }
    var datasubmit = {
        episodeid: episodeid,
        pasienid: pasienid,
        transco: transco,
        diagutama: diagutama,
        kodeicd10: kodeicd,
        nmdicd10: nmdicd,
        tindakutama: tindakutama,
        kodeicd9: kodeicd9,
        nmdicd9: nmdicd9,
        dokterid: dokterid,
        poliid: poliid,
        ruangrwtid: ruangrwtid,
        transid: transid,
        listdiag: JSON.stringify(listdiag),
        listtindak: JSON.stringify(listtindak),
        catatanperubahan: catatanperubahan,
        nosep: nosep,
        norm: norm,
        nokartu: nokartu,
        namapasien: namapasien
    }
    /*  console.log(datasubmit);
     return; */
    $.ajax({
        url: url + "index.php/ranap/updatediagnosa",
        type: 'POST',
        data: datasubmit,
        dataType: 'JSON',
        beforeSend: function () {
            processDialog.modal('show');
        },
        success: function (res) {
            /* console.log(res);
            return; */
            processDialog.modal('hide');
            diagtabel();
            tindaktabel();
            listpasien();
            if (res.code === '200') {
                Swal.fire({
                    html: res.msg,
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                $("#modaldiag").modal('hide');
            } else {
                Swal.fire({
                    html: res.msg,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }
    });
});