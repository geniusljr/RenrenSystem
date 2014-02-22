<?php
	session_start();
	if(!isset($_SESSION['uid'])) {
		echo "请先登录";
		exit();
	}
	$uid = $_SESSION['uid'];
	include("../DBConnect.php");
	$res = array();
	$sql = "SELECT * from text_base where author=$uid AND type=0";
	$result = mysql_query($sql);

	if(mysql_num_rows($result) != 0) {
		while($row = mysql_fetch_array($result)){
				$temp = array('TID'=>$row[0], 'content'=>$row[1], 'author'=>$row[2], 'time'=>$row[3]);
				$res[] = $temp;
			}
	}
	include("printXML.php");
	echo printXML($res, "Newsfeed");
?>