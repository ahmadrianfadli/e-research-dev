<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script> var url = '<?php echo base_url();?>'; </script>

        <link rel="icon"       type="image/gif" href="<?php echo base_url();?>dist/img/favicon.png">
        <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>dist/css/login.css">
        <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>dist/css/utils.css">
        <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>plugins/toastr/toastr.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugins/mdb/css/mdb.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugins/fontawesome/css/all.min.css">

        <title><?php echo $title;?></title>
    </head>
    <body>
        <div class="container">
            <div class="background">
                <img class="animated bounceInDown slow" src="<?php echo base_url();?>dist/img/background.png" >
            </div>
            <div class="login-content animated bounceInDown slow">
                <form method="post" id="formLogin" action="<?php echo base_url();?>index.php/login/loginsystem">
                    <img src="<?php echo base_url();?>dist/img/avatar.svg" >
                    <h1><strong><?php echo $title;?></strong></h1>
                    <h1><strong>RSUD Pasar Minggu</strong></h1>
                    
                    <br>

                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>Username</h5>
                            <input type="text" name="username" class="input">
                        </div>
                    </div>

                    <div class="input-div pass">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <h5>Password</h5>
                            <input type="password" name="password"  class="input">
                        </div>
                    </div>

                    <input class="btn" type="submit" value="LOGIN">
                </form>

            </div>
        </div>
    </body>
</html>

<?php
    include_once("inc/footer.php");
?>

<script type="text/javascript" src="<?php echo base_url();?>dist/js/login.js"></script>