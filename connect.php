<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname="movie2";
				$conn = new mysqli($servername, $username, $password,$dbname);
				mysqli_query($conn,"set character set 'utf8'");
				mysqli_query($conn,"set names 'utf8'");
//BUG:Fatal error: Call to a member function fetch_array() on a non-object————设置编码后就解决了。
				if ($conn->connect_error) {
	    		die("连接失败: " . $conn->connect_error);
				}
//找到原因了，下面这条SQL语句在数据库中执行没问题，放到这里就查询不了数据？中文编码？
/*常见EasyEclipse for PHP乱码解决吧。大家一般都喜欢有utf-8编码，但是EasyEclipse for PHP默认不是utf-8.
需要修改3处设置问题。 第一在菜单选择 窗口->首选项->常规->工作区。截图如下 修改文本编码为utf-8，新的文本运行定界符为windows。
接下来修改 窗口->首选项->常规->工作区->内容类型-到右边选择文本php source file 缺省编码设置为utf-8
PHPBrowser显示的中文为乱码 在浏览器去点击右键 选择编码为utf-8 现在问题解决了，再也不会乱码了！*/
//草，真的是字符编码问题。当出现BUG，不要想着写的没错，肯定有地方错，不是语法逻辑错，就是IDE错，第一时间是不断测试，猜测，找到原因了真爽
//这个编辑器难用，经常性出现中文乱码问题,换其他

?>