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

					<a href="AddBook.php">Add Book</a>
		<a href="request.php">Request Book</a>
		<a href="issue_info.php">Issue Book</a>
        <a href="expired_info.php">Overdue Book</a>

	</div>

	<div id="main" style="min-height: 444px;">
		
		<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


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

		<br><br>


			<h3 style="text-align = center;">Issued Book </h3>
			<?php
  $c=0;
				if(isset($_SESSION['login_user']))
				{
					$sql="SELECT student.username,first,last,books.bid,name,authors,edition,issue,issue_book.return FROM student inner join  issue_book  ON student.username=issue_book.username  inner join books ON issue_book.bid=books.bid where issue_book.approve='Yes' ORDER BY `issue_book`.`return` ASC ";
					$res=mysqli_query($db,$sql);
					echo "<table class='table table-bordered table-hover' >";
						echo "<tr style='background-color: #6db6b9e6;'>";
							//Table header
							echo "<th>"; echo "Enrollment No";	echo "</th>";
							echo "<th>"; echo "First Name";	echo "</th>";
							echo "<th>"; echo "Last Name";	echo "</th>";
							echo "<th>"; echo "Book ID";	echo "</th>";
							echo "<th>"; echo "Book Name";	echo "</th>";
							echo "<th>"; echo "Authors Name";	echo "</th>";
							echo "<th>"; echo "Edition";	echo "</th>";
							echo "<th>"; echo "Issue Date";  echo "</th>";
							echo "<th>"; echo "Return Date";  echo "</th>";
						echo "</tr>";	
						while($row=mysqli_fetch_assoc($res))
						{
                            $d=date("Y-M-D");
                            if($d > $row['return']){
                                $c=$c+1;
                                $var='<p style=" color:yellow; background-color:red;">EXPIRED </p>';
                                mysqli_query($db,"UPDATE issue_book SET approve='EXPIRED' where `return`= '$row[return]' and approve='Yes' limit $c; ");
                            }
							echo "<tr>";
							echo "<td>"; echo $row['username']; echo "</td>";
							echo "<td>"; echo $row['first']; echo "</td>";
							echo "<td>"; echo $row['last']; echo "</td>";
							echo "<td>"; echo $row['bid']; echo "</td>"; 
							echo "<td>"; echo $row['name']; echo "</td>"; 
							echo "<td>"; echo $row['authors']; echo "</td>"; 
							echo "<td>"; echo $row['edition']; echo "</td>"; 
                            echo "<td>"; echo $row['issue']; echo "</td>"; 
                            echo "<td>"; echo $row['return']; echo "</td>"; 
							echo "</tr>";
						}
						echo "</table>";
					}
				?>		
	   </div>
    </div>
	<?php  
		include "../footer.php";
	?>
    </body>
</html>