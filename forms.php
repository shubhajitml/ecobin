<?php include_once("header.php"); ?>
    <main role="main" class="container">
		<section>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="card custom-cards">
						<div class="card-header">Forms</div>
						<div class="card-body">
							<form>
								<div class="form-group">
									<label>Label 1</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group">
									<label>Label 2</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group">
									<label>Label 3</label>
									<select class="form-control">
										<option>Opt 1</option>
										<option>Opt 2</option>
										<option>Opt 3</option>
									</select>
								</div>
								<div class="form-group">
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" id="optionsRadios1" name="optionsRadios" value="option1" checked="" type="radio">Option one 
										</label>
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" id="optionsRadios2" name="optionsRadios" value="option2" type="radio">Option two 
										</label>
									</div>
								</div>
								<div class="form-group">
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox">Check me out
										</label>
									</div>
								</div>
								<div class="form-group">
									<input type="button" class="btn btn-success" value="Submit">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="card custom-cards">
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Address</th>
									</tr>									
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Name 1</td>
										<td>Address 1, Address 1, Address 1</td>
									</tr>
									<tr>
										<td>1</td>
										<td>Name 1</td>
										<td>Address 1, Address 1, Address 1</td>
									</tr>
									<tr>
										<td>1</td>
										<td>Name 1</td>
										<td>Address 1, Address 1, Address 1</td>
									</tr>
									<tr>
										<td>1</td>
										<td>Name 1</td>
										<td>Address 1, Address 1, Address 1</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>

    </main><!-- /.container -->
<?php include_once("footer.php"); ?>