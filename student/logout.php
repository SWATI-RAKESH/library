


<?php
session_start();

if (isset($_SESSION['login_user'])) {
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        // User confirmed logout
        unset($_SESSION['login_user']);
        header("location:../index.php");
    } else {
        // Ask for confirmation
        echo '<script>';
        echo 'var confirmed = confirm("Are you sure you want to log out?");';
        echo 'if (confirmed) {';
        echo '  window.location.href = "logout.php?confirm=yes";';
        echo '} else {';
        echo '  window.location.href = "../index.php";';
        echo '}';
        echo '</script>';
    }
} else {
    // User not logged in, redirect to index.php
    header("location:../index.php");
}
?>
