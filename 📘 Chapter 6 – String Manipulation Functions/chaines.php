<?php
$phrase = "Hello PHP";
echo "Longueur : " . strlen($phrase) . "<br>";
echo "Majuscules : " . strtoupper($phrase) . "<br>";
echo "Minuscules : " . strtolower($phrase) . "<br>";
// search 
echo "Position de PHP : " . strpos($phrase, "PHP") . "<br>";
$nouvellePhrase = str_replace("PHP", "le monde", $phrase);
echo "Remplacé : " . $nouvellePhrase . "<br>";
//Cut and assemble
$liste = "HTML,CSS,JavaScript,PHP";
$techs = explode(",", $liste);
echo "Technologies : " . implode(" | ", $techs);
//Cleaning a chain
$texte = "   Bonjour   ";
echo "Texte nettoyé : '" . trim($texte) . "'";
