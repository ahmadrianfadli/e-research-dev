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

            <div class="content-wrapper">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="btn-group-sm flex-wrap" role="group" aria-label="Basic example">
                            <button data-toggle="modal" data-target="#daftarpasien" type="button" class="btn btn-danger"><i class="fas fa-search"></i> PENCARIAN</button>
                            
                            <?php
                                if($_SESSION['jenisuser']==='JLEV1'||$_SESSION['jenisuser']==='JLEV11') {
                                    ?>
                                        <button data-toggle="modal" data-target="#regMRpasien" type="button" class="btn btn-success"><i class="fas fa-cogs"></i> SETTING</button>
                                    <?php
                                }
                            ?>

                            <button id="btngroupIGD" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-ambulance"></i> INSTALASI GAWAT DARURAT</button>
                            <div class="dropdown-menu" aria-labelledby="btngroupIGD">
                                <button data-toggle="modal" data-target="#triaseigd" type="button" class="dropdown-item btn-triaseigd">TRIASE IGD</button>
                                <button data-toggle="modal" data-target="#anamnesaigd" type="button" class="dropdown-item btn-anamnesaigd">ANAMNESA IGD</button>
                                <!-- <button data-toggle="modal" data-target="#" type="button" class="dropdown-item"><i class="fas fa-flask"></i> OBSERVASI IGD</button> -->
                                <!-- <button data-toggle="modal" data-target="#" type="button" class="dropdown-item"><i class="fas fa-flask"></i> ALAT IGD</button> -->
                                <!-- <button data-toggle="modal" data-target="#" type="button" class="dropdown-item"><i class="fas fa-flask"></i> PEMBERIAN OBAT</button> -->
                            </div>

                            
                            <button data-toggle="modal" data-target="#orderrad"   type="button" class="btn btn-secondary"><i class="fas fa-radiation"></i> RADIOLOGI</button>
                            <button data-toggle="modal" data-target="#orderlab"   type="button" class="btn btn-warning"><i class="fas fa-flask"></i> LABORATORIUM</button>
                            <button data-toggle="modal" data-target="#orderfrm"   type="button" class="btn btn-warning"><i class="fas fa-pills"></i> FARMASI</button>
                            <button data-toggle="modal" data-target="#tindakanri" type="button" class="btn btn-warning"><i class="fas fa-syringe"></i> TINDAKAN</button>
                            <button data-toggle="modal" data-target="#alergi"     type="button" class="btn btn-danger"><i class="fas fa-allergies"></i> ALERGI</button>
                            <?php
                                if($_SESSION['jenisuser']!='JLEV10'&&$_SESSION['jenisuser']!='JLEV12') {
                                    ?>
                                        <button data-toggle="modal" data-target="#resumeri"   type="button" class="btn btn-secondary btn-resume"><i class="fas fa-notes-medical"></i> RESUME MEDIS</button>
                                    <?php
                                }
                            ?>
                            
                            
                        </div>
                    </div>
                    
                    <br>

                    <div class="row">
                        <div class="col-md-3 p-0">
                            <div class="card card-outline card-danger bg-light">
                                <div class="card-header border-bottom-0">
                                    <strong>INFORMASI PASIEN</strong>
                                </div>
                                <div class="card-body pt-0 ml-2">

                                    <input type="hidden" name="pasienid">
                                    <input type="hidden" name="episodeid">
                                    <input type="hidden" name="transid">
                                    <input type="hidden" name="transcolab">
                                    <input type="hidden" name="transcorad">
                                    <input type="hidden" name="transrad">
                                    <input type="hidden" name="transcofrm">
                                    <input type="hidden" name="sampelid">
                                    <input type="hidden" name="pasienidlab">
                                    

                                    <div class="row mb-0">
                                        <h2 class="lead"><b><span id="namapas">NAME PATIENT</span></b></h2>
                                    </div>
                                    <div class="row">
                                        <ul class="ml-4 mb-0 fa-ul text-muted small">
                                            <li>
                                                <span class="fa-li">
                                                    <i class="fas fa-file-medical"></i>
                                                </span>
                                                <span id="mrpas">MEDICAL RECORD</span>
                                            </li>
                                            <li>
                                                <span class="fa-li">
                                                    <i class="fas fa-birthday-cake"></i>
                                                </span>
                                                <span id="tgllahir">BOD</span>
                                            </li>
                                            <li>
                                                <span class="fa-li">
                                                    <i class="fas fa-venus-mars"></i>
                                                </span>
                                                <span id="sex">SEX</span>
                                            </li>
                                            <li>
                                                <span class="fa-li">
                                                    <i class="fas fa-phone"></i>
                                                </span>
                                                <span id="tlp">PHONE</span>
                                            </li>
                                            <li>
                                                <span class="fa-li">
                                                    <i class="fas fa-map-marked-alt"></i>
                                                </span>
                                                <span id="alamat">ADDRESS</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-outline card-danger bg-light">
                                <div class="card-header border-bottom-0">
                                    <strong>DETAILS TRANSAKSI</strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body pt-0 ml-2 small">
                                    <table>
                                        <tr>
                                            <td><span>Tanggal Masuk</span></td>
                                            <td>:</td>
                                            <td><strong><span id="tglmasuk"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td><span>DPJP</span></td>
                                            <td>:</td>
                                            <td><strong><span id="dpjp"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td><span>Ruangan</span></td>
                                            <td>:</td>
                                            <td><strong><span id="ruangan"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td><span>Provider</span></td>
                                            <td>:</td>
                                            <td><strong><span id="provider"></span></strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card card-outline card-danger">
                                <div class="card-header">
                                    Riwayat Kunjungan Pasien
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive" style="height: 310px;">
                                        <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>ACTION</th>
                                                    <th>NO TRANSAKSI</th>
                                                    <th>TGL MASUK</th>
                                                    <th>RUANGAN</th>
                                                    <th>DPJP</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbriwayat"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Start Load soap -->

                        <div class="col-md-9">

                        <ul class="nav nav-tabs nav-pills nav-fill" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="soap-tab" data-toggle="tab" href="#soap" role="tab" aria-controls="soap" aria-selected="true">SOAP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="cttprwt-tab" data-toggle="tab" href="#cttprwt" role="tab" aria-controls="cttprwt" aria-selected="false">CATATAN PERAWAT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="gizi-tab" data-toggle="tab" href="#gizi" role="tab" aria-controls="gizi" aria-selected="false">GIZI</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-1" id="soap" role="tabpanel" aria-labelledby="soap-tab">
                                <div class="card small">
                                    <div class="card-body overflow-auto" id="soapri" style="height: 700px;"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade mt-1" id="cttprwt" role="tabpanel" aria-labelledby="cttprwt-tab">
                                <div class="card small">
                                    <div class="card-body overflow-auto" id="cttperawat" style="height: 700px;"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade mt-1" id="gizi" role="tabpanel" aria-labelledby="gizi-tab">
                                <div class="card small">
                                    <div class="card-body overflow-auto" id="cttgizi" style="height: 700px;"></div>
                                </div>
                            </div>
                        </div>
                            
                        </div>
                        <!-- End Load soap -->
                    </div>
                </div>
            </div>

            <?php
                include_once("inc/footercontent.php");
                include_once("modal/logout.php");
                include_once("modal/history.php");
                include_once("modal/ri.php");
            ?>

        </div>
    </body>

</html>

<?php
    include_once("inc/footer.php");
    // include_once("inc/timeout.php");
?>

<script type="text/javascript" src="<?php echo base_url();?>dist/js/history.js"></script>