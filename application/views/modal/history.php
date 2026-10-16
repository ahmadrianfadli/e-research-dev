            <div class="modal fade" id="regMRpasien" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header bg-success">
                            <h5 class="modal-title" id="exampleModalLabel">Registrasi Medical Record Prodia</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <div class="col-md-6">
                                <div class="input-group m-3">
                                    <input type="text" class="form-control" placeholder="Silakan Masukan Medical Record / Nama Pasien" id="pencarianREG" name="pencarianREG">
                                    <div class="input-group-append">
                                        <button class="btn btn-success btn-pencarianRegMR" type="button"><i class="fas fa-search"></i> PENCARIAN</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card m-4">
                                <div class="table-responsive" style="height: 650px;">
                                    <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                        <thead class="text-center">
                                            <tr>
                                                <th>ACTION</th>
                                                <th>MEDICAL RECORD</th>
                                                <th>NAMA PASIEN</th>
                                                <th>TGL MASUK</th>
                                                <th>RUANGAN</th>
                                                <th>DPJP</th>
                                                <th>PROVIDER</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbregmr"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="daftarpasien" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="exampleModalLabel">Daftar Pasien Rawat Inap</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <div class="col-md-6">
                                <div class="input-group m-3">
                                    <input type="text" class="form-control" placeholder="Silakan Masukan Medical Record" id="pencarian" name="pencarian">
                                    <div class="input-group-append">
                                        <?php if($_SESSION['jenisuser']==='JLEV10'||$_SESSION['jenisuser']==='JLEV12') {?>
                                            <button class="btn btn-danger btn-pencarianPRO" type="button"><i class="fas fa-search"></i> PENCARIAN</button>
                                        <?php } else { ?>
                                            <button class="btn btn-danger btn-pencarianALL" type="button"><i class="fas fa-search"></i> PENCARIAN</button>
                                        <?php  } ?>

                                    </div>
                                </div>
                            </div>


                            <div class="card m-4">
                                <div class="table-responsive" style="height: 650px;">
                                    <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                        <thead class="text-center">
                                            <tr>
                                                <th>ACTION</th>
                                                <th>MEDICAL RECORD</th>
                                                <th>NAMA PASIEN</th>
                                                <th>NO IDENTITAS</th>
                                                <th>JENIS KELAMIN</th>
                                                <th>TGL LAHIR</th>
                                                <th>UMUR</th>
                                                <th>NO TELP</th>
                                                <th>ALAMAT</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbdaftarpasien"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="alergi" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="exampleModalLabel">Daftar Alergi Pasien</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <div class="table-responsive" style="height: 300px;">
                                <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ALERGI</th>
                                            <th>CREATED BY</th>
                                            <th>CREATED DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbdaftaralergi"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="orderlab" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">

                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="exampleModalLabel">Order Penunjang Laboratorium</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <div class="table-responsive" style="height: 400px;">
                                <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ACTION</th>
                                            <th>NO ORDER</th>
                                            <th>CREATED BY</th>
                                            <th>CREATED DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tborderlab"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="orderrad" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">

                        <div class="modal-header bg-warning">
                            <h5 class="modal-title">Order Penunjang Radiologi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <div class="table-responsive" style="height: 400px;">
                                <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ACTION</th>
                                            <th>NO ORDER</th>
                                            <th>CREATED BY</th>
                                            <th>CREATED DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tborderrad"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="detailrad" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header bg-primary">
                            <h5 class="modal-title">Pemeriksaan Penunjang Radiologi</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <div class="table-responsive" style="height: 200px;">
                                <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th>NAMA PELAYANAN</th>
                                            <th>RESULT</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbdetailrad"></tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="hasilrad" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">

                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel">Result Radiology</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-3">
                            <div id="resultrad"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="hasillab" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="exampleModalLabel">Result Laboratory</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <div class="table-responsive" style="height: 800px;">
                                <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                    <thead class="text-center">
                                        <th>NAMA PEMERIKSAAN</th>
                                        <th>RESULT</th>
                                        <th>UNIT</th>
                                        <th>FLAG</th>
                                        <th>NORMAL RESULT</th>
                                        <th>APPROVAL DATE</th>
                                        <th>GRAPHIC</th>
                                    </thead>
                                    <tbody id="resultlab"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="listlab" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">

                        <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="exampleModalLabel">Summary List And Chart Result Laboratory</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <div class="card bg-light">
                                <canvas id="chartlab" width="100%" height="30"></canvas>
                            </div>
                            <hr>
                            <div class="table-responsive" style="height: 250px;">
                                <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                    <thead class="text-center">
                                        <th>NO SAMPEL</th>
                                        <th>NAMA PEMERIKSAAN</th>
                                        <th>RESULT</th>
                                        <th>FLAG</th>
                                        <th>APPROVAL DATE</th>
                                    </thead>
                                    <tbody id="lislab"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="orderfrm" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">

                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="exampleModalLabel">Order Penunjang Farmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <div class="table-responsive" style="height: 400px;">
                                <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ACTION</th>
                                            <th>NO ORDER</th>
                                            <th>CREATED BY</th>
                                            <th>CREATED DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tborderfrm"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="detailfrm" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="exampleModalLabel">DETAIL OBAT</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <div class="small">
                                <div class="table-responsive" style="height: 500px;">
                                    <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                        <thead class="text-center">
                                            <th>NAMA OBAT</th>
                                            <th>SATUAN</th>
                                            <th>DOSIS</th>
                                            <th>JUMLAH</th>
                                            <th>SIGNA</th>
                                        </thead>
                                        <tbody id="tbdetailobat"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="anamnesaigd" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header bg-success">
                            <h5 class="modal-title" id="exampleModalLabel">Anamnesa IGD</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <table class="table table-bordered table-head-fixed text-nowrap table-striped small">
                                <tr class="text-center">
                                    <th colspan="3">INFORMASI PASIEN</th>
                                    <th colspan="3">ANAMNESA PERAWAT</th>
                                    <th colspan="3">DATA PENUNJANG</th>
                                </tr>
                                <tr>
                                    <td style="width:50px;">Tanggal Masuk</td>
                                    <td style="width:1px;">:</td>
                                    <td><strong><span id="tglmasukanamigd"></span></strong></td>
                                    <td>Nama Perawat</td>
                                    <td>:</td>
                                    <td><strong><span id="namaanamigd"></span></strong></td>
                                    <td>EKG</td>
                                    <td>:</td>
                                    <td><strong><span id="ekganamigd"></span></strong></td>
                                </tr>
                                <tr>
                                    <td style="width:50px;">Jam Datang</td>
                                    <td style="width:1px;">:</td>
                                    <td><strong><span id="jamdatanganamigd"></span></strong></td>
                                    <td style="width:50px;">Jam Anamnesa</td>
                                    <td style="width:1px;">:</td>
                                    <td><strong><span id="jamanamanamigd"></span></strong></td>
                                    <td style="width:50px;">Laboratorium</td>
                                    <td>:</td>
                                    <td><strong><span id="labanamigd"></span></strong></td>
                                </tr>
                                <tr>
                                    <td style="width:50px;">Tingkat Kegawatan</td>
                                    <td style="width:1px;">:</td>
                                    <td><strong><span id="severityanamigd"></span></strong></td>
                                    <td style="width:50px;">Keluahan Utama</td>
                                    <td style="width:1px;">:</td>
                                    <td><strong><span id="keluhananamigd"></span></strong></td>
                                    <td style="width:50px;">AGD</td>
                                    <td style="width:1px;">:</td>
                                    <td><strong><span id="agdanamigd"></span></strong></td>
                                </tr>
                                <tr>
                                    <td style="width:50px;">Jenis Pelayanan</td>
                                    <td style="width:1px;">:</td>
                                    <td><strong><span id="jenisanamigd"></span></strong></td>
                                    <td style="width:50px;">Anamnesa</td>
                                    <td style="width:1px;">:</td>
                                    <td><strong><span id="anamnesaanamigd"></span></strong></td>
                                    <td style="width:50px;">Radiologi</td>
                                    <td style="width:1px;">:</td>
                                    <td><strong><span id="radanamigd"></span></strong></td>
                                </tr>
                                <tr>
                                    <td style="width:50px;">Alasan Datang</td>
                                    <td style="width:1px;">:</td>
                                    <td><strong><span id="alasananamigd"></span></strong></td>
                                    <td style="width:50px;">Riwayat Penyakit</td>
                                    <td style="width:1px;">:</td>
                                    <td><strong><span id="riwayatanamigd"></span></strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width:50px;">Cara Masuk</td>
                                    <td style="width:1px;">:</td>
                                    <td><strong><span id="caraanamigd"></span></strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>

                            <br>

                            <div class="card-header bg-success">
                                ASSESSMENT KEPERAWATAN
                            </div>

                            <div class="small">
                                <div class="overflow-auto p-0" id="pengkajianigd" style="height: 400px;"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="triaseigd" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header bg-success">
                            <h5 class="modal-title" id="exampleModalLabel">Triase IGD</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <div class="small">
                                <div class="overflow-auto p-0" id="pengkajiantriase" style="height: 800px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="tindakanri" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="exampleModalLabel">TINDAKAN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <div class="small">
                                <div class="table-responsive" style="height: 800px;">
                                    <table
                                        class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                        <thead class="text-center">
                                            <th>KATEGORI</th>
                                            <th>TANGGAL</th>
                                            <th>NAMA PELAYANAN</th>
                                            <th>QTY</th>
                                            <th>DOKTER OPERATOR</th>
                                            <th>DOKTER ANASTESI</th>
                                            <th>DOKTER ANAK</th>
                                            <th>DIBUAT OLEH</th>
                                        </thead>
                                        <tbody id="tbtindakanri"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>