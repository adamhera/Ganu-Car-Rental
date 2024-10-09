<?PHP
session_start();
include("database.php");

$id_user = $_SESSION["id_user"];
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

<?PHP include("menu.php"); ?>

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
			<thead>
				<tr>
					<th>#</th>	
					<th>Booking ID</th>
					<th>Car Name</th>
					<th>Booking Date</th>
					<th>Total Day</th>
					<th>Payment Method</th>
					<th>Payment Slip</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?PHP
			$bil = 0;
			$SQL_list = "SELECT * FROM `booking`,`car` WHERE booking.id_car = car.id_car AND booking.id_user = $id_user";
			$result = mysqli_query($con, $SQL_list) ;
			while ( $data	= mysqli_fetch_array($result) )
			{
				$bil++;
				$pay_slip	= $data["pay_slip"];
				if(!$pay_slip) $pay_slip = "noimage.jpg";
				$id_booking= $data["id_booking"];
			?>			
			<tr>
				<td><?PHP echo $bil ;?></td>			
				<td><?PHP echo $data["booking_id"] ;?></td>
				<td><?PHP echo $data["title"] ;?></td>
				<td><?PHP echo $data["date"] ;?></td>
				<td><?PHP echo $data["tot_day"] ;?></td>
				<td><?PHP echo $data["pay_method"] ;?></td>
				<td><a target="_blank" href="upload/<?PHP echo $pay_slip; ?>"><img src="upload/<?PHP echo $pay_slip; ?>" class="w3-round-large w3-image" alt="image" style="width:100%;max-width:60px"></a></td>
				<td><?PHP echo $data["status"] ;?></td>
				<td>
				<a href="booking-success.php?id_booking=<?PHP echo $id_booking;?>" class=""><i class="fa fa-fw fa-eye fa-lg"></i></a>
				</td>
			</tr>			
			<?PHP } ?>
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
