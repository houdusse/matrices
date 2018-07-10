<?php

// Méthodes public static disponibles
// bool Matrices::estCarree(array $matrice)
// bool Matrices::estIdentitee(array $matrice)
// bool Matrices::deMemeTaille(array $matriceA, array $matriceB)
// array Matrices::addMatrices(array $matriceA, array $matriceB)
// array Matrices::multMatriceParScalaire(array $matrice, mixed int|décimaux $scalaire)
// bool Matrices::sontMultipliables(array $matriceA, $matriceB)
// array Matrices::multMatrices(array $matriceA, $MatriceB)
// array Matrices::matricePuissance(array $matrice, int $puissance)
// bool Matrices::matricesCommutables(array $matriceA, array $matriceB)
// string Matrices::afficheMatrice(array $matrice)



// Achtung namespace pour classe matrice
use shoudusse\matrice\Matrices;

require 'matrice.class.php';



$matriceA [0] [0] = 1;
$matriceA [0] [1] = 2;
$matriceA [0] [2] = 3;
$matriceA [1] [0] = 2;
$matriceA [1] [1] = 3;
$matriceA [1] [2] = 4;

$matriceB [0] [0] = 10;
$matriceB [0] [1] = 10;
$matriceB [0] [2] = 10;
$matriceB [1] [0] = 10;
$matriceB [1] [1] = 10;
$matriceB [1] [2] = 10;

$matriceC [0] [0] = 1;
$matriceC [0] [1] = 2;
$matriceC [1] [0] = -1;
$matriceC [1] [1] = 1;
$matriceC [2] [0] = 1;
$matriceC [2] [1] = 1;

$matriceD [0] [0] = 1;
$matriceD [0] [1] = 0;
$matriceD [0] [2] = 1;
$matriceD [1] [0] = 0;
$matriceD [1] [1] = -1;
$matriceD [1] [2] = 0;
$matriceD [2] [0] = 0;
$matriceD [2] [1] = 0;
$matriceD [2] [2] = 2;


// Utilisation Matrices::estCarree
if (Matrices::estCarree($matriceA)) {
	echo "<h3>La matriceA est carrée</h3>";
} else {
	echo "<h3>La matriceB n'est pas carrée</h3>";
}
echo '<br><br>';


// Utilisationtion Matrices::addMatrices avec Matrices::deMemeTaille et Matrices::afficheMatrice
if (Matrices::deMemeTaille($matriceA, $matriceB)) {
	$matriceResultat = Matrices::addMatrices($matriceA, $matriceB);
	echo "Matrice A <br>";
	echo Matrices::afficheMatrice($matriceA) . '<br><br>';
	echo "Matrice B <br>";
	echo Matrices::afficheMatrice($matriceB) . '<br><br>';
	echo 'matriceA + matriceB<br>';
	echo Matrices::afficheMatrice($matriceResultat);
	echo "<br><br>";
} else {
	echo "MatriceA et MatriceB sont de tailles différentes pas d'addition possible<br><br>";
}


// Utilisation Matrices::multMatrices avec Matrices::sontMultipliables
if (Matrices::sontMultipliables($matriceA, $matriceC)) {
	$matriceResultat = Matrices::multMatrices($matriceA, $matriceC);
	echo "Matrice A <br>";
	echo Matrices::afficheMatrice($matriceA) . '<br><br>';
	echo "Matrice C <br>";
	echo Matrices::afficheMatrice($matriceC) . '<br><br>';
	echo 'matriceA X matriceC<br>';
	echo Matrices::afficheMatrice($matriceResultat);
	echo "<br><br>";
} else {
	echo "Les matrices matriceA et matriceB ne sont pas sontMultipliables<br><br>";
} 



?>
