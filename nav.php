
<div class="nav-first">
			<div class="nav-img">
				<img src="images/smallMovie.jpg" alt="">
			</div>
			<div class="search">
				<form action="search.php">
					<input type="text" name="moviename" method="get" class="input1">
					<!-- 表单提交后，表单元素的name属性和元素值会自动拼接到URL？？？ -->
					<!-- <img src="images/search.png" alt="" > -->
					<input type="submit" value="搜索" class="input2" >
				</form>
			</div>
			<div class="info">
				<div class="vip">
					<a href="#"><img src="images/vip.jpg" alt=""><br>开通会员</a>						
				</div>
				<div class="login">
					<?php 
						session_start(); 
						if (isset($_SESSION['userName'])) {										
							echo"<a href=\"register-login.php\"><img src=\"images/head.jpg\" alt=\"\"><br>"."欢迎 ".$_SESSION['userName']."</a>";
							//内置关联数组不能直接写在字符串里面,报错？
						}
						else{
							
							echo "<a href=\"register-login.php\"><img src=\"images/head.jpg\" alt=\"\"><br>登录注册</a>";
						}
					?>
									
				</div>
			</div>
			<div class="clear"></div>		
			</div>
			<!-- 找到正确设置div来清楚浮动了，包含清楚浮动的div中的所有div都是设置浮动属性！ -->
			<div class="nav-second">
				<div class="nav-list">
				<ul>
					<li><a href="index.php">首页</a></li>
					<li><a href="category.php?动作">动作片</a></li>
					<li><a href="category.php?爱情">爱情片</a></li>
					<li><a href="category.php?喜剧">喜剧片</a></li>
					<li><a href="category.php?恐怖">恐怖片</a></li>
					<li><a href="category.php?剧情">剧情片</a></li>
					<li><a href="category.php?科幻">科幻片</a></li>					
					<li><a href="category.php?战争">战争片</a></li>
					<li><a href="category.php?伦理">伦理片</a></li>
					<li><a href="category.php?记录">记录片</a></li>
				</ul>
				</div>
				<div class="clear"></div>
				
			</div>