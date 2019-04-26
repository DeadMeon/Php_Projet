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
                            session_start();
                            include 'fonction.php';

                            $strConnex="host=" . $tab[0] . " dbname=" . $tab[1] . " user=" . $tab[1] . " password=" . $tab[2];
                            $ptrDB = pg_connect($strConnex);

                            $site = intoBalise("Modification de la base de donnees", "h2");
                            $site .= intoBalise("Ajouter une entrer", "a", array('href="Ajouter.php"', 'class="button ajouter"'));
                            $site .= intoBalise("Mettre a jour une entrer", "a", array('href="Modifier.php"', 'class="button update"'));
                            $site .= intoBalise("Supprimer une entrer", "a", array('href="Supprimer.php"', 'class="button supprimer"'));
                            echo $site;
                            ?>
                            <form action="/Acceuil.php" method="get" name="sup">
  		                     <fieldset>
                                          <legend>Modifier une entrer :</legend>
    		                            <legend>Id de l'étudiant :</legend>
    		                            <input type="text" name="key" required>
          	                            <legend>A un dossier "public_html" ?</legend>
    		                            <select name="publichtml">
   				                     <option value="true">Oui</option>
   				                     <option value="false">Non</option>
 			                     </select>
          	                            <legend>Promotion de l'étudiant :</legend>
    		                            <input type="text" name="promo" value="L1">
    		                            <input type="submit" value="Modifier">
  		                     </fieldset>
	                     </form>
                     </div>
              </div>
              <div class="footer">
                     <p>Site crée par Aziz M., Richard P. et Imran T.</p>
              </div>
       </body>
</html>
