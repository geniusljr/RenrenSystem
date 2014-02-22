<?php
	session_start();
	if (isset($_SESSION["uid"]))
	{
		echo "您已登录，正在跳转...";
		header("Location: ".$_POST['redirectPage']);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>登录</title>
	<link rel="stylesheet" href="../css/general.css" />
	<script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="../js/general.js"></script>
	<script type="text/javascript">
	function redirect() {
		var redirectPage = $("input[name='redirectPage']").val();
		location.href = redirectPage;
	}
	function checkemail() {
		var reg = /.+@.+\.[a-zA-Z]{2,4}$/;
		if($("input[name='email']").val() == "") {
			$("#email").html("邮箱不能为空").show();
			return false;
		} else if (!reg.test($("input[name='email']").val())) {
			$("#email").html("非法的邮箱格式").show();
			return false;
		} else $("#email").html("").show();
		return true;
	}
	function checkpassword() {
		if($("input[name='password']").val()=="") {
			$("#password").html("密码不能为空").show();
			return false;
		} else $("#password").html("").show();
		return true;
	}
	$(function() {
		$(document).ready(function(){
			$("input[name='email']").bind({blur:checkemail, focus:checkemail});
			$("input[name='password']").bind({blur:checkpassword, focus:checkpassword});
		});
		$("#login_submit").click(function() {
			//check email
			if(!checkemail()) return false;
			//check password
			if(!checkpassword()) return false;
			//login
			$("#login_submit").val("请稍候..");
			$("#login_submit").attr("disabled", true);
			$.get("../login.php", { 
				email:$("input[name='email']").val(),
				password:$("input[name='password']").val()
			}, function (data) {
				if (data == "true") {
					$("#email").html("登录成功，跳转中...").fadeIn("slow,1000").delay(1000).fadeOut("slow,1000");
					setTimeout("redirect()", 1000);
				} else {
					$("#login_submit").attr("disabled", false);
					$("#login_submit").val("登录");
					$("#email").html(data).fadeIn("slow,1000").delay(1000).fadeOut("slow,1000");
				}
			});
			return false;
		});
	});
	</script>
</head>
<body>
<div id="pagebody">
	<div id="login">
	<h1 style="margin-left:113px">登录</h1>
	<form action="login.php" method="post">
		<table>
		<tr><td>
			<div class="input-text">
				邮箱 <input type="text" name="email"/>
			</div></td>
			<td id="email"></td>
		</tr>
		<tr><td>
			<div class="input-text">
				密码 <input type="password" name="password"/>
			</div></td>
			<td id="password"></td>
		</tr>
		<tr>
			<td style="text-align:center;">
				<input type="submit" value="登录" class="input-button" id="login_submit"/>
				<input type="hidden" value=<?php echo $_POST["redirectPage"];?> name="redirectPage" />
			</td>
			<td></td>
		</tr>
		<table>
		
	</form>
	</div>
</div>
</body>
</html>