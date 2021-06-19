<div class="card mb-4 mt-2">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        List City
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>City Name</th>
                        <th>Postal Code</th>
                        <th>Province Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($data_city as $row) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?php echo $row['city_name'];?></td>
                        <td><?php echo $row['postal_code'];?></td>
                        <td><?php echo $row['province'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>