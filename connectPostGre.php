<?php
function connectPostGre($method, $tab){
	$strConnex="host=" . $method["host"] . " dbname=" . $method["user"] . " user=" . $method["user"] . " password=" . $method["password"];
	$ptrDB = pg_connect($strConnex);
	if ($ptrDB) {
  	//print "<p>Connexion établie !</p>";
  	include("Acceuil.php");
	} else {
  	print "<p>Erreur lors de la connexion ...</p>";
  	exit;
	}
}
?>
