<?php
	include_once("header.php");	
	$stmt = $conn->prepare("SELECT `fk_bin_id`, `id`, `is_bin_present`, `bin_level`, `created_time`, bin_master.latitude as lat, bin_master.longitude as longi, bin_master.bin_location_name, bin_master.description FROM `bin_sensor_data`, `bin_master` WHERE bin_sensor_data.fk_bin_id = bin_master.bin_id ORDER BY `id` DESC"); 
	$stmt->execute();

	$bin_sensor_report_data = "";
	if($stmt->rowCount() > 0)
	{
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$bin_level = $row['bin_level'] . "%";
			if($row['is_bin_present'] == 0)
                $bin_level = "<span class='else-not'>Bin Not Present</span>";
                
            $bin_sensor_report_data .= '<tr>
                                    <td>'.$row['fk_bin_id'].'</td>
                                    <td>'.$row['bin_location_name'].'</td>
                                    <td>'.$row['description'].'</td>
                                    <td>'.$row['is_bin_present'].'</td>
                                    <td>'.$bin_level.'</td>
                                    <td>'.$row['created_time'].'</td>
                                    <td>'.$row['lat'].'</td>
                                    <td>'.$row['longi'].'</td>
                                </tr>';
		}
	}
?>
    <main role="main" class="container">
		<section>
			<div class="row">
					<div class="card custom-cards">
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Bin Code</th>
										<th>Bin Location Name</th>
										<th>Description</th>
                                        <th>Is BIn Present</th>
                                        <th>Bin Level</th>
                                        <th>DateTime</th>
										<th>Latitude</th>
										<th>Longitude</th>
									</tr>									
								</thead>
								<tbody>
									<?php echo $bin_sensor_report_data; ?>
								</tbody>
							</table>
						</div>
					</div>
			</div>
		</section>

    </main><!-- /.container -->
<?php include_once("footer.php"); ?>