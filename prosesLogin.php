<?php

include('config/config.php');
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $link = "SELECT * FROM user WHERE username='$username' && password='$password'";
    $query = mysqli_query($conn, $link);
    if ( mysqli_num_rows($query) >0 ) {
        $_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
        header('location:public/index.php');
    } else {
        header('location:index.php?pesan=gagal');
    }

}
