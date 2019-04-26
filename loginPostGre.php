<?php
include 'valideForm.php';
include 'connectPostGre.php';
//include 'fonc/SqlCommand.php';

session_start();

$tab = array('host', 'user', 'password');
echo $tab;
if (isset($tab)) {
  if (valideForm($_POST, $tab)) {
    $_SESSION['tab'] = [$tab[0], $tab[1], $tab[2]];
    connectPostGre($_POST, $tab);
  }
}else {
    include("index.php");
}

?>
