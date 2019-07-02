<?php
	header('Content-Type:text/html; charset=utf-8;');
	include_once("connect.php");
	// addslashes() 函数在指定的预定义字符前添加反斜杠。
	// 这些字符是单引号（'）、双引号（"）、反斜线（\）与NUL（NULL字符）。	
    $userName = addslashes($_POST['userName']);
    $password = addslashes($_POST['password']);
	// bool isset( mixed var [, mixed var [, ...]] )
	// 若变量不存在则返回FALSE;若变量存在且其值为NULL，也返回FALSE;若变量存在且值不为NULL，则返回TURE
	// 注意:空只不是NULL值
	if(($userName <>"") &&($password<>"")){
		$registerSQL = "insert into user(uname,upassword) values('$userName','$password');";
		mysqli_query($conn, $registerSQL);	
		echo "<script language=\"javascript\"> alert(\"注册成功！\");</script>";
		echo "<script language=\"javascript\">location.href='register-login.php';</script>";
	}
?>