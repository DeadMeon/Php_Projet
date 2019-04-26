<?php
session_start();
include 'valideForm.php';
include 'connectPostGre.php';
//include 'fonc/SqlCommand.php';



$tab = array('host', 'user', 'password');
if (isset($tab)) {
  if (valideForm($_POST, $tab)) {
    $_SESSION['host'] = $_POST[$tab[0]];
    $_SESSION['user'] = $_POST[$tab[1]];
    $_SESSION['pass'] = $_POST[$tab[2]];
    include("Acceuil.php");
  }
}else {
    include("index.php");
}

?>
