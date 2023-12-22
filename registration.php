<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>

<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
    section {
      height: 700px;
      margin-top: -70px;
      width: 1519px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .center-content {
      position: relative;
    }

    .image-container {
      position: relative;
    }

    .overlay-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    .transparent-box {
      background-color: rgba(255, 255, 255, 0.7);
      padding: 20px;
      margin: 20px auto;
      max-width: 808px;
      border-radius: 10px;
    }
  </style>
</head>

<body>

  <section>
    <div class="center-content">
      <div class="image-container">
        <img src="images\log.jpg" style="margin-top: 0px; height: 700px; width: 1519px;">
        <div class="overlay-text">
          <div class="transparent-box">
            <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> Student Registration Form</h1>
          </div>
          <form name="Registration" action="" method="post" style="width: 300px;margin-left: 25%;">
            <input class="form-control" type="text" name="username" placeholder="Enrollment No" required=""> <br>
            <input class="form-control" type="text" name="first" placeholder="First Name" required=""> <br>
            <input class="form-control" type="text" name="last" placeholder="Last Name" required=""> <br>
            <input class="form-control" type="text" name="degree" placeholder="Degree" required=""> <br>
            <input class="form-control" type="text" name="branch" placeholder="Branch" required=""> <br>
            <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
            <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
            <input class="form-control" type="text" name="contact" placeholder="Phone No" required=""><br>
            <input class="btn btn-default" type="submit" name="submit" value="Sign Up"
              style="color: black; width: 70px; height: 30px">
        </div>
        </form>
      </div>
    </div>
    </div>
  </section>

  <?php

      if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT username from `student`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `student` VALUES( '$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]' ,'pic.jpg' ,'$_POST[degree]','$_POST[branch]');");
        ?>
  <script type="text/javascript">
    window.location = "student/student_login.php"
    alert("Registration successful");
  </script>
  <?php
        }
        else
        {

          ?>
  <script type="text/javascript">
    alert("The username already exist.");
  </script>
  <?php

        }

      }

    ?>

  <?php  
		include "footer.php";
	?>
</body>

</html>