<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>小片屋</title>
		<link rel="stylesheet" href="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="index.css" rel="stylesheet" type="text/css"/>

	</head>
		

	<body>
		
		<div id="nav">
			<?php include("nav.php") ?>
		</div>
		
		<div id="container">
			<?php include('carousel.php') ?>	
		</div>
		<div id="videoType">			
			<?php include('videoList.php') ?>				
		</div>

		<div id="footer">
			<img src="images/smallMovie.jpg"  alt="">
			<ul class="about">
				<li><a href="#">关于我们</a></li>
				<li><a href="#">版权声明</a></li>
				<li><a href="#">帮助与反馈</a></li>
				<li><a href="#">友情链接</a></li>
				<li><a href="#">广告招商</a></li>
				<li><a href="#">网站地图</a></li>
			</ul>
			<div class="clear"></div>
			<!-- <nav>
				<a href="#">关于我们</a>
				<a href="#">版权声明</a>
				<a href="#">帮助与反馈</a>
				<a href="#">友情链接</a>
				<a href="#">广告招商</a>
			</nav>
			我的火狐不能显示nav标签，不支持? -->
		</div>
		
	</body>
</html>
