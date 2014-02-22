<?php
	function getLocalIP()
	{
		$preg="/\A((([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\.){3}(([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\Z/";//获取操作系统为win2000/xp、win7的本机IP真实地址
		exec("ipconfig", $out, $stats);
		if(!empty($out))
		{
			foreach($out AS $row)
			{
				if(strstr($row,"IP") && strstr($row,":") && !strstr($row,"IPv6"))
				{
					$tmpIp = explode(":", $row);
					if(preg_match($preg,trim($tmpIp[1])))
					{
						return trim($tmpIp[1]);
					}
				}
			}
		}
	}
	
	function getCountryCityByIp() {
		$theIP = getLocalIP();
		include_once("HttpClient.class.php");
		$url = "http://www.webxml.com.cn/WebServices/IpAddressSearchWebService.asmx/getCountryCityByIp?theIpAddress=".$theIP;
		$pagecontent = HttpClient::quickGet($url);
		$dom = new DOMDocument();
		$dom->loadXML($pagecontent);
		$addressinfo = $dom->getElementsByTagName("ArrayOfString")->item(0);
		$res = $addressinfo->getElementsByTagName("string")->item(1)->nodeValue;
		return $res;
	}
	
	echo getCountryCityByIp();
?>