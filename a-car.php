
<!DOCTYPE html>
<html>
<title>Ganu Car Rental</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="css/table.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

<!-- include summernote css-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- include summernote js-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<style>
a { text-decoration : none ;}

body,h1,h2,h3,h4,h5,h6 {font-family: "Poppins", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: top;
  background-attachment: fixed;
  background-size: cover;
  background-image: url("images/banner.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}

.image-container img {
    max-width: 100%;
    height: auto;
  }
</style>

<body class="w3-pale-blue">

<!-- Navbar (sit on top) -->
<div class="w3-top" style="z-index=0">
  <div class="w3-bar w3-black w3-card" id="myNavbar">
    &nbsp;<a href="a-main.php"><img src="images/logo.png" height="55"></a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="a-main.php" class="w3-bar-item1 w3-button">DASHBOARD</a>
	  <a href="a-booking.php" class="w3-bar-item1 w3-button"> BOOKING</a>  
	  <a href="a-car.php" class="w3-bar-item1 w3-button"> CAR LIST</a>  
	  <a href="a-profile.php" class="w3-bar-item1 w3-button"> PROFILE</a>
	  <a href="logout.php" class="w3-bar-item1 w3-button"><i class="fa fa-fw fa-sign-out-alt"></i> LOGOUT</a>
	  
	  
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>


	

<div class="bgimg-1" >

	<div class="w3-padding-32"></div>
	
	<div class=" w3-center w3-text-blank w3-padding-32">
		<span class="w3-xlarge"><b>CAR LIST</b></span><br>
	</div>
	


	<!-- Page Container -->
	<div class="w3-container w3-content" style="max-width:1250px;">    
	  <!-- The Grid -->
	  <div class="w3-row w3-white w3-card w3-padding">
	  
		
		<div class="w3-row w3-margin ">
		<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<?php
			$hostname = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ganucarrental";

			$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection Failed.");

			$sql = "SELECT * FROM car";

			$sendsql = mysqli_query($connect, $sql);
			?>

		<!DOCTYPE html>
		<html>
		<head>
			<title>Edit Car Details</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		</head>
		<body>



		<!DOCTYPE html>
		<html>
		<head>
			<title>Car Details</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		</head>
		<body>

		<div class="container">
			<h2>Car Details</h2>
			<div class="text-right">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
					Add Car
				</button>
			</div>
			<br>
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>#</th>
					<th>CATEGORY</th>
					<th>CAR NAME</th>
					<th>PRICE(RM)</th>
					<th>PHOTO</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</tr>
				</thead>
				<tbody>
				<?php while ($row = mysqli_fetch_assoc($sendsql)) { ?>
					<tr>
						<td><?php echo $row["id_car"]; ?></td>
						<td><?php echo $row["category"]; ?></td>
						<td><?php echo $row["title"]; ?></td>
						<td><?php echo $row["price"]; ?></td>
						<td style="text-align: center; vertical-align: middle;"><img src="images/<?php echo $row["photo"]; ?>" width="30%"> </td>
						<td>
							<a href="#" class="edit-btn" data-toggle="modal" data-target="#editModal"
							   data-id="<?php echo $row["id_car"]; ?>"
							   data-category="<?php echo $row["category"]; ?>"
							   data-title="<?php echo $row["title"]; ?>"
							   data-price="<?php echo $row["price"]; ?>"
							   data-photo="<?php echo $row["photo"]; ?>">
								Edit
							</a>
						</td>
						<td>
					<a href="#" class="delete-btn" data-id="<?php echo $row["id_car"]; ?>">
						Delete
					</a>
				</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>

				<!-- Add Modal -->
				<div id="addModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">
					<!-- Modal content -->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Car</h4>
					  </div>
					  <div class="modal-body">
						<form id="addForm" action="add_car.php" method="post">
						  <div class="form-group">
							<div class="form-group">
							  <label for="editCategory">Category:</label>
							  <select class="form-control" id="editCategory" name="category">
								<option value="Compact">Compact</option>
								<option value="Sedan">Sedan</option>
								<option value="MPV">MPV</option>
								<option value="SUV">SUV</option>
							  </select>
							</div>								
						  </div>
						  <div class="form-group">
							<label for="title">Car Name:</label>
							<input type="text" class="form-control" id="title" name="title" required>
						  </div>
						  <div class="form-group">
							<label for="description">Description:</label>
							<input type="text" class="form-control" id="description" name="description" required>
						  </div>
						  <div class="form-group">
							<label for="price">Price (RM):</label>
							<input type="text" class="form-control" id="price" name="price" required>
						  </div>
						  <div class="form-group">
							<label for="photo">Photo:</label>
							<input type="file" class="form-control" id="photo" name="photo1" multiple onchange="updateConfirmPhotoAdd()">
						  </div>
						  <div class="form-group">
							<label for="confirmPhotoAdd">Confirm Photo:</label>
							<input type="text" class="form-control" id="confirmPhotoAdd" name="photo" required>
						  </div>
						  <button type="submit" class="btn btn-primary">Add Car</button>
						</form>
					  </div>
					</div>
				  </div>
				</div>


				<!-- Edit Modal -->
				<div id="editModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">
					<!-- Modal content -->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Car Details</h4>
					  </div>
					  <div class="modal-body">
						<form id="editForm" action="update_car.php" method="post">
						  <input type="hidden" name="car_id" id="carId">
						  <div class="form-group">
							<label for="editCategory">Category:</label>
							<select class="form-control" id="editCategory" name="category">
							  <option value="Compact">Compact</option>
							  <option value="Sedan">Sedan</option>
							  <option value="MPV">MPV</option>
							  <option value="SUV">SUV</option>
							</select>
						  </div>
						  <div class="form-group">
							<label for="editTitle">Car Name:</label>
							<input type="text" class="form-control" id="editTitle" name="title">
						  </div>
						  <div class="form-group">
							<label for="editPrice">Price:</label>
							<input type="text" class="form-control" id="editPrice" name="price">
						  </div>
						  <div class="form-group">
							<label for="editPhoto">Photo:</label>
							<input type="file" class="form-control" id="editPhoto" name="photo1" required onchange="updateConfirmPhoto()">
						  </div>
						  <div class="form-group">
							<label for="confirmPhoto">Confirm Photo:</label>
							<input type="text" class="form-control" id="confirmPhoto" name="photo" required>
						  </div>
						  <button type="submit" class="btn btn-primary">Save Changes</button>
						</form>
					  </div>
					</div>
				  </div>
				</div>

		</div>

		<script>
			$(document).ready(function () {
				// Handle click event of edit button
				$(".edit-btn").click(function () {
					var id = $(this).data("id");
					var category = $(this).data("category");
					var title = $(this).data("title");
					var price = $(this).data("price");
					var photo = $(this).data("photo");

					// Set values in the modal form
					$("#carId").val(id);
					$("#editCategory").val(category);
					$("#editTitle").val(title);
					$("#editPrice").val(price);
					$("#editPhoto").val(photo);
				});

				// Handle submit event of add form
				$("#addForm").submit(function (event) {
					event.preventDefault();
					var form = $(this);

					// Perform AJAX request to add car details
					$.ajax({
						url: form.attr("action"),
						type: form.attr("method"),
						data: form.serialize(),
						success: function (response) {
							// Handle success response
							// You can update the table or display a success message here
							alert("Car added successfully!");
							$('#addModal').modal('hide');
							location.reload(); // Refresh the page to update the table
						},
						error: function (xhr, status, error) {
							// Handle error response
							alert("Error adding car: " + error);
						}
					});
				});

				// Handle submit event of edit form
				$("#editForm").submit(function (event) {
					event.preventDefault();
					var form = $(this);

					// Perform AJAX request to update car details
					$.ajax({
						url: form.attr("action"),
						type: form.attr("method"),
						data: form.serialize(),
						success: function (response) {
							// Handle success response
							// You can update the table or display a success message here
							alert("Car details updated successfully!");
							$('#editModal').modal('hide');
							location.reload(); // Refresh the page to update the table
						},
						error: function (xhr, status, error) {
							// Handle error response
							alert("Error updating car details: " + error);
						}
					});
				});
			});
			// Handle click event of delete button
			$(".delete-btn").click(function () {
				var id = $(this).data("id");

				if (confirm("Are you sure you want to delete this car?")) {
					// Perform AJAX request to delete the car
					$.ajax({
						url: "delete_car.php",
						type: "post",
						data: { id_car: id },
						success: function (response) {
							// Handle success response
							alert("Car deleted successfully!");
							location.reload(); // Refresh the page to update the table
						},
						error: function (xhr, status, error) {
							// Handle error response
							alert("Error deleting car: " + error);
						}
					});
				}
			});
			
			   // JavaScript code for populating the edit form with selected car data
				$(document).ready(function () {
					$(".edit-btn").click(function () {
						var id = $(this).data("id");
						var category = $(this).data("category");
						var title = $(this).data("title");
						var price = $(this).data("price");
						var photo = $(this).data("photo");

						// Set values in the modal form
						$("#carId").val(id);
						$("#editCategory").val(category); // This line will set the selected category in the dropdown
						$("#editTitle").val(title);
						$("#editPrice").val(price);
						$("#editPhoto").val(photo);
					});
			});
			
			 function updateConfirmPhoto() {
			var photoInput = document.getElementById('editPhoto');
			var confirmPhotoInput = document.getElementById('confirmPhoto');
			confirmPhotoInput.value = photoInput.value.split('\\').pop();
			
			
			}
			function updateConfirmPhotoAdd() {
    var photoInput = document.getElementById('photo');
    var confirmPhotoInput = document.getElementById('confirmPhotoAdd');
    confirmPhotoInput.value = photoInput.files[0].name;
  }
		</script>



			  <!-- End Grid -->
			  </div>
			  
			<!-- End Page Container -->
			</div>
			
			<div class="w3-padding-24"></div>
			
		</div>




		<div class="w3-padding-24"></div>
		</div>

		<!-- Script -->
		<script type="text/javascript">
			$('#makeMeSummernote,#makeMeSummernote2').summernote({
				height:100,
			});
		</script>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
		<!--<script src="assets/demo/datatables-demo.js"></script>-->


		<script>
		$(document).ready(function() {

		  
			$('#dataTable').DataTable( {
				paging: true,
				
				searching: true
			} );
				
			
		});
		</script>

		 
		<script>

		// Toggle between showing and hiding the sidebar when clicking the menu icon
		var mySidebar = document.getElementById("mySidebar");

		function w3_open() {
		  if (mySidebar.style.display === 'block') {
			mySidebar.style.display = 'none';
		  } else {
			mySidebar.style.display = 'block';
		  }
		}

		// Close the sidebar with the close button
		function w3_close() {
			mySidebar.style.display = "none";
		}
		</script>

		</body>
		</html>
