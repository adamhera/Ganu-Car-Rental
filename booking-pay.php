<?PHP
session_start();
include("database.php");

$id_user	= $_SESSION["id_user"];

$act		= (isset($_POST['act'])) ? trim($_POST['act']) : '';

$id_car		= (isset($_POST['id_car'])) ? trim($_POST['id_car']) : '';
$date 		= (isset($_POST['date'])) ? trim($_POST['date']) : '';
$day 		= (isset($_POST['day'])) ? trim($_POST['day']) : '';
$price 		= (isset($_POST['price'])) ? trim($_POST['price']) : '';
$tot_day 	= (isset($_POST['tot_day'])) ? trim($_POST['tot_day']) : '';
$amount 	= (isset($_POST['amount'])) ? trim($_POST['amount']) : '';
$pay_method = (isset($_POST['pay_method'])) ? trim($_POST['pay_method']) : '';
$status 	= (isset($_POST['status'])) ? trim($_POST['status']) : 'Unpaid';

$success = "";

$amount = $price * $tot_day;

if($act == "pay")
{	
	if($pay_method =="Online Pay") $status = "Paid";
	
	$booking_id = rand(10000,90000);
	
	$SQL_insert = " 
	INSERT INTO `booking`(`id_booking`, `id_user`, `id_car`, `booking_id`, `date`, `tot_day`, `amount`, `pay_method`, `pay_slip`, `status`) 
					VALUES (NULL,'$id_user','$id_car','$booking_id','$date','$tot_day','$amount','$pay_method','','$status')";		
	
//echo $SQL_insert;	
	$result = mysqli_query($con, $SQL_insert);
	
	$id_booking = mysqli_insert_id($con);
	
	// -------- Pay Slip -----------------
	if(isset($_FILES['pay_slip'])){
		 
		  $file_name = $_FILES['pay_slip']['name'];
		  $file_size = $_FILES['pay_slip']['size'];
		  $file_tmp = $_FILES['pay_slip']['tmp_name'];
		  $file_type = $_FILES['pay_slip']['type'];
		  
		  $fileNameCmps = explode(".", $file_name);
		  $file_ext = strtolower(end($fileNameCmps));
		  
		  if(empty($errors)==true) {
			 move_uploaded_file($file_tmp,"upload/".$file_name);
			 
			$query = "UPDATE `booking` SET `pay_slip`='$file_name' WHERE `id_booking` = '$id_booking'";			
			$result = mysqli_query($con, $query) or die("Error in query: ".$query."<br />".mysqli_error($con));
		  }else{
			 print_r($errors);
		  }  
	}
	// -------- End pay_slip -----------------
	
	$success = "Successfully Add";
	
	print "<script>self.location='booking-success.php?id_booking=" . $id_booking . "';</script>";
}

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

<body>

<?PHP include("menu.php"); ?>


<div class="bgimg-1" >

	<div class="w3-padding-48"></div>
	
	<div class="w3-padding w3-xxlarge w3-center w3-text-blue"><b>- BOOKING -</b></div>

<div class="w3-container w3-padding-16" id="contact">
    <div class="w3-content w3-container w3-white w3-round w3-card" style="max-width:800px">
		<div class="w3-padding">

			<div class="w3-row">
				<div class="w3-col m5 w3-center w3-borderx">
					<div class="w3-padding"></div>
					<div class="w3-padding"><img src="images/<?PHP echo $photo;?>" class="w3-image"></div>
					<div class="w3-padding"><b><?PHP echo $data["title"];?></b><br>
					<span class="w3-large">RM<?PHP echo $data["price"];?></span>
					<span class="w3-text-gray">/day</span>
					</div>
					
					<hr>
					
					<div class="w3-section " >
						<label>Booking Date</label><br>
						<label><?PHP echo $date;?></label>
					</div>
					
					<div class="w3-section " >
						<label>Total Day</label><br>
						<label><?PHP echo $tot_day;?> day(s)</label>
					</div>

					<div class="w3-section " >
						<label>Full Name</label><br>
						<label><?PHP echo $dat_user["name"]; ?></label>
					</div>

					<div class="w3-section " >
						<label>Contact No</label><br>
						<label><?PHP echo $dat_user["phone"]; ?></label>
					</div>
				</div>
				<div class="w3-col m7">
					<div class="w3-padding">
					
					<form action="booking-pay.php" method="post" enctype="multipart/form-data" >
						<div class="w3-padding"></div>
						<b class="w3-large">Booking Form (2/2)</b>
						<hr>

						  <div class="w3-border w3-yellow w3-padding w3-round w3-padding-16">
							Please make payment to : <br>
							<div class="w3-row">
								<div class="w3-col s4">Bank : </div>
								<div class="w3-col s8"><b>MAYBANK</b></div>
							</div>
							<div class="w3-row">
								<div class="w3-col s4">Acc No : </div>
								<div class="w3-col s8"><b>88888888888</b></div>
							</div>
							<div class="w3-row">
								<div class="w3-col s4">Acc Name : </div>
								<div class="w3-col s8"><b>GANU CAR RENTAL</b></div>
							</div>
						  </div>
						  
						  <div class="w3-section " >
							<label>Amount To Pay *</label>
							<input class="w3-input w3-border w3-round w3-padding" type="text" name="amount" value="RM <?PHP echo $amount;?>" disabled>
						  </div>
						  
						  <div class="w3-section " >
							<label>Payment Method *</label>
							<select class="w3-select w3-border w3-round w3-padding" name="pay_method" required>
								<option value="Online Pay">Online Pay</option>
								<option value="Cash">Cash</option>
							</select>
						  </div>
						  
							<div class="w3-section" >
								<label>Attachment (Payment Slip) </label>
								<input class="w3-input w3-border w3-round" type="file" name="pay_slip" >
								<small>  only JPEG, JPG, PNG or GIF allowed </small>
							</div>
						  
						  <hr class="w3-clear">
						  
						  <div class="w3-section" >
							<input name="id_car" type="hidden" value="<?PHP echo $id_car;?>">
							<input name="id_user" type="hidden" value="<?PHP echo $id_user;?>">
							<input name="date" type="hidden" value="<?PHP echo $date;?>">
							<input name="price" type="hidden" value="<?PHP echo $price;?>">
							<input name="tot_day" type="hidden" value="<?PHP echo $tot_day;?>">
							<input name="act" type="hidden" value="pay">
							<button type="submit" class="w3-button w3-wide w3-blue w3-text-white w3-margin-bottom w3-round">CONFIRM BOOKING<i class="fa fa-fw fa-chevron-right"></i></button>
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
