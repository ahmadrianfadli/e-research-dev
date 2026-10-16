<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php            
            include_once("inc/link.php");
        ?>
        
    </head>
    
    <body class="hold-transition lockscreen">
        <div class="lockscreen-wrapper">
            <div class="lockscreen-logo">
                <b>E-RESEARCH</b> | RSUD Pasar Minggu
            </div>

            <div class="lockscreen-name"><?php echo $this->session->userdata('nama');?></div>

            <br>

            <div class="lockscreen-item">
                
                <div class="lockscreen-image">
                    <img src="<?php echo base_url();?>dist/img/default.svg" alt="User Image">
                </div>
                
                <form method="post" id="formLogin" class="lockscreen-credentials" action="<?php echo base_url();?>index.php/login/loginsystem">
                    
                    <input type="hidden" name="username" value="<?php echo $this->session->userdata('nik');?>">
                    
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="password" required>

                        <div class="input-group-append">
                            <input type="submit" class="btn btn-danger" style="background:green;" value="LOGIN">
                        </div>
                    </div>
                    
                </form>

            </div>

            </div>
                <div class="help-block text-center">
                    Enter your password to retrieve your session
                </div>

                <div class="text-center">
                    <a href="<?php echo base_url();?>index.php/login">Or sign in as a different user</a>
                </div>

                <div class="lockscreen-footer text-center">
                    Copyright &copy; 2020 <b>SIMRS RSUD Pasar Minggu</b>
                    <br>
                    All rights reserved
                </div>

            </div>
        </div>
    </body>
</html>

<?php
    include_once("inc/footer.php");
?>

<script type="text/javascript" src="<?php echo base_url();?>dist/js/login.js"></script>