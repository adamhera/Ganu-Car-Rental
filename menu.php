<!-- DEVELOPED BY MUHAMMAD ADAM HAQIMI @21/7/2023 -->
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card" id="myNavbar">

	&nbsp;<a href="index.php" class="w3-bar-item1"><img src="images/logo.png" height="55"></a>

    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small"> 
		<a href="index.php" class="w3-bar-item w3-button">HOME</a>

		<a href="car.php" class="w3-bar-item1 w3-button">CAR LIST</a>
		
		<?PHP if(isset($_SESSION["username"])) {?>
		<a href="history.php" class="w3-bar-item1 w3-button">BOOKING HISTORY</a>
		<?PHP } ?>

		<?PHP if(isset($_SESSION["username"])) {?>
		<a href="logout.php" class="w3-padding w3-round-xlarge w3-border w3-border-white w3-white w3-bar-item1 w3-button w3-margin-right"><i class="fa fa-fw fa-lg fa-power-off"></i>   LOGOUT</a>
		<?PHP } else { ?>
		<a href="login.php" class="w3-padding w3-round-xlarge w3-border w3-border-white w3-white w3-bar-item1 w3-button w3-margin-right"><i class="fa fa-fw fa-lg fa-lock"></i>   BOOKING / LOGIN</a>
		<?PHP } ?>

		<?PHP if(!isset($_SESSION["username"])) {?>
		<a href="admin.php" class="w3-bar-item1 w3-button">ADMIN</a>
		<?PHP } ?>	  
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

	<a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
	

  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-back w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
	<a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>

	<a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button">HOME</a>
	<a href="car.php" onclick="w3_close()" class="w3-bar-item w3-button">CAR LIST</a>
	
	<?PHP if(isset($_SESSION["username"])) {?>
	<a href="history.php" onclick="w3_close()" class="w3-bar-item w3-button">BOOKING HISTORY</a>
	<?PHP } ?>
	
	<?PHP if(isset($_SESSION["username"])) {?>
	<a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">LOGOUT</a>
	<?PHP } else { ?>
	<a href="login.php" onclick="w3_close()" class="w3-bar-item w3-button">LOGIN</a>
	<?PHP } ?>
	
	<a href="admin.php" onclick="w3_close()" class="w3-bar-item w3-button">ADMIN</a>
</nav>