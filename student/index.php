<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	School of Information & Technology
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 


<style type="text/css">
	
	
		section
    {
		height: 736px;
      margin-top: -40px;
	  width: 1519px;
    }
    

			body {
		font-family: "Lato", sans-serif;
		transition: background-color .5s;
		}

		.sidenav {
		height: 100%;
		margin-top: 50px;
		width: 0;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #222;
		overflow-x: hidden;
		transition: 0.5s;
		padding-top: 60px;
		}

		.sidenav a {
		padding: 8px 8px 8px 32px;
		text-decoration: none;
		font-size: 25px;
		color: #818181;
		display: block;
		transition: 0.3s;
		}

		.sidenav a:hover {
		color: #f1f1f1;
		}

		.sidenav .closebtn {
		position: absolute;
		top: 0;
		right: 25px;
		font-size: 36px;
		margin-left: 50px;
		}

		#main {
		transition: margin-left .5s;
		}

		@media screen and (max-height: 450px) {
		.sidenav {padding-top: 15px;}
		.sidenav a {font-size: 18px;}
		}
		.img-circle
		{
			margin-left: 20px;
		}

		   
        .center-content {
    position: relative;
}

.image-container {
    position: relative;
}

.overlay-text {
    position: absolute;
    top: 36%;
    left: 54%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white; 
	background-color: #000;
      margin: 20px auto;
      max-width: 808px; 
      border-radius: 10px; 
}
</style>
</head>


<body>
 <div >
		<!--	<header>
			<div class="logo">
				<img src="images/9.png">
				<h1 style="color: white;">School of Information & Technology</h1>
			</div> -->

			<?php
				if(isset($_SESSION['login_user'])){
					?>   
	

							<nav class="navbar navbar-inverse">
								<div class="container-fluid">
									<div class="navbar-header">
									<a class="navbar-brand active">School of Information & Technology</a>
									</div>
									<ul class="nav navbar-nav">
										<li><a href="index.php">HOME</a></li>
										<li><a href="books.php">BOOKS</a></li>
										<li><a href="feedback.php">FEEDBACK</a></li>
										<li><a href="fine.php">FINE</a></li>
                                        <li><a href="profile.php">PROFILE</a></li>
                
									</ul>
									<ul class="nav navbar-nav navbar-right">
										<li><a href="">
											<div style="color: white">
											<?php
												 echo "Welcome ".$_SESSION['login_user']." ";
												 echo "<img  class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['pic']."'>";

						  
											?>
											</div>
										</a></li>
										<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
										
										</ul>
									
								</div>
							</nav>
							<!-- </header> -->
		<section>
		<!-- <div class="sec_img"> -->
													<!--_________________sidenav_______________-->
					
													<div id="mySidenav" class="sidenav">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

							<div style="color: white; margin-left: 60px; font-size: 20px;">

								<?php
									echo "<img class='img-circle profile_img' height=120 width=120src='images/".$_SESSION['pic']."'>";

									echo "</br></br>";

									echo "Welcome ".$_SESSION['login_user']; 
								?>
							</div>

							<a href="request.php">Book Request</a>
  							<a href="issue_info.php">Issue Information</a> 
  							<a href="expired_info.php">Expired List</a>
				</div>

				<div id="main">
				


				<script>
				function openNav() {
				document.getElementById("mySidenav").style.width = "300px";
				document.getElementById("main").style.marginLeft = "300px";
				document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
				}

				function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
				document.getElementById("main").style.marginLeft= "0";
				document.body.style.backgroundColor = "white";
				}
				</script>
			<br><br><br>
			<section>
        <div class="center-content">
                <div class="image-container">
                    <img src="../images/lib.jpg" style="margin-top: 0px; height: 736px; width: 1519px;">
					<!-- <button style="font-size:30px;cursor:pointer;background-color: rgba(255, 255, 255, 0.7);" onclick="openNav()">&#9776; open</button> -->

                    <div class="overlay-text">				

                        <h1>Welcome to Departmental library of School of Information Technology</h1>
                    </div>
                </div>
            </div>
        </section>
		</section>
					<?php
				}
				else
				{
					?>
							<nav class="navbar navbar-inverse">
								<div class="container-fluid">
									<div class="navbar-header">
										<a class="navbar-brand active">School of Information Technology</a>
									</div>
									<ul class="nav navbar-nav">
										<li><a href="index.php">HOME</a></li>
										<li><a href="book.php">BOOKS</a></li>
										<li><a href="feedback.php">FEEDBACK</a></li>
									</ul>
									<ul  class="nav navbar-nav navbar-right">
										<li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
										<li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
									</ul>
								</div>
							</nav>
							

							<section>
							<div class="center-content">
                <div class="image-container">
                    <img src="../images/lib.jpg" style="margin-top: 0px; height: 736px; width: 1519px;">

                    <div class="overlay-text">
                        <h1>Welcome to Departmental library of School of Information Technology</h1>
                    </div>
                </div>
            </div>
		</section>

		<?php
		}
			
		?>

			
		
		

	</div>
	<?php  
		include "footer.php";
	?>
</body>
</html>