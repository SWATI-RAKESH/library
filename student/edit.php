<?php
	include "navbar.php";
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
		  section{
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
    /* width:100%; */
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
<body >
<div class="center-content">
            <div class="image-container">
        <img src="../images/log.jpg" style="margin-top: -20px; height: 667px; width: 1519px;">
        <div class="overlay-text"> 
		<div class="transparent-box">
        <!-- <div class="wrapper"> -->
                <h2 style="text-align: center;">Edit Information</h2>

                    <?php
                        
                        $sql = "SELECT * FROM student WHERE username='$_SESSION[login_user]'";
                        $result = mysqli_query($db,$sql) or die (mysql_error());

                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                            $first=$row['first'];
                            $last=$row['last'];
                            $username=$row['username'];
                            $password=$row['password'];
                            $email=$row['email'];
                            $contact=$row['contact'];
                        }

                    ?>

<div style= "margin-left: 60px; font-size: 20px;">

</div>
	
                    <div class="form1">
                        <form action="" method="post"  autocomplete="off" enctype="multipart/form-data">

                        <input class="form-control" type="file" name="file">

                        <!-- <label><h4><b>: </b></h4></label> -->
                        <input class="form-control" type="text" placeholder="First Name" name="first" value="<?php echo $first; ?>">

                        <!-- <label><h4><b></b></h4></label> -->
                        <input class="form-control" type="text" name="last" placeholder="Last Name" value="<?php echo $last; ?>">

                        <!-- <label><h4><b>Username</b></h4></label>
                        <input class="form-control" type="text" name="username" placeholder="" value="<?php echo $username; ?>"> -->

                        <!-- <label><h4><b></b></h4></label> -->
                        <input class="form-control" type="text" name="password" placeholder="Password" value="<?php echo $password; ?>">

                        <!-- <label><h4><b></b></h4></label> -->
                        <input class="form-control" type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">

                        <!-- <label><h4><b></b></h4></label> -->
                        <input class="form-control" type="text" name="contact" placeholder="Contact No" value="<?php echo $contact; ?>">

                        <br>
                        <div style="padding-left: 100px;">
                            <button class="btn btn-default" type="submit" name="submit">save</button></div>
                    </form>
                </div>
                        <?php 

                            if(isset($_POST['submit']))
                            {
                                move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

                                $first=$_POST['first'];
                                $last=$_POST['last'];
                                // $username=$_POST['username'];
                                $password=$_POST['password'];
                                $email=$_POST['email'];
                                $contact=$_POST['contact'];
                                $pic=$_FILES['file']['name'];

                                $sql1= "UPDATE student SET pic='$pic', first='$first', last='$last',  password='$password', email='$email', contact='$contact' WHERE username='".$_SESSION['login_user']."';";

                                if(mysqli_query($db,$sql1))
                                {
                                    ?>
                                        <script type="text/javascript">
                                            alert("Saved Successfully.");
                                            window.location="profile.php";
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
        </div>
   <?php  
		include "footer.php";
	?>
</body>
</html>








