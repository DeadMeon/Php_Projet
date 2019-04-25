<?php
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
     $text .= intoBaliseR(intoBalise($link,'a href="'.$link.'"'),"td");
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
