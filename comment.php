<?php
include("header.php");
include("DBConnect.php");
$time = date('Y-m-d H:i:s');
$sql = "insert into text_base(content, author, time, type) 
					values ('$content', $uid, '$time', 1)";
$result = mysql_query($sql);
if(!$result) echo "评论失败:".mysql_error();

$sql = "SELECT LAST_INSERT_ID()";
$result = mysql_query($sql);
if(!$result) echo "评论失败:".mysql_error();

$rs = mysql_fetch_array($result);
$last_tid = $rs[0];

$sql = "insert into comment(TID, owner_text, owner) 
					values ($last_tid, '$owner_text', '$owner')";
$result = mysql_query($sql);
if(!$result) echo "评论失败:".mysql_error();

$sql = "insert into reminder(tid, uid) 
					values ($last_tid, '$owner')";
$result = mysql_query($sql);
if(!$result) echo "评论失败:".mysql_error();

else {
	//disconnect to mysql
	mysql_close($con);
	echo "success";
}
?>