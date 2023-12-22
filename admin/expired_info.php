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
            min-height: 444px;
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

        .container {
            height: 700px;
            background-color: black;
            opacity: .7;
            color: white;
        }
        .header-container {
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding: 10px;
    align-items: center;
    margin-top: -5px;
}
.header {
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

    <div id="main">



        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "300px";
                document.getElementById("main").style.marginLeft = "300px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
                document.body.style.backgroundColor = "white";
            }
        </script>

        <br><br>
        <div class="header"> 
                   <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776; open</span>

 <div style="float: left; padding: ;">
            <form method="post" action="">
                <button name="submit2" type="submit" class="btn btn-default"
                    style="background-color: #06861a; color: yellow;">RETURNED</button>
                &nbsp&nbsp
                <button name="submit3" type="submit" class="btn btn-default"
                    style="background-color: red; color: yellow;">EXPIRED</button>
            </form>
        </div>
        </div>
        <?php
      if(isset($_SESSION['login_user']))
      {
        ?>

       

        <div class="header-container">
        <h2 style="margin-top:0px;margin-bottom:0px;">Book Overdue</h2>
        <div class="srch" id="srch">
            <form method="post" action="" name="form1">
                <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
                <input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
                <button class="btn btn-default" name="submit" type="submit">Submit</button><br><br>
            </form>
        </div>    
    </div>
        <?php

        if(isset($_POST['submit']))
        {

          $res=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_POST[username]' and bid='$_POST[bid]' ;");
      
      while($row=mysqli_fetch_assoc($res))
      {
        $d= strtotime($row['return']);
        $c= strtotime(date("Y-m-d"));
        $diff= $c-$d;

        if($diff>=0)
        {
          $day= floor($diff/(60*60*24)); 
          $fine= $day*1;
        }
      }
          $x= date("Y-m-d"); 
          mysqli_query($db,"INSERT INTO `fine` VALUES ('$_POST[username]', '$_POST[bid]', '$x', '$day', '$fine','not paid') ;");


        //   $var1='<p style="color:yellow; background-color:green;">RETURNED</p>';
          mysqli_query($db,"UPDATE issue_book SET approve='RETURNED' where username='$_POST[username]' and bid='$_POST[bid]' ");

          mysqli_query($db,"UPDATE books SET quantity = quantity+1 where bid='$_POST[bid]' ");
          
        }
      }
    
         $c=0;
        //  $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
        //  $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
        
        if(isset($_POST['submit2']))
        {
          
        $sql="SELECT student.username,first,last,books.bid,name,authors,edition,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='RETURNED' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);

        }
        else if(isset($_POST['submit3']))
        {
        $sql="SELECT student.username,first,last,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='EXPIRED' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }
        else
        {
        $sql="SELECT student.username,first,last,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }

        echo "<table class='table table-bordered' style='width:100%;' >";
        //Table header
        
        echo "<tr style='background-color: #6db6b9e6;'>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "First Name";	echo "</th>";
		echo "<th>"; echo "Last Name";	echo "</th>";
        echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Status";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";

      echo "</tr>"; 
    //   echo "</table>";

    //    echo "<div class='scroll'>";
        // echo "<table class='table table-bordered' >";
      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
		  echo "<td>"; echo $row['first']; echo "</td>";
		  echo "<td>"; echo $row['last']; echo "</td>";     
	      echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['approve']; echo "</td>";
          echo "<td>"; echo $row['issue']; echo "</td>";
          echo "<td>"; echo $row['return']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
        // echo "</div>";

    ?>
    </div>
    </div>
    <?php  
		include "../footer.php";
	?>
</body>

</html>