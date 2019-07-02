<?php 
	header("Content-Type: text/html; charset=utf-8");
	session_start(); 
	$movieId=$_SERVER["QUERY_STRING"];
	if (!isset($_SESSION['userName'])) {
	echo "<script language=\"javascript\"> alert(\"请登录后评论！\");</script>";
	header("Location:register-login.php");
	// 弹框功能不起效果？？？？因为调到另一个页面太快了,显示没看到!
// 		print<<<EOF
// 		<script type="text/javascript">
// 		var click=confirm("请登录后再评论！");
// 		if(r==true){
// 				//无法跳转的原因，这是Php文件路径，应该是请求，而不是跳转！！！难搞，算了
// 				window.location.href = 'register-login.php';
// 				 // 在原来的窗体中直接跳转用
// 		}
// 		else{			
// 			window.location.href = 'single.php?$movieId';
// 		}
// 		</script>
// EOF;
		
	}
	else{
		 include_once("connect.php");
		$username=$_SESSION['userName'];
		$conment = addslashes($_POST['comment-content']);
		$movieId=$_SERVER["QUERY_STRING"];
		$commentSQL = "insert into comment(username,ccomtent,mid) values('$username','$conment','$movieId');";
		mysqli_query($conn, $commentSQL);
		header("Location:single.php?$movieId"); 	
	}
?>