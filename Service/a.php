<?php
/*
用PHP的DOM控件来创建XML输出
设置输出内容的类型为xml
*/
header('Content-Type: text/xml;');
//创建新的xml文件
$dom = new DOMDocument('1.0', 'utf-8');

//建立<response>元素
$response = $dom->createElement('response');
$dom->appendChild($response);

//建立<books>元素并将其作为<response>的子元素
$books = $dom->createElement('books');
$response->appendChild($books);

//为book创建标题
$title = $dom->createElement('title');
$titleText = $dom->createTextNode('PHP与AJAX');
$title->appendChild($titleText);

//为book创建isbn元素
$isbn = $dom->createElement('isbn');
$isbnText = $dom->createTextNode('1-21258986');
$isbn->appendChild($isbnText);

//创建book元素
$book = $dom->createElement('book');
$book->appendChild($title);
$book->appendChild($isbn);

//将<book>作为<books>子元素
$books->appendChild($book);

//在一字符串变量中建立XML结构
$xmlString = $dom->saveXML();

//输出XML字符串
echo $xmlString;

?>