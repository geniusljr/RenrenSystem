<?php
	$con = mysql_connect("localhost:3306", "root", "123456");
	if(!$con){
		echo "数据库连接错误";
		return;
	}
	mysql_select_db("renrenbase", $con);

	//set the charset of mysql to support Chinese
	mysql_query("set names 'utf8'");
?>