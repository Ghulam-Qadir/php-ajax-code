<?php
include 'header.php';
?>
<body>
	<div class="container-xl">

		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-4">
							<h2>Manage <b>Employees</b></h2>
						</div>
						<div class="col-sm-4">
							<input class="form-control" id="myInput" type="text" placeholder="Search..">
						</div>
						<div class="col-sm-4">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
							<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Phone</th>
							<th>City</th>
							<th>Edit</th>
							<th>Delete</th>

						</tr>
					</thead>
					<tbody id="ajaxdatadisplay">
					</tbody>
				</table>
				<div class="clearfix">
					<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
					<ul class="pagination">
						<li class="page-item disabled"><a href="#">Previous</a></li>
						<li class="page-item"><a href="#" class="page-link">1</a></li>
						<li class="page-item"><a href="#" class="page-link">2</a></li>
						<li class="page-item active"><a href="#" class="page-link">3</a></li>
						<li class="page-item"><a href="#" class="page-link">4</a></li>
						<li class="page-item"><a href="#" class="page-link">5</a></li>
						<li class="page-item"><a href="#" class="page-link">Next</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" id="name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" id="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" id="address" required></textarea>
					</div>
					<div class="form-group">
						<label>City</label>
						<select id="citynames" >
							<?php
							$sql = "SELECT * FROM city";
							$result = mysqli_query($conn, $sql) or die("query Unseccsussful");
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$cityvalue = $row["cid"];
									$cityname = $row["cname"];
									echo '<option value="' . $cityvalue . '">' . $cityname . '</option>';
								}}?>
							</select>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" id="phone" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="addnew" id="savebutton" class="btn btn-success" data-dismiss="modal" value="Add">
					</div>
				</div>
			</div>
		</div>
		<!-- Edit Modal HTML -->
		<div id="editEmployeeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class='modal-dialog'>
				<div class='modal-content'>
					<form id="editEmployeeModaldata">
					<div class="modal-header">
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" id="update_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" id="update_email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" id="update_address" required></textarea>
					</div>
					<div class="form-group">
						<label>City</label>
						<select id="citynamesupdateselect" >
							<?php
							$sql = "SELECT * FROM city";
							$result = mysqli_query($conn, $sql) or die("query Unseccsussful");
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$cityvalue = $row["cid"];
									$cityname = $row["cname"];
									echo '<option value="' . $cityvalue . '">' . $cityname . '</option>';
								}}
								?>
							</select>
						</div>
						<div class="form-group">
							<input type="hidden" id="updateidu" value="">
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" id="update_phone" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="addnew" id="updatebutton" class="btn btn-success" data-dismiss="modal" value="Update">
					</div>
					</form>
				</div>
			</div>

		</div>
	</body>
	</html>