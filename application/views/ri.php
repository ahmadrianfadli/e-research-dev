<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include_once("inc/link.php");
    ?>

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
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Silakan Masukan No MR / No BPJS / No SEP" name="pencarian" id="pencarian">
                        <div class="input-group-append">
                            <button class="btn btn-danger btn-cari" type="button"><i class="fas fa-search"></i> PENCARIAN</button>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <input type="hidden" name="pasienid">
                    <input type="hidden" name="pasienidlab">
                    <input type="hidden" name="episodeid">
                    <input type="hidden" name="provider">
                    <input type="hidden" name="sampleid">
                    <input type="hidden" name="testid">
                    <input type="hidden" name="transcorad">
                    <input type="hidden" name="transrad">
                    <input type="hidden" name="jenisopr">
                    <input type="hidden" name="triaseigd">

                    <div class=" table-responsive p-0" style="height:760px;">
                        <table class="table table-head-fixed table-bordered table-striped table-hover align-middle small">
                            <thead class="text-center">
                                <th>IDENTITAS PASIEN</th>
                                <th>NO TRANSAKSI</th>
                                <th>RUANGAN</th>
                                <th>TGL MASUK</th>
                                <th>TGL KELUAR</th>
                                <th>MENU</th>
                            </thead>
                            <tbody id="riwayatri"></tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

        <?php
        include_once("inc/footercontent.php");
        include_once("modal/logout.php");
        include_once("modal/research.php");
        ?>

    </div>
</body>

</html>

<?php
include_once("inc/footer.php");
?>

<script>
    var jenisuser = '<?= $_SESSION['jenisuser'] ?>';
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>dist/js/ri.js?v=<?= time() ?>"></script>