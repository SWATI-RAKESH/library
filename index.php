
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
            height: 678px;
            margin-top: -20px;
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
    top: 36%;
    left: 54%;
    transform: translate(-50%, -50%);
    text-align: center;
   
    margin: 20px auto;
    max-width: 808px;
    border-radius: 10px;
    color: white; background-color: #000;
}
footer{
    margin-top: 140px;
}
    </style>
</head>


<body>
    <div>
   
		<?php  
		include "navbar.php";
	    ?>

        <section>
        <div class="center-content">
                <div class="image-container">
                    <img src="images\lib.jpg" style="margin-top: 0px; height: 678px; width: 1519px;">

                    <div class="overlay-text">
                        <h1>Welcome to Departmental library of School of Information Technology</h1>
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