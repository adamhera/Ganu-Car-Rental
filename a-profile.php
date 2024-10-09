<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ganucarrental";

    $connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Connection Failed.");

    $sql = "SELECT * FROM admin";
    $sendsql = mysqli_query($connect, $sql);
	?>
<!DOCTYPE html>
<html>
<!-- DEVELOPED BY MUHAMMAD ADAM HAQIMI @21/7/2023 -->
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
		<span class="w3-xlarge"><b>ADMIN LIST</b></span><br>
	</div>
	


	<!-- Page Container -->
	<div class="w3-container w3-content" style="max-width:1350px;">    
	  <!-- The Grid -->
	  <div class="w3-row w3-white w3-card w3-padding">
	  
		
		<div class="w3-row w3-margin ">
		<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			

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
    <title>Admin Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Admin Details</h2>
    <div class="text-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Add Admin
        </button>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
           <td> ADMIN ID</td>
            <td> USERNAME </td>
            <td>EDIT</td>
			<td>DELETE</td>
        </tr>
        </thead>
        <tbody>
       
			<?php while ($row = mysqli_fetch_assoc($sendsql)) { ?>
            <tr>
                <td><?php echo $row["id_admin"]; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td>
                    <a href="#" class="edit-btn" data-toggle="modal" data-target="#editModal"
                       data-id="<?php echo $row["id_admin"]; ?>"
                       data-username="<?php echo $row["username"]; ?>"
                       data-password="<?php echo $row["password"]; ?>"
                       >
                        Edit
						
                    </a>
                </td>
				<td><a href="#" class="delete-btn" data-id="<?php echo $row["id_admin"]; ?>">Delete</a></td>
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
                    <h4 class="modal-title">Add Admin</h4>
                </div>
                <div class="modal-body">
                    <form id="addForm" action="add_admin.php" method="post">
                        
                        
						 <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="text" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Admin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   <!-- Edit Admin Modal -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Admin Details</h4>
            </div>
            <div class="modal-body">
                <form id="editForm" action="update_admin.php" method="post">
                    <input type="hidden" name="id_admin" id="adminId">
                    <div>
                        <label for="editUsername">Username:</label>
                        <input type="text" id="editUsername" name="username">
                    </div>
                    <div>
                        <label for="editPassword">Password:</label>
                        <input type="text" id="editPassword" name="password">
                    </div>
                    <button type="submit">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<!--<script src="assets/demo/datatables-demo.js"></script>-->

<script>
    $(document).ready(function () {
        var editBtns = document.getElementsByClassName("edit-btn");
        var editModal = document.getElementById("editModal");
        var editForm = document.getElementById("editForm");
        var editUsername = document.getElementById("editUsername");
        var editPassword = document.getElementById("editPassword");
        var adminId = document.getElementById("adminId");

        for (var i = 0; i < editBtns.length; i++) {
            editBtns[i].addEventListener("click", function () {
                var id = this.getAttribute("data-id");
                var username = this.getAttribute("data-username");
                var password = this.getAttribute("data-password");

                editModal.style.display = "block";
                editUsername.value = username;
                editPassword.value = password;
                adminId.value = id;
            });
        }

        editForm.addEventListener("submit", function (event) {
            event.preventDefault();
            // Perform AJAX request to update admin details
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        alert("Admin details updated successfully!");
                        editModal.style.display = "none";
                        window.location.reload();
                    } else {
                        alert("Error updating admin details: " + xhr.responseText);
                    }
                }
            };
            xhr.open("POST", this.getAttribute("action"), true);
            xhr.send(formData);
        });
    });
	
	// Handle click event of delete button
        $(".delete-btn").click(function () {
            var id = $(this).data("id");

            // Show confirmation message
            if (confirm("Are you sure you want to delete this admin?")) {
                // Perform AJAX request to delete admin details
                $.ajax({
                    url: "delete_admin.php", // Replace with the URL to your PHP script to delete admin details
                    type: "POST",
                    data: { id_admin: id },
                    success: function (response) {
                        // Handle success response
                        alert("Admin deleted successfully!");
                        window.location.reload();
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        alert("Error deleting admin: " + error);
                    }
                });
            }
        });
		
		// Handle form submission for adding an admin
        $("#addForm").submit(function (event) {
            event.preventDefault();

            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Admin added successfully
                        alert("Admin added successfully!");
                        $("#addModal").modal("hide");
                        window.location.reload(); // Refresh the screen after successful addition
                    } else {
                        // Error adding admin
                        alert("Error adding admin: " + xhr.responseText);
                    }
                }
            };

            xhr.open("POST", this.getAttribute("action"), true);
            xhr.send(formData);
        });
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
