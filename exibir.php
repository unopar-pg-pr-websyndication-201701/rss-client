<?php
error_reporting(0);
ini_set(“display_errors”, 0 );

if(isset($_GET["data"])){
	$data = $_GET["data"];
}else{
	$data = "02/05/2017";
}

if(isset($_GET["q"]) ) {
	$resultado = $_GET["q"];
} else { 
	$resultado = 'http://pox.globo.com/rss/g1/brasil/';
}
$feed = file_get_contents($resultado); 
$rss = new SimpleXmlElement($feed);
foreach($rss->channel->item as $entrada) {
	// echo '<pre>';
	// var_dump($entrada);
	
	echo $entrada->title.'<br>';
	echo $entrada->link.'<br>';
	echo $entrada->description.'<br>';
	echo $entrada->pubDate.'<br>';
}