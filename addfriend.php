<?php
include("header.php");
include("DBConnect.php");
$sql = "insert into user_relation values($uid, $friendid);";
$result = mysql_query($sql);
if(!$result) {
	echo "添加失败:".mysql_error();
	return;
}
$sql = "insert into user_relation values($friendid, $uid);";
$result = mysql_query($sql);
if(!$result) {
	echo "添加失败:".mysql_error();
	return;
}
echo "添加成功";
//disconnect to mysql
mysql_close($con);
?>