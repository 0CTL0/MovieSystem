<!-- 具体来说cookie机制采用的是在客户端保持状态的方案，而session机制采用的是在服务器端保持状态的方案。 -->
<!-- 将登陆信息等重要信息存放为SESSION；其他信息如果需要保留，可以放在COOKIE中 -->
<!-- Session 的工作机制是：为每个访客创建一个唯一的 id (UID)，并基于这个 UID 来存储变量。UID 存储在 cookie 中，或者通过 URL 进行传导。 -->
<!-- cookie、session都是关联数组？？？在每个页面都通用 -->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>小片屋-登录/注册</title>
		
		<style>
			/* 为了兼容-moz代表火狐浏览器的私有属性，-ms代表ie浏览器的私有属性，-webkit代表safari、chrome私有属性
		有些CSS属性尚未被W3C标准化，前缀为了让在特定浏览器渲染引擎下生效 */
			:-moz-placeholder {
				font-size: 16px;
				opacity: 1;
			}

			/* placeholder是input的属性，加入提示字，可以为它设置样式 */
			body {
				background-color:white;
				margin: 0px;
				padding: 0px;
				font-family: sans-serif;
				/* body的margin padding属性不能被所有元素继承？？？ */
			}

			.clear {
				clear: both;
			}
			.index{
				padding-top:20px;
				padding-left:200px;
				background-color:white;
			}
			.register-login-box {
				border: solid 1px black;
				background-color: white;
				width: 400px;
				margin-top: 5%;
				margin-left: auto;
				margin-right: auto;
			}

			.nav {
				border-bottom: solid 1px lightgrey;
				width: 300px;
				margin: 20px;
				padding-bottom: 10px;

			}

			.nav ul {
				list-style-type: none;
				margin: 0;

			}

			/* 设置的宽度高度包含填充？不包括，仅是设置内容的宽和高，但设置的填充过大会撑爆DIV */
			/* 总长度=内容长度+填充+边框+边距 */
			.nav ul li {
				float: left;
				font-size: 28px;

			}

			.login {

				font-weight: bold;
				font-family: sans-serif;
				padding-top: 10px;
			}

			.register {
				margin-left: 50px;
				font-weight: bold;
				font-family: sans-serif;
				padding-top: 10px;
			}

			.form-login,
			.form-register {
				
			}

			.form-login input,
			.form-register input {
				width: 300px;
				height: 40px;
				margin-top: 20px;
				margin-left:40px;
			}

			.sub,
			.reg {
				background-color: #6495ED;
				margin-bottom: 20px;
				border-radius: 6px;
				font-size: 18px;
			}
		</style>
		<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
		</script>
		<script>
			// 额,JS代码不起效果,原来卡住了....
		$(document).ready(function(){
			$(".form-register").hide();
			$(".login").addClass("blue");
			$(".login").click(function(){
				$(".form-register").hide();
				$(".form-login").show();				
				$(".register").removeClass("blue");
				$(".login").addClass("blue");
				// document.getElementByClass("login").innerHTML="新文本!";JS代码写在Jquery里面不起效果
				});
			$(".register").click(function(){
				$(".form-login").hide();
				$(".form-register").show();
				$(".register").addClass("blue");
				$(".login").removeClass("blue");
				});
			});
		</script>
		<style type="text/css">
			.blue {
				color: steelblue;
			}
		</style>

	</head>

	<body>
		<div class="index">
			<a href="index.php"><img src="images/smallMovie.jpg" alt=""></a>
		</div>
		
		<div class="register-login-box">			
			<div class="nav">
				<ul>
					<li class="login">登录</li>
					<li class='register'>注册账号</li>
				</ul>
				<div class="clear"></div>
			</div>

			<div class="form-login">
				<form action="logRequst.php" method="post">
					<!-- input的text属性决定是文本框、按钮、复选框的形状 -->
					<input type="text" name="userName" placeholder="邮箱/手机号/用户名"><br>
					<input type="text" name="password" placeholder="请输入密码"><br>
					<input type="submit" value="登录" class="sub">
				</form>
			</div>
			<div class="form-register">
				<form action="regRequst.php" method="post">
					<!-- input的text属性决定是文本框、按钮、复选框的形状 -->
					<input type="text" name="userName" placeholder="请输入邮箱或手机号或用户名"><br>
					<input type="text" name="password" placeholder="4~16个字符,包含字母数字符号两种组合"><br>
					<input type="text" name="password2" placeholder="请确认密码"><br>
					<input type="submit" value="注册" class="reg">
				</form>
			</div>
		</div>

	</body>
</html>
