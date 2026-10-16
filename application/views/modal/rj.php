            <div class="modal fade" id="rincianrj" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header bg-success">
                            <h5 class="modal-title" id="exampleModalLabel"><i class='fas fa-coins text-white'></i> Rincian Billing Pasien Rawat Jalan</h5>
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

            <div class="modal fade" id="radiasi" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header bg-secondary">
                            <h5 class="modal-title" id="exampleModalLabel"><i class='fas fa-radiation  text-white'></i> PERENCANAAN RADIASI EKSTERNA</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-3">
                            <label for="diag">1. Diagnosis dan Stadium Lengkap : </label>
                            <div class="row" id="diag">
                                <div class="col-md-6">
                                    <textarea class="form-control" cols="4" rows="4" id="diagnosis" disabled></textarea>
                                </div>
                                <div class="col-md-6">
                                    <textarea class="form-control" cols="4" rows="4" id="stadium" disabled></textarea>
                                </div>
                            </div>
                            <label for="rencana">2. Rencana Pengobatan / Tujuan Radiasi : </label>
                            <div class="form-group clearfix" id="rencana">
                                <div class="icheck-primary d-inline mr-1">
                                    <input type="radio" id="rt" name="rencana" disabled>
                                    <label for="rt">RT DEFINITIF</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="kemo" name="rencana" disabled>
                                    <label for="kemo">KEMORADIASI</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="pre" name="rencana" disabled>
                                    <label for="pre">PRE OPERASI</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="post" name="rencana" disabled>
                                    <label for="post">POST OPERASI</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="postkemo" name="rencana" disabled>
                                    <label for="postkemo">POST KEMOTERAPI</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="rerad" name="rencana" disabled>
                                    <label for="rerad">RE RADIASI</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="paliatif" name="rencana" disabled>
                                    <label for="paliatif">PALIATIF</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="lain" name="rencana" disabled>
                                    <label for="lain">LAIN-LAIN</label>
                                </div>
                            </div>
                            <label for="teknik">3. Teknik Radiasi : </label>
                            <div class="form-group clearfix" id="teknik">
                                <div class="icheck-primary d-inline mr-1">
                                    <input type="radio" id="2d" name="teknik" disabled>
                                    <label for="2d">2D</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="3d" name="teknik" disabled>
                                    <label for="3d">3D</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="imrt" name="teknik" disabled>
                                    <label for="imrt">IMRT</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="igrt" name="teknik" disabled>
                                    <label for="igrt">IGRT</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="srs" name="teknik" disabled>
                                    <label for="srs">SRS</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="srt" name="teknik" disabled>
                                    <label for="srt">SRT</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="sbrt" name="teknik" disabled> 
                                    <label for="sbrt">SBRT</label>
                                </div>
                                <div class="icheck-primary d-inline ml-1">
                                    <input type="radio" id="vmat" name="teknik" disabled>
                                    <label for="vmat">VMAT/Tomoterapi</label>
                                </div>
                            </div>
                            <label for="target">4. Target dan Dosis Radiasi : </label>
                            <textarea class="form-control" cols="4" rows="4" id="target" name="target" disabled></textarea>
                            <label for="organ">5. Organ Risk : </label>
                            <div class="table-responsive small" id="organ" style="height: 150px;">
                                <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ORGAN</th>
                                            <th>BATAS DOSIS</th>
                                        </tr>
                                    </thead>
                                    <tbody id="organrisk"></tbody>
                                </table>
                            </div>
                            <label for="catatan">6. Catatan : </label>
                            <textarea class="form-control" cols="4" rows="4" id="catatan" name="catatan" disabled></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="resumerj" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-file-medical text-white"></i> Resume Medis Rawat Jalan</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-3 overflow-auto" style="height: 750px;" id="resume">
                            <input type="hidden" name="pasienid">
                            <input type="hidden" name="episodeid">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="lapharian" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">

                        <div class="modal-header bg-secondary">
                            <h5 class="modal-title" id="exampleModalLabel"><i class='fas fa-radiation  text-white'></i> LAPORAN HARIAN</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="table-responsive modal-body p-3 small" style="height: 750px;">
                            <table class="table table-bordered table-head-fixed text-nowrap table-striped table-hover" id="laporanharian"></table>
                        </div>
                    </div>
                </div>
            </div>