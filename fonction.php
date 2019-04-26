<?php

//Sql

function sqlEstDansBase(string $strConnex, string $id)
{
  $ptrDB = pg_connect($strConnex);
  $requete = "select id_eleve from site_eleve where id_eleve like '".$id."'";
  $sortie = pg_query($ptrDB, $requete);
  $a = pg_fetch_assoc($sortie);
  if($a["id_eleve"] == null){
    return false;
  }else{
    return true;
  }
}

function sqlDelete(string $strConnex, string $id)
{
  $ptrDB = pg_connect($strConnex);
  $requete = "DELETE FROM site_eleve WHERE id_eleve LIKE '".$id."'";
  pg_query($ptrDB, $requete);
}

function sqlInsertEleve(string $strConnex, string $id, String $valid, string $promo)
{
  if(!sqlEstDansBase($strConnex, $id)){
    $ptrDB = pg_connect($strConnex);
    $requete = "select id_promo from promo where nom_promo like '".$promo."'";
    $sortie = pg_query($ptrDB, $requete);
    $a = pg_fetch_assoc($sortie);
    $req = $a['id_promo'];
    $requete = "Insert into site_eleve VALUES ('".$id."', '".$valid."', '".$req."')";
    pg_query($ptrDB, $requete);
  }else{
    sqlUpdateEleve($strConnex, $id, $valid, $promo);
  }
}

function sqlUpdateEleve(string $strConnex, string $id, String $valid, string $promo)
{
  if(sqlEstDansBase($strConnex, $id)){
    $ptrDB = pg_connect($strConnex);
    $requete = "select id_promo from promo where nom_promo like '".$promo."'";
    $sortie = pg_query($ptrDB, $requete);
    $a = pg_fetch_assoc($sortie);
    $req = $a['id_promo'];
    $requete = "UPDATE site_eleve SET site_valid_eleve = '".$valid."', id_promo = '".$req."' where id_eleve like '".$id."'";
    pg_query($ptrDB, $requete);
  }else{
    sqlInsertEleve($strConnex, $id, $valid, $promo);
  }
}

function sqlInsertPromo(string $strConnex, string $nom)
{
  $ptrDB = pg_connect($strConnex);
  $nom = "('.$nom.')";
  $requete = "INSERT INTO promo (nom_promo) VALUES ".$nom;
  pg_query($ptrDB, $requete);
}

//Le reste

function intoBalise(string $contenu, string $element=null, array $params=null ) : string
{
     $element2 = $element;
     if ($params)
     {
            foreach ($params as $value) {
                   $value = rtrim($value);
                   $element .= " ".$value;
            }
     }
return "\t<".$element.">".$contenu."</".$element2.">\n";
}

function intoBaliseR(string $contenu, string $element=null, array $params=null ) : string
{
     $element2 = $element;
     if ($params)
     {
            foreach ($params as $value) {
                   $value = rtrim($value);
                   $element .= " ".$value;
            }
     }
return "\t<" . $element . ">\n\t\t" . $contenu . "\n\t</" . $element2 . ">\n";
}

function intoBaliseAutoFermente(string $element=null, array $params=null ) : string
{
     if ($params)
     {
            foreach ($params as $value) {
                   $value = rtrim($value);
                   $element .= " ".$value;
            }
     }
return "\t<" . $element . "/>\n";
}

function tabTitre($titre)
{
     $text = "";
     foreach ($titre as $key) {
            $text .= intoBalise($key,"th");
     }
     return $text;
}

function tabLigne($argL)
{
     $text = "";
     $text .= intoBalise($argL[0],"td");
     $link = 'http://ust-infoserv.univlehavre.lan/~'. $argL[0] ;
     $text .= intoBaliseR(intoBalise($link,'a', array('href="'.$link.'"')),"td");
     $text .= intoBalise($argL[2],"td");
     return $text;
}

function tab(array $arg, array $name)
{
     $text = intoBaliseR(tabTitre($name), "tr");
     foreach ($arg as $argL) {
       if ($argL[1] == true){
            $text .= intoBaliseR(tabLigne($argL), "tr");
       }
  }
     return intoBaliseR($text, 'table');
}
 ?>
