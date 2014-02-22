<?php
	function printXML($array, $name) {
		header('Content-Type: text/xml;');
		$dom = new DOMDocument('1.0', 'utf-8');

		$names = "".$name."s";
		$root = $dom->createElement($names); 
		$dom->appendChild($root);

		foreach ($array as $arrayunit){
			$bigitem = $dom->createElement($name);
			foreach ($arrayunit as $key=>$value) {
				$item = $dom->createElement($key); 
				$text = $dom->createTextNode($value); 
				$item->appendChild($text);	
				$bigitem->appendChild($item);
			}
			$root->appendChild($bigitem);
		}
		return $dom->saveXML();
	}
?>