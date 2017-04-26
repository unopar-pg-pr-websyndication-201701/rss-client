<?php
error_reporting(0);
ini_set(“display_errors”, 0 );

if(isset($_GET["q"]) ) {
	$resultado = $_GET["q"];
} else { 
	$resultado = 'http://pox.globo.com/rss/g1/brasil/';
}
$feed = file_get_contents($resultado); // Não curto @ mas para os Fins de Estudo 
$rss = new SimpleXmlElement($feed);
foreach($rss->channel->item as $entrada) {

echo $entrada->title.'<br>';
}
 
