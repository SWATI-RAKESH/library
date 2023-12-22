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
      max-width: 560px; 
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
<!-- <div id="main"> -->
  <!-- <div class="container" style="text-align: center;"> -->
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Add New Books</b></h2>
    
    <form class="book" action="" method="post">
        
        <input type="text" name="bid" class="form-control" placeholder="Book id" required=""><br>
        <input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
        <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
        <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
        <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
        <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
        <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>

        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">ADD</button>
    </form>
  </div>
<?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['login_user']))
      {
        mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bid]', '$_POST[name]', '$_POST[authors]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]', '$_POST[department]') ;");
        ?>
          <script type="text/javascript">
            alert("Book Added Successfully.");
          </script>

        <?php

      }
      else
      {
        ?>
          <script type="text/javascript">
            alert("You need to login first.");
          </script>
        <?php
      }
    }
?>
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



