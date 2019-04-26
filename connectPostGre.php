<?php
function connectPostGre($method, $tab){
	$strConnex="host=" . $method["host"] . " dbname=" . $method["user"] . " user=" . $method["user"] . " password=" . $method["password"];
	return pg_connect($strConnex);
}
?>