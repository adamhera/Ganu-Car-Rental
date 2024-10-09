
<!DOCTYPE html>
<html>
<!-- DEVELOPED BY MUHAMMAD ADAM HAQIMI @21/7/2023 -->
<title>Ganu Car Rental</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Poppins", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: top;
  background-size: cover;
  background-attachment: fixed;
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

<div class="bgimg-1" >

	<div class="w3-padding-32"></div>
	
	<div class=" w3-center w3-text-blank w3-padding-32">
		<span class="w3-xlarge"><b>DASHBOARD</b></span><br>
	</div>


	<!-- Page Container -->
	<div class="w3-container w3-content" style="max-width:800px;">    
	  <!-- The Grid -->
	  <div class="w3-row">
	  

		<div class="w3-padding w3-padding-16">
			<div class="w3-card w3-padding w3-round w3-white">
				<div class="w3-xlarge w3-padding-24 w3-padding" >
					<div class="w3-padding">Welcome, Admin</div>
				</div>
				<?php
					$hostname = "localhost";
					$username = "root";
					$password = "";
					$dbname = "ganucarrental";

					$connect = mysqli_connect($hostname, $username, $password, $dbname) OR DIE("connection failed");

					// Query to count the total number of cars rented
					$query = "SELECT COUNT(DISTINCT booking_id) AS total_cars_rented FROM booking";
					$query2 = "SELECT COUNT(DISTINCT id_car) AS total_cars_available FROM car"; // Updated query to count cars available
					// Execute the queries
					$result = mysqli_query($connect, $query);
					$result2 = mysqli_query($connect, $query2); // Execute the second query

					// Check if the queries were successful
					if ($result && $result2) {
						// Fetch the results
						$row = mysqli_fetch_assoc($result);
						$row2 = mysqli_fetch_assoc($result2); // Fetch result from the second query

						// Get the total number of cars rented
						$totalCarsRented = $row['total_cars_rented'];

						// Get the total number of cars available
						$totalCarsAvailable = $row2['total_cars_available']; // Use the result from the second query
					} else {
						// Handle the case when the query fails
						echo "Error: " . mysqli_error($connect);
					}

					// Close the database connection
					mysqli_close($connect);
					?>

				<div class="w3-row w3-padding-24">
					<div class="w3-col m6 w3-container">
						<div class=" w3-card w3-blue w3-round w3-padding-16">
							<div class="w3-container w3-large">
								Booking <i class="fa fa-users fa-lg w3-right"></i> 
								<hr style="border-top: 1px dashed; margin: 1px 0 15px !important;">
								<h2 class="w3-center"><?php echo $totalCarsRented; ?></h2>
							</div>
						</div>
					</div>
		
					
					<div class="w3-col m6 w3-container">
						<div class=" w3-card w3-blue w3-round w3-padding-16">
							<div class="w3-container w3-large">
								Car <i class="fa fa-car fa-lg w3-right"></i> 
								<hr style="border-top: 1px dashed; margin: 1px 0 15px !important;">
								<h2 class="w3-center"><?php echo $totalCarsAvailable ?></h2>
							</div>
						</div>
					</div>
						
			</div>
		  </div>
		</div>
			  

		
	  <!-- End Grid -->
	  </div>
	  
	<!-- End Page Container -->
	</div>
	
	<div class="w3-padding-24"></div>
	
</div>

 
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
