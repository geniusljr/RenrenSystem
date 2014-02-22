<?php
	session_start();
	if(!isset($_SESSION['uid'])) {
		echo "请先登录";
		exit();
	}
	$uid = $_SESSION['uid'];
	include("../DBConnect.php");
	$res = array();
	$sql = "SELECT * from user_info where uid='$uid'";
	$result = mysql_query($sql);

	if(mysql_num_rows($result) != 0) {
		while($row = mysql_fetch_array($result)){
				$temp = array('nickname'=>$row[4], 'school'=>$row[5]);
				$res[] = $temp;
				break;
			}
	}
	include("printXML.php");
	echo printXML($res, "Userinfo");
?>