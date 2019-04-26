<?php
include 'fonc/valideForm.php';
include 'fonc/connectPostGre.php';
//include 'fonc/SqlCommand.php';

session_start();

$tab = array('host', 'user', 'password');
if (isset($tab)) {
  if (valideForm($_POST, $tab)) {
    connectPostGre($_POST, $tab);
  } else {
    include("html/errorPostGre.html");
  }
} else {
  $_SESSION['tab'] = [$tab[0], $tab[1], $tab[2]];
  include("Acceuil.php");
}

?>
