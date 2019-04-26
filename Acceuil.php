<?php
session_start();
include 'fonction.php';
include 'strConnex.php';
?>
<!DOCTYPE html>
<html lang="fr">
       <head>
              <title>CSS Website Layout</title>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" type="text/css" href="fichier.css">
       </head>
       <body>


              <div class="topnav">
                     <a href="Acceuil.php">Acceuil</a>
                     <div class="dropdown">
                            <button class="dropbtn">Modification de la liste</button>
                            <div class="dropdown-content">
                                   <a href="Ajouter.php">Ajouter</a>
                                   <a href="Modifier.php">Modifier</a>
                                   <a href="Supprimer.php">Supprimer</a>
                            </div>
                     </div>
                     <div class="deco">
  	                            <a href="Deconnection.php" >Deconnection</a>
                     </div>
              </div>

              <div class="row">
                <div class="column">
                     <div class="column side">
                            <h2>Information</h2>
                            <p>Ce site a ete cree dans le cadre d'un projet liant le langage PHP au langage SQL.</p>
                     </div>

                     <div class="column middle">
                            <?php
                            $ptrDB = pg_connect($strConnex);

                            if (isset($_GET['type'])){
                              if ($_GET['type'] == 'sup'){
                                sqlDelete($strConnex, $_GET['key']);
                              } else if ($_GET['type'] == 'maj'){
                                sqlUpdateEleve($strConnex, $_GET['key'], $_GET['publichtml'], $_GET['promo']);
                              } else if ($_GET['type'] == 'add') {
                                sqlInsertEleve($strConnex, $_GET['key'], $_GET['publichtml'], $_GET['promo']);
                              }
                          }

                            $query = "SELECT * FROM site_eleve WHERE site_valid_eleve order by id_eleve";
                            $sortie = pg_query($ptrDB, $query);




                            $ids = array();
                            while($a = pg_fetch_assoc($sortie)) {

                              $ptrDB2 = pg_connect($strConnex);
                              $query2 = "SELECT nom_promo FROM promo WHERE id_promo = " . $a['id_promo'];
                              $sortie2 = pg_query($ptrDB2, $query2);
                              $a2 = pg_fetch_assoc($sortie2);

                     	        $id = array($a['id_eleve'], true, $a2['nom_promo']);
                     		      array_push($ids, $id);
                           	}
                            $titre = array("Identifiant", "Site", "Promotion");

                            $site = intoBalise("Acces au site internet", "h2");
                            $site .= tab($ids, $titre);
                            echo $site;
                            ?>
                     </div>
                   </div>
              </div>
              <div class="footer">
                     <p>Site crée par Aziz M., Richard P. et Imran T.</p>
              </div>
       </body>
</html>
