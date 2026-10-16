            <div class="modal fade" id="pilihpasien" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white"><i class="fas fa-search"></i> Find Patient</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body" >
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Silakan Masukan Medical Record" id="pencarian" name="pencarian">
                                <div class="input-group-append">
                                    <button class="btn btn-danger btn-pencarian" type="button"><i class="fas fa-search"></i> PENCARIAN</button>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive" style="height:500px;">
                                <table class="table table-head-fixed table-border table-sm align-middle table-striped small">
                                    <thead class="text-center">
                                        <tr>
                                            <th>NO TRANSAKSI</th>
                                            <th>MR</th>
                                            <th>NAMA PASIEN</th>
                                            <th>POLI / RUANGAN</th>
                                            <th>NAMA DOKTER</th>
                                            <th>TGL MASUK</th>
                                            <th>TGL KELUAR</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listpasien"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="historyfile" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white"><i class="far fa-eye"></i> View File</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-5 table-responsive" style="height:800px;">
                                    <table class="table table-head-fixed table-border table-sm align-middle table-striped small">
                                        <thead class="text-center">
                                            <tr>
                                                <th>ACTION</th>
                                                <th>TANGGAL</th>
                                                <th>NAMA DOKUMEN</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listview"></tbody>
                                    </table>
                                </div>
                                <div class="col-md-7" id="viewfile" style="height:800px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="hapusdokumen" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">

                        <div class="modal-header bg-danger">
                            <h5 class="modal-title"><i class="fas fa-trash-alt"></i> HAPUS DOKUMEN</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?php echo base_url();?>index.php/upload/hapusdok" id="formhapusdok">
                            <input type="hidden" name="pasienid">
                            <input type="hidden" name="episodeid">
                            <input type="hidden" name="jnsdoc">
                            <input type="hidden" name="namafile">
                            <div class="modal-body">
                                <p>Anda Yang Ingin Menghapus Dokumen Ini ?</p>
                            </div>
                            <div class="modal-footer p-1">
                                <input class="btn btn-danger btn-md" type="submit" value="HAPUS">
                            </div>
                        </form>  
                        
                    </div>
                </div>
            </div>