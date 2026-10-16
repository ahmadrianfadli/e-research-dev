            <div class="modal fade" id="rincianri" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header bg-success">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-coins text-white"></i> Rincian Billing Pasien Rawat Inap</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-0">
                            <input type="hidden" name="pasienid">
                            <input type="hidden" name="episodeid">

                            <div class="table-responsive" style="height: 650px;">
                                <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th>NO TRANSAKSI</th>
                                            <th>NAMA PELAYANAN</th>
                                            <th>TANGGAL</th>
                                            <th>QTY</th>
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

            <div class="modal fade" id="konsulri" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-md text-white"></i> Konsultasi Dokter</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-3 overflow-auto" style="height: 750px;" id="konsultasi">
                            <input type="hidden" name="pasienid">
                            <input type="hidden" name="episodeid">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="resumeri" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-file-medical text-white"></i> Resume Medis Rawat Inap</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-3 overflow-auto" style="height: 750px;" id="resume">
                            <input type="hidden" name="pasienid">
                            <input type="hidden" name="episodeid">
                            <input type="hidden" name="tglmasuk">
                            <input type="hidden" name="tglkeluar">
                            <input type="hidden" name="namadokter">
                            <input type="hidden" name="nobpjs">
                            <input type="hidden" name="norm">
                            <input type="hidden" name="namapasien">
                            <input type="hidden" name="asalpasien">
                            <input type="hidden" name="kelasrawat">
                            <input type="hidden" name="jatahkelas">
                            <input type="hidden" name="alamat">
                            <input type="hidden" name="provider">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="oprri" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-file-medical"></i> Laporan Operasi / Persalinan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-3 overflow-auto" style="height: 750px;" id="laporanok">
                            <input type="text" name="pasienid">
                            <input type="text" name="episodeid">
                            <input type="text" name="jenisid">
                        </div>
                    </div>
                </div>
            </div>