
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="single.css">
		
		<!--引入videoJS插件样式、videoJS插件文件-->
		<link href="./video-js.min.css" rel="stylesheet">
		<script src="./video.min.js"></script>
		<!--引入videoJS插件播放m3u8格式视频的HLS功能-->
		<script src="./videojs-contrib-hls.js"></script>
		<script>    
    	// videojs 简单使用
	    var myVideo = videojs('myVideo',{
	        bigPlayButton : true, 
	        textTrackDisplay : false, 
	        posterImage: false,
	        errorDisplay : false,
	    })
	    myVideo.play() // 视频播放
	    myVideo.pause() // 视频暂停
		</script>

		
	</head>
	<body>
		<div class="index">
			<a href="index.php"><img src="images/smallMovie.jpg" alt=""></a>
		</div>
		
		<?php include("connect.php") ?>
		<?php 
			//百度方法:一句话总结：传参数去后台，用ajax，或者原生js方式拼接url。
			//跳转页面a标签和window.location.href,打开一个新页面window.location.open
			
			$movieId=$_SERVER["QUERY_STRING"]; //获取网址参数 。超级全局变量$_SERVER是保存URL信息等信息的数组.
			$sql="select * from movie where mid =$movieId;";
			$result = $conn->query($sql);
			if ($row = $result->num_rows > 0) {
			while($row = $result->fetch_row()){
			print <<<EOF
			<div class="movie-name">
				<h2>$row[1]</h2>
			</div>
			<div class="info">
				<div class="info-img">
					<img src="$row[2]" alt="">
				</div>
				<div class="info-list">
					<p>导演：$row[4]</p>
					<p>主演：$row[5]</p>
					<p>类型：$row[6]</p>
					<p>制片国家/地区：$row[7]</p>
					<p>语言：$row[8]</p>
					<p>评分：$row[3]</p>
				</div>
			</div>
			
			<div class="intro">
				<p class="title">剧情简介</p>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$row[9]</p>
			</div>
			<div class="play">在线播放</div>
			<div class="view">		
			
			<video id="myVideo" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="1080" height="708" data-setup='{}'>    
				<source id="source" src="$row[10]"  type="application/x-mpegURL">
			</video>

			
			<!--
			<iframe src="$row[10]" width="600" height="500"></iframe>
			视频例子：https://135zyv6.xw0371.com/2019/03/01/f1y4lKvfY1xEgJK2/playlist.m3u8
			-->
			</div>			
EOF;
			}
			}
			
			else{
				echo"0结果";
			}	
			
			print <<<EOF
			<div class="comment">
				<!-- 边设计边敲代码的做法，导致之后很多功能的实现要改一大堆 -->
				<div class="comment-title">影片评论</div>
				<form action="comment.php?$movieId" method="post">
					<textarea rows="" cols="" name="comment-content"></textarea>
					<input type="submit" value="发表影评">				
				</form>
				</div>
EOF;

			$sqlComment="select * from comment where mid =$movieId;";
			$result = $conn->query($sqlComment);
			if ($row = $result->num_rows > 0) {
			while($row = $result->fetch_row()){
			print <<<EOF
			<div class="conmentUnit">
				<div class="userTop">
					<div class="userImg">
					<img src="images/head.jpg" alt="">
					</div>
					<div class="userName">
					<p>$row[1]</p>
					</div>					
					<div class="clear"></div>
				</div>
				<div class="content">					
					<p>$row[2]</p>
				</div>
				<div class="clear"></div>
			</div>
EOF;
			}
			}	
?>
	</body>
</html>
