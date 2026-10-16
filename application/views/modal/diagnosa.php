<div class="modal fade" id="modaldiag" tabindex="-1" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <div class="modal-header bg-primary">
                <h5 class="modal-title">Diagnosa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Nama Pasien</label>
                            <div class="col-sm-8" id="namapasien"></div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">No RM</label>
                            <div class="col-sm-8" id="norm"></div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label">No SEP</label>
                            <div class="col-sm-8" id="nosep"></div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">Dokter</h3>
                            </div>
                            <div class="card-body">
                                <h6>Diagnosa</h6>
                                <div class="row">
                                    <label class="col-sm-2">Utama</label>
                                    <div class="col-sm-10" id="diagnosautamadokter"></div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2">Penyerta</label>
                                    <div class="col-sm-10" id="diagnosapenyertadokter"></div>
                                </div>
                                <hr class="my-2" />
                                <h6>Tindakan</h6>
                                <div class="row">
                                    <label class="col-sm-2">Utama</label>
                                    <div class="col-sm-8" id="tindutamadokter"></div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2">Penyerta</label>
                                    <div class="col-sm-10" id="tindpenyertadokter"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">Coder</h3>
                            </div>

                            <div class="card-body">
                                <h6>Diagnosa</h6>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Utama</label>
                                    <div class="col-sm-10">
                                        <div class="row itemdiag">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control form-control-sm" id="diagutama" style="display:none;" />
                                                <div id="icd10select">
                                                    <select class="form-control form-control-sm select-diag" id="icd10utama"></select>
                                                </div>

                                            </div>
                                            <!-- <div class="col-sm-2">
                                                <button type="button" class="btn btn-primary btn-sm" id="btndiagutama" data-tipe="manual">Manual</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Penyerta</label>
                                    <div class="col-sm-10">
                                        <div class="row itemdiag">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control form-control-sm" id="diagpenyerta" style="display:none;" />
                                                <div id="icd10penyertaselect">
                                                    <select class="form-control form-control-sm select-diag" id="icd10penyerta"></select>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-2">
                                                <button type="button" class="btn btn-primary btn-sm" id="btndiagpenyerta" data-tipe="manual">Manual</button>
                                            </div> -->
                                        </div>
                                        <div id="tabeldiag" class="mt-2"></div>
                                    </div>
                                </div>
                                <hr class="my-2" />
                                <h6>Tindakan</h6>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Utama</label>
                                    <div class="col-sm-10">
                                        <div class="row itemtindak">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control form-control-sm" id="tindakutama" style="display:none;" />
                                                <div id="icd9select">
                                                    <select class="form-control form-control-sm select-tindak" id="icd9utama"></select>
                                                </div>

                                            </div>
                                            <!-- <div class="col-sm-2">
                                                <button type="button" class="btn btn-primary btn-sm" id="btntindakutama" data-tipe="manual">Manual</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Penyerta</label>
                                    <div class="col-sm-10">
                                        <div class="row itemtindak">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control form-control-sm" id="tindakpenyerta" style="display:none;" />
                                                <div id="icd9penyertaselect">
                                                    <select class="form-control form-control-sm select-tindak" id="icd9penyerta"></select>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-2">
                                                <button type="button" class="btn btn-primary btn-sm" id="btntindakpenyerta" data-tipe="manual">Manual</button>
                                            </div> -->
                                        </div>
                                        <div id="tabeltindak" class="mt-2"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Catatan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control form-control-sm" id="catatanperubahan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button class="btn btn-primary" id="btn-ubah-diag" disabled>Simpan</button>
            </div>
        </div>
    </div>
</div>