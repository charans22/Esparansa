<?php echo form_open('rute/doSimpan'); ?>
    <div class="card rounded-lg">
        <div class="card-header">Form Rute</div>
        <div class="card-body">            
            <div class="form-row">
                <div class="col-lg-12 row">
                    <label class="col-md-2">Flat Nomor</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="txtFlatNo" type="text" placeholder="Flat Nomor" />
                        </div>
                    </div>                        
                </div>

                <div class="col-lg-12 row">
                    <label class="col-md-2">Nama Driver</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="txtNamaDriver" type="text" placeholder="Nama Driver" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 row">
                    <label class="col-md-2">Rute yang dilewati</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="txtRute" type="text" placeholder="Rute" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="<?php echo base_url();?>vehicle" class="btn btn-secondary">Batal</a>
            <input class="btn btn-primary" type="submit" value="Simpan" />
        </div>
    </div>
</form>
