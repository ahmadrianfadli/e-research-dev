<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php            
            include_once("inc/link.php");
        ?>

    </head>

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">
        <div class="wrapper">
            <?php
                include_once("inc/navtop.php");
                include_once("inc/navleft.php");
            ?>

            <div class="content-wrapper small">
                <div class="card-body pb-0">

                    <div class="btn-group-sm flex-wrap" role="group" aria-label="Basic example">
                        <button data-toggle="modal" data-target="#pencarian" type="button" class="btn btn-danger"><i class="fas fa-search"></i> PENCARIAN</button>
                    </div>

                    <br>

                    <div class="card">
                        <div class="card-body table-responsive p-0" style="height: 600px;">
                            <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover" id="tableinternal">
                                <thead class="text-center">
                                    <tr>
                                        <th>NO</th>
                                        <th>ACTION</th>
                                        <th>MR</th>
                                        <th>NAMA PASIEN</th>
                                        <th>TEMPAT LAHIR</th>
                                        <th>TANGGAL LAHIR</th>
                                        <th>UMUR</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>NO TELP</th>
                                        <th>PROVINSI</th>
                                        <th>KABUPATEN</th>
                                        <th>KECAMATAN</th>
                                        <th>KELURAHAN</th>
                                        <th>RW / RT</th>
                                        <th>KODE POS</th>
                                        <th>TANGGAL MASUK</th>
                                        <th>TANGGAL KELUAR</th>
                                        <th>NO TRANSAKSI</th>
                                        <th>PROVIDER</th>
                                        <th>RUANGAN / POLI</th>
                                        <th>NAMA DOKTER</th>
                                        <th>KELAS</th>
                                        <th>DI RUJUK OLEH</th>
                                        <th>DIAGNOSA</th>
                                        <th>ICD X</th>
                                        <th>ICD IX</th>
                                        <th>STATUS PULANG</th>
                                    </tr>
                                </thead>
                                <tbody id="tbdaftarpasien"></tbody>
                            </table>
                        </div>
                    </div>
                    

                    
                </div>
            </div>

            <?php
                include_once("inc/footercontent.php");
                include_once("modal/logout.php");
                include_once("modal/internal.php");
                include_once("modal/prodiari.php");
            ?>

        </div>
    </body>

</html>

<?php
    include_once("inc/footer.php");
    // include_once("inc/timeout.php");
?>

<script type="text/javascript" src="<?php echo base_url();?>dist/js/internal.js"></script>