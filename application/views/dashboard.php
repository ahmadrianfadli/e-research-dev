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
                    <!-- <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        </div>
                    </div> -->
                </div>

                <section class="content">
                    <!-- <div class="card card-outline card-danger">
                        <div class="card-header">
                            Header
                        </div>
                        <div class="card-body" style="height:800px;">
                            Body
                        </div>
                        <div class="card-footer">
                            Footer
                        </div>
                    </div> -->
                </section>
            </div>

            <?php
                include_once("inc/footercontent.php");
                include_once("modal/logout.php");
            ?>
            
        </div>
    </body>
</html>

<?php
    include_once("inc/footer.php");
?>