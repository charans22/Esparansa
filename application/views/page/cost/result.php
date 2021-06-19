<?php
	$origin_details = $response['origin_details'];
	$destination_details = $response['destination_details'];
	$result = $response['results'];

	foreach ($result as $r) {
		// code...
		$costs = $r['costs'];
		// $cost = $r['cost'];
	}

	// $cost = $costs['cost'];


	$origin = $origin_details['type'].' '.$origin_details['city_name'].', Provinsi '.$origin_details['province'].', Kode Pos '.$origin_details['postal_code'];
	$destination = $destination_details['type'].' '.$destination_details['city_name'].', Provinsi '.$destination_details['province'].', Kode Pos '.$destination_details['postal_code'];

	// echo json_encode($cost);
?>
<div class="card rounded-lg">
    <div class="card-header">Ongkos Kirim</div>
    <div class="card-body">            
        <div class="form-row">
            <div class="col-lg-12 row">
                <label class="col-md-2">Asal</label>
                <div class="col-md-6">
                	<?php echo $origin;?>
                </div>                        
            </div>

            <div class="col-lg-12 row">
                <label class="col-md-2">Tujuan</label>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo $destination;?>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 row">
                <label class="col-md-2">Kurir</label>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php
                        	foreach ($result as $a) {
                        		// code...
                        		echo $a['name'];
                        	}
                        ?>
                    </div>
                </div>
            </div>

            <?php foreach ($costs as $c) { ?>
            <div class="col-lg-12 row">
                <label class="col-md-2">Cost</label>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Service:</label>
                        <?php echo $c['service'];?><p>

                        <label>Description:</label>
                        <?php echo $c['description'];?><p>

                        <?php 
                        	$cost = $c['cost']; 
                        	foreach ($cost as $a) { 
                        ?>
	                        <label>Harga:</label> <?php echo $a['value'];?><p>

	                        <label>Waktu Pengiriman:</label> <?php echo $a['etd'];?><p>

	                        <label>Note:</label> <?php echo $a['note'];?>
	                    <?php } ?>
                    </div>
                </div>
            </div>
        	<?php } ?>
        </div>
    </div>
    <div class="card-footer text-right">
        <a href="<?php echo base_url();?>vehicle" class="btn btn-secondary">Batal</a>
        <input class="btn btn-primary" type="submit" value="Cek Ongkir" />
    </div>
</div>
