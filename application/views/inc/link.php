<script>
    var url = '<?php echo base_url(); ?>';
</script>

<link rel="icon" type="image/gif" href="<?php echo base_url(); ?>dist/img/favicon.png">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/adminlte/css/adminlte.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/toastr/toastr.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/sweetalert2/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/dropzone/min/dropzone.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/select2/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dist/css/scroolbars.css?v=<?= time() ?>">


<?php
$current_url = $_SERVER['REQUEST_URI'];
if ($current_url === "/rsudpasarminggu/prod/e-research/" || $current_url === "/rsudpasarminggu/prod/e-research/index.php/login") {
    echo "<link rel='stylesheet' type='text/css'  href='" . base_url() . "dist/css/login.css'>";
}
?>



<title><?php echo $title; ?></title>