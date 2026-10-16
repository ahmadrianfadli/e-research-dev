$(document).on("click",".btn-pencarian", function(e){            
    e.preventDefault();
	daftarpasien();
});

$(document).on("click",".btn-lab", function(e){            
    e.preventDefault();
    orderlab($(this));
});

$(document).on("click",".btn-tindakan", function(e){            
    e.preventDefault();
    $("#tbtindakanri > tr").remove();
    tindakanRI($(this));
});

$(document).on("click",".btn-hasillab", function(e){            
    e.preventDefault();
    hasillab($(this));
});

$(document).on("click",".btn-listlab", function(e){            
    e.preventDefault();
    listlab($(this));
});

function orderlab(btn){
    var episodeid = btn.attr('data-episodeid');
	var pasienid =  btn.attr('data-pasienid');
	
	$.ajax({
		url:url+"index.php/internal/orderlab",
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

function hasillab(btn){
    var pasienidlab = btn.attr('data-pasienidlab');
    var sampelid    =  btn.attr('data-sampelid');
    
    $.ajax({
		url:url+"index.php/internal/hasillab",
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

function listlab(btn){
    var chart       = document.getElementById('chartlab').getContext('2d');

    var pasienidlab  = btn.attr('data-pasienidlab');
    var testid       = btn.attr('data-testid');
    var pasienid     = btn.attr('data-pasienid');
    var episodeid    = btn.attr('data-episodeid');

    $.ajax({
		url:url+"index.php/internal/listlab",
		data : {'pasienidlab':pasienidlab,'testid':testid,'pasienid':pasienid,'episodeid':episodeid},
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

function daftarpasien(){
    var pencarian  = $("input[name='pencarian']").val();
    var provider   = $("select[name='provider']").val();
    var jenis      = $("select[name='jenis']").val();
    var tawal      = $("input:text[name='tawalPROSES']").val();
    var takhir     = $("input:text[name='takhirPROSES']").val();

    $.ajax({
		url:url+"index.php/internal/daftarpasien",
		data : {'tawal':tawal,'takhir':takhir,'provider':provider,'jenis':jenis,'pencarian':pencarian},
        method:"POST",
        dataType:"JSON",
        cache :false,
        success:function(data){
			if(data.metaData.code!="200"){
				Swal.fire('Sorry!',data.metaData.message,'error');
			}else{
                var tbp         ="";
                var btnlab      ="";
                var btnrad      ="";
                var btntindakan ="";
                var getvariable =""; 
                var tindakan    ="";
                var hasil       =data.response;

                for(var i in hasil){

                    getvariable =   "  data-pasienid='"+hasil[i].PASIEN_ID+
									"' data-episodeid='"+hasil[i].EPISODE_ID+
									"'>";

                    btnlab   	=	"<a class='btn btn-sm btn-warning btn-lab mr-1 ml-1' data-toggle='modal' data-target='#orderlab'"+getvariable+"<i class='fas fa-flask'></i> LAB</a>";
                    btnrad    	=	"<a class='btn btn-sm btn-danger text-white btn-rad mr-1 ml-1' data-toggle='modal' data-target='#orderrad'"+getvariable+"<i class='fas fa-radiation text-white'></i> RAD</a>";
                    btntindakan	=	"<a class='btn btn-sm btn-primary text-white btn-tindakan mr-1 ml-1' data-toggle='modal' data-target='#tindakanri'"+getvariable+"<i class='fas fa-syringe text-white'></i> TINDAKAN</a>";

                    tbp +="<tr>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].NO+"</td>";
                    tbp +="<td>"+btnlab+btnrad+btntindakan+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].MRPAS+"</td>";
                    tbp +="<td style='text-align:left;' class='align-middle'>"+hasil[i].NAMAPAS+"</td>";
                    tbp +="<td style='text-align:left;' class='align-middle'>"+hasil[i].TEMPAT_LAHIR_TXT+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].TGL_LAHIR+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].UMUR+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].JENISKELAMIN+"</td>";
                    tbp +="<td style='text-align:left;' class='align-middle'>"+hasil[i].NO_SELULAR+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].PROVINSI+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].KABUPATEN+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].KECAMATAN+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].KELUARAHAN+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'> RW : "+hasil[i].RW+" RT : "+hasil[i].RT+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].KODE_POS+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].TGL_MASUK+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].TGL_KELUAR+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].EPISODE_ID+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].PROVIDER+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].POLIRUANGAN+"</td>";
                    tbp +="<td style='text-align:left;' class='align-middle'>"+hasil[i].NAMADOKTER+"</td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].KELAS+"</td>";
                    tbp +="<td style='text-align:left;' class='align-middle'>"+hasil[i].RUJUKAN+"</td>";
                    tbp +="<td style='text-align:left;' class='align-middle'>"+hasil[i].DIAGNOSA+"</td>";
                    tbp +="<td></td>";
                    tbp +="<td></td>";
                    tbp +="<td style='text-align:center;' class='align-middle'>"+hasil[i].CARAPULANG+"</td>";

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

function tindakanRI(btn){
    var pasienid  = btn.attr('data-pasienid');
    var episodeid = btn.attr('data-episodeid');

    $.ajax({
		url:url+"index.php/internal/tindakanRI",
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

$(function () {
    $('#datestartPROSES').datetimepicker({
        format: 'DD.MM.YYYY'
    });
});

$(function () {
    $('#dateendPROSES').datetimepicker({
        format: 'DD.MM.YYYY'
    });
});