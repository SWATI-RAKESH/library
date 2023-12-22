<?php
  include "navbar.php";
  include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style type="text/css">
    	
    	.wrapper
    	{
    		margin: 0 auto;
    		width:400px;
    		/* height: 600px;
    		background-color: black;
    		opacity: .8; */
    		/* color: white; */
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
.center-content {
    position: relative;
}

.image-container {
    position: relative;
}

.overlay-text {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    /* text-align: center; */
    width:100%;
}

    .transparent-box {
      background-color: rgba(255, 255, 255, 0.7);
      padding: 20px;
      margin: 20px auto;
      max-width: 872px; 
      border-radius: 10px; 
    }
    </style>
</head>

<!--_________________sidenav_______________-->
<div class="center-content">
            <div class="image-container">
				<div id="main">
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

  
  <!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span> -->


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
<img src="../images/log.jpg" style="margin-top: -52px; height: 700px; width: 1519px;">
                <div class="overlay-text"> 

						<span style="font-size:30px;cursor:pointer;background-color: rgba(255, 255, 255, 0.7);" onclick="openNav()">&#9776; open</span>

				<div class="transparent-box">
<!-- <div class="container"> -->
		<form style="" action="" method="post">
            <button class="btn btn-default" style="float: right; width:70px;" name="submit">Edit</button>
        </form>
        <!-- <div class="wrapper"> -->
		   <?php
			$q=mysqli_query($db,"SELECT * FROM `admin` where username='$_SESSION[login_user]' ;");
            ?>
            <h2 style="text-align:center;" >My Profile</h2>
            <?php
                $row=mysqli_fetch_assoc($q);
                echo "  <div style='text-align:center;'> <img  class='img-circle profile_img' height=110 width=120 src='images/".$_SESSION['pic']." '>
                 </div> ";
            ?>

            <div style="text-align : center;">
                <?php
                        echo '<strong style="font-weight: bold; font-size: 40px;">Welcome ' . $_SESSION['login_user'] . '</strong>';

                ?>
            </div>

            <?php
            	echo "<table class='table table-bordered table-hover'>";
                    echo "<tr>";
                        echo "<td>";echo "<b> First Name </b>";echo "</td>";
                        echo "<td>";echo $row['first'];echo "</td>";
                    echo "</tr>";	

                    echo "<tr>";
                        echo "<td>";echo "<b> last Name </b>";echo "</td>";
                        echo "<td>";echo $row['last'];echo "</td>";
                    echo "</tr>";	
                    
                    echo "<tr>";
                        echo "<td>";echo "<b> Username </b>";echo "</td>";echo "<td'>";
                        echo "<td>";echo $row['username'];echo "</td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                        echo "<td>";echo "<b> Password </b>";echo "</td>";echo "<td'>";
                        echo "<td>";echo $row['password'];echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>";
                        echo "<b> Email </b>";
                    echo "</td>";
                    echo "<td>";
                    echo $row['email'];
                    echo "</td>";
                    echo "</tr>";	

                    echo "<tr>";
                    echo "<td>";
                        echo "<b> Contact </b>";
                    echo "</td>";
                    echo "<td>";
                    echo $row['contact'];
                    echo "</td>";
                    echo "</tr>";	   
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