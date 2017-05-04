<?php

$host = $_SERVER["SERVER_NAME"];
$port = $_SERVER["SERVER_PORT"];
$uri = $_SERVER["REQUEST_URI"];

$url = explode("/", $uri);
$pasta = $url[1];

$caminho = "http://" . $host . ":" . $port . "/" . $pasta . "/public";

echo $caminho;

?>
<meta http-equiv="refresh" content="0;url=<?php echo $caminho; ?>">
