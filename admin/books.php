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
    </style>
</head>

<body>

    <!--_________________sidenav_______________-->


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


        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


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

    <!--__________________________search bar________________________-->

    <div class="header-container">
        <h2 style="margin-top:0px;margin-bottom:0px;">List Of Books</h2>
        <div class="srch" id="srch">
            <form class="navbar-form" method="post" name="form1">
                <input class="form-control" type="text" name="search" placeholder="search books.." required="">
                <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </form>
            <form class="navbar-form" method="post" name="form1">
                <input class="form-control" type="text" name="bid" placeholder="Enter book Id" required="">
                <button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Delete
                </button>
            </form>
        </div>    
    </div>

   
    <?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Subject";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Subject";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}

		
		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				// // Validate and sanitize the 'bid' parameter
				// $bid = isset($_POST['bid']) ? intval($_POST['bid']) : 0;

				// if ($bid > 0) {
				// 	$stmt = $db->prepare("DELETE FROM books WHERE bid = ?");
				// 	$stmt->bind_param("i", $bid);
				// 	$stmt->execute();
				// 	$stmt->close();

				// 	// Display a success message
				// 	echo '<script type="text/javascript">';
                    // 	echo 'alert("Book Deleted Successfully.");';
                    // 	echo '</script>';
				// } else {
				// 	// Invalid 'bid' value
				// 	echo '<script type="text/javascript">';
                    // 	echo 'alert("Invalid Book ID.");';
                    // 	echo '</script>';
				// }
				mysqli_query($db,"DELETE from books where bid ='$_POST[bid]';");
				?>
    <script type="text/javascript">
        alert("Book Deleted Successfully.");
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
    <?php  
		include "../footer.php";
	?>
</body>

</html>