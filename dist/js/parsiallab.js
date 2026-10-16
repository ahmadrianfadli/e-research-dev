datatransaksi();

function datatransaksi(){
    $.ajax({
            url     : url+"index.php/parsiallab/datatransaksi",
            method  : "POST",
            dataType: "JSON",
            cache   : false,
            success : function(data){
            
                var datatransaksi         ="";

			if(data.responCode === "00"){
				var result             =data.responResult;
				
				for(var i in result){
                    datatransaksi +="<tr class='row-clickable'";
                    datatransaksi +="data-index='"+i+"'";
                    datatransaksi +="data-filename='"+result[i].DIRFILELAB+"/"+result[i].FILENAMELAB+"'";
                    datatransaksi +=">";
                    datatransaksi +="<td>"+result[i].STATUSLAB+"</td>"; 
                    datatransaksi +="<td class='text-center'>"+result[i].MRPAS+"</td>"; 
                    datatransaksi +="<td>"+result[i].NAMAPASIEN+" <span class='badge badge badge-pill badge-info'>"+result[i].SEXID+"</span></td>";
                    datatransaksi +="<td class='text-center'>"+result[i].TGLLAHIR+"</td>"; 
                    
                    datatransaksi +="<td>"+result[i].TANGGALTRANSAKSI+"</td>"; 
                    datatransaksi +="</tr>";
				}
			}

            $("#datatransaksi").html(datatransaksi);

            $(".row-clickable").click(function () {
                $("#viewdoc").html('');
            
                var filename = $(this).data("filename");
                var responsefile = jQuery.ajax({ url: url + "dist/filescan/" + filename, type: 'HEAD', async: false }).status;
            
                if (responsefile === 200) {
                    viewfile = "<embed src='" + url + "dist/filescan/" + filename + "#toolbar=0&navpanes=0' width='100%' height='100%' type='application/pdf' id='view'>";
                } else {
                    viewfile = "<div class='alert alert-info alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h5><i class='far fa-comment-dots'></i> Information!</h5>Mohon Maaf File Tidak Di Temukan Dalam Sistem</div>";
                }
            
                // Append the viewfile content to the modal
                $("#viewdoc").html(viewfile);
            
                // Show the modal
                $("#view").modal("show");
            });
            
            // Ensure that the modal is hidden when it is closed
            $("#view").on("hidden.bs.modal", function () {
                $("#viewdoc").html('');
            });
		}
    });
    return false;
};