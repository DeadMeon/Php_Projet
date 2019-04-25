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
                     <a href="#">Acceuil</a>
                     <a href="#">Modification de la liste</a>
                     <div class="deco">
  	                            <a href="#" >Deconnection</a>
                            </div>
                    </div>

              <div class="row">
                     <div class="column side">
                            <h2>Information</h2>
                            <p>Ce site a ete cree dans le cadre d'un projet liant le langage PHP au langage SQL.</p>
                     </div>

                     <div class="column middle">
                            <?php
                            include 'fonction.php';
                            include 'connexion.php';

                            $ptrDB = connexion();
                            $query = "SELECT * FROM site_eleve WHERE site_valid_eleve";
                            $sortie = pg_query($ptrDB, $query);


                            $ids = array();
                            while($a = pg_fetch_assoc($sortie)) {
                     	       $id = array($a['id_eleve'], true);
                     		array_push($ids, $id);
                     	}
                            $titre = array("Identifiant", "Site");

                            $site = intoBalise("Acces au site internet", "h2");
                            $site .= tab($ids, $titre);
                            echo $site;
                            ?>
                     </div>
              </div>
              <div class="footer">
                     <p>Site crée par Aziz M., Richard P. et Imran T.</p>
              </div>
       </body>
</html>
