            <div class="modal fade" id="lampiran" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white"><i class="far fa-file-pdf"></i> Dokumen Lampiran</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body" style="height:800px;">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasienlampiran"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjslampiran"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasienlampiran"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirlampiran"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="noseplampiran"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuanlampiran"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadokterlampiran"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjunganlampiran"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <span class="font-italic font-weight-bold">Klik Untuk Membuka Lampiran</span>

                            <div class="row">
                                <div class="col-md-3">
                                    <div style="max-height: 500px;overflow:auto;">
                                        <table class="table table-bordered table-striped small">
                                            <thead style="position: sticky;top: 0;background-color:#ffffff;z-index:101;">
                                                <tr>
                                                    <th>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="checkalllampiran" checked>
                                                            <label class="form-check-label" for="checkalllampiran">
                                                                Pilih Semua
                                                            </label>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="riwayatlampiran"></tbody>
                                        </table>
                                    </div>

                                    <?php if ($_SESSION['jenisuser'] != 'JLEV7') { ?>
                                        <button type="button" class="btn btn-primary" id="download-lampiran">Download Lampiran</button>
                                    <?php } ?>
                                </div>
                                <div class="col-md-9" id="viewfile"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="rincianbilling" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title text-white"><i class="fas fa-coins"></i> RINCIAN BILLING</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasienbilling"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjsbilling"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasienbilling"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirbilling"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="nosepbilling"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuanbilling"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadokterbilling"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjunganbilling"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="table-responsive" style="height: 500px;">
                                <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover align-middle small">
                                    <thead>
                                        <tr class="text-center">
                                            <th>NO TRANSAKSI</th>
                                            <th>TANGGAL</th>
                                            <th>NAMA PELAYANAN</th>
                                            <th>QTY</th>
                                            <th>SATUAN</th>
                                            <th>HARGA SATUAN</th>
                                            <th>SUB TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbrincianpasien"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="orderlab" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title"><i class="fas fa-flask"></i> PEMERIKSAAN LABORATORIUM</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body">
                                    <table class="table table-table-responsive table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasienlab"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjslab"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasienlab"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirlab"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="noseplab"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuanlab"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadokterlab"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjunganlab"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            List Order
                                        </div>
                                        <div class="card-body table-responsive p-0" style="height:500px;">
                                            <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover align-middle small">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>NO ORDER</th>
                                                        <th>ORDER BY</th>
                                                        <!-- <th>CREATED DATE</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="listorder"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            Result
                                        </div>
                                        <div class="card-body table-responsive p-0" style="height:500px;">
                                            <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover align-middle small">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>EXAMINATION</th>
                                                        <th>RESULT</th>
                                                        <th>UNIT</th>
                                                        <th>FLAG</th>
                                                        <th>NORMAL RESULT</th>
                                                        <th>GRAPHIC</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="resultlab"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="orderrad" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title"><i class="fas fa-radiation"></i> PEMERIKSAAN RADIOLOGI</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body">
                                    <table class="table table-table-responsive table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasienrad"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjsrad"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasienrad"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirrad"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="noseprad"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuanrad"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadokterrad"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjunganrad"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            List Order
                                        </div>
                                        <div class="card-body table-responsive p-0" style="height:250px;">
                                            <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover align-middle small">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>NO ORDER</th>
                                                        <th>ORDER BY</th>
                                                        <!-- <th>CREATED DATE</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="listorderrad"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            Detail Order
                                        </div>
                                        <div class="card-body table-responsive p-0" style="height:250px;">
                                            <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover align-middle small">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>SAMPLE ID</th>
                                                        <th>EXAMINATION</th>
                                                        <!-- <th>CREATED DATE</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="detailorder"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            Result
                                        </div>
                                        <div class="card-body p-2" style="height:570px;">
                                            <div class="overflow-auto" id="resultrad" style="height:570px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="chartlab" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title"><i class="fas fa-chart-line"></i> Chart Result Laboratory</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="card bg-light">
                                <canvas id="chartlaboratory" width="100%" height="30"></canvas>
                            </div>
                            <hr>
                            <div class="table-responsive" style="height: 250px;">
                                <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover small">
                                    <thead class="text-center">
                                        <th>SAMPLE ID</th>
                                        <th>EXAMINATION</th>
                                        <th>RESULT</th>
                                        <th>FLAG</th>
                                        <th>APPROVAL DATE</th>
                                    </thead>
                                    <tbody id="listchartlab"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="resumerj" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary">
                            <h5 class="modal-title"><i class="fas fa-file-medical"></i> Resume Medis</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body">
                                    <table class="table table-table-responsive table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasienresume"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjsresume"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasienresume"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirresume"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="nosepresume"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuanresume"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadokterresume"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjunganresume"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive" style="height:500px;">
                                <table class="table table-bordered table-striped small">
                                    <tbody id="diagnosa"></tbody>
                                    <tbody id="tindakanmedis"></tbody>
                                    <tbody id="anamnesa"></tbody>
                                    <tbody id="instruksi"></tbody>
                                    <tbody id="resumeri"></tbody>
                                </table>
                                <table class="table table-bordered table-striped small">
                                    <tbody id="lab"></tbody>
                                </table>
                                <table class="table table-bordered table-striped small">
                                    <tbody id="rad"></tbody>
                                    <tbody id="lainnya"></tbody>
                                </table>
                                <table class="table table-bordered table-striped small">
                                    <tbody id="obat"></tbody>
                                </table>
                                <table class="table table-bordered table-striped small">
                                    <tbody id="tindaklanjut"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="konsul" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title"><i class="fas fa-user-md text-white"></i> Konsultasi Dokter</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body">
                                    <table class="table table-table-responsive table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasienkonsul"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjskonsul"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasienkonsul"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirkonsul"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="nosepkonsul"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuankonsul"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadokterkonsul"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjungankonsul"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="p-3 overflow-auto" id="konsultasi" style="height: 600px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="oprri" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title"><i class="fas fa-file-medical"></i> Laporan Operasi / Persalinan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body">
                                    <table class="table table-table-responsive table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasienlapok"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjslapok"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasienlapok"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirlapok"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="noseplapok"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuanlapok"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadokterlapok"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjunganlapok"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="p-3 overflow-auto" id="laporanok" style="height: 600px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="soap" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title"><i class="fas fa-user-md text-white"></i> SOAP</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body">
                                    <table class="table table-table-responsive table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasiensoap"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjssoap"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasiensoap"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirsoap"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="nosepsoap"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuansoap"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadoktersoap"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjungansoap"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="p-3 overflow-auto" id="listsoap" style="height: 600px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="triase" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary">
                            <h5 class="modal-title"><i class="fas fa-file-medical"></i> Triase IGD</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body">
                                    <table class="table table-table-responsive table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasientriase"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjstriase"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasientriase"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirtriase"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="noseptriase"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuantriase"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadoktertriase"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjungantriase"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive" style="height:500px;">
                                <table class="table table-table-responsive table-bordered table-sm align-middle small">
                                    <tbody>
                                        <tr>
                                            <td>Rujukan Dari</td>
                                            <td colspan="3">
                                                <div id="rujuk"></div>
                                            </td>
                                            <td>Macam Kasus</td>
                                            <td colspan="2">
                                                <div id="kasus"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alergi</td>
                                            <td colspan="6">
                                                <div id="alergi"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Subyektif / Anamnesis</td>
                                            <td colspan="6"><strong><span id="anam"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="7">Obyektif</td>
                                            <td rowspan="3">Kesadaran Umum</td>
                                            <td rowspan="3" colspan="2">
                                                <div id="ku"></div>
                                            </td>
                                            <td>Tekanan Darah</td>
                                            <td colspan="2"><strong><span id="td"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Frekuensi Nadi</td>
                                            <td colspan="2"><strong><span id="nadi"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Frekuensi Nafas</td>
                                            <td colspan="2"><strong><span id="nafas"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="3">Kesadaran GCS</td>
                                            <td>E</td>
                                            <td><strong><span id="e"></span></strong></td>
                                            <td>Suhu</td>
                                            <td colspan="2"><strong><span id="suhu"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>M</td>
                                            <td><strong><span id="m"></span></strong></td>
                                            <td>Berat Badan</td>
                                            <td colspan="2"><strong><span id="bb"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>V</td>
                                            <td><strong><span id="v"></span></strong></td>
                                            <td>Tinggi Badan</td>
                                            <td colspan="2"><strong><span id="tb"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Resiko Jatuh</td>
                                            <td colspan="2">
                                                <div id="jatuh"></div>
                                            </td>
                                            <td>Skala Nyeri</td>
                                            <td colspan="2">
                                                <div id="nyeri"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="4">Airway</td>
                                            <td rowspan="4" colspan="3">
                                                <div id="airway"></div>
                                            </td>
                                            <td rowspan="4">Breating</td>
                                            <td>Irama Pernafasan</td>
                                            <td>
                                                <div id="ip"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bunyi Nafas Tambahan</td>
                                            <td>
                                                <div id="nt"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pengembangan Paru</td>
                                            <td>
                                                <div id="paru"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Penggunaan Otot Bantu Nafas</td>
                                            <td>
                                                <div id="otot"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Circulation</td>
                                            <td>Pengisian Kapiler</td>
                                            <td colspan="2">
                                                <div id="kap"></div>
                                            </td>
                                            <td>Ekstremitas</td>
                                            <td colspan="2">
                                                <div id="eks"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Assessment Triase</td>
                                            <td colspan="6">
                                                <div id="assesment"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tindak Lanjut</td>
                                            <td colspan="6">
                                                <div id="tl"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="explab" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary">
                            <h5 class="modal-title"><i class="fas fa-file-medical"></i> Expertise Laboratorium</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body">
                                    <table class="table table-table-responsive table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasienexplab"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjsexplab"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasienexplab"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirexplab"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="nosepexplab"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuanexplab"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadokterexplab"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjunganexplab"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    Result
                                </div>
                                <div class="card-body p-2" style="height:200px;">
                                    <div class="overflow-auto" id="resultexplab" style="height:570px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="listlap" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white"><i class="fa-solid fa-syringe"></i> LIST LAPORAN TINDAKAN DAN ALAT</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="transid" id="transid">
                            <input type="hidden" name="jenis" id="jenis">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasienlaptindakan"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjslaptindakan"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasienlaptindakan"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirlaptindakan"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="noseplaptindakan"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuanlaptindakan"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadokterlaptindakan"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjunganlaptindakan"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <table class="table table-bordered table-striped small">
                                        <tbody id="listlaporan"></tbody>
                                    </table>
                                </div>
                                <div class="col-md-9">
                                    <div class="table-responsive" style="height: 500px;">
                                        <table class="table table-bordered Text-nowrap align-middle small">
                                            <tbody>
                                                <tr>
                                                    <td>TANGGAL DAN JAM MULAI TINDAKAN</td>
                                                    <td>:</td>
                                                    <td><strong><span id="tglmulai"></span></strong></td>
                                                    <td>TANGGAL DAN JAM SELESAI TINDAKAN</td>
                                                    <td>:</td>
                                                    <td><strong><span id="tglselesai"></span></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>NAMA PEMERIKSAAN</td>
                                                    <td>:</td>
                                                    <td colspan="4"><strong><span id="namapemeriksaan"></span></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>PROCEDURE</td>
                                                    <td>:</td>
                                                    <td colspan="4"><strong><span id="procedure"></span></strong></td>
                                                </tr>
                                                <tr>
                                                    <td>KESIMPULAN</td>
                                                    <td>:</td>
                                                    <td colspan="4"><strong><span id="kesimpulan"></span></strong></td>
                                                </tr>
                                            </tbody>
                                            <tbody id="tbrincianpasien"></tbody>
                                        </table>
                                        <div class="col-md-12" id="lampirantindakan"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="modal fade" id="laptindakan" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white"><i class="fa-solid fa-syringe"></i> LAPORAN TINDAKAN</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body" >
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasienlaptindakan"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjslaptindakan"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasienlaptindakan"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirlaptindakan"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="noseplaptindakan"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuanlaptindakan"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadokterlaptindakan"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjunganlaptindakan"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="table-responsive" style="height: 500px;">
                                <table class="table table-bordered Text-nowrap align-middle small">
                                    <tbody>
                                        <tr>
                                            <td>TANGGAL DAN JAM MULAI TINDAKAN</td>
                                            <td>:</td>
                                            <td><strong><span id="tglmulai"></span></strong></td>
                                            <td>TANGGAL DAN JAM SELESAI TINDAKAN</td>
                                            <td>:</td>
                                            <td><strong><span id="tglselesai"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>NAMA PEMERIKSAAN</td>
                                            <td>:</td>
                                            <td colspan="4"><strong><span id="namapemeriksaan"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>PROCEDURE</td>
                                            <td>:</td>
                                            <td colspan="4"><strong><span id="procedure"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>KESIMPULAN</td>
                                            <td>:</td>
                                            <td colspan="4"><strong><span id="kesimpulan"></span></strong></td>
                                        </tr>
                                    </tbody>
                                    <tbody id="tbrincianpasien"></tbody>
                                </table>
                                <div class="col-md-12" id="lampirantindakan"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="lapalat" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white"><i class="fa-solid fa-syringe"></i> FORMULIR HASIL PEMERIKSAAN DENGAN ALAT</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body" >
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-user-injured"></i> Informasi Identitas Pasien
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-borderless table-sm align-middle small">
                                        <tbody>
                                            <tr>
                                                <td>MR PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="mrpasienlapalat"></span></strong></td>
                                                <td>NO BPJS</td>
                                                <td>:</td>
                                                <td><strong><span id="nobpjslapalat"></span></strong></td>
                                                <td>NAMA PASIEN</td>
                                                <td>:</td>
                                                <td><strong><span id="namapasienlapalat"></span></strong></td>
                                                <td>TGL LAHIR</td>
                                                <td>:</td>
                                                <td><strong><span id="tgllahirlapalat"></span></strong></td>
                                            </tr>
                                            <tr>
                                                <td>NO SEP</td>
                                                <td>:</td>
                                                <td><strong><span id="noseplapalat"></span></strong></td>
                                                <td>POLI / RUANG</td>
                                                <td>:</td>
                                                <td><strong><span id="politujuanlapalat"></span></strong></td>
                                                <td>NAMA DOKTER</td>
                                                <td>:</td>
                                                <td><strong><span id="namadokterlapalat"></span></strong></td>
                                                <td>TGL KUNJUNGAN</td>
                                                <td>:</td>
                                                <td><strong><span id="tglkunjunganlapalat"></span></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="table-responsive" style="height: 500px;">
                                <table class="table table-bordered Text-nowrap align-middle small">
                                    <tbody>
                                        <tr>
                                            <td>TANGGAL DAN JAM MULAI TINDAKAN</td>
                                            <td>:</td>
                                            <td><strong><span id="tglmulaialat"></span></strong></td>
                                            <td>TANGGAL DAN JAM SELESAI TINDAKAN</td>
                                            <td>:</td>
                                            <td><strong><span id="tglselesaialat"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>NAMA PEMERIKSAAN</td>
                                            <td>:</td>
                                            <td colspan="4"><strong><span id="namapemeriksaanalat"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>DESKRIPSI</td>
                                            <td>:</td>
                                            <td colspan="4"><strong><span id="deskripsialat"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>KESIMPULAN</td>
                                            <td>:</td>
                                            <td colspan="4"><strong><span id="kesimpulanalat"></span></strong></td>
                                        </tr>
                                    </tbody>
                                    <tbody id="tbrincianpasien"></tbody>
                                </table>
                                <div class="col-md-12" id="lampiranalat"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->