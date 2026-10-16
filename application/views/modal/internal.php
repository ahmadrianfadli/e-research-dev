            <div class="modal fade" id="pencarian" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-md text-white"></i> Pencarian Data Pasien</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            

                            <div class="form-group">
                                <label>MR / Nama Pasien : </label>
                                <input type="text" class="form-control" placeholder="Silakan Masukan No MR / Nama Pasien" id="pencarian" name="pencarian">
                            </div>

                            <div class="row">
                                <div class="col-md-6">                              
                                    <div class="form-group">
                                        <label>Provider</label>
                                        <select class="form-control" name="provider">
                                            <?php echo $provider;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">                              
                                    <div class="form-group">
                                        <label>Jenis</label>
                                        <select class="form-control" name="jenis">
                                            <?php echo $jenis;?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <label>Mulai Dari :</label>
                                    <div class="input-group date" id="datestartPROSES" data-target-input="nearest">
                                        <input type="text" name="tawalPROSES" value="01/<?php echo date('m/Y');?>" class="form-control datetimepicker-input" data-target="#datestart"/>
                                        <div class="input-group-append" data-target="#datestartPROSES" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-3">
                                    <label>Sampai Dengan :</label>
                                    <div class="input-group date" id="dateendPROSES" data-target-input="nearest">
                                        <input type="text" name="takhirPROSES"  value="<?php echo date('d/m/Y');?>"  class="form-control datetimepicker-input" data-target="#dateend"/>
                                        <div class="input-group-append" data-target="#dateendPROSES" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer p-1">	
                            <button type="button" class="btn btn-success btn-pencarian" data-dismiss="modal">CARI</button>			
                        </div>
                    </div>
                </div>
            </div>