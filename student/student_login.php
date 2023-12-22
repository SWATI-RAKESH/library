<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>
  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
  <style type="text/css">
   section
    {
		height: 700px;
      margin-top: -20px;
	  width: 1536px;
    }
    .center-content {
    position: relative;
}

.image-container {
    position: relative;
}

.overlay-text {
    position: absolute;
    top: 38%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
        width:100%;

}
.transparent-box {
      background-color: rgba(255, 255, 255, 0.7);
      padding: 20px;
      margin: 20px auto;
      max-width: 420px; 
      border-radius: 10px; 
    }
  </style>   
</head>
<body>

<section>
<div class="center-content">
          <div class="image-container">
            <img src="../images/admin.avif" style="margin-top: 0px; height: 700px; width: 1519px;">
            <div class="overlay-text"> 
              <div class="transparent-box">
                <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Student Login Form</h1>
              </div>
              <form  name="login" action="" method="post" style="width: 365px;margin-left: 38%;">
                            <input class="form-control" type="text" name="username" placeholder="Enrollment No" required=""> <br>
                            <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
                            <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
                        
                        <p style="color: white; padding-left: 15px;">
                          <br><br>
                          <!-- <a style="color:white;" href="">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp New to this website?<a style="color: white;" href="..\registration.php">Sign Up</a> -->
                      </p>
                      </form>
                      </div>   
          </div>
      </div>
</section>

<?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");
      $row=mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
          <script type="text/javascript">
                    alert("Enrollment No and password doesn't match");
          </script>

        <?php
      }
      else
      {
        $_SESSION['login_user'] = $_POST['username']; 
        $_SESSION['pic'] = $row['pic']; 
        ?>
          <script type="text/javascript">
            alert("login successful");
            window.location="index.php"
          </script>
        <?php
      }
    }

  ?>

<?php  
		include "../footer.php";
	?>
</body>
</html>