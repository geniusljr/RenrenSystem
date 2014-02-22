<?php
	function getWeatherbyCityName($theCityName) {
		include_once("HttpClient.class.php");
		$url = "http://www.webxml.com.cn/webservices/weatherwebservice.asmx/getWeatherbyCityName?theCityName=".$theCityName;
		error_reporting(E_ALL & ~E_STRICT);
		$pagecontent = HttpClient::quickGet($url);
		$dom = new DOMDocument();
		$dom->loadXML($pagecontent);
		$weatherinfo = $dom->getElementsByTagName("ArrayOfString")->item(0);
		$cityName = $weatherinfo->getElementsByTagName("string")->item(1)->nodeValue;
		$temperature = $weatherinfo->getElementsByTagName("string")->item(5)->nodeValue;
		$weatherPic1 = $weatherinfo->getElementsByTagName("string")->item(8)->nodeValue;
		$weatherPic2 = $weatherinfo->getElementsByTagName("string")->item(9)->nodeValue;
		$res = array('cityName'=>$cityName, 'temperature'=>$temperature, 'weatherPic1'=>$weatherPic1, 'weatherPic2'=>$weatherPic2);
		return $res;
	}
	
	//include_once("getaddress.php");
	//$weatherinfo = getWeatherbyCityName(getCountryCityByIp());
	$weatherinfo = getWeatherbyCityName('北京');
	echo "<table style='margin: 20px 0px 20px 10px;width:100%; font-size: 18px;'><tr><td>";
	echo $weatherinfo['cityName']."</td>";
	echo "<td rowspan='2'><img src='image/weather/b_".$weatherinfo['weatherPic1']."' /></td>";
	if($weatherinfo['weatherPic1'] != $weatherinfo['weatherPic2'])
		echo "<td rowspan='2'><img src='image/weather/b_".$weatherinfo['weatherPic2']."' /></td>";
	echo "</tr>";
	echo "<tr><td>".$weatherinfo['temperature']."</td></tr></table>";
?>