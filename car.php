<?PHP
session_start();
include("database.php");
?>
<?PHP
$category	= (isset($_GET['category'])) ? trim($_GET['category']) : '';
?>
<!DOCTYPE html>
<html>
<!-- DEVELOPED BY MUHAMMAD ADAM HAQIMI @21/7/2023 -->
<title>Ganu Car Rental</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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

a:link {
  text-decoration: none;
}

/* Full height bg */
.bgimg-1 {
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>

<body class="w3-pale-blue">

<?PHP include("menu.php"); ?>


<div class="" >

	<div class="w3-padding-48"></div>
	
	<div class="w3-padding w3-center">
		<a href="?category=Compact" class="w3-button w3-blue w3-round-large w3-padding"> Compact</a>
		<a href="?category=Sedan" class="w3-button w3-blue w3-round-large w3-padding"> Sedan</a>
		<a href="?category=MPV" class="w3-button w3-blue w3-round-large w3-padding"> MPV</a>
		<a href="?category=SUV" class="w3-button w3-blue w3-round-large w3-padding"> SUV</a>
	</div>
	
	<div class="w3-container w3-padding-24" id="contact">
		<div class="w3-content w3-container w3-center " style="max-width:1200px">
			
			
			<div class="w3-row w3-center">
				
				<?PHP
				$sql_cat = "";

				if($category) { $sql_cat = "WHERE `category` = '$category' "; }
				$SQL_list = "SELECT * FROM `car` $sql_cat";
				$result = mysqli_query($con, $SQL_list) ;
				while ( $data	= mysqli_fetch_array($result) )
				{
					$photo	= $data["photo"];
					if(!$photo) $photo = "avatar.png";
					$id_car	= $data["id_car"];
				?>
				<div class="w3-col m4 w3-padding w3-padding-16 w3-center">
					<div class="w3-padding w3-padding-16 w3-card w3-white w3-round-large">
						<img src="images/<?PHP echo $photo;?>" style="width:300px" class="w3-image">
						<div class="w3-padding"<b><?PHP echo $data["title"]; ?></b><br>
						RM<?PHP echo $data["price"]; ?> / day</div>
						
						<?PHP if(isset($_SESSION["username"])) {?>
						<a href="booking.php?id_car=<?PHP echo $id_car;?>" class="w3-button w3-block w3-blue w3-round-large"> BOOK NOW <i class="fa fa-fw fa-plus"></i></a>
						<?PHP } ELSE { ?>
						<a href="login.php" class="w3-button w3-block w3-blue w3-round-large"> BOOK NOW <i class="fa fa-fw fa-chevron-right"></i></a>
						<?PHP } ?>
					</div>
				</div>
				
				<?PHP 
				} 
				?>
				
				
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
