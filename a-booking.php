
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

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>

  <a href="a-main.php" onclick="w3_close()" class="w3-bar-item w3-button">DASHBOARD</a>
  <a href="a-booking.php" onclick="w3_close()" class="w3-bar-item w3-button">BOOKING</a>
  <a href="a-homestay.php" onclick="w3_close()" class="w3-bar-item w3-button">HOMESTAY</a>
  <a href="a-profile.php" onclick="w3_close()" class="w3-bar-item w3-button">PROFILE</a>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">LOGOUT</a>
</nav>
<!--- Toast Notification -->
	

<div class="bgimg-1" >

	<div class="w3-padding-32"></div>
	
	<div class=" w3-center w3-text-blank w3-padding-32">
		<span class="w3-xlarge"><b>BOOKING LIST</b></span><br>
	</div>


	<!-- Page Container -->
	<div class="w3-container w3-content" style="max-width:1400px;">    
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

			$connect = mysqli_connect($hostname, $username, $password, $dbname) or die("Connection failed");

			$sql = "SELECT * FROM booking";

			$sendsql = mysqli_query($connect, $sql);

			

			if ($sendsql) {
				echo "
					<thead>
						<tr>
							<th> BIL. </th>
							<th> USER ID </th>
							<th> CAR ID </th>
							<th> BOOKING ID </th>
							<th> DATE </th>
							<th> TOTAL DAY </th>
							<th> AMOUNT(RM) </th>
							<th> PAYMENT METHOD </th>
							<th> PAYMENT SLIP </th>
							<th> STATUS </th>
							<th> EDIT </th>
							<th> DELETE </th>
							<th> VERIFICATION STATUS </th>
							<th> VERIFICATION </th>
						</tr>
					</thead>
					<tbody>";

				foreach ($sendsql as $row) {
					echo "<tr>";
					echo "<td>".$row["id_booking"]."</td>";
					echo "<td>".$row["id_user"]."</td>";
					echo "<td>".$row["id_car"]."</td>";
					echo "<td>".$row["booking_id"]."</td>";
					echo "<td>".$row["date"]."</td>";
					echo "<td>".$row["tot_day"]."</td>";
					echo "<td>".$row["amount"]."</td>";
					echo "<td>".$row["pay_method"]."</td>";
					echo '<td><a target="_blank" href="upload/' . $row["pay_slip"] . '"><img src="upload/' . $row["pay_slip"] . '" class="w3-round-large w3-image" alt="image" style="width:100%;max-width:60px"></a></td>';
					echo "<td>".$row["status"]."</td>";
					// Edit button
					echo "<td>
							  <button class='edit-button' data-id='".$row["id_booking"]."' data-status='".$row["status"]."'><i class='fa fa-fw fa-pencil'></i></button>
							  
						  </td>";
					// Delete button
					echo "<td>
								<button class='delete-button' data-id='".$row["id_booking"]."'><i class='fa fa-fw fa-trash'></i></button>
							  
						  </td>";
					 // Verification status - Display whether it is verified or not
    echo "<td>".$row["verify"]."</td>";

    // Verify column - Display verify button
    echo "<td>
        <button class='verify-button' data-id='".$row["id_booking"]."' data-verify='".$row["verify"]."'><i class='fa fa-fw fa-check'></i></button>
    </td>";

					echo "</tr>";
				}
				echo "</tbody>";
			} else {
				echo "<p>Failed.</p>";
			}
		?>

			
					
						</tbody>
		</table>
		</div>
		</div>

		
	  <!-- End Grid -->
	  </div>
	  
	<!-- End Page Container -->
	</div>
	
	<div class="w3-padding-24"></div>
	
</div>

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


<!-- DELETE AND EDIT -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all the edit buttons
        const editButtons = document.querySelectorAll(".edit-button");
        // Get all the delete buttons
        const deleteButtons = document.querySelectorAll(".delete-button");
        // Get all the verify buttons
        const verifyButtons = document.querySelectorAll(".verify-button");

        const statusOptions = ["Paid", "Unpaid", "Pending", "Reject"];
        const verifyOptions = ["Verify", "Not Verify"];

        editButtons.forEach((button) => {
            // Add click event listener to each edit button
            button.addEventListener("click", function() {
                const idBooking = this.getAttribute("data-id");
                const currentStatus = this.getAttribute("data-status");
                const row = this.parentElement.parentElement;

                // Create a dropdown select element with status options
                const select = document.createElement("select");
                statusOptions.forEach((option) => {
                    const optionElement = document.createElement("option");
                    optionElement.textContent = option;
                    optionElement.value = option;
                    select.appendChild(optionElement);
                });
                select.value = currentStatus;

                // Replace the status cell with the dropdown
                const statusCell = row.querySelector("td:nth-child(10)");
                statusCell.textContent = "";
                statusCell.appendChild(select);

                // Add event listener to the select element to handle status change
                select.addEventListener("change", function () {
                    const newStatus = this.value;

                    // Send the updated status to the server using AJAX
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "update_status.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Refresh the page after successful update
                            location.reload();
                        }
                    };
                    xhr.send(`id_booking=${idBooking}&new_status=${encodeURIComponent(newStatus)}`);
                });

                // Hide the "Edit" button and show the dropdown
                this.style.display = "none";
                select.style.display = "block";
            });
        });

verifyButtons.forEach((button) => {
    // Add click event listener to each verify button
    button.addEventListener("click", function() {
        const idBooking = this.getAttribute("data-id");
        const currentVerify = this.getAttribute("data-verify");
        const row = this.parentElement.parentElement;

        // Create a dropdown select element with verify options
        const select = document.createElement("select");
        verifyOptions.forEach((option) => {
            const optionElement = document.createElement("option");
            optionElement.textContent = option;
            optionElement.value = option;
            select.appendChild(optionElement);
        });
        select.value = currentVerify;

        // Replace the verification cell with the dropdown
        const verifyCell = row.querySelector("td:nth-child(13)");
        verifyCell.textContent = "";
        verifyCell.appendChild(select);

        // Add event listener to the select element to handle verification change
        select.addEventListener("change", function () {
            const newVerify = this.value;

            // Send the updated verification to the server using AJAX
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_verification.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Refresh the page after successful update
                    location.reload();
                }
            };
            xhr.send(`id_booking=${idBooking}&new_verify=${encodeURIComponent(newVerify)}`);
        });

        // Hide the "Verify" button and show the dropdown
        this.style.display = "none";
        select.style.display = "block";
    });
});

        deleteButtons.forEach((button) => {
            // Add click event listener to each delete button
            button.addEventListener("click", function() {
                if (confirm("Are you sure you want to delete this record?")) {
                    const idBooking = this.getAttribute("data-id");

                    // Send the delete request to the server using AJAX
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "delete_record.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Page refresh after successful deletion
                            location.reload();
                        }
                    };
                    xhr.send(`id_booking=${idBooking}`);
                }
            });
        });
    });
</script>



</body>
</html>
