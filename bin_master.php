<?php
	include_once("header.php");
    if(isset($_POST['submit']))
    { //print_r($_POST);
        if(isset($_POST['bin_code']) && !empty($_POST['bin_code']) && isset($_POST['bin_loc_name']) && !empty($_POST['bin_loc_name']) && isset($_POST['description']) && !empty($_POST['description'])&& isset($_POST['latitude']) && !empty($_POST['latitude'])&& isset($_POST['longitude']) && !empty($_POST['longitude']))
        {
            print_r($_POST);
            $bin_code = $_POST['bin_code'];
            $bin_loc_name = $_POST['bin_loc_name'];
            $description = $_POST['description'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];


            $stmt = $conn->prepare("INSERT INTO bin_master(`bin_id`, `bin_location_name`, `description`, `created_by`, `created_on`,`latitude`, `longitude` )
            VALUES(:bincode, :binlocname, :descr, :creator, :creationtime, :latitude, :longitude)");
            
            if($stmt->execute(array(
            "bincode" => $bin_code,
            "binlocname" => $bin_loc_name,
            "descr" => $description,
            "creator" => $_SESSION['uid'],
            "creationtime" => date('Y-m-d H:i:s'),
            "latitude" => $latitude,
            "longitude" => $longitude)))
            {
                echo 'Success';
            }
            else
            {
                echo 'NOT Success';
            }
        }
        else
        {
            echo "All fields are mandatory";
        }
	}
	
	$stmt = $conn->prepare("SELECT * FROM bin_master");
	$stmt->execute();

	$bin_master_data = "";
	if($stmt->rowCount() > 0)
	{
		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$bin_master_data .= '<tr>
									<td>'.$row['bin_id'].'</td>
									<td>'.$row['bin_location_name'].'</td>
									<td>'.$row['description'].'</td>
									<td>'.$row['latitude'].'</td>
									<td>'.$row['longitude'].'</td>
								</tr>';
		}
	}
?>
    <main role="main" class="container">
		<section>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="card custom-cards">
						<div class="card-header">Add Bin Master</div>
						<div class="card-body">
							<form method="POST" action="">
								<div class="form-group">
									<label>Bin Code</label>
									<input type="text" name="bin_code" class="form-control">
								</div>
								<div class="form-group">
									<label>Bin Location Name</label>
									<input type="text" name="bin_loc_name" class="form-control">
								</div>
								<div class="form-group">
									<label>Description</label>
									<input type="text" name="description" class="form-control">
								</div>
                                <div class="form-group">
									<label>Latitude</label>
									<input type="text" name="latitude" class="form-control">
								</div>
                                <div class="form-group">
									<label>Longitude</label>
									<input type="text" name="longitude" class="form-control">
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="btn btn-success" value="Submit">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="card custom-cards">
					<div class="card-header">ecoBins</div>
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Bin Code</th>
										<th>Bin Location Name</th>
										<th>Description</th>
										<th>Latitude</th>
										<th>Longitude</th>
									</tr>									
								</thead>
								<tbody>
									<?php echo $bin_master_data; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>

    </main><!-- /.container -->
<?php include_once("footer.php"); ?>