<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        School of Information Technology
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <style type="text/css">
        section {
            height: 684px;
            margin-top: -70px;
            width: 1519px;
            display: flex;
            flex-direction: column;
            align-items: center;
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
            width: 100%;


        }

        .transparent-box {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 4px;
            margin: 23px auto;
            max-width: 250px;
            border-radius: 10px;
            color: white;
            background-color: #000;

        }
    </style>
</head>


<body>
    <div>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand active">School of Information Technology</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="books.php">BOOKS</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                    <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
                </ul>
            </div>
        </nav>
        <section>
            <div class="center-content">
                <div class="image-container">
                    <img src="images\log.jpg" style="margin-top: 0px; height: 684px; width: 1519px;">

                    <div class="overlay-text">
                        <div class="transparent-box">
                            <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> Log In As:
                            </h1>
                        </div>
                        <form name="login" action="" method="post">
                            <div class="button">
                                <button
                                    style="font-size:35px;font-weight:700px;color: white;font-family: Lucida Console; background-color: #000;"
                                    class="btn btn-default" type="submit" name="submit1" style="">Admin</button>
                                <button
                                    style="font-size:35px;font-weight:700px;color: white;font-family: Lucida Console; background-color: #000;"
                                    class="btn btn-default" type="submit" name="submit2" style="">Student</button>
                            </div>
                        </form>
                        <?php
                    if(isset($_POST['submit1'])){
                        ?>
                        <script> window.location = "admin/admin_login.php"</script>
                        <?php
                    }else if (isset($_POST['submit2'])) {
                        ?>
                        <script>window.location = "student/student_login.php"</script>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </section>




    </div>
    <?php  
		include "footer.php";
	?>
</body>

</html>