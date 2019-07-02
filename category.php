<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link href="index.css" rel="stylesheet" type="text/css"/>
		<style>
			body{			
				margin-left:5%;
				margin-right:5%;
			}
			.clear{
				clear:both;
			}
			.main{
				float:left;
				width:75%;
				
			}
			.title{
				margin-left:0px;
				margin-top:15px;
				margin-bottom:10px;
			}
			.new{
				float:left;				
				width:70px;
				height: 28px;
				background-color:lightgrey;
				margin-left:40px;
			}
			.new a,.hot a{
				color:dimgrey;
				/* margin:auto;
				text-align: center;不起效果？ */
				
				font-size:18px;
				margin-left:16px;
				text-decoration: none;
			}
			.hot{
				float:left;
				margin-left:30px;
				width:70px;
				height: 28px;
				background-color:lightgrey;
			}
			
			.movieUnit{
				margin-bottom:10px;
			}
			.movieUnit img{
				float:left;
				width:150px;
				height:200px;
			}
			.movieUnit p{
				text-align: center;
			}
			
			.rank{
				float:left;
				margin-left:40px;
				width: 20%;
				margin-top:10px;
				
				background-color:whitesmoke;
			}
			.rank-title{
				color:royalblue;
				font-size:24px;
			}
			.rank-list a{
				color:black;
				
			}
			a:hover {color:#FF0066;}  /* 鼠标移动到链接上 */
			.num{
				float:left;
				font-style:italic;
				font-size:14px;
			}
			.moviename{
				float:left;
				margin-left:15px;
				font-size:14px;
			}
			.moviescore{
				float:right;
				margin-right:5px;
				font-size:14px;
			}
			}
		</style>
		<script>
			function cctz(movieId) {
				var url = "single.php?"+movieId;
				window.location.href = url;
			}		
		</script>
	</head>
	
	
	
	<body>
		
		<?php include("nav.php") ?>
		
		
		<div class="nav"></div>
		<div class="wrap">
			<div class="main">
				<div class="title">
					<div class="new">
						<a href="#">最新</a>
						
					</div>
					<div class="hot">
						<a href="#">最热</a>
					</div>
					<div class="clear"></div>					
				</div>
				<?php include('connect.php') ?>
				<?php
							$movieType=$_SERVER["QUERY_STRING"]; //获取网址参数 。超级全局变量$_SERVER是保存URL信息等信息的数组.
							$movieType=urldecode($movieType);  //浏览器对中文参数编码为十六进制,需要解码.
							
							$sql="select mid,mimgurl,mname from movie where mtype like '%$movieType%' limit 15;";
							$result = $conn->query($sql);
							if ($row = $result->num_rows > 0) {
							while($row = $result->fetch_row()){
								if(strlen($row[2])>24){								
									$row[2]=mb_substr($row[2],0,8,'utf-8')."...";
								}
							print <<<EOF
								<div class="movieUnit" onclick="cctz($row[0])">
									<img src="$row[1]" alt="">
									<p>$row[2]</p>
								</div>
EOF;
							}
							}
							else{
								echo"0结果";
							}			
						?>			

			</div>
			
			<div class="rank">
				<div class="rank-title">排行榜</div>
				<div class="rank-list">
					<?php
					$movieType=$_SERVER["QUERY_STRING"];
					$movieType=urldecode($movieType);
					$sql="select mid,mname,mscore from movie where mtype like '%$movieType%' order by mscore desc limit 10;";
					$result = $conn->query($sql);
					if ($row = $result->num_rows > 0) {
					for($num=1;$row = $result->fetch_row();$num=$num+1){						
					print <<<EOF
					<a href="single.php?$row[0]">
					<p class="num">$num</p>
					<p class="moviename">$row[1]</p>
					<p class="moviescore">$row[2]</p>
					<div class="clear"></div>	
					</a>
EOF;
						
					}
					}
					?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class=""></div>
		
	</body>
</html>