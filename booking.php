<?PHP
session_start();
include("database.php");

$id_car 	= (isset($_GET['id_car'])) ? trim($_GET['id_car']) : '';

$SQL_view 	= " SELECT * FROM `car` WHERE `id_car` =  $id_car ";
$result 	= mysqli_query($con, $SQL_view) or die("Error in query: ".$SQL_view."<br />".mysqli_error($con));
$data		= mysqli_fetch_array($result);
$photo		= $data["photo"];
if(!$photo) $photo = "noimage.jpg";


$SQL_user 	= " SELECT * FROM `user` WHERE `username` =  '{$_SESSION['username']}' ";
$rst_user 	= mysqli_query($con, $SQL_user) ;
$dat_user	= mysqli_fetch_array($rst_user);
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
  min-height: 100%;
  background-attachment:fixed;
  background-image: url(images/banner.jpg);
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>

<body class="w3-pale-blue">

<?PHP include("menu.php"); ?>


<div class="bgimg-1" >

	<div class="w3-padding-48"></div>
	
	<div class="w3-padding w3-xxlarge w3-center w3-text-blue"><b>- BOOKING -</b></div>

<div class="w3-container w3-padding-16" id="contact">
    <div class="w3-content w3-container w3-white w3-round w3-card" style="max-width:800px">
		<div class="w3-padding">

			<div class="w3-row">
				<div class="w3-col m5 w3-center">
					<div class="w3-padding"></div>
					<div class="w3-padding"><img src="images/<?PHP echo $photo;?>" class="w3-image"></div>
					<div class="w3-padding"><b><?PHP echo $data["title"];?></b><br>
					<span class="w3-large">RM<?PHP echo $data["price"];?></span>
					<span class="w3-text-gray">/day</span>
					</div>
				</div>
				<div class="w3-col m7">
					<div class="w3-padding">
					
					<form action="booking-pay.php" method="post" >
						<div class="w3-padding"></div>
						<b class="w3-large">Booking Form (1/2)</b>
						<hr>
			  
							<div class="w3-section " >
								<label>Booking Date *</label>
								<input class="w3-input w3-border w3-round" type="date" name="date" min="<?PHP echo date("Y-m-d");?>" value="" required>
							</div>
							
							<div class="w3-section " >
								<label>Total Day *</label>
								<input class="w3-input w3-border w3-round" type="number" name="tot_day" min="1" value="1" required>
							</div>

							<div class="w3-section " >
								<label>Full Name *</label>
								<input class="w3-input w3-border w3-round" type="text" name="name" value="<?PHP echo $dat_user["name"]; ?>" disabled>
							</div>

							<div class="w3-section " >
								<label>Contact No *</label>
								<input class="w3-input w3-border w3-round" type="text" name="phone" value="<?PHP echo $dat_user["phone"]; ?>" disabled>
							</div>

							<hr class="w3-clear">

							<div class="w3-section" >
								<input name="id_car" type="hidden" value="<?PHP echo $id_car;?>">
								<input name="price" type="hidden" value="<?PHP echo $data["price"];?>">
								<button type="submit" class="w3-button w3-wide w3-blue w3-text-white w3-margin-bottom w3-round">PROCEED <i class="fa fa-fw fa-chevron-right"></i></button>
							</div>
						</div>  
					</form> 
					
					</div>
				</div>
			</div>
			
			
		
		</div>

    </div>
</div>



	
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
