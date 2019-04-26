<?php
session_start();
include 'valideForm.php';
include 'strConnex.php';
//include 'fonc/SqlCommand.php';



$tab = array('host', 'user', 'password');
if (isset($tab)) {
  if (valideForm($_POST, $tab)) {
    $_SESSION['host'] = $_POST[$tab[0]];
    $_SESSION['user'] = $_POST[$tab[1]];
    $_SESSION['pass'] = $_POST[$tab[2]];
    $ptrDB = pg_connect($strConnex);
    $query = file_get_contents("bdd_pgsql.sql");
    pg_query($ptrDB, $query);
    header("Location: Acceuil.php");
  }
}else {
    include("index.php");
}

?>
