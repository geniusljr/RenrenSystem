<?php
	function publishNewsfeed($uid, $newsfeed) {
		include("../DBConnect.php");
		$time = date('Y-m-d H:i:s');
		$sql = "insert into text_base(content, author, time, type) values ('".$newsfeed."', ".$uid.", '$time', 0)";
		$result = mysql_query($sql);

		if(!$result) $res = "Failure:"."<br/>".$sql."<br/>".mysql_error();
		else $res = "Success";
		
		mysql_close($con);
		return $res;
	}

	session_start();
	if (!isset($_SESSION['renrenNewsfeed']))
	{
		$_SESSION['renrenNewsfeed'] = $_POST["cur_uri"];
	}
	if(!isset($_SESSION['uid'])) {
		header("Location: renrenShareForm.php");
	}
	else {
		$uid = $_SESSION['uid'];
		$newsfeed = $_SESSION['renrenNewsfeed'];
		echo publishNewsfeed($uid, $newsfeed);
	}
?>