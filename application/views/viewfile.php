<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="rj">Riwayat Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Radioteraphy File</li>
                    </ol>
                </nav>
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            File Radioteraphy
                        </div>
                        <div class="card-body">
                            <embed src="http://rsudpasarminggu.jakarta.go.id/scanrm/FILESCAN/00/26/09/69/00260969_085_210707125740.pdf" width="100%" height="650px" type="application/pdf">
                        </div>
                    </div>
                </div>
            </div>

            <?php
                include_once("inc/footercontent.php");
                include_once("modal/logout.php");
                // include_once("modal/prodiari.php");
            ?>

        </div>
    </body>

</html>

<?php
    include_once("inc/footer.php");
    // include_once("inc/timeout.php");
?>

<!-- <script type="text/javascript" src="<?php echo base_url();?>dist/js/dashboard.js"></script> -->