var myLineChart=null;

$(document).on("click",".btn-resume", function(e){            
    e.preventDefault();
	getData($(this));
	$("#tbresume > tr").remove();	
	resume();
});

$(document).on("click",".btn-pencarianPRO", function(e){            
    e.preventDefault();
	daftarpasienPRO();
});


$(document).on("click",".btn-pencarianALL", function(e){            
    e.preventDefault();
	daftarpasienALL();
});


$(document).on("click",".btn-pencarianRegMR", function(e){            
    e.preventDefault();
	regispasienPRO();
});

$(document).on("click",".btn-hasillab", function(e){            
    e.preventDefault();
    getData($(this));
    $("#resultlab > tr").remove();
	hasillab();
});

$(document).on("click",".btn-listlab", function(e){            
    e.preventDefault();
    getData($(this));
    $("#lislab > tr").remove();
    var myLineChart=null;
    listlab();
});

$(document).on("click",".btn-pilihpasienPRO", function(e){            
    e.preventDefault();
    clear();
    $("#tbdaftaralergi > tr").remove();
    getDataPasien($(this));
    daftaralergi();
    daftarriPRO();
    $('#daftarpasien').modal('hide');
});

$(document).on("click",".btn-pilihpasienALL", function(e){            
    e.preventDefault();
    clear();
    $("#tbdaftaralergi > tr").remove();
    getDataPasien($(this));
    daftaralergi();
    daftarriALL();
    $('#daftarpasien').modal('hide');
});

$(document).on("click",".btn-pilihtransaksiRI", function(e){            
    e.preventDefault();
    getDataTransaksi($(this));
    clear();
    soapri();
    catatanperawat();
    gizi();
    tindakanRI();
    orderfrm();
    orderlab();
    orderrad();
});

$(document).on("click",".btn-pilihtransaksiIGD", function(e){            
    e.preventDefault();
    getDataTransaksi($(this));
    clear();
    soapigd();
    catatanperawatigd();
    anamnesaigd();
    triaseigd();
    tindakanRI();
    orderfrm();
    orderlab();
    orderrad();
});

$(document).on("click",".btn-regpasien",function(e){
    e.preventDefault();
    regpasien($(this),'1');
});

$(document).on("click",".btn-detresep",function(e){
    e.preventDefault();
    getDataFrm($(this));
    detailfrm();
});

$(document).on("click",".btn-detailrad", function(e){            
    e.preventDefault();
    getDataRad($(this));
    detailrad();
});

$(document).on("click",".btn-viewrad", function(e){            
    e.preventDefault();
    getDataRad($(this));
    hasilrad();
});

function clear(){
    $("#soapri").html("");
    $("#cttperawat").html("");
    $("#cttgizi").html("");
}

function getDataPasien(btn){
    var pasienid    = btn.attr("data-pasienid");
    var mrpas       = btn.attr("data-mrpas");
    var namapas     = btn.attr("data-namapas");
    var tgllahir    = btn.attr("data-tgllahir");
    var umurpas     = btn.attr("data-umurpas");
    var sex         = btn.attr("data-sex");
    var tlp         = btn.attr("data-tlp");
    var alamat      = btn.attr("data-alamat");

    $("#mrpas").html(mrpas);
    $("#namapas").html(namapas);
    $("#tgllahir").html(tgllahir+" / "+umurpas);
    $("#sex").html(sex);
    $("#tlp").html(tlp);
    $("#alamat").html(alamat);

    $(":hidden[name='pasienid']").val(pasienid);
}

function getDataTransaksi(btn){
    var episodeid   = btn.attr("data-episodeid");
    var transid     = btn.attr("data-transid");
    var tglmasuk    = btn.attr("data-tglmasuk");
    var tglkeluar   = btn.attr("data-tglkeluar");
    var ruangan     = btn.attr("data-ruangan");
    var dpjp        = btn.attr("data-dpjp");
    var provider    = btn.attr("data-provider");
    var nobpjs      = btn.attr("data-nobpjs");
    var norm        = btn.attr("data-norm");
    var namapasien  = btn.attr("data-namapasien");
    var alamat      = btn.attr("data-alamat");
    var kelasrawat  = btn.attr("data-kelas");

    $("#tglmasuk").html(tglmasuk);
    $("#ruangan").html(ruangan);
    $("#dpjp").html(dpjp);
    $("#provider").html(provider);

    $(":hidden[name='episodeid']").val(episodeid);
    $(":hidden[name='transid']").val(transid);

    $(":hidden[name='tglmasuk']").val(tglmasuk);
	$(":hidden[name='tglkeluar']").val(tglkeluar);
	$(":hidden[name='namadokter']").val(dpjp);
	$(":hidden[name='nobpjs']").val(nobpjs);
	$(":hidden[name='norm']").val(norm);
	$(":hidden[name='namapasien']").val(namapasien);
	$(":hidden[name='asalpasien']").val(ruangan);
	$(":hidden[name='kelasrawat']").val(kelasrawat);
	$(":hidden[name='alamat']").val(alamat);
    $(":hidden[name='provider']").val(provider);
}

function getDataFrm(btn){
    var transcofrm = btn.attr("data-transcofrm");
    $(":hidden[name='transcofrm']").val(transcofrm);;
}

function getData(btn){

    // !   Get Variable
    var pasienidlab = btn.attr("data-pasienidlab");
    var testid      = btn.attr("data-testid");

    var transcolab  = btn.attr("data-transcolab");
    var sampelid    = btn.attr("data-sampelid");
    // ! Variable All 
    
    $(":hidden[name='transcolab']").val(transcolab);
    $(":hidden[name='sampelid']").val(sampelid);
    $(":hidden[name='pasienidlab']").val(pasienidlab);
    $(":hidden[name='testid']").val(testid);
}

function getDataRad(btn){

    // !   Get Variable
 
    var transcorad  = btn.attr("data-transcorad");
    var transrad    = btn.attr("data-transrad");

    $(":hidden[name='transcorad']").val(transcorad);
    $(":hidden[name='transrad']").val(transrad);
}

function regpasien(btn,jenis){
    var episodeid = btn.attr('data-episodeid');
	var pasienid =  btn.attr('data-pasienid');
	
	$.ajax({
		url:url+"index.php/history/regpasien",
		data : {'pasienid':pasienid,'episodeid':episodeid,'jenis':jenis},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
            regispasienPRO();
			toastr["info"]('Transaksi Berhasil Di Registrasi',"Great ! ");
		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function regispasienPRO(){
    var pencarian = $("input[name='pencarianREG']").val();
    $.ajax({
		url:url+"index.php/history/regispasienPRO",
		data : {'pencarian':pencarian},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
                var getvariable=""; 
				var hasil = data.response;

				for(var i in hasil){

                    getvariable =   "  data-pasienid='"+hasil[i].PASIEN_ID+
                                    "' data-episodeid='"+hasil[i].EPISODE_ID+
                                    "' data-mrpas='"+hasil[i].MRPAS+
                                    "' data-namapas='"+hasil[i].NAMAPAS+
                                    "'>";
                                    
                    if(hasil[i].JENIS!='1'){
                        tbp +="<tr>";
                    }else{
                        tbp +="<tr class='table-danger'>";
                    }

                    if(hasil[i].JENIS!='1'){
                        tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'><a href='#' class='btn-regpasien btn btn-success btn-xs' title='Pilih Pasien'"+getvariable+"<strong>PILIH PASIEN</strong></a></td>";
                    }else{
                        tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'></td>";
                    }
                    
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].MRPAS+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].NAMAPAS+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].TGL_MASUK+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].RUANGRWT_ID+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].DPJP+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].PROVIDER+"</td>";
                    tbp +="</tr>";
				}
	
				$("#tbregmr").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function daftarpasienPRO(){
    var pencarian = $("input[name='pencarian']").val();
    $.ajax({
		url:url+"index.php/history/daftarpasienPRO",
		data : {'pencarian':pencarian},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
                var getvariable=""; 
				var hasil = data.response;

				for(var i in hasil){

                    getvariable =   "  data-pasienid='"+hasil[i].PASIEN_ID+
                                    "' data-mrpas='"+hasil[i].INT_PASIEN_ID+
                                    "' data-namapas='"+hasil[i].NAMA+
                                    "' data-tgllahir='"+hasil[i].TGL_LAHIR+
                                    "' data-umurpas='"+hasil[i].UMUR+
                                    "' data-sex='"+hasil[i].JENISKELAMIN+
                                    "' data-tlp='"+hasil[i].NO_SELULAR+
                                    "' data-alamat='"+hasil[i].ALAMAT1+
                                    "'>";
                                    
                    tbp +="<tr>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'><a href='#' class='btn-pilihpasienPRO btn btn-danger btn-xs' title='Pilih Pasien'"+getvariable+"<strong>PILIH PASIEN</strong></a></td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].INT_PASIEN_ID+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].NAMA+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].NO_IDENTITAS+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].JENISKELAMIN+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].TGL_LAHIR+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].UMUR+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].NO_SELULAR+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].ALAMAT1+"</td>";
                    tbp +="</tr>";
				}
	
				$("#tbdaftarpasien").html(tbp);
            }

		},
		error: function (e) {
            Swal.fire('Sorry!','Sistem Gagal Melakukan Pencarian Data','error');
		},
    })
}

function daftarpasienALL(){
    var pencarian = $("input[name='pencarian']").val();
    $.ajax({
		url:url+"index.php/history/daftarpasienALL",
		data : {'pencarian':pencarian},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
                var getvariable=""; 
				var hasil = data.response;

				for(var i in hasil){

                    getvariable =   "  data-pasienid='"+hasil[i].PASIEN_ID+
                                    "' data-mrpas='"+hasil[i].INT_PASIEN_ID+
                                    "' data-namapas='"+hasil[i].NAMA+
                                    "' data-tgllahir='"+hasil[i].TGL_LAHIR+
                                    "' data-umurpas='"+hasil[i].UMUR+
                                    "' data-sex='"+hasil[i].JENISKELAMIN+
                                    "' data-tlp='"+hasil[i].NO_SELULAR+
                                    "' data-alamat='"+hasil[i].ALAMAT1+
                                    "'>";
                                    
                    tbp +="<tr>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'><a href='#' class='btn-pilihpasienALL btn btn-danger btn-xs' title='Pilih Pasien'"+getvariable+"<strong>PILIH PASIEN</strong></a></td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].INT_PASIEN_ID+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].NAMA+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].NO_IDENTITAS+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].JENISKELAMIN+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].TGL_LAHIR+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].UMUR+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].NO_SELULAR+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].ALAMAT1+"</td>";
                    tbp +="</tr>";
				}
	
				$("#tbdaftarpasien").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function daftarriPRO(){
    var pasienid = $("input[name='pasienid']").val();
    $.ajax({
		url:url+"index.php/history/daftarriPRO",
		data : {'pasienid':pasienid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
                var getvariable=""; 
				var hasil = data.response;

				for(var i in hasil){

                    getvariable =   "  data-episodeid='"+hasil[i].EPISODE_ID+
                                    "' data-transid='"+hasil[i].TRANS_ID+
                                    "' data-tglmasuk='"+hasil[i].TGL_MASUK+
                                    "' data-tglkeluar='"+hasil[i].TGL_KELUAR+
                                    "' data-ruangan='"+hasil[i].RUANGRWT_ID+
                                    "' data-dpjp='"+hasil[i].DPJP+
                                    "' data-provider='"+hasil[i].PROVIDER+
                                    "'>";
                                    
                    tbp +="<tr>";

                    if(hasil[i].DEPT_ID === null){
                        tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'><a href='#' class='btn-pilihtransaksiRI btn btn-primary btn-xs' title='Pilih Transaksi Pasien'"+getvariable+"<strong>PILIH TRANSAKSI</strong></a></td>";
                    }else{
                        tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'><a href='#' class='btn-pilihtransaksiIGD btn btn-primary btn-xs' title='Pilih Transaksi Pasien'"+getvariable+"<strong>PILIH TRANSAKSI</strong></a></td>";
                    }
                    
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].EPISODE_ID+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].TGL_MASUK+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].RUANGRWT_ID+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].DPJP+"</td>";
                    tbp +="</tr>";
				}
	
				$("#tbriwayat").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function daftarriALL(){
    var pasienid = $("input[name='pasienid']").val();
    $.ajax({
		url:url+"index.php/history/daftarriALL",
		data : {'pasienid':pasienid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
                var getvariable=""; 
				var hasil = data.response;

				for(var i in hasil){

                    getvariable =   "  data-episodeid='"+hasil[i].EPISODE_ID+
                                    "' data-transid='"+hasil[i].TRANS_ID+
                                    "' data-tglmasuk='"+hasil[i].TGL_MASUK+
                                    "' data-tglkeluar='"+hasil[i].TGLKELUAR+
                                    "' data-ruangan='"+hasil[i].RUANGRWT_ID+
                                    "' data-dpjp='"+hasil[i].DPJP+
                                    "' data-provider='"+hasil[i].PROVIDER+
                                    "' data-nobpjs='"+hasil[i].NOBPJS+
                                    "' data-norm='"+hasil[i].MRPAS+
                                    "' data-namapasien='"+hasil[i].NAMAPASIEN+
                                    "' data-alamat='"+hasil[i].ALAMAT+
                                    "' data-kelas='"+hasil[i].KELASID+
                                    "'>";
                                    
                    tbp +="<tr>";

                    if(hasil[i].DEPT_ID === null){
                        tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'><a href='#' class='btn-pilihtransaksiRI btn btn-primary btn-xs' title='Pilih Transaksi Pasien'"+getvariable+"<strong>PILIH TRANSAKSI</strong></a></td>";
                    }else{
                        tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'><a href='#' class='btn-pilihtransaksiIGD btn btn-primary btn-xs' title='Pilih Transaksi Pasien'"+getvariable+"<strong>PILIH TRANSAKSI</strong></a></td>";
                    }
                    
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].EPISODE_ID+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].TGL_MASUK+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].RUANGRWT_ID+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].DPJP+"</td>";
                    tbp +="</tr>";
				}
	
				$("#tbriwayat").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function soapri(){
    var pasienid  = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
		url:url+"index.php/history/soapri",
		data : {'pasienid':pasienid,'episodeid':episodeid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var soap        ="";
                var hapus       ="";
                var strikeawal  ="";
                var strikeakhir ="";
				var hasil = data.response;

				for(var i in hasil){

                    if(hasil[i].FLAG_HAPUS==='0'){
                        hapus = "text-danger"
                        strikeawal="<del>";
                        strikeakhir="</del>";
                    }else{
                        hapus ="";
                        strikeawal="";
                        strikeakhir="";
                    }

                    if(hasil[i].S!= null){
                        var s = hasil[i].S;
                        s=s.replace(/\n/g, "<br />");
                    }else{
                        s="-";
                    }

                    if(hasil[i].SEKARANG!= null){
                        var sekarang = hasil[i].SEKARANG;
                        sekarang=sekarang.replace(/\n/g, "<br />");
                    }else{
                        sekarang="-";
                    }

                    if(hasil[i].DAHULU!= null){
                        var dahulu = hasil[i].DAHULU;
                        dahulu=dahulu.replace(/\n/g, "<br />");
                    }else{
                        dahulu="-";
                    }

                    if(hasil[i].O!= null){
                        var o = hasil[i].O;
                        o=o.replace(/\n/g, "<br />");
                    }else{
                        o="-";
                    }

                    if(hasil[i].A!= null){
                        var a = hasil[i].A;
                        a=a.replace(/\n/g, "<br />");
                    }else{
                        a="-";
                    }

                    if(hasil[i].P!= null){
                        var p = hasil[i].P;
                        p=p.replace(/\n/g, "<br />");
                    }else{
                        p="-";
                    }
                    
                    if(hasil[i].POLI_ID === 'UGD01'){
                        soap +="<b><span class='text-primary'>I G D</span></b><br>";
                    }else{
                        soap +="<b><span class='text-primary'> Ruang : "+hasil[i].RUANG_ID+"</span></b><br>";
                    }

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:480px;'>"+"<b><span class='text-success'> Created By : "+hasil[i].NAMADOKTER+"</span></b>"+"</td>"+"<td>"+"<b><span class='text-success'> Date Time : "+hasil[i].TANGGALBUAT+"</span></b>"+"</td>"+"</tr>";
                    soap +="</table>";

                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Keluhan Utama</td>"+"<td style='width:20px;'>:</td>"+"<td class='"+hapus+"'>"+strikeawal+"<span>"+s+"</span>"+strikeakhir+"</td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Riwayat Penyakit Sekarang</td>"+"<td style='width:20px;'>:</td>"+"<td class='"+hapus+"'>"+strikeawal+"<span>"+sekarang+"</span>"+strikeakhir+"</td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Riwayat Penyakit Dahulu</td>"+"<td style='width:20px;'>:</td>"+"<td class='"+hapus+"'>"+strikeawal+"<span>"+dahulu+"</span>"+strikeakhir+"</td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>O</td>"+"<td style='width:20px;'>:</td>"+"<td class='"+hapus+"'>"+strikeawal+"<span>"+o+"</span>"+strikeakhir+"</td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>A</td>"+"<td style='width:20px;'>:</td>"+"<td class='"+hapus+"'>"+strikeawal+"<span>"+a+"</span>"+strikeakhir+"</td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>P</td>"+"<td style='width:20px;'>:</td>"+"<td class='"+hapus+"'>"+strikeawal+"<span>"+p+"</span>"+strikeakhir+"</td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";



                    soap +="<br>";
				}
	
				$("#soapri").html(soap);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function soapigd(){
    var pasienid  = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    var transid   = $("input[name='transid']").val();
    $.ajax({
		url:url+"index.php/history/soapigd",
		data : {'pasienid':pasienid,'episodeid':episodeid, 'transid':transid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var soap        ="";
                var hapus       ="";
                var strikeawal  ="";
                var strikeakhir ="";
				var hasil = data.response;

				for(var i in hasil){

                    if(hasil[i].FLAG_HAPUS==='0'){
                        hapus = "text-danger"
                        strikeawal="<del>";
                        strikeakhir="</del>";
                    }else{
                        hapus ="";
                        strikeawal="";
                        strikeakhir="";
                    }

                    if(hasil[i].S!= null){
                        var s = hasil[i].S;
                        s=s.replace(/\n/g, "<br />");
                    }else{
                        s="-";
                    }

                    if(hasil[i].SEKARANG!= null){
                        var sekarang = hasil[i].SEKARANG;
                        sekarang=sekarang.replace(/\n/g, "<br />");
                    }else{
                        sekarang="-";
                    }

                    if(hasil[i].DAHULU!= null){
                        var dahulu = hasil[i].DAHULU;
                        dahulu=dahulu.replace(/\n/g, "<br />");
                    }else{
                        dahulu="-";
                    }

                    if(hasil[i].O!= null){
                        var o = hasil[i].O;
                        o=o.replace(/\n/g, "<br />");
                    }else{
                        o="-";
                    }

                    if(hasil[i].A!= null){
                        var a = hasil[i].A;
                        a=a.replace(/\n/g, "<br />");
                    }else{
                        a="-";
                    }

                    if(hasil[i].P!= null){
                        var p = hasil[i].P;
                        p=p.replace(/\n/g, "<br />");
                    }else{
                        p="-";
                    }
                    
                    if(hasil[i].POLI_ID === 'UGD01'){
                        soap +="<b><span class='text-primary'>I G D</span></b><br>";
                    }else{
                        soap +="<b><span class='text-primary'> Ruang : "+hasil[i].RUANG_ID+"</span></b><br>";
                    }

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:480px;'>"+"<b><span class='text-success'> Created By : "+hasil[i].NAMADOKTER+"</span></b>"+"</td>"+"<td>"+"<b><span class='text-success'> Date Time : "+hasil[i].TANGGALBUAT+"</span></b>"+"</td>"+"</tr>";
                    soap +="</table>";

                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Keluhan Utama</td>"+"<td style='width:20px;'>:</td>"+"<td class='"+hapus+"'>"+strikeawal+"<span>"+s+"</span>"+strikeakhir+"</td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Riwayat Penyakit Sekarang</td>"+"<td style='width:20px;'>:</td>"+"<td class='"+hapus+"'>"+strikeawal+"<span>"+sekarang+"</span>"+strikeakhir+"</td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Riwayat Penyakit Dahulu</td>"+"<td style='width:20px;'>:</td>"+"<td class='"+hapus+"'>"+strikeawal+"<span>"+dahulu+"</span>"+strikeakhir+"</td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>O</td>"+"<td style='width:20px;'>:</td>"+"<td class='"+hapus+"'>"+strikeawal+"<span>"+o+"</span>"+strikeakhir+"</td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>A</td>"+"<td style='width:20px;'>:</td>"+"<td class='"+hapus+"'>"+strikeawal+"<span>"+a+"</span>"+strikeakhir+"</td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>P</td>"+"<td style='width:20px;'>:</td>"+"<td class='"+hapus+"'>"+strikeawal+"<span>"+p+"</span>"+strikeakhir+"</td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";



                    soap +="<br>";
				}
	
				$("#soapri").html(soap);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function catatanperawat(){
    var pasienid  = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
		url:url+"index.php/history/catatanperawat",
		data : {'pasienid':pasienid,'episodeid':episodeid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var soap        ="";
				var hasil = data.response;

				for(var i in hasil){

                    if(hasil[i].CATATAN!= null){
                        var catatan = hasil[i].CATATAN;
                        catatan=catatan.replace(/\n/g, "<br />");
                    }else{
                        catatan="-";
                    }

                    if(hasil[i].RESULT!= null){
                        var result = hasil[i].RESULT;
                        result=result.replace(/\n/g, "<br />");
                    }else{
                        result="-";
                    }

                    soap +="<b><span class='text-primary'> Ruang : "+hasil[i].RUANG_ID+"</span></b><br>";
                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:480px;'>"+"<b><span class='text-success'> Created By : "+hasil[i].NAMA+"</span></b>"+"</td>"+"<td>"+"<b><span class='text-success'> Date Time : "+hasil[i].CREATEDDATE+"</span></b>"+"</td>"+"</tr>";
                    soap +="</table>";

                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Tanggal</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+hasil[i].TANGGAL+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Jam</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+hasil[i].JAM+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Catatan</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+catatan+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Hasil</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+result+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<br>";
				}
	
				$("#cttperawat").html(soap);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function catatanperawatigd(){
    var transid  = $("input[name='transid']").val();
    $.ajax({
		url:url+"index.php/history/catatanperawatigd",
		data : {'transid':transid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var soap        ="";
				var hasil = data.response;

				for(var i in hasil){

                    if(hasil[i].CATATAN!= null){
                        var catatan = hasil[i].CATATAN;
                        catatan=catatan.replace(/\n/g, "<br />");
                    }else{
                        catatan="-";
                    }

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:480px;'>"+"<b><span class='text-success'> Created By : "+hasil[i].NAMA+"</span></b>"+"</td>"+"<td>"+"<b><span class='text-success'> Date Time : "+hasil[i].CREATEDDATE+"</span></b>"+"</td>"+"</tr>";
                    soap +="</table>";

                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Tanggal</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+hasil[i].CREATEDDATE+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Catatan</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+catatan+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<br>";
				}
	
				$("#cttperawat").html(soap);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function gizi(){
    var pasienid  = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
		url:url+"index.php/history/gizi",
		data : {'pasienid':pasienid,'episodeid':episodeid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var soap        ="";
				var hasil = data.response;

				for(var i in hasil){


                    if(hasil[i].ASESMEN!= null){
                        var asessment = hasil[i].ASESMEN;
                        asessment=asessment.replace(/\n/g, "<br />");
                    }else{
                        asessment="-";
                    }

                    if(hasil[i].KELUHAN!= null){
                        var keluhan = hasil[i].KELUHAN;
                        keluhan=keluhan.replace(/\n/g, "<br />");
                    }else{
                        keluhan="-";
                    }

                    if(hasil[i].BIOKIMIA!= null){
                        var biokimia = hasil[i].BIOKIMIA;
                        biokimia=biokimia.replace(/\n/g, "<br />");
                    }else{
                        biokimia="-";
                    }

                    if(hasil[i].KLINIK!= null){
                        var klinik = hasil[i].KLINIK;
                        klinik=klinik.replace(/\n/g, "<br />");
                    }else{
                        klinik="-";
                    }

                    if(hasil[i].ALERGI_MKN!= null){
                        var alergi = hasil[i].ALERGI_MKN;
                        alergi=alergi.replace(/\n/g, "<br />");
                    }else{
                        alergi="-";
                    }

                    if(hasil[i].POLA_MAKAN!= null){
                        var pola = hasil[i].POLA_MAKAN;
                        pola=pola.replace(/\n/g, "<br />");
                    }else{
                        pola="-";
                    }

                    if(hasil[i].RIWAYAT_PERSONAL!= null){
                        var riwayat = hasil[i].RIWAYAT_PERSONAL;
                        riwayat=riwayat.replace(/\n/g, "<br />");
                    }else{
                        riwayat="-";
                    }

                    if(hasil[i].DIAG_GIZI!= null){
                        var diaggizi = hasil[i].DIAG_GIZI;
                        diaggizi=diaggizi.replace(/\n/g, "<br />");
                    }else{
                        diaggizi="-";
                    }

                    if(hasil[i].INTER_GIZI!= null){
                        var intergizi = hasil[i].INTER_GIZI;
                        intergizi=intergizi.replace(/\n/g, "<br />");
                    }else{
                        intergizi="-";
                    }

                    if(hasil[i].DIET_BLM!= null){
                        var dietblm = hasil[i].DIET_BLM;
                        dietblm=dietblm.replace(/\n/g, "<br />");
                    }else{
                        dietblm="-";
                    }

                    if(hasil[i].DIET!= null){
                        var diet = hasil[i].DIET;
                        diet=diet.replace(/\n/g, "<br />");
                    }else{
                        diet="-";
                    }

                    if(hasil[i].MONO_EVA!= null){
                        var monoeva = hasil[i].MONO_EVA;
                        monoeva=monoeva.replace(/\n/g, "<br />");
                    }else{
                        monoeva="-";
                    }

                    if(hasil[i].KET_LAIN!= null){
                        var ket = hasil[i].KET_LAIN;
                        ket=ket.replace(/\n/g, "<br />");
                    }else{
                        ket="-";
                    }


                    soap +="<b><span class='text-primary'> Ruang : "+hasil[i].RUANG_ID+"</span></b><br>";
                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:480px;'>"+"<b><span class='text-success'> Created By : "+hasil[i].NAMA+"</span></b>"+"</td>"+"<td>"+"<b><span class='text-success'> Date Time : "+hasil[i].TANGGALBUAT+"</span></b>"+"</td>"+"</tr>";
                    soap +="</table>";

                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Assessment Gizi</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+asessment+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Keluhan</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+keluhan+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Biokimia</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+biokimia+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Klinik / Fisik</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+klinik+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Alergi Makanan</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+alergi+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Pola Makan</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+pola+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Riwayat Personal</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+riwayat+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Diagnosa Gizi</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+diaggizi+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Intervensi Gizi</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+intergizi+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Diet Sebelumnya</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+dietblm+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Diet</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+diet+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Monitoring dan Evaluasi</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+monoeva+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<table>";
                    soap +="<tr>"+"<td style='width:200px;'>Keterangan Lainnya</td>"+"<td style='width:20px;'>:</td>"+"<td><span>"+ket+"</span></td>"+"</tr>";
                    soap +="</table>";
                    soap +="<hr class='m-1'>";

                    soap +="<br>";
				}
	
				$("#cttgizi").html(soap);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function daftaralergi(){
    var pasienid = $("input[name='pasienid']").val();
    $.ajax({
		url:url+"index.php/history/daftaralergi",
		data : {'pasienid':pasienid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
				var hasil = data.response;

				for(var i in hasil){

                    tbp +="<tr>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].ALERGI+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].DIBUATOLEH+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].CREATED_DATE+"</td>";
                    tbp +="</tr>";
				}
	
				$("#tbdaftaralergi").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function triaseigd(){
    var pasienid  = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
		url:url+"index.php/history/triase",
		data : {'pasienid':pasienid,'episodeid':episodeid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var triase ="";
                var hasil = data.response;

                if(hasil[0].ASAL_POS==="True"){
                    var puskesmas ="checked";
                }else{
                    puskesmas ="";
                }

                if(hasil[0].ASAL_KLI==="True"){
                    var klinik ="checked";
                }else{
                    klinik ="";
                }

                if(hasil[0].ASAL_RB==="True"){
                    var rb ="checked";
                }else{
                    rb ="";
                }

                if(hasil[0].ASAL_RS==="True"){
                    var rs ="checked";
                }else{
                    rs ="";
                }

                if(hasil[0].ASAL_LAIN==="True"){
                    var lain ="checked";
                }else{
                    lain ="";
                }

                if(hasil[0].TIND_PERIKSA==="True"){
                    var periksa ="checked";
                }else{
                    periksa ="";
                }

                if(hasil[0].TIND_PERAWATAN_OBSER==="True"){
                    var obser ="checked";
                }else{
                    obser ="";
                }

                if(hasil[0].TIND_PERIKSA_RESUITASI==="True"){
                    var resuitasi ="checked";
                }else{
                    resuitasi ="";
                }

                if(hasil[0].TIND_JENAZAH==="True"){
                    var jenazah ="checked";
                }else{
                    jenazah ="";
                }

                if(hasil[0].KAT_MERAH==="True"){
                    var merah ="checked";
                }else{
                    merah ="";
                }

                if(hasil[0].KAT_KUNING==="True"){
                    var kuning ="checked";
                }else{
                    kuning ="";
                }

                if(hasil[0].KAT_HIJAU==="True"){
                    var hijau ="checked";
                }else{
                    hijau ="";
                }

                if(hasil[0].KAT_HITAM==="True"){
                    var hitam ="checked";
                }else{
                    hitam ="";
                }

                if(hasil[0].NYERI_1==="True"){
                    var satu ="checked";
                }else{
                    satu ="";
                }

                if(hasil[0].NYERI_2==="True"){
                    var dua ="checked";
                }else{
                    dua ="";
                }

                if(hasil[0].NYERI_3==="True"){
                    var tiga ="checked";
                }else{
                    tiga ="";
                }

                if(hasil[0].NYERI_4==="True"){
                    var empat ="checked";
                }else{
                    empat ="";
                }

                if(hasil[0].NYERI_5==="True"){
                    var lima ="checked";
                }else{
                    lima ="";
                }

                if(hasil[0].NYERI_6==="True"){
                    var enam ="checked";
                }else{
                    enam ="";
                }

                if(hasil[0].NYERI_7==="True"){
                    var tujuh ="checked";
                }else{
                    tujuh ="";
                }

                if(hasil[0].NYERI_8==="True"){
                    var delapan ="checked";
                }else{
                    delapan ="";
                }

                if(hasil[0].NYERI_9==="True"){
                    var sembilan ="checked";
                }else{
                    sembilan ="";
                }

                if(hasil[0].NYERI_10==="True"){
                    var sepuluh ="checked";
                }else{
                    sepuluh ="";
                }

                if(hasil[0].MACAM_TRAU==="True"){
                    var trauma ="checked";
                }else{
                    trauma ="";
                }

                if(hasil[0].MACAM_NONTRAU==="True"){
                    var nontrauma ="checked";
                }else{
                    nontrauma ="";
                }

                if(hasil[0].MACAM_VISUM==="True"){
                    var visum ="checked";
                }else{
                    visum ="";
                }

                if(hasil[0].MACAM_KLL==="True"){
                    var kll ="checked";
                }else{
                    kll ="";
                }

                if(hasil[0].MACAM_KDRT==="True"){
                    var kdrt ="checked";
                }else{
                    kdrt ="";
                }

                if(hasil[0].MACAM_CHILD==="True"){
                    var child ="checked";
                }else{
                    child ="";
                }

                if(hasil[0].MACAM_KECELAKAAN==="True"){
                    var kecelakaan ="checked";
                }else{
                    kecelakaan ="";
                }

                if(hasil[0].ALERGI_TIDAK==="True"){
                    var alergitidak ="checked";
                }else{
                    alergitidak ="";
                }

                if(hasil[0].ALERGI_ADA==="True"){
                    var alergi ="checked";
                }else{
                    alergi ="";
                }

                if(hasil[0].KU_BAIK==="True"){
                    var kubaik ="checked";
                }else{
                    kubaik ="";
                }

                if(hasil[0].KU_SEDANG==="True"){
                    var kusedang ="checked";
                }else{
                    kusedang ="";
                }

                if(hasil[0].KU_BURUK==="True"){
                    var kuburuk ="checked";
                }else{
                    kuburuk ="";
                }

                if(hasil[0].RESIKO_JATUH==="True"){
                    var resikojatuh ="checked";
                }else{
                    resikojatuh ="";
                }

                if(hasil[0].AIR_BEBAS==="True"){
                    var bebas ="checked";
                }else{
                    bebas ="";
                }

                if(hasil[0].AIR_ASING==="True"){
                    var asing ="checked";
                }else{
                    asing ="";
                }

                if(hasil[0].AIR_SPUTUM==="True"){
                    var sputum ="checked";
                }else{
                    sputum ="";
                }

                if(hasil[0].AIR_DARAH==="True"){
                    var darah ="checked";
                }else{
                    darah ="";
                }

                if(hasil[0].AIR_LIDAH==="True"){
                    var lidah ="checked";
                }else{
                    lidah ="";
                }


                if(hasil[0].BREAT_IP_NORMAL==="True"){
                    var normal ="checked";
                }else{
                    normal ="";
                }

                if(hasil[0].BREAT_IP_TACHI==="True"){
                    var tachi ="checked";
                }else{
                    tachi ="";
                }

                if(hasil[0].BREAT_IP_BRAD==="True"){
                    var brad ="checked";
                }else{
                    brad ="";
                }

                if(hasil[0].BREAT_IP_APNEU==="True"){
                    var apneu ="checked";
                }else{
                    apneu ="";
                }

                if(hasil[0].BREAT_BN_NORMAL==="True"){
                    var bnnormal ="checked";
                }else{
                    bnnormal ="";
                }

                if(hasil[0].BREAT_BN_WHEE==="True"){
                    var bnwhee ="checked";
                }else{
                    bnwhee ="";
                }

                if(hasil[0].BREAT_BN_STRIDOR==="True"){
                    var bnstridor ="checked";
                }else{
                    bnstridor ="";
                }

                if(hasil[0].BREAT_BN_RHONKI==="True"){
                    var bnrhonki ="checked";
                }else{
                    bnrhonki ="";
                }

                if(hasil[0].BREAT_PP_SIMETRIS==="True"){
                    var simetris ="checked";
                }else{
                    simetris ="";
                }

                if(hasil[0].BREAT_PP_ASIMETRIS==="True"){
                    var asimetris ="checked";
                }else{
                    asimetris ="";
                }

                if(hasil[0].BREAT_OTOT_BAHU==="True"){
                    var bahu ="checked";
                }else{
                    bahu ="";
                }

                if(hasil[0].BREAT_OTOT_DADA==="True"){
                    var dada ="checked";
                }else{
                    dada ="";
                }

                if(hasil[0].BREAT_OTOT_HIDUNG==="True"){
                    var hidung ="checked";
                }else{
                    hidung ="";
                }

                if(hasil[0].BREAT_OTOT_PERUT==="True"){
                    var perut ="checked";
                }else{
                    perut ="";
                }

                if(hasil[0].CIRC_PK_KURANG==="True"){
                    var kurang ="checked";
                }else{
                    kurang ="";
                }

                if(hasil[0].CIRC_PK_LEBIH==="True"){
                    var lebih ="checked";
                }else{
                    lebih ="";
                }

                if(hasil[0].CIRC_EK_HANGAT==="True"){
                    var hangat ="checked";
                }else{
                    hangat ="";
                }

                if(hasil[0].CIRC_EK_DINGIN==="True"){
                    var dingin ="checked";
                }else{
                    dingin ="";
                }

                if(hasil[0].CIRC_EK_PUCAT==="True"){
                    var pucat ="checked";
                }else{
                    pucat ="";
                }

                if(hasil[0].CIRC_EK_SIANOSIS==="True"){
                    var sianosis ="checked";
                }else{
                    sianosis ="";
                }

                

                triase +="<table class='table table-bordered table-head-fixed text-nowrap table-striped table-hover'>";
                
                triase +="<tr>";
                triase +="<td class='text-center' style='font-weight:bold;' colspan='11' >TRIASE DILAKUKAN SEGERA SETELAH PASIEN DATANG DAN SEBELUM PASIEN / KELUARGA MENDAFTAR IGD</td>";
                triase +="</tr>";

                triase +="<tr>";
                triase +="<td class='text-center' colspan='5'> Tanggal Kunjungan : <strong>"+hasil[0].TGLJAMDAFTAR+"</strong></td>";
                triase +="<td class='text-center' colspan='6'> Tanggal Pengkajian Triase : <strong>"+hasil[0].TANGGAL+" / "+hasil[0].JAM+"</strong></td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td rowspan='2'> Rujukan Dari : </td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+puskesmas+" onclick='return false;'>";
                        triase +="<label for='checkbox1' class='custom-control-label'>Puskesmas</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox2' "+klinik+" onclick='return false;'>";
                        triase +="<label for='checkbox2' class='custom-control-label'>Klinik</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox3' "+rb+" onclick='return false;'>";
                        triase +="<label for='checkbox3' class='custom-control-label'>Rumah Bersalin</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='4'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox4' "+rs+" onclick='return false;'>";

                        if(hasil[0].ASAL_RS === 'True'){
                            triase +="<label for='checkbox4' class='custom-control-label'>RS / RSUD : "+hasil[0].ASAL_RUJUKAN+"</label>";
                        }else{
                            triase +="<label for='checkbox4' class='custom-control-label'>RS / RSUD</label>";
                        }
                        
                        triase +="</div>";
                    triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                    

                    triase +="<td colspan='10'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox5' "+lain+" >";

                        if(hasil[0].ASAL_LAIN === 'True'){
                            triase +="<label for='checkbox5' class='custom-control-label'>Lain-lain : "+hasil[0].ASAL_LAIN_KET+"</label>";
                        }else{
                            triase +="<label for='checkbox5' class='custom-control-label'>Lain-lain</label>";
                        }

                        triase +="</div>";
                    triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td rowspan='2'> Macam Kasus : </td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+nontrauma+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Non Trauma</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+trauma+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Trauma</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+kecelakaan+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Kecelakaan Kerja</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+kll+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>KLL</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+kdrt+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>KDRT</label>";
                        triase +="</div>";
                    triase +="</td>";

                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td colspan='4'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+child+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Child Abuse (Kekerasan Anak)</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='6'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+visum+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Permintaan Visum et Repeturn</label>";
                        triase +="</div>";
                    triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";

                    triase +="<td> ALERGI</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+alergitidak+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Tidak Ada</label>";
                        triase +="</div>";
                    triase +="</td>";


                    triase +="<td colspan='8'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox5' "+alergi+" >";

                        if(hasil[0].ALERGI_ADA === 'True'){
                            triase +="<label for='checkbox5' class='custom-control-label'>Ada : "+hasil[0].ALERGI_KET+"</label>";
                        }else{
                            triase +="<label for='checkbox5' class='custom-control-label'>Ada</label>";
                        }

                        triase +="</div>";
                    triase +="</td>";
                    
                triase +="</tr>";

                triase +="<tr>";
                triase +="<td>SUBYEKTIF (ANAMNESIS)</td>";
                triase +="<td colspan='10'>"+hasil[0].ANAMNESIS+"</td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td rowspan='8'>OBYEKTIF</td>";
                    triase +="<td colspan='2'>Kesadaran Umum : </td>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+kubaik+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Baik</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+kusedang+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Sedang</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+kuburuk+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Buruk</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>Tekanan Darah : </td>";
                    triase +="<td colspan='3'><strong>"+hasil[0].TD+"/"+hasil[0].DISTOL+"</strong> /mmHg</td>";
                triase +="</tr>";

                triase +="<tr>";
                        triase +="<td colspan='2'>Kesadaran (GCS) : </td>";
                        triase +="<td>E : <strong>"+hasil[0].K_E+"</strong></td>";
                        triase +="<td>M : <strong>"+hasil[0].K_M+"</strong></td>";
                        triase +="<td>V : <strong>"+hasil[0].K_V+"</strong></td>";
                        triase +="<td colspan='2'>Frekuensi Nadi : </td>";
                        triase +="<td colspan='3'><strong>"+hasil[0].FND+"</strong> x/Menit</td>";
                triase +="</tr>";

                triase +="<tr>";
                        triase +="<td colspan='2'>Berat Badan : </td>";
                        triase +="<td colspan='3'><strong>"+hasil[0].BB+"</strong> Kg</td>";
                        triase +="<td colspan='2'>Frekuensi Nafas : </td>";
                        triase +="<td colspan='3'><strong>"+hasil[0].FNF+"</strong> x/Menit</td>";
                triase +="</tr>";

                triase +="<tr>";
                        triase +="<td colspan='2'>Tinggi Badan : </td>";
                        triase +="<td colspan='3'><strong>"+hasil[0].TB+"</strong> cm</td>";
                        triase +="<td colspan='2'>Suhu : </td>";
                        triase +="<td colspan='3'><strong>"+hasil[0].SUHU+"</strong><sup>&deg;</sup>C</td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td colspan='10'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+resikojatuh+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Resiko Jatuh</label>";
                        triase +="</div>";
                    triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                triase +="<td colspan='10'>Skala Nyeri</td>";
                triase +="</tr>";

                // triase +="<tr>";
                // triase +="<td colspan='10'></td>";
                // triase +="</tr>"

                triase +="<tr>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+satu+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>1</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+dua+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>2</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+tiga+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>3</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+empat+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>4</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+lima+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>5</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+enam+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>6</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+tujuh+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>7</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+delapan+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>8</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+sembilan+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>9</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+sepuluh+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>10</label>";
                        triase +="</div>";
                    triase +="</td>";

                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td>AIRWAY</td>";
                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+bebas+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Bebas</label>";
                        triase +="</div>";
                    triase +="</td>";
                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+asing+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Benda Asing</label>";
                        triase +="</div>";
                    triase +="</td>";
                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+sputum+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Sputum</label>";
                        triase +="</div>";
                    triase +="</td>";
                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+darah+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Darah</label>";
                        triase +="</div>";
                    triase +="</td>";
                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+lidah+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Lidah</label>";
                        triase +="</div>";
                    triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                        triase +="<td rowspan='4'>BREATHING</td>";
                        triase +="<td colspan='2'> - Irama Pernafasan</td>";

                        triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+normal+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Normal Teratur</label>";
                            triase +="</div>";
                        triase +="</td>";

                        triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+tachi+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Tachipneu</label>";
                            triase +="</div>";
                        triase +="</td>";

                        triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+brad+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Bradipneu</label>";
                            triase +="</div>";
                        triase +="</td>";

                        triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+apneu+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Apneu</label>";
                            triase +="</div>";
                        triase +="</td>";

                triase +="</tr>";

                triase +="<tr>";
                        triase +="<td colspan='2'> - Bunyi Nafas Tambahan</td>";

                        triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+bnnormal+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Normal Teratur</label>";
                            triase +="</div>";
                        triase +="</td>";

                        triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+bnwhee+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Wheezing</label>";
                            triase +="</div>";
                        triase +="</td>";

                        triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+bnstridor+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Stridor</label>";
                            triase +="</div>";
                        triase +="</td>";

                        triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+bnrhonki+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Rhonki</label>";
                            triase +="</div>";
                        triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                        triase +="<td colspan='2'> - Pengembangan Paru</td>";

                        triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+simetris+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Simetris</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='6'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+asimetris+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Asimetris</label>";
                        triase +="</div>";
                    triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                        triase +="<td colspan='2'> - Penggunaan Otot Bantu Nafas</td>";

                        triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+bahu+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Bahu Di Angkat</label>";
                            triase +="</div>";
                        triase +="</td>";

                        triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+dada+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Pernafasan Dada</label>";
                            triase +="</div>";
                        triase +="</td>";

                        triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+hidung+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Cuping Hidung</label>";
                            triase +="</div>";
                        triase +="</td>";

                        triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+perut+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Pernafasan Perut</label>";
                            triase +="</div>";
                        triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td rowspan='2'>CIRCULATION</td>";
                    triase +="<td colspan='2'> - Pengisian Kapiler</td>";

                    triase +="<td colspan='2'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+kurang+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Kurang Dari 3 Detik</label>";
                            triase +="</div>";
                        triase +="</td>";

                        triase +="<td colspan='6'>";
                            triase +="<div class='custom-control custom-checkbox'>";
                            triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+lebih+" >";
                            triase +="<label for='checkbox1' class='custom-control-label'>Lebih Dari 3 Detik</label>";
                            triase +="</div>";
                        triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td colspan='2'> - Ekstremitas</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+hangat+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Akral Hangat</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+dingin+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Akral Dingin</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+pucat+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Pucat</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+sianosis+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Sianosis</label>";
                        triase +="</div>";
                    triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td>ASSESSMENT TRIASE</td>";
                    triase +="<td colspan='2'>Kategori Pasien</td>";
                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+merah+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>EMERGENCY (MERAH)</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+kuning+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>URGENT (KUNING)</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+hijau+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>NON URGENT (HIJAU)</label>";
                        triase +="</div>";
                    triase +="</td>";

                    triase +="<td colspan='2'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+hitam+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>MENINGGAL (HITAM)</label>";
                        triase +="</div>";
                    triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td rowspan='4'>TINDAK LANJUT</td>";
                    triase +="<td colspan='10'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+periksa+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Pemeriksaan Ke Ruang Pelayanan Non Urgent (False Emergency / Poliklinik / Rawat Jalan</label>";
                        triase +="</div>";
                    triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td colspan='10'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+obser+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Perawatan Ke Ruang Observasi Pasien Semi Kritis (Urgent / Kuning)</label>";
                        triase +="</div>";
                    triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td colspan='10'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+resuitasi+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Perawatan Ke Ruang Resuitasi / Kritis (Emergency / Merah)</label>";
                        triase +="</div>";
                    triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td colspan='10'>";
                        triase +="<div class='custom-control custom-checkbox'>";
                        triase +="<input class='custom-control-input' type='checkbox' id='checkbox1' "+jenazah+" >";
                        triase +="<label for='checkbox1' class='custom-control-label'>Kirim Ke Ruang Jenazah</label>";
                        triase +="</div>";
                    triase +="</td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td rowspan='2'>PETUGAS TRIASE</td>";
                    triase +="<td colspan='5' class='text-center'>Tanggal dan Jam</td>";
                    triase +="<td colspan='5' class='text-center'>Nama Petugas</td>";
                triase +="</tr>";

                triase +="<tr>";
                    triase +="<td colspan='5' class='text-center'><strong>"+hasil[0].CREATED_DATE+"</strong></td>";
                    triase +="<td colspan='5' class='text-center'><strong>"+hasil[0].DIBUATOLEH+"</strong></td>";
                triase +="</tr>";

                triase +="</table>";

                $("#pengkajiantriase").html(triase);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function anamnesaigd(){
    var transid = $("input[name='transid']").val();
    $.ajax({
		url:url+"index.php/history/anamnesaigd",
		data : {'transid':transid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var anamnesa ="";
                var hasil = data.response;

                anamnesa +="<table class='table table-head-fixed text-nowrap table-striped'>";
                
                anamnesa +="<tr>";
                anamnesa +="<td colspan='10'><strong>A. Airway</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Airway</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].AIRWAY+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td colspan='10'><strong>B. Breathing</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Pola Nafas</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td><strong>"+hasil[0].BR_POLA_NAFAS+"</strong></td>";
                anamnesa +="<td>Penggunaan Otot Bantu</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='4'><strong>"+hasil[0].BR_BANTU_NAFAS+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Suara Nafas</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td><strong>"+hasil[0].BR_SUARA_NAFAS+"</strong></td>";
                anamnesa +="<td>Jenis Nafas</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='4'><strong>"+hasil[0].BR_JENIS_NAFAS+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Pola Nafas</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td><strong>"+hasil[0].BR_POLA_NAFAS2+"</strong></td>";
                anamnesa +="<td>Frekuensi Nafas</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='4'><strong>"+hasil[0].BR_FREKUENSI_NAFAS+"</strong> x/Menit</td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td colspan='10'><strong>C. Circulation</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Akral</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].CIR_AKRAL+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Pucat</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].CIR_PUCAT+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Cianosis</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].CIR_CIANOSIS+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Tekanan Darah</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td><strong>"+hasil[0].CIR_TKAN_DARAH+"/"+hasil[0].CIR_TKAN_DARAH2+"</strong> mmHg</td>";
                anamnesa +="<td>Nadi</td>";
                anamnesa +="<td>:</td>";
                anamnesa +="<td colspan='4'><strong>"+hasil[0].CIR_NADI_TERABA+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Pendarahan</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].CIR_PERDARAHAN+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Adanya Riwayat Kehilangan Cairan Dalam Jumlah Besar</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].CIR_RWT_CAIRAN+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Kelembaban Kulit</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].CIR_LEMBAB_KULIT+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Turgor</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].CIR_TURGOR+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Luas Luka Bakar</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td><strong>"+hasil[0].CIR_LUKA_BAKAR+"</strong> %</td>";
                anamnesa +="<td>Grade Luka</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td><strong>"+hasil[0].CIR_LUKA_GRADE+"</strong></td>";
                anamnesa +="<td>Produksi Urine</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td><strong>"+hasil[0].CIR_PROD_URINE+"</strong> ml</td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td colspan='10'><strong>D. Disability</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Tingkat Kesadaran</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].DIS_TKT_SADAR+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Nilai CGS</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'>E : <strong>"+hasil[0].DIS_GCS_E+"</strong>"+" M : <strong>"+hasil[0].DIS_GCS_M+"</strong> V : <strong>"+hasil[0].DIS_GCS_V+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Pupil</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td><strong>"+hasil[0].DIS_PUPIL+"</strong></td>";
                anamnesa +="<td colspan='6'><strong>"+hasil[0].DIS_DIAMETER+"</strong> mm</td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Repon Cahaya</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td>Left : <strong>"+hasil[0].DIS_RESP_CAHAYA_L+"</strong></td>";
                anamnesa +="<td colspan='6'>Right :<strong>"+hasil[0].DIS_RESP_CAHAYA_R+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Penilaian Extremitas Sensorik</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].DIS_SENSORIK+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Penilaian Extremitas Motorik</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].DIS_MOTORIK+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td colspan='10'><strong>E. Exposure</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Apakah Ada Nyeri</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td><strong>"+hasil[0].ADA_NYERI+"</strong></td>";
                anamnesa +="<td>Skor Nyeri</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='4'><strong>"+hasil[0].SKOR_NYERI+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Penjalar Nyeri</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].PENJALAR_NYERI_YA+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Tipe</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].TIPE+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Deskripsi</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].KARAKTER_DESKRIPSI+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Frekuensi</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].FREKUENSI+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Lama Nyeri</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].LAMA_NYERI+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Faktor yang Memperkuat / Memperingan</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].FAKTOR_KUATRINGAN+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Gejala Penyerta</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].GEJALA_PENYERTA+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Luka</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td><strong>"+hasil[0].LUKA+"</strong></td>";
                anamnesa +="<td>Lokasi</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='4'><strong>"+hasil[0].LUKA_LOKASI+"</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td colspan='10'><strong>F. Suhu Tubuh</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Suhu Axilia</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].SUHU_AXILA+"</strong>"+" "+"<sup>&deg;</sup>C</td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td colspan='10'><strong>G. Skor Jatuh</strong></td>";
                anamnesa +="</tr>";

                anamnesa +="<tr>";
                anamnesa +="<td>Skor Jatuh</td>";
                anamnesa +="<td style='width:1px;'>:</td>";
                anamnesa +="<td colspan='8'><strong>"+hasil[0].SKOR_JATUH+"</strong></td>";
                anamnesa +="</tr>";
                
                anamnesa +="</table>";

                $("#pengkajianigd").html(anamnesa);

                $("#tglmasukanamigd").html(hasil[0].TGL_MASUK);
                $("#namaanamigd").html(hasil[0].NAMA_BY);
                $("#ekganamigd").html(hasil[0].KPS_EKG);
                $("#jamdatanganamigd").html(hasil[0].JAM_MASUK);
                $("#jamanamanamigd").html(hasil[0].JAM_ANAM_PRWT);
                $("#labanamigd").html(hasil[0].KPS_LAB);
                $("#severityanamigd").html(hasil[0].TINGKAT_GAWAT);
                $("#keluhananamigd").html(hasil[0].KELUH_UTAMA);
                $("#agdanamigd").html(hasil[0].KPS_AGD);
                $("#jenisanamigd").html(hasil[0].JNS_PELAYANAN);
                $("#anamnesaanamigd").html(hasil[0].ANAMNESA);
                $("#radanamigd").html(hasil[0].KPS_RAD);
                $("#alasananamigd").html(hasil[0].ALASAN_DATANG);
                $("#riwayatanamigd").html(hasil[0].RWY_PENYA_DHULU);
                $("#caraanamigd").html(hasil[0].CARA_MASUK);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function orderlab(){
    var pasienid  = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
		url:url+"index.php/history/orderlab",
		data : {'pasienid':pasienid,'episodeid':episodeid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
                var getvariable=""; 
				var hasil = data.response;

				for(var i in hasil){

                    getvariable =   "  data-pasienid='"+hasil[i].PASIEN_ID+
                                    "' data-episodeid='"+hasil[i].EPISODE_ID+
                                    "' data-transcolab='"+hasil[i].TRANS_CO+
                                    "' data-sampelid='"+hasil[i].SAMPELID+
                                    "' data-pasienidlab='"+hasil[i].PASIENIDLAB+
                                    "'>";

                    tbp +="<tr>";
                    
                    if(hasil[i].STATUS==='1'){
                        tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'><a href='#' class='btn btn-warning btn-xs btn-hasillab' data-toggle='modal' data-target='#hasillab'"+getvariable+"<strong><i class='far fa-eye'></i> RESULT</strong></a></td>";
                    }else{
                        tbp +="<td></td>";
                    }
                    
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].TRANS_CO+"</td>"; 
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].DOKTER+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].CREATED_DATE+"</td>";
                    tbp +="</tr>";
				}
	
				$("#tborderlab").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function hasillab(){
    var pasienidlab  = $("input[name='pasienidlab']").val();
    var sampelid     = $("input[name='sampelid']").val();
    $.ajax({
		url:url+"index.php/history/hasillab",
		data : {'pasienidlab':pasienidlab,'sampelid':sampelid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
                var getvariable=""; 
				var hasil = data.response;

				for(var i in hasil){

                    getvariable =   "  data-pasienidlab='"+hasil[i].PASIEN_ID+
                                    "' data-testid='"+hasil[i].TEST_ID+
                                    "' data-pasienid='"+hasil[i].PASIENID+
                                    "' data-episodeid='"+hasil[i].EPISODEID+
                                    "'>";

                    tbp +="<tr>";

                    if(hasil[i].DONE_STATUS === null){
                        if(hasil[i].ITEM_LEVEL==='2'){
                            tbp +="<td style='text-align:left; font-size:12px; font-weight:bold;' class='align-middle' colspan='7'>"+hasil[i].NAMA_TES+"</td>";
                        }else{
                            tbp +="<td style='text-align:left; font-size:12px; font-weight:bold;' class='align-middle font-italic' colspan='7'>"+hasil[i].NAMA_TES+"</td>";
                        }
                    }else{
                        if(hasil[i].ITEM_LEVEL==='3'){
                            tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'> - "+hasil[i].NAMA_TES+"</td>";
                        }else{
                            tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'> * "+hasil[i].NAMA_TES+"</td>";
                        }
                        
                        tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].RESULT_VALUE+"</td>";

                        if(hasil[i].UNITS === null){
                            tbp +="<td></td>";
                        }else{
                            tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].UNITS+"</td>";
                        }
                        

                        if(hasil[i].ANGKA_NORMAL != null){
                            if(hasil[i].RESULT_FLAG === 'H'){
                                tbp +="<td style='text-align:center; class='align-middle'><i class='fas fa-arrow-circle-up text-danger'></i></td>";
                            }else{
                                if(hasil[i].RESULT_FLAG === 'L'){
                                    tbp +="<td style='text-align:center; class='align-middle'><i class='fas fa-arrow-circle-down text-danger'></i></td>";
                                }else{
                                    tbp +="<td style='text-align:center; class='align-middle'><i class='fas fa-check-circle text-success'></i></td>";
                                }
                                
                            }
                        }else{
                            tbp +="<td></td>";
                        }
                        
                        if(hasil[i].ANGKA_NORMAL === null){
                            tbp +="<td></td>";
                        }else{
                            tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].ANGKA_NORMAL+"</td>";
                        }

                        tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].ACC_TGL+"</td>";

                        if(hasil[i].JML === '0'){
                            tbp +="<td></td>";
                        }else{
                            tbp +="<td style='text-align:center; font-size:12px; class='align-middle'><a class='btn btn-sm btn-success btn-listlab text-white' data-toggle='modal' data-target='#listlab'"+getvariable+"<i class='fas fa-chart-line text-white'></i> CHART</a></td>";
                        }
                        
                    }
                    
                    
                    tbp +="</tr>";
                    
				}
	
				$("#resultlab").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function listlab(){
    var chart       = document.getElementById('chartlab').getContext('2d');
    var pasienidlab = $("input[name='pasienidlab']").val();
    var testid      = $("input[name='testid']").val();
    var pasienid    = $("input[name='pasienid']").val();
    var episodeid   = $("input[name='episodeid']").val();
    $.ajax({
		url:url+"index.php/history/listlab",
		data : {'pasienidlab':pasienidlab, 'testid':testid,'pasienid':pasienid,'episodeid':episodeid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
                var hasil = data.response;
                
                var label  = [];
                var nilai1 = [];

				for(var i in hasil){

                    label.push(hasil[i].CREATED_DATE);
                    nilai1.push(hasil[i].RESULT);

                    tbp +="<tr>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].SAMPEL_ID+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].NAME1+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].RESULT+"</td>";

                    if(hasil[i].FLAG === 'H'){
                        tbp +="<td style='text-align:center; class='align-middle'><i class='fas fa-arrow-circle-up text-danger'></i></td>";
                    }else{
                        if(hasil[i].FLAG === 'L'){
                            tbp +="<td style='text-align:center; class='align-middle'><i class='fas fa-arrow-circle-down text-danger'></i></td>";
                        }else{
                            tbp +="<td style='text-align:center; class='align-middle'><i class='fas fa-check-circle text-success'></i></td>";
                        }
                        
                    }

                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].CREATED_DATE+"</td>";
                    tbp +="</tr>";
                }

                if(myLineChart!=null){
                    myLineChart.destroy();
                }
                
                var myLineChart = new Chart(chart, {
                    type    :'line',
                    data    :{
                        datasets:[
                            {
                                data: nilai1,
                                backgroundColor: 'rgba(153, 102, 255,1)',
                                borderColor: 'rgba(153, 102, 255,1)',
                                pointStyle:'dot',
                                pointBackgroundColor: 'rgba(153, 102, 255,1)',
                                pointBorderColor: 'rgba(153, 102, 255,1)',
                                pointRadius: 3,
                                fill: false,
                                borderWidth: 3
                            }
                        ],
                        labels: label
                    },
                    options :{
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Graphic Result'
                        },
                        legend: {
                            display: false,
                            labels:{
                                fontColor: 'rgb(255, 255, 255)'
                            }
                        },                  
                        tooltips:{
                            titleFontFamily: 'Open Sans',
                            mode: 'index',
                            intersect: false,

                        },
                        animation:{
                            easing:'easeInBounce',
                            duration:2000
                        },
                        scales: {
                            xAxes:[{
                                stacked: false,
                                ticks:{
                                    // fontColor: "#FFF"
                                },
                                gridLines:{
                                    display : false,
                                    // color :'rgb(255, 255, 255)'
                                }
                            }],                                               
                            yAxes:[{                                              
                                stacked: false,
                                ticks: {
                                    callback:function(value, index, values){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");   
                                    },
                                    // fontColor: "#FFF"
                                },
                                gridLines:{
                                    display : true,
                                    // color :'rgb(255, 255, 255)'
                                }
                            }]
                        }
                    }   
                });
	
				$("#lislab").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function orderrad(){
    var pasienid  = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
		url:url+"index.php/history/orderrad",
		data : {'pasienid':pasienid,'episodeid':episodeid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
                var getvariable=""; 
				var hasil = data.response;

				for(var i in hasil){

                    getvariable =   "  data-pasienid='"+hasil[i].PASIEN_ID+
                                    "' data-episodeid='"+hasil[i].EPISODE_ID+
                                    "' data-transcorad='"+hasil[i].TRANS_CO+
                                    "'>";

                    tbp +="<tr>";
                    
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'><a href='#' class='btn btn-warning btn-xs btn-detailrad' data-toggle='modal' data-target='#detailrad'"+getvariable+"<strong><i class='far fa-eye'></i> DETAIL</strong></a></td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].TRANS_CO+"</td>"; 
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].NAMADOKTER+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].CREATED_DATE+"</td>";

                    tbp +="</tr>";
				}
	
				$("#tborderrad").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function detailrad(){
    var episodeid  = $("input[name='episodeid']").val();
    var transcorad = $("input[name='transcorad']").val();
    $.ajax({
		url:url+"index.php/history/detailrad",
		data : {'episodeid':episodeid,'transcorad':transcorad},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
                var getvariable=""; 
				var hasil = data.response;

				for(var i in hasil){

                    getvariable =   "  data-pasienid='"+hasil[i].PASIEN_ID+
                                    "' data-episodeid='"+hasil[i].EPISODE_ID+
                                    "' data-transcorad='"+hasil[i].TRANS_CO+
                                    "' data-transrad='"+hasil[i].TRANS_RAD+
                                    "'>";

                    tbp +="<tr>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].NAMAPELAYANAN+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'><a href='#' data-toggle='modal' data-target='#hasilrad' class='btn btn-xs btn-success btn-viewrad'"+getvariable+"VIEW</a></td>";
                    tbp +="</tr>";
				}
	
				$("#tbdetailrad").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function hasilrad(){
    var transrad  = $("input[name='transrad']").val();
    $.ajax({
		url:url+"index.php/history/hasilrad",
		data : {'transrad':transrad},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
				var hasil = data.response;

                tbp = hasil.RESULT_RTF;
	
				$("#resultrad").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function orderfrm(){
    var pasienid  = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
		url:url+"index.php/history/orderfrm",
		data : {'pasienid':pasienid,'episodeid':episodeid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
                var getvariable=""; 
				var hasil = data.response;

				for(var i in hasil){

                    getvariable =   "  data-pasienid='"+hasil[i].PASIEN_ID+
                                    "' data-episodeid='"+hasil[i].EPISODE_ID+
                                    "' data-transcofrm='"+hasil[i].TRANS_CO+
                                    "'>";

                    tbp +="<tr>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'><a href='#' class='btn btn-warning btn-xs btn-detresep' data-toggle='modal' data-target='#detailfrm'"+getvariable+"<strong><i class='far fa-eye'></i> DETAIL</strong></a></td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].TRANS_CO+"</td>"; 
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].DIBUATOLEH+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].TANGGAL+"</td>";
                    tbp +="</tr>";
				}
	
				$("#tborderfrm").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function detailfrm(){
    var pasienid  = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    var transcofrm   = $("input[name='transcofrm']").val();
    $.ajax({
		url:url+"index.php/history/detailfrm",
		data : {'pasienid':pasienid,'episodeid':episodeid,'transcofrm':transcofrm},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
				var hasil = data.response;

				for(var i in hasil){


                    tbp +="<tr>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].NAMA_OBAT+"</td>"; 
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].SATUAN+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].FREE_DOSIS+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].QTY+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].SIGNA_DOKTER+"</td>";
                    tbp +="</tr>";
				}
	
				$("#tbdetailobat").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function tindakanRI(){
    var pasienid  = $("input[name='pasienid']").val();
    var episodeid = $("input[name='episodeid']").val();
    $.ajax({
		url:url+"index.php/history/tindakanRI",
		data : {'pasienid':pasienid,'episodeid':episodeid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
                toastr["info"](data.metaData.message,"Sorry ! ");
			}else{
                var tbp        ="";
				var hasil = data.response;

				for(var i in hasil){


                    if(hasil[i].NAMAOPERATOR != null){
                        var operator = hasil[i].NAMAOPERATOR;
                    }else{
                        operator ="";
                    }

                    if(hasil[i].NAMAANASTESI != null){
                        var anastesi = hasil[i].NAMAANASTESI;
                    }else{
                        anastesi ="";
                    }

                    if(hasil[i].NAMAANAK != null){
                        var anak = hasil[i].NAMAANAK;
                    }else{
                        anak ="";
                    }

                    tbp +="<tr>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].JENIS+"</td>"; 
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].TANGGAL+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].NAMAPELAYANAN+"</td>";
                    tbp +="<td style='text-align:center; font-size:12px;' class='align-middle'>"+hasil[i].QTY+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+operator+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+anastesi+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+anak+"</td>";
                    tbp +="<td style='text-align:left; font-size:12px;' class='align-middle'>"+hasil[i].DIBUATOLEH+"</td>";
                    tbp +="</tr>";
				}
	
				$("#tbtindakanri").html(tbp);
            }

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
    })
}

function resume(){
	var pasienid    = $("input[name='pasienid']").val();
	var episodeid   = $("input[name='episodeid']").val();
    var tglmasuk    = $("input[name='tglmasuk']").val();
	var tglkeluar   = $("input[name='tglkeluar']").val();
	var namadokter  = $("input[name='namadokter']").val();
	var nobpjs      = $("input[name='nobpjs']").val();
	var norm        = $("input[name='norm']").val();
	var namapasien  = $("input[name='namapasien']").val();
	var asalpasien  = $("input[name='asalpasien']").val();
	var kelasrawat  = $("input[name='kelasrawat']").val();
	var alamat      = $("input[name='alamat']").val();
    var provider    = $("input[name='provider']").val();
    $.ajax({
		url:url+"index.php/ri/resume",
		data : {'pasienid':pasienid,'episodeid':episodeid},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
				Swal.fire('Sorry!',data.metaData.message,'error');
			}else{
				var resume="";
				var hasil = data.response;

				for(var i in hasil){

					if(hasil[i].KELUHAN!=null){
						var keluhan = hasil[i].KELUHAN;
						keluhan=keluhan.replace(/\n/g, "<br />");
					}else{
						keluhan="-";
					}

					if(hasil[i].GEJALA!=null){
						var gejala = hasil[i].GEJALA;
						gejala=gejala.replace(/\n/g, "<br />");
					}else{
						gejala="-";
					}

					if(hasil[i].STATUS!=null){
						var status = hasil[i].STATUS;
						status=status.replace(/\n/g, "<br />");
					}else{
						status="-";
					}

					if(hasil[i].LAINNYA!=null){
						var lainnya = hasil[i].LAINNYA;
						lainnya=lainnya.replace(/\n/g, "<br />");
					}else{
						lainnya="-";
					}

					if(hasil[i].RIWAYATPS!=null){
						var riwayatps = hasil[i].RIWAYATPS;
						riwayatps=riwayatps.replace(/\n/g, "<br />");
					}else{
						riwayatps="-";
					}

					if(hasil[i].RIWAYATPD!=null){
						var riwayatpd = hasil[i].RIWAYATPD;
						riwayatpd=riwayatpd.replace(/\n/g, "<br />");
					}else{
						riwayatpd="-";
					}

					if(hasil[i].VITAL!=null){
						var vital = hasil[i].VITAL;
						vital=vital.replace(/\n/g, "<br />");
					}else{
						vital="-";
					}

					if(hasil[i].INDIKASI!=null){
						var indikasi = hasil[i].INDIKASI;
						indikasi=indikasi.replace(/\n/g, "<br />");
					}else{
						indikasi="-";
					}

					if(hasil[i].OBATP!=null){
						var obat = hasil[i].OBATP;
						obat=obat.replace(/\n/g, "<br />");
					}else{
						obat="-";
					}

					if(hasil[i].KONTROL!=null){
						var kontrol = hasil[i].KONTROL;
						kontrol=kontrol.replace(/\n/g, "<br />");
					}else{
						kontrol="-";
					}

					if(hasil[i].INTRUKSI!=null){
						var instruksi = hasil[i].INTRUKSI;
						instruksi=instruksi.replace(/\n/g, "<br />");
					}else{
						instruksi="-";
					}

					if(hasil[i].KONDISI!=null){
						var kondisi = hasil[i].KONDISI;
						kondisi=kondisi.replace(/\n/g, "<br />");
					}else{
						kondisi="-";
					}

					if(hasil[i].SEVERITY!=null){
						var severity = hasil[i].SEVERITY;
						severity=severity.replace(/\n/g, "<br />");
					}else{
						severity="-";
					}
					
					var dll = hasil[i].DLL;
					if(dll === null){
						dll="";
					}else{
						dll=dll.replace(/\n/g, "<br />");
					}
					
                    resume +="<table class='table table-bordered table-head-fixed text-nowrap table-striped small'>";
					resume +="<tr>";
					resume +="<td>No Register</td>";
					resume +="<td>:</td>";
					resume +="<td>"+episodeid+"</td>";
					resume +="<td>Tanggal Masuk</td>";
					resume +="<td>:</td>";
					resume +="<td>"+tglmasuk+"</td>";
					resume +="</tr>";
					resume +="<tr>";
					resume +="<td>No Rekam Medis</td>";
					resume +="<td>:</td>";
					resume +="<td>"+norm+"</td>";
					resume +="<td>Tanggal Keluar</td>";
					resume +="<td>:</td>";
					resume +="<td>"+tglkeluar+"</td>";
					resume +="</tr>";
					resume +="<tr>";
					resume +="<td>Nama Pasien</td>";
					resume +="<td>:</td>";
					resume +="<td>"+namapasien+"</td>";
					resume +="<td>Ruang Rawat / Kelas</td>";
					resume +="<td>:</td>";
					resume +="<td>"+asalpasien+" / "+kelasrawat+"</td>";
					resume +="</tr>";
					resume +="<tr>";
					resume +="<td>Alamat</td>";
					resume +="<td>:</td>";
					resume +="<td>"+alamat+"</td>";
					resume +="<td>Penjamin</td>";
					resume +="<td>:</td>";
					resume +="<td>"+provider+"</td>";
					resume +="</tr>";
					resume +="<tr>";
					resume +="<td>Nama Dokter</td>";
					resume +="<td>:</td>";
					resume +="<td>"+namadokter+"</td>";
					resume +="<td>No BPJS</td>";
					resume +="<td>:</td>";
					resume +="<td>"+nobpjs+"</td>";
					resume +="</tr>";
					resume +="</table>";

					resume +="<hr>";

					resume += "<table>";
					resume += "<tbody id='tbresume'>";
					resume += "<tr>";
					resume += "<td colspan='6'><strong>RINGKASAN RIWAYAT PENYAKIT</strong></td>";
					resume += "</tr>";
					resume += "<tr>";
					resume += "<td style='width:300px;' class='align-top'>Keluhan Utama</td>";
					resume += "<td style='width:30px;' class='align-top'>:</td>";
					resume += "<td colspan='4'>"+keluhan+"</td>";
					resume += "</tr>";
					resume += "<tr>";
					resume += "<td style='width:300px;' class='align-top'>Gejala Penyerta</td>";
					resume += "<td style='width:30px;' class='align-top'>:</td>";
					resume += "<td colspan='4'>"+gejala+"</td>";
					resume += "</tr>";
					resume += "<tr>";
					resume += "<td style='width:300px;' class='align-top'>Riwayat Penyakit Sekarang</td>";
					resume += "<td style='width:30px;' class='align-top'>:</td>";
					resume += "<td colspan='4'>"+riwayatps+"</td>";
					resume += "</tr>";
					resume += "<td style='width:200px;' class='align-top'>Riwayat Penyakit Dahulu</td>";
					resume += "<td style='width:30px;' class='align-top'>:</td>";
					resume += "<td colspan='4'>"+riwayatpd+"</td>";
					resume += "</tr>";
					resume += "<tr>";
					resume += "<td colspan='6'><strong>PEMERIKSAAN FISIK</strong></td>";
					resume += "</tr>";
					resume += "<tr>";
					resume += "<td style='width:300px;' class='align-top'>Tanda-tanda Fisik</td>";
					resume += "<td style='width:30px;' class='align-top'>:</td>";
					resume += "<td colspan='4'>"+vital+"</td>";
					resume += "</tr>";
					resume += "<tr>";
					resume += "<td style='width:300px;' class='align-top'>Status Lokalis</td>";
					resume += "<td style='width:30px;' class='align-top'>:</td>";
					resume += "<td colspan='4'>"+status+"</td>";
					resume += "</tr>";
					resume += "<tr>";
					resume += "<td colspan='6'><strong>PEMERIKSAAN PENUNJANG</strong></td>";
					resume += "</tr>";
					resume += "<tr>";
					resume += "<td colspan='6'><strong class='font-italic'> * LABORATORIUM</strong></td>";
					resume += "</tr>";
					resume += "<tr>";
					resume += "<td colspan='2' class='text-center'><strong>NAMA PEMERIKSAAN</strong></td>";
					resume += "<td class='text-center'><strong>RESULT</strong></td>";
					resume += "<td class='text-center'><strong>UNIT</strong></td>";
					resume += "<td class='text-center'><strong>FLAG</strong></td>";
					resume += "<td class='text-center'><strong>NORMAL RESULT</strong></td>";
					resume += "</tr>";
				}

			}
			
			$.ajax({
				url:url+"index.php/ri/resumelab",
				data : {'episodeid':episodeid},
				method:"POST",
				dataType:"JSON",
				cache :false,
				success:function(data){
					if(data.metaData.code!="200"){
						Swal.fire('Sorry!',data.metaData.message,'error');
					}else{
						
						var hasil = data.response;
		
						for(var i in hasil){
							resume += "<tr>";
							
							if(hasil[i].RESULT_VALUE === null){
								resume += "<td colspan='6'><strong>"+hasil[i].NAMA_TEST+"</strong></td>";
							}else{
								resume += "<td> - "+hasil[i].NAMA_TEST+"</td>";
								resume += "<td>:</td>";
								resume += "<td style='width:200px;' class='text-center'>"+hasil[i].RESULT_VALUE+"</td>";

								if(hasil[i].UNIT === null){
									resume += "<td></td>";
								}else{
									resume += "<td class='text-center'>"+hasil[i].UNIT+"</td>";
								}
								
								if(hasil[i].RESULT_FLAG === null){
									resume += "<td></td>";
								}else{
									if(hasil[i].RESULT_FLAG === 'H'){
										resume += "<td class='text-center'><i class='fas fa-arrow-circle-up text-danger'></i></td>";
									}else{
										resume += "<td class='text-center'>"+hasil[i].RESULT_FLAG+"</td>";
									}
									
								}
								
								if(hasil[i].ANGKA_NORMAL === null){
									resume += "<td></td>";
								}else{
									resume += "<td class='text-center'>"+hasil[i].ANGKA_NORMAL+"</td>";
								}
								
							}
							
							resume += "</tr>";
						}
		
					}

					resume += "<tr>";
					resume += "<td colspan='6'><strong class='font-italic'>* PENCITRAAN DIAGNOSTIK</strong></td>";
					resume += "</tr>";
					
					$.ajax({
						url:url+"index.php/ri/resumerad",
						data : {'pasienid':pasienid,'episodeid':episodeid},
						method:"POST",
						dataType:"JSON",
						cache :false,
						success:function(data){
							if(data.metaData.code!="200"){
								Swal.fire('Sorry!',data.metaData.message,'error');
							}else{
								
								var hasil = data.response;
				
								for(var i in hasil){
									resume +="<tr>";
									resume +="<td></td>";
									resume +="<td colspan='5'> - "+hasil[i].NAMAPELAYANAN+"</td>";
									resume +="</tr>";
								}	
								
							}

							resume +="<tr>";
								resume +="<td colspan='6'><strong class='font-italic'>* LAINNYA</strong></td>";
								resume +="</tr>";
								resume +="<tr>";
								resume +="<td></td>";
								resume +="<td colspan='5'> - "+lainnya+"</td>";
								resume +="</tr>";
								
								resume += "<tr>";
								resume += "<td colspan='6'><strong>DIAGNOSA</strong></td>";
								resume += "</tr>";

								$.ajax({
									url:url+"index.php/ri/resumediag",
									data : {'episodeid':episodeid},
									method:"POST",
									dataType:"JSON",
									cache :false,
									success:function(data){
										if(data.metaData.code!="200"){
											Swal.fire('Sorry!',data.metaData.message,'error');
										}else{
											
											var hasil = data.response;
							
											for(var i in hasil){

												if(hasil[i].JENIS === '1'){
													resume +="<tr>";
													resume +="<td>Diagnosa Utama</td>";
													resume +="<td>:</td>";
													resume +="<td colspan='4'><strong>"+hasil[i].KODEICD+"</strong><span class='font-italic'> / "+hasil[i].DIAGNOSA+"</span></td>";
													resume +="</tr>";
												}else{
													resume +="<tr>";
													resume +="<td>Diagnosa Sekunder</td>";
													resume +="<td>:</td>";
													resume +="<td colspan='4'><strong>"+hasil[i].KODEICD+"</strong><span class='font-italic'> / "+hasil[i].DIAGNOSA+"</span></td>";
													resume +="</tr>";
												}
												
												
											}
											
										}

										resume +="<tr>";
											resume +="<td>Indikasi Rawat Inap</td>";
											resume +="<td>:</td>";
											resume +="<td colspan='4' class='font-italic'>"+indikasi+"</td>";
											resume +="</tr>";

											resume += "<tr>";
											resume += "<td colspan='6'><strong>TINDAKAN MEDIS</strong></td>";
											resume += "</tr>";

											$.ajax({
												url:url+"index.php/ri/resumetindakan",
												data : {'episodeid':episodeid},
												method:"POST",
												dataType:"JSON",
												cache :false,
												success:function(data){
													if(data.metaData.code!="200"){
														Swal.fire('Sorry!',data.metaData.message,'error');
													}else{
														
														var hasil = data.response;
										
														for(var i in hasil){

															resume +="<tr>";
															resume +="<td>Penatalaksanaan</td>";
															resume +="<td>:</td>";
															resume +="<td colspan='4'><strong>"+hasil[i].KODEICD+"</strong><span class='font-italic'> / "+hasil[i].DIAGNOSA+"</span></td>";
															resume +="</tr>";
															
														}

													}

													resume += "<tr>";
														resume += "<td colspan='6'><strong>TERAPI MEDIKA MENTOSA</strong></td>";
														resume += "</tr>";
														resume += "<tr>";
														resume += "<td colspan='6'>Obat Selama Perawatan</td>";
														resume += "</tr>";

														$.ajax({
															url:url+"index.php/ri/resumeobat",
															data : {'pasienid':pasienid,'episodeid':episodeid},
															method:"POST",
															dataType:"JSON",
															cache :false,
															success:function(data){
																if(data.metaData.code!="200"){
																	Swal.fire('Sorry!',data.metaData.message,'error');
																}else{
																	
																	var hasil = data.response;
													
																	for(var i in hasil){
			
																		resume +="<tr>";
																		resume +="<td></td>";
																		resume +="<td colspan='3'> - "+hasil[i].NAMA_OBAT+"</td>";
																		resume +="<td class='text-center'> "+hasil[i].JML+"</td>";
																		resume +="<td> "+hasil[i].SATUAN+"</td>";
																		resume +="</tr>";
																		
																	}
			
																	resume +="<tr>";
																	resume +="<td colspan='6'>Obat Pulang</td>";
																	resume +="</tr>";
																	resume +="<tr>";
																	resume +="<td></td>";
																	resume +="<td colspan='5'>"+obat+"</td>";
																	resume +="</tr>";

																	resume +="<tr>";
																	resume +="<td colspan='6'><strong>TINDAK LANJUT</strong></td>";
																	resume +="</tr>";

																	resume +="<tr>";
																	resume +="<td>Kontrol Ulang</td>";
																	resume +="<td>:</td>";
																	resume +="<td colspan='5'>"+kontrol+"</td>";
																	resume +="</tr>";

																	resume +="<tr>";
																	resume +="<td>Segera Bawa Ke Rumah Sakit Bila</td>";
																	resume +="<td>:</td>";
																	resume +="<td colspan='5'>"+instruksi+"</td>";
																	resume +="</tr>";

																	resume +="<tr>";
																	resume +="<td><strong>KONDISI PULANG</strong></td>";
																	resume +="<td>:</td>";
																	resume +="<td colspan='5'>"+kondisi+"</td>";
																	resume +="</tr>";

																	resume +="<tr>";
																	resume +="<td><strong>TINGKAT KEPARAHAN</strong></td>";
																	resume +="<td>:</td>";
																	resume +="<td colspan='5'>"+severity+"</td>";
																	resume +="</tr>";

																	resume +="<tr>";
																	resume +="<td><strong>LAIN-LAIN</strong></td>";
																	resume +="<td>:</td>";
																	resume +="<td colspan='5'>"+dll+"</td>";
																	resume +="</tr>";

																	resume += "</tbody>";
																	resume += "</table>";
						
																	$("#resume").html(resume);
																	
																}
													
															},
															error: function (e) {
																Swal.fire('Sorry !','Failed Connection Database','error');
															}
														})
										
												},
												error: function (e) {
													Swal.fire('Sorry !','Failed Connection Database','error');
												}
											})
							
									},
									error: function (e) {
										Swal.fire('Sorry !','Failed Connection Database','error');
									}
								})
				
						},
						error: function (e) {
							Swal.fire('Sorry !','Failed Connection Database','error');
						}
					})	
		
				},
				error: function (e) {
					Swal.fire('Sorry !','Failed Connection Database','error');
				}
			})

		},
		error: function (e) {
			Swal.fire('Sorry !','Failed Connection Database','error');
		}
	})
}