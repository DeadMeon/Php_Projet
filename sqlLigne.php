<?php
pg_prepare($ptrDB, "insertEleve", "Insert into site_eleve VALUES ($1, $2, $3)");
pg_prepare($ptrDB, "Delete", "DELETE FROM site_eleve WHERE id_eleve LIKE $1");
pg_prepare($ptrDB, "Update", "UPDATE site_eleve SET site_valid_eleve = $1, id_promo = $2 where id_eleve like $3");
pg_prepare($ptrDB, "insertPromo", "INSERT INTO promo (nom_promo) VALUES ($1)")

function sqlLigne(string $strConnex, string $tab)
{
  $ptrDB = pg_connect($strConnex);
  $requete = "select * from ".$tab;
  $ptrQuery = pg_query($ptrDB,$requete);
  if ($ptrQuery) {
      $numRows = pg_num_rows ( $ptrQuery );
      $nbColonnes= pg_num_fields ( $ptrQuery);
      echo "<p>La requête a retourné $numRows lignes décrites par $nbColonnes champs;</p>";
  }
}




function sqlDescription(string $strConnex, array $tab)
{
  $ptrDB = pg_connect($strConnex);

  foreach ($tab as $key1) {
    $tabDpt = pg_meta_data($ptrDB, $key1, false);
    echo "<ul>";
    foreach ($tabDpt as $key2 => $val)  {
        echo "<li><b>$key2</b> => (";
        foreach ($val as $k => $v)
            echo $k."=".$v.",";
        echo ")</li>";
    }
    echo "</ul><br />";
  }
}

function sqlInsertEleve(string $strConnex, string $id, boolean $valid, int $promo)
{
  $ptrDB = pg_connect($strConnex);

  pg_execute($ptrDB, "insertEleve", [$id, $valid, $promo]);
}

function sqlUpdateEleve(string $strConnex, string $id, boolean $valid, int $promo)
{
  $ptrDB = pg_connect($strConnex);
  pg_execute($ptrDB, "Update", [$valid, $promo, $id]);
}

function sqlInsertPromo(string $strConnex, string $nom)
{
  $ptrDB = pg_connect($strConnex);
  pg_execute($ptrDB, "insertPromo", [$nom]);
}
?>
