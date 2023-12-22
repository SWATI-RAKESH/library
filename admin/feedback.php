
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
        .srch {
            padding-left: 1100px;
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

        /* #main {
            transition: margin-left .5s;
            padding: 16px;
        } */

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .img-circle {
            margin-left: 20px;
        }
        .header-container {
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding: 10px;
    align-items: center;
    margin-top: -50px;
}
.srch {
    padding-left: 988px;
}
.center-content {
    position: relative;
}

.image-container {
    position: relative;
}

.overlay-text {
    position: absolute;
    top: 25%;
    left: 50%;
    transform: translate(-50%, -50%);
    /* text-align: center; */
    width:100%;
    padding: 16px;
}

    .transparent-box {
      background-color: rgba(255, 255, 255, 0.7);
      padding: 20px;
      margin: 20px auto;
      max-width: 1413px; 
      border-radius: 10px; 
    }
    </style>
</head>

<body>
<div class="center-content">
            <div class="image-container">
				<div id="main">
							<?php
							if(isset($_SESSION['login_user'])){
										?>
							<div id="mySidenav" class="sidenav">
								<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

								<div style="color: white; margin-left: 60px; font-size: 20px;">

									<?php
														echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
														echo "</br></br>";

														echo "Welcome ".$_SESSION['login_user']; 
													?>
                                                                </div>
                                                                <a href="AddBook.php">Add Book</a>
                                        <a href="request.php">Request Book</a>
                                        <a href="issue_info.php">Issue Book</a>
                                        <a href="expired_info.php">Overdue Book</a>
                                                            </div>




							<script>
								function openNav() {
									document.getElementById("mySidenav").style.width = "300px";
									document.getElementById("main").style.marginLeft = "300px";
									document.getElementById("srch").style.paddingLeft = "688px";
									document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
								}

								function closeNav() {
									document.getElementById("mySidenav").style.width = "0";
									document.getElementById("main").style.marginLeft = "0";
									document.body.style.backgroundColor = "white";
								}
							</script>
							<br><br><br>

						<?php
						}
						?>

</div>
                <img src="../images/log.jpg" style="margin-top: -80px; height: 700px; width: 1519px;">
                <div class="overlay-text"> 
                        <button style="font-size:30px; cursor:pointer; background-color: rgba(255, 255, 255, 0.5); border:none" onclick="openNav()">&#9776; Open</button>

				<div class="transparent-box">
			 <h2><strong>Feedback</strong></h2>
		<!--	<form style="" action="" method="post">
				<input class="form-control" type="text" name="comment" placeholder="Write something..."><br>	
				<input class="btn btn-default" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">		
			</form> -->
		
			<br><br>
			<div class="scroll">
				<?php
					
                    $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['username']; echo "</td>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
					
				?>
			</div>
		</div>		   
				</div>
				</div>   
            </div>
        </div>
    <?php  
		include "../footer.php";
	?>
</body>

</html>