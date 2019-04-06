<?php
	include_once("header.php");
	$stmt = $conn->prepare("SELECT DISTINCT(`fk_bin_id`), `id`, `is_bin_present`, `bin_level`,`created_time`, bin_sensor_data.latitude as lat, bin_sensor_data.longitude as longi, bin_master.bin_location_name, bin_master.description FROM `bin_sensor_data`, `bin_master` WHERE bin_sensor_data.fk_bin_id = bin_master.bin_id ORDER BY `id` DESC limit 4"); 
	$stmt->execute();

	$bin_data = "";
	if($stmt->rowCount() > 0)
	{
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$bin_level = $row['bin_level'] . "%";
			if($row['is_bin_present'] == 0)
				$bin_level = "<span class='else-not'>Bin Not Present</span>";
				
			$bin_data .= '<div class="col-xs-12 col-sm-6">
							<div class="widget-small">
								<div class="indi">
									'.$bin_level.'
								</div>
								<div class="info">
									<h6>'.$row['bin_location_name'].'</h6>
									<p>Bin Id - <strong>'.$row['fk_bin_id'].'</strong></p>
									<p>Availability - <strong>'.$row['is_bin_present'].'</strong></p>
								</div>
							</div>
						</div>';
		}
	}
?>
    <main role="main" class="container">
		<section>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="card custom-cards">
						<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14962.382254186146!2d85.81456041977539!3d20.35831990000001!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1531656800632" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
						<div class="card-body">
							<div class="row" id="sensor_data1">
								<?php echo $bin_data; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="card custom-cards">
						<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14962.382254186146!2d85.81456041977539!3d20.35831990000001!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1531656800632" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
						<div class="card-body">							
							<div class="row" id="sensor_data2">
								<?php echo $bin_data; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    </main><!-- /.container -->
<?php include_once("footer.php"); ?>