<?php

echo "<div id='header'>";
include("Service/getweather.php");
echo "	<ul>
			<li id='lihead'><a href='mainpage.php'>首页</a></li>
			<li><a href='reminder.php'>消息提醒</a></li>
			<li><a href='viewpeople.php?pid=$uid'>我的主页</a></li>
			<li><a href='viewfriends.php'>我的好友</a></li>
			<li><a href='modifyinfo.php'>修改我的信息</a></li>
			<li id='litail'><a onclick='logout()' style='cursor:pointer;'>注销</a></li>
		</ul>
	  </div>";
?>