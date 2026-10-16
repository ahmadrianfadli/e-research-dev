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
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed dark-mode text-sm">
        <div class="wrapper">
            
            <?php            
                include_once("inc/preloader.php");
                include_once("inc/nav.php");
                include_once("inc/aside.php");
            ?>

            <div class="content-wrapper">

                <section class="content-header">
                    <div class="container-fluid">
                    </div>
                </section>

                <section class="content">
                    <div class=" table-responsive p-0" style="height:760px;">
                        <table class="table table-sm table-head-fixed table-bordered table-striped table-hover align-middle small">
                            <thead class="text-center">
                                <th>STATUS</th>
                                <th>MEDICAL RECORD</th>
                                <th>PATIENT NAME</th>
                                <th>BOD</th>
                                <th>TRANSACTION DATE</th>
                            </thead>
                            <tbody id="datatransaksi"></tbody>
                        </table>
                    </div>
                </section>
            </div>

            <?php
                include_once("inc/footercontent.php");
                include_once("modal/logout.php");
                include_once("modal/root.php");
            ?>
            
        </div>
    </body>
</html>

<?php
    include_once("inc/footer.php");
?>

<script type="text/javascript" src="<?php echo base_url();?>dist/js/parsiallab.js"></script>