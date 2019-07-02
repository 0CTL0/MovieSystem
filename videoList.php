		<!-- <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
		</script>		
		<script>		
			// 百度方法1:页面之间传值之url传值-实现点击携参跳转到详情页
			//百度方法2:一句话总结：传参数去后台，用ajax，或者原生js方式拼接url。			
		$(document).ready(function(){			
			//获取选中的文本值,movieName是类名，有很多个，url不对........我的思路是错的
			//有每部电影也赋予id? 那要如何获取id号？ 直接写到电影列表页!
			var movieName=$("#movieName option:selected").text();
			var url = "single.php?index="+movieName; 			
			$(".movieUnit").click(function(){				
				window.location.href = url;
				alert("JQ有效");
				//Jquery获取元素文本值			
			});
		});
		</script> -->
	<!-- get：PHP中的JS代码，会被自动放到header标签内！！！ -->
	<script>
		function cctz(movieId) {
			var url = "single.php?"+movieId;
			window.location.href = url;
		}		
	</script>
	<!-- 搞定，几行代码弄了半天。。。。。携参跳转！！！ -->


		<div class="movie">
		<div class='list-top'>
		<div class="list-top-left">
		<img class="list-ico" src="images/list-ico.jpg" alt="ico">
		<h3 class="movieTitle" >动作片推荐</h3>
		<div class="clear"></div>
		</div>
		<div class="list-top-right">
			<a href="category.php?动作">更多影片>>></a>
		</div>
		<div class="clear"></div>
		</div>
			<?php include('connect.php') ?>
			<?php		
			$sql="select mid,mname,mimgurl from movie where mtype like '%动作%' limit 4;";
			$result = $conn->query($sql);
			//query函数返回的是一个类
			//num_rows 是原生mysql中的mysql_num_rows() 函数,用来返回结果集中行的数目.这里被封装成类。
			//mysql_fetch_row() 函数从结果集中取得一行作为数字数组,偏移量从0开始.依次调用将返回下一行,没有更多行返回FALSE.
			if ($row = $result->num_rows > 0) {
			while($row = $result->fetch_row()){
			print <<<EOF
			<div class="movieUnit" onclick="cctz($row[0])">
			<img class="movieImg" src="$row[2]">
			<p class="movieName">$row[1]</p>
			</div>			
EOF;
				}
			}
			else{
				echo"0结果";
			}
?>
			<div>
			<div class="clear"></div>
			</div>
</div>


			<div class="movie">
			<div class="list-top-left">
			<img class="list-ico" src="images/list-ico.jpg" alt="ico">
			<h3 class="movieTitle">爱情片推荐</h3>
			<div class="clear"></div>
			</div>
			<div class="list-top-right">
				<a href="category.php?爱情" >更多影片>>></a>
			</div>
			<div class="clear"></div>
			</div>
			<?php include('connect.php') ?>
			<?php		
			$sql="select mid,mname,mimgurl from movie where mtype like '%爱情%' limit 4;";
			$result = $conn->query($sql);
			if ($row = $result->num_rows > 0) {
			while($row = $result->fetch_row()){
			print <<<EOF
			<div class="movieUnit" onclick="cctz($row[0])">
			<img class="movieImg" src="$row[2]">
			<p class="movieName">$row[1]</p>
			</div>
			
EOF;
				}
			}
			else{
				echo"0结果";
			}
?>
			<div>
			<div class="clear"></div>
			</div>
</div>


		<div class="movie">
		<div class="list-top-left">
		<img class="list-ico" src="images/list-ico.jpg" alt="ico">
		<h3 class="movieTitle">喜剧片推荐</h3>
		<div class="clear"></div>
		</div>
		<div class="list-top-right">
			<a href="category.php?喜剧" id="xiju">更多影片>>></a>
		</div>
		<div class="clear"></div>
		</div>
			<?php include('connect.php') ?>
			<?php		
			$sql="select mid,mname,mimgurl from movie where mtype like '%喜剧%' limit 4;";
			$result = $conn->query($sql);
			if ($row = $result->num_rows > 0) {
			while($row = $result->fetch_row()){
			print <<<EOF
			<div class="movieUnit" onclick="cctz($row[0])">
			<img class="movieImg" src="$row[2]">
			<p class="movieName">$row[1]</p>
			</div>
			
EOF;
				}
			}
			else{
				echo"0结果";
			}
?>
			<div>
			<div class="clear"></div>
			</div>
</div>

