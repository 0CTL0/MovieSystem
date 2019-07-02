<link href="index.css" rel="stylesheet" type="text/css"/>
<style>
	.clear{
		clear:both;
	}
	* {
		font-family: sans-serif;
		/* margin:0;
		padding:0; 原始的边距填充还挺好看。。。。*/
	}
	.num{
		margin-left:20px;
		border-bottom:dashed 1px gray;
	}
	.movieUnit2{
		margin-left:20px;
		float:left;
		
	}
	.movieUnit2 h3{
		text-align:center;
		color: #4682B4;
	}
	.movieUnit2 img{
		width:120px;
		height:160px;
	}
	.movieInfo{
		float:left;
		margin-left:30px;
		width:600px;
		padding-top:50px;
	}
	.movieInfo p{
		font-size:14px;
	}
</style>
<script>
		function cctz(movieId) {
			var url = "single.php?"+movieId;
			window.location.href = url;
		}		
	</script>
<?php include("nav.php") ?>
<?php
$host="localhost";
$username="root";
$password="";
$db="movie2";
$tb="movie";
	//忘记分号,导致下面的语句出错,找半天.....编译器报的啥鬼
header('Content-Type:text/html; charset=utf-8;');
$keywords = $_GET["moviename"]; 
$con = new mysqli($host, $username, $password, $db);
  if (!$con) { die('连接数据库失败，失败原因：' . mysql_error()); } 
  mysqli_query($con,"set character set 'utf8'");
  mysqli_query($con,"set names 'utf8'");
  $keyword = trim($keywords); 
  if (empty($keyword)) {  	   
  	   echo "请输入关键词";
  		}
	else{   
  		$sql="SELECT mid,mname,mimgurl,mstar,msumary FROM $tb WHERE mname like '%$keyword%' ORDER BY mid DESC";
  		$result = $con->query($sql);
  			if ($line=$result->num_rows > 0) { 
				// echo '<p class="num">从数据库中查到$line相关记录</p>';
				print<<<EOF
				<div  class="num">
				<p>从数据库中查到 $line 条相关记录</p>
				</div>			
EOF;
				//注意:输出语句中,不能有双引号包括双引号,会报错.
				// 但单引号括起来的变量不会被解析,所以同时解析变量和输出带类名的标签只能用print
  				while($row = $result->fetch_row()) {
  					print<<<EOF
					<div class="movieRow" >
						<div class="movieUnit2" onclick="cctz($row[0])">
						<h3>$row[1]</h3>
						<img src="$row[2]" alt="">
						</div>
						<div class="movieInfo">
						<p>主演:$row[3]</p>
						<p>简介：$row[4]</p>
						</div>
						<div class="clear"></div>
					</div>
EOF;
	// 忘记加分号,又找半天,报错贼不准,只能知道大概位置错了
				}
			}		
			else{ 
				echo'<div  class="num"><p>没有找到相关记录</p></div>';
				}
	}
?>