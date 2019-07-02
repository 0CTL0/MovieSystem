	<div id="myCarousel" class="carousel slide">
	<!-- 轮播（Carousel）指标 -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<!-- 轮播（Carousel）项目 -->
	<?php include('connect.php') ?>
	<?php 
		$sql="select mimgurl,mid from movie where mtype like '%剧情%' limit 3;";
					$res = $conn->query($sql);
					// 将返回的数据转换成数组.
					for($i=0;$row = $res->fetch_row();$i++){
					//依次调用 mysql_fetch_row() 将返回结果集中的下一行，如果没有更多行则返回 FALSE。
						$result1[$i]=$row[0];
						$result2[$i]=$row[1];						
					}
					//类名用空格隔开,表示有多个类名.
					print <<<EOF
							<div class="carousel-inner">
							
								<div class="item active">
									<img src="$result1[0]" onclick="cctz($result2[0])" alt="First slide">
								</div>
								<div class="item">
									<img src="$result1[1]" onclick="cctz($result2[1])" alt="Second slide">
								</div>
								<div class="item">
									<img src="$result1[2]" onclick="cctz($result2[2])" alt="Third slide">
								</div>
							</div>
EOF;
					
	?>
	
	<!-- 轮播（Carousel）导航 -->
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>