<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch
		{
			padding-left: 1000px;
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
		padding: 16px;
		height:504px;
		}

		@media screen and (max-height: 450px) {
		.sidenav {padding-top: 15px;}
		.sidenav a {font-size: 18px;}
		}
		.img-circle
		{
			margin-left: 20px;
		}
		.container{
			height: 700px;
			background-color: black;
			opacity: .7;
			color: white;
		}
		.header-container {
			display: flex;
			justify-content: space-between;
			width: 100%;
			padding: 10px;
			align-items: center;
			margin-top: -16px;
		}
		.srch {
			padding-left: 988px;
		}
	</style>
</head>
<body>

			

	<!--_________________sidenav_______________-->
	
			<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

					<div style="color: white; margin-left: 60px; font-size: 20px;">

						<?php
							if(isset($_SESSION['login_user'])){
								echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
								echo "</br></br>";
								echo "Welcome ".$_SESSION['login_user']; 
						
							}
						?>
					</div>

					<a href="request.php">Book Request</a>
  							<a href="issue_info.php">Issue Information</a> 
  							<a href="expired_info.php">Expired List</a>
				
		</div>
		<div id="main" >
				<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>				
				<div class="header-container">
						<h2 style="margin-top:0px;margin-bottom:0px;">Requested Book </h2>
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
   		 </div>
				<?php
				if(isset($_SESSION['login_user']))
					{
						$q = mysqli_query($db, "SELECT issue_book.*, books.* FROM issue_book JOIN books ON issue_book.bid = books.bid WHERE issue_book.username = '$_SESSION[login_user]' and approve='';");


						if(mysqli_num_rows($q)==0)
						{
							echo "No pending request";
						}
						else
						{
					echo "<table class='table table-bordered table-hover' >";
						echo "<tr style='background-color: #6db6b9e6;'>";
							//Table header
							echo "<th>"; echo "BOOK ID";	echo "</th>";
							echo "<th>"; echo "Book-Name";  echo "</th>";
							echo "<th>"; echo "Authors Name";  echo "</th>";
							echo "<th>"; echo "Edition";  echo "</th>";
							echo "<th>"; echo "Approve Status";  echo "</th>";
						echo "</tr>";	

						while($row=mysqli_fetch_assoc($q))
						{
							echo "<tr>";
							echo "<td>"; echo $row['bid']; echo "</td>";
							echo "<td>"; echo $row['name']; echo "</td>";
							echo "<td>"; echo $row['authors']; echo "</td>";
							echo "<td>"; echo $row['edition']; echo "</td>";
							echo "<td>"; echo $row['approve']; echo "</td>"; 
							echo "</tr>";
						}
					echo "</table>";
						}
					}
					else{
						?>
						<script type="text/javascript">
							alert("You need to login first.");
							window.location="books.php"
						</script>
						<?php
					}
				?>

		</div>
				</div>

		<?php  
		include "footer.php";
	?>
	
</body>
</html>