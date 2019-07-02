<?php
	 include_once("connect.php");
	 $userName = addslashes($_POST['userName']);
	 $password = addslashes($_POST['password']);
	 $loginSQL = "SELECT uname,upassword FROM user WHERE uname='$userName' AND upassword='$password'";
	 
	$resultLogin = mysqli_query($conn, $loginSQL);
	    if (mysqli_num_rows($resultLogin) > 0) {
        session_start();
        $_SESSION['userName'] = $userName;
        header("Location: index.php"); 
        exit;
    } else {
        echo "<script language=\"javascript\"> alert(\"登录失败！\");</script>";
        header("Location: register-login.php"); 
        exit;
    }
    mysqli_close($conn);
?>