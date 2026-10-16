<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <?php            
            include_once("inc/link.php");
        ?>

    <style>
		body {
			background: #f7f7f7;
			/* font-family: 'Montserrat', sans-serif; */
		}

		.dropzone {
			background: #fff;
            border: 5px dashed #0069d9;
			border-radius: 5px;
		}

		.dz-message {
			color: #999;
		}

		.dz-message:hover {
			color: #0069d9;
		}        

		.dz-message h3 {
			font-size: 200%;
			margin-bottom: 15px;
		}
	</style>

    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
        <div class="wrapper">
            
            <?php            
                include_once("inc/preloader.php");
                include_once("inc/navtop.php");
                include_once("inc/navleft.php");
            ?>

            <div class="content-wrapper">

                <div class="content-header">
                    <div class="container-fluid">
                        <a class="btn btn-sm btn-info"    id="btn-cari"     href="" data-toggle="modal" data-target="#pilihpasien" ><i class="fas fa-search"></i> CARI PASIEN</a>
                        <a class="btn btn-sm btn-danger"  id="btn-selesai"  href=""><i class="fas fa-check-double"></i> SELESAI</a>
                        <a class="btn btn-sm btn-success btn-viewfile" id="btn-viewfile" href="" data-toggle="modal" data-target="#historyfile"><i class="far fa-eye"></i> VIEW</a>
                    </div>
                </div>

                <section class="content">
                    <input type="hidden" name="urlsimpan">
                    <input type="hidden" name="dirurl">
                    <input type="hidden" name="dirfile">
                    <input type="hidden" name="pasienid">
                    <input type="hidden" name="episodeid">
                    <input type="hidden" name="jenisepisode">

                    <div class="card card-outline card-info">
                        <div class="card-header">
                            Informasi Pasien
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table class="table table-head-fixed table-border table-sm align-middle table-striped small">
                                    <tbody>
                                        <tr>
                                            <td>Medical Record</td>
                                            <td>:</td>
                                            <td><strong><span id="mrpas"></span></strong></td>
                                            <td>Nama Dokter</td>
                                            <td>:</td>
                                            <td><strong><span id="namadokter"></span></strong></td>
                                            <td>No Transaksi</td>
                                            <td>:</td>
                                            <td><strong><span id="notransaksi"></span></strong></td>
                                            <td>Tanggal Masuk</td>
                                            <td>:</td>
                                            <td><strong><span id="tglmasuk"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pasien</td>
                                            <td>:</td>
                                            <td><strong><span id="namapas"></span></strong></td>
                                            <td>Poli / Ruangan</td>
                                            <td>:</td>
                                            <td><strong><span id="asalpasien"></span></strong></td>
                                            <td>Jenis Transaksi</td>
                                            <td>:</td>
                                            <td><strong><span id="jenistransaksi"></span></strong></td>
                                            <td>Tanggal Keluar</td>
                                            <td>:</td>
                                            <td><strong><span id="tglkeluar"></span></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Silakan Masukan Nama Dokumen" id="pencariandoc" name="pencariandoc">
                        <div class="input-group-append">
                            <button class="btn btn-danger btn-pencariandoc" type="button"><i class="fas fa-search"></i> PENCARIAN</button>
                        </div>
                    </div>

                    <br>

                    <div class="row connectedSortable" id="dropbox"></div>
                    
                </section>
            </div>

            <?php
                include_once("inc/footercontent.php");
                include_once("modal/upload.php");
                include_once("modal/logout.php");
            ?>
            
        </div>
    </body>
</html>

<?php
    include_once("inc/footer.php");
?>

<script type="text/javascript" src="<?php echo base_url();?>dist/js/upload.js"></script>

<script type="text/javascript" id="scripdropbox"></script>