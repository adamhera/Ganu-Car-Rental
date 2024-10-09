<?PHP
session_start();
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Poppins", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

a:link {
  text-decoration: none;
}

.w3-bar .w3-button {
  padding: 16px;
}

.logos-container {
		  display: flex;
		  justify-content: center;
		  align-items: center;
		}

		.logo-box {
		  margin: 0 12px;
		  display: flex;
		  align-items: center;
		}	

		.logo-box-vertical {
		  margin: 0 12px;
		  display: flex;
		  flex-direction: column;
		  align-items: center;
		}

		.color-socmed {
		  color: black;
		}

		.paragraph {
		  display: flex;
		  justify-content: center;
		  align-items: center;
		}
	
	
.container-wrapper {
  display: flex;
  justify-content: space-between;
}

.container {
  border: 2px solid #ccc;
  background-color: white;
  border-radius: 5px;
  padding: 5px; /* Reduce padding */
  margin: 20px; /* Reduce margin */
  width: calc(35% - 8px); /* Adjust width for three testimonials in a row */
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.container img {
  border-radius: 50%;
  margin-bottom: 10px;
}

.container span {
  font-size: 20px;
  margin-right: 15px;
}

@media (max-width: 768px) {
  .container {
    width: calc(50% - 8px); /* Adjust width for two testimonials in a row */
  }
}

@media (max-width: 500px) {
  .container-wrapper {
    flex-direction: column;
  }
  .container {
    width: 100%;
  }
}

.collapsible {
  background-color: #0047AB;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #777;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}



* {
  box-sizing: border-box;
}


/* The grid: Three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 50px;
  text-align: center;
  font-size: 25px;
  cursor: pointer;
  color: white;
}

.containerTab {
  padding: 20px;
  color: white;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Closable button inside the container tab */
.closebtn {
  float: right;
  color: white;
  font-size: 35px;
  cursor: pointer;
}

.team-member {
  flex: 0 0 calc(50% - 10px);
  margin: 5px;
  padding: 10px;
  background-color: #eee;
  border-radius: 5px;
  text-align: center;
}

.team-member img {
  width: 100px;
  border-radius: 50%;
  margin-bottom: 10px;
}

.team-member h3 {
  font-size: 20px;
  margin: 0;
}

.team-member p {
  font-size: 16px;
}

@media (max-width: 768px) {
  .team-member {
    flex-basis: calc(50% - 10px);
  }
}
</style>

<body class="w3-pale-blue">

<?PHP include("menu.php"); ?>


<div class="" >

		<div class="w3-padding-48"></div>
	

	
	<div class="w3-container w3-padding" id="contact">
		<div class="w3-content w3-container w3-white w3-round w3-card" style="max-width:1200px">

			<div class="w3-row">
				<div class="w3-col m6">
					<img src="images/logo.jpg" class="w3-image">
				</div>
				
				<div class="w3-col m6">
				<div class="w3-margin w3-padding w3-padding-32 ">
					<b>Ganu Car Rental</b> Ganu Car Rental is a one-stop online platform that provides affordable car rental service in Terengganu.
Check out our car rental pricing and rates of various car types (Sedan, SUV, MPV, and Compact) for various occasions.
					<div class="w3-padding"></div>
					<a href="car.php" class="w3-wide w3-button w3-block w3-padding-large w3-black w3-margin-bottom w3-round "><b >OUR CAR LIST</b></a>
				</div>
				
				</div>
			</div>
		  
		</div>
	</div>
	
	
	<div class="w3-container w3-padding-24" id="contact">
	<div class="w3-content w3-container" style="max-width:1200px">
		<div class="w3-padding w3-xlarge w3-center w3-text-blue"><b>- CATEGORY -</b></div>
		
		<div class="w3-row">
			<div class="w3-col m3 w3-center">
				<div class="w3-image w3-circle w3-border w3-padding w3-white">
					<img src="images/suv.png" class="w3-image">
					<div class="w3-padding w3-large w3-center w3-text-blue"><b>SUV</b></div>
				</div>
			</div>
			
			<div class="w3-col m3 w3-center">
				<div class="w3-image w3-circle w3-border w3-padding w3-white">
					<img src="images/mpv.png" class="w3-image">
					<div class="w3-padding w3-large w3-center w3-text-blue"><b>MPV</b></div>
				</div>
			</div>
			
			<div class="w3-col m3 w3-center">
				<div class="w3-image w3-circle w3-border w3-padding w3-white">
					<img src="images/compact.png" class="w3-image">
					<div class="w3-padding w3-large w3-center w3-text-blue"><b>SEDAN</b></div>
				</div>
			</div>
			
			<div class="w3-col m3 w3-center">
				<div class="w3-image w3-circle w3-border w3-padding w3-white">
					<img src="images/sedan.png" class="w3-image">
					<div class="w3-padding w3-large w3-center w3-text-blue"><b>LUXURY SEDAN</b></div>
				</div>
			</div>
		</div>
	  
	</div>
</div>

	<br><br>
	<!-- testimonials -->
	<div class="w3-padding w3-xlarge w3-center w3-text-blue"><b>- WHAT OUR CUSTOMERS SAY -</b></div>
	<div class="container-wrapper">
	  <div class="container">
		<img src="images/mpv2.jpg" alt="Avatar" style="width:90px">
		<p><span>Mohd Amir.</span><i><b>Toyota Vellfire 2.4 (A)</i></b></p>
		<p>"I asked for a bigger car and it was free upgrade. Had a great time!"</p>
	  </div>

	  <div class="container">
		<img src="images/sedan1.jpg" alt="Avatar" style="width:90px">
		<p><span>Rebecca Flex.</span><i><b>Honda City New Variant 1.5 (A)</i></b></p>
		<p>"Great service and friendly staff....keep it up"</p>
	  </div>
	  
	  <div class="container">
		<img src="images/sedan2.jpg" alt="Avatar" style="width:90px">
		<p><span>Lim Kok Wik.</span><i><b>Mercedes-Benz CLS 250 AMG 2.1 (A)</i></b></p>
		<p>"No doubt excellent service"</p>
	  </div>
	</div>
	<!-- testimonials -->
	<br><br>
		
	<!-- About us -->
		<div id="aboutUs" style="background-color:white;">
			<div class="w3-padding w3-xlarge w3-center w3-text-blue"><b>- ABOUT US -</b></div>
			<p style="text-align:center; font-size:20px; ">Ganu Car Rental is a one-stop online platform that provides affordable car rental service in Terengganu.<br>Check out our car rental pricing and rates of various car types (Sedan, SUV, MPV, and Compact) for various occasions.</p>
			
			<!-- Three columns -->
			<div class="row">
			  <div class="column" onclick="openTab('b1');" style="background:#A7C7E7;">
				VISION
			  </div>
			  <div class="column" onclick="openTab('b2');" style="background:#0F52BA;">
				MISSION
			  </div>
			  <div class="column" onclick="openTab('b3');" style="background:#191970;">
				OUR TEAM
			  </div>
			</div>

			<!-- Full-width columns: (hidden by default) -->
			<div id="b1" class="containerTab" style="display:none;background:#A7C7E7">
			  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
			  <h2>Our Vision</h2>
			  <p><ul>
				<li>To dominate the Terengganu market for car rental services.</li>
				<li>To establish a solid reputation.</li>
				<li>To provide our customers with the most satisfying car rental experience possible.</li>
				<li>To be Terengganu's top provider of automobile rentals by providing excellent customer service, a wide variety of rental options, and creative solutions to fulfill our clients' demands.</li>
			  </ul></p>
			</div>

			<div id="b2" class="containerTab" style="display:none;background:#0F52BA">
			  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
			  <h2>Our Mission</h2>
			  <p>To offer dependable, reasonable, and excellent car rental services to our clients while placing a priority on their comfort, convenience, and safety.</p>
			</div>

			<div id="b3" class="containerTab" style="display:none;background:#191970">
			  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
			  <h2>Our Team</h2>
			  <div class="team-member">
				<img src="images/lina.jpg" alt="Team Member 1">
				<h3 style="color:#191970">Nur Lina Bariah binti Mohd Rashid</h3>
				<p style="color:#191970">General Manager</p>
			  </div>
			  <div class="team-member">
				<img src="images/farah.jpg" alt="Team Member 2">
				<h3 style="color:#191970">Nur Farah Afiqah binti Shafrol Haizaz</h3>
				<p style="color:#191970">Programmer</p>
			  </div>
			  <div class="team-member">
				<img src="images/adam.jpg" alt="Team Member 3">
				<h3 style="color:#191970">Muhammad Adam Haqimi bin Ahmad Nafiah</h3>
				<p style="color:#191970">Programmer</p>
			  </div>
			  <div class="team-member">
				<img src="images/waddah.jpg" alt="Team Member 4">
				<h3 style="color:#191970">Mawaddah Afrina binti Rokit</h3>
				<p style="color:#191970">Database Designer</p>
			  </div>
			</div>

			<script>
			function openTab(tabName) {
			  var i, x;
			  x = document.getElementsByClassName("containerTab");
			  for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			  }
			  document.getElementById(tabName).style.display = "block";
			}
			</script>
						
		</div>
		<!-- About us -->
		<br><br>
		<!-- FAQ -->
		<div style="height:450px;">
			<div class="w3-padding w3-xlarge w3-center w3-text-blue"><b>- FAQ -</b></div>
			
			<button class="collapsible">How much does it cost to rent a car with Ganu Car Rental?</button>
			<div class="content">
			  <p>The starting price for an average rental car is RM170.00 per day.</p>
			</div>
			
			<button class="collapsible">What are the most affordable cars to rent?</button>
			<div class="content">
			  <p>Smaller cars, such as the Proton Persona, Proton Iriz, and Perodua Bezza are the most affordable options for rental.</p>
			</div>
			
			<button class="collapsible">What are the types of cars available to rent?</button>
			<div class="content">
			<p>We offer a wide range of cars including Compact, Sedans, MPVs, SUVs, and Luxury cars.</p>
			</div>
			
			<button class="collapsible">Is there a minimum rental period for a car?</button>
			<div class="content">
			<p>No, there is no minimum car rental period.</p>
			</div>

			<script>
				var coll = document.getElementsByClassName("collapsible");
				var i;

				for (i = 0; i < coll.length; i++) {
				  coll[i].addEventListener("click", function() {
					this.classList.toggle("active");
					var content = this.nextElementSibling;
					if (content.style.maxHeight){
					  content.style.maxHeight = null;
					} else {
					  content.style.maxHeight = content.scrollHeight + "px";
					} 
				  });
				}
			</script>
		</div>
		<!-- FAQ -->

		<br><br><br><br><br>
		<div class="logos-container">
				<div class="logo-box">
					<i class="fab fa-facebook-square color-socmed"></i>
				</div>
				
				<div class="logo-box">
					<i class="fab fa-google-plus-g color-socmed"></i>
				</div>
				
				<div class="logo-box">
					<i class="fab fa-twitter color-socmed"></i>
				</div>
				
				<div class="logo-box">
					<i class="fab fa-instagram color-socmed"></i>
				</div>
			</div>
			<div class="paragraph">
				<p2 style="color:black;"> &copy;Copypright 2023 Ganu Car Rental. All right reserved</p2>
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