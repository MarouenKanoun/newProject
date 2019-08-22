<?php

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'compte_bancaire' . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Compte.php';

$c1 = new Compte();
$c2 = new Compte();

echo "<p><b>Compte C1 & C2 : </b></p>";
echo "C1 ";
echo $c1->afficher() . '€ </br>';
echo "C2 ";
echo $c2->afficher() . '€';

echo "<p><b>Déposer 1000€ sur c1 :</b></p>";
$c1->deposer(1000);
echo "C1 ";
echo $c1->afficher() . '€';

echo "<p><b>Déposer 2000€ sur c2 :</b></p>";
$c2->deposer(2000);
echo "C2 ";
echo $c2->afficher() . '€';

echo "<p><b>Retirer 500€ sur c2 :</b></p>";
$c2->retirer(500);
echo "C2 ";
echo $c2->afficher() . '€';

echo "<p><b>Virer 200 euros de c1 à c2 :</b></p>";
$c1->virerVers(200, $c2);
echo "C1 ";
echo $c1->afficher() . '€';
echo "C1 ";
echo $c2->afficher() . '€';

echo "<p><b>Afficher les doldes des deux comptes :</b></p>";
echo "C1 ";
echo $c1->afficher() . '€ </br>';
echo "C1 ";
echo $c2->afficher() . '€ </br>';

echo "<p><b>10 Comptes initialisé avec 200€, on effectué des transferts de 100€ entre chaque comptes : </b></p>";
$tabComptes = array();
$depot = 200;
for ($i=0; $i < 10; $i++) {
    $tabComptes[$i] = new Compte();
    $tabComptes[$i]->deposer(($depot + $depot * $i), $tabComptes[$i]);
}

$tailleTab = sizeof($tabComptes);
for ($i=0; $i < $tailleTab; $i++) {
    if($i != $tailleTab - 1) {
        $tabComptes[$i]->virerVers(100, $tabComptes[$i+1]);
    }
    echo 'C'. ($i+1).' ';
    echo $tabComptes[$i]->afficher();echo"</br>";
}
