<?php
namespace shoudusse\matrice;

class Matrices
{

	// Methode qui determine si une matrice passée en paramètre en carrée ou non
	public static function estCarree(array $matrice) {
		$reponse = true;
		$i = count($matrice); // nombre de lignes
		$j = count($matrice[1]); // nombre de colonnes
		if ($i !== $j) {
			$reponse = false;
		}
		return $reponse;
	}


	// Methode qui determine si la matrice passée en paramètre est une matrice identitée
	public static function estIdentitee(array $matrice) {
		$i = count($matrice); // nombre de lignes
		$j = count($matrice[1]); // nombre de colonnes
		for ($ligne = 0; $ligne < $i; $ligne++  ) {
			for ($colonne = 0; $colonne < $j; $colonne++) {
				if ($ligne == $colonne AND $matrice [$ligne] [$colonne] != 1) { // Si pas valeur 1 sur la diagonale
					return  false;
				} 
				if ($ligne != $colonne AND $matrice [$ligne] [$colonne] != 0) { // Si pas valeur 0 hors de la diagonale
					return false;
				}
			}
		}
		return true;
	}


	// Methode qui dertermine si deux matrice A et B sont de même taille (lignes et colonnes)
	public static function deMemeTaille(array $matriceA, array $matriceB) {
		$iA = count($matriceA); // nombre lignes de matriceA
		$jA = count($matriceA [1]); // nombre de colonne matriceA
		$iB = count($matriceB); // nombre lignes de matriceB
		$jB = count($matriceB [1]); // nombre colonne de matriceB
		if ($iA === $iB AND $jA === $jB) {
			return true;
		} else {
			return false;
		}
	}

	// Methode qui additionne deux matrices de même taille
	public static function addMatrices(array $matriceA, array $matriceB) {
		$i = count($matriceA); // nombre de lignes
		$j = count($matriceA[1]); // nombre de colonnes
		for ($ligne = 0; $ligne < $i; $ligne++ ) {
			for ($colonne = 0; $colonne < $j; $colonne++) {
				$matriceResultat [$ligne] [$colonne] = $matriceA [$ligne] [$colonne] + $matriceB [$ligne] [$colonne]; 
			}
		}	 
		return $matriceResultat;
	}

	// Méthode qui multiplie une matrice par un scalaire
	public static function mulMatriceParScalaire(array $matrice, $scalaire) {
		$i = count($matriceA); // nombre de lignes
		$j = count($matriceA[1]); // nombre de colonnes	
		for ($ligne = 0; $ligne < $i; $ligne++) {
			for ($colonne = 0; $colonne < $j; $colonne++) {
				$matriceResultat [$ligne] [$colonne] = $matrice [$ligne] [$colonne] * $scalaire;
			}
		}
	}

	// Methode qui extrait un vecteur colonne ou ligne d'une matrice à  une position donnée
	public static function vectorisation(array $matrice, $mode, $position) {
		// $position--; // En mathématiques des matrices les indices commencent à 1 et non 0 comme en php
		if ($mode == "ligne") {
			$vecteurResultat = $matrice [$position];
		}
		if ($mode == "colonne") {
			$i = count($matrice); // nombre de ligne de la matrice
			for ($ligne = 0; $ligne < $i; $ligne++) {
				$vecteurResultat [$ligne] = $matrice [$ligne] [$position]; 
			}
		}
		return $vecteurResultat;

	}
	// Calcul la valeur résultant de la multiplication de 2 vecteurs 
	public static function multVecteurs(array $vecteur1, array $vecteur2) {
		$coeficient = 0; // Coeficient au sens des matématiques des matrices
		$i = count($vecteur1);
		for ($element = 0; $element < $i; $element++) {
			$coeficient += $vecteur1[$element] * $vecteur2[$element];
		}
		return $coeficient;
	}

	// Détermine si matriceA X matriceB est possible (matriceA même nombre de colonnes que le nombre de lignes de matriceB)
	public static function sontMultipliables(array $matriceA, array $matriceB) {
		$iA = count($matriceA); // nombre lignes de matriceA
		$jA = count($matriceA [1]); // nombre de colonne matriceA
		$iB = count($matriceB); // nombre lignes de matriceB
		$jB = count($matriceB [1]); // nombre colonne de matriceB
		if ($jA === $iB) { // si A(ij ) et B(jm) alors A X B est possible
			return true;
		} else {
			return false; // Sinon impossible de multiplier les matrices
		}
	}

	// Mutiplication de matrices
	public static function MultMatrices(array $matriceA, array $matriceB) {
		$iA = count($matriceA); // nombre lignes de matriceA
		$jA = count($matriceA [1]); // nombre de colonne matriceA
		$iB = count($matriceB); // nombre lignes de matriceB
		$jB = count($matriceB [1]); // nombre colonne de matriceB
		for ($ligneA = 0; $ligneA < $iA; $ligneA++) {
			for ($colonneB = 0; $colonneB < $jB; $colonneB++) {
				$vecteurA = self::vectorisation($matriceA, "ligne", $ligneA);
				$vecteurB = self::vectorisation($matriceB, "colonne", $colonneB);
				$ensembleCoef [$colonneB] = self::multVecteurs ($vecteurA, $vecteurB);
			}
			$matriceResultat [$ligneA] = $ensembleCoef; 
		}
		return $matriceResultat;	
	}

	// Elever une matrice carrée à la puissance p
	public static function matricePuissance(array $matrice, $exposant) {
		$matriceResultat = $matrice;
		for ($exp = 2; $exp <= $exposant; $exp++) {
			$matriceResultat = self::multMatrices($matriceResultat, $matrice);
		}
		return $matriceResultat;
	}

	// Peut on commuter mes matrices A et B (AB = BA)
	public static function matricesCommute(array $matriceA, $matriceB) {
		if (self::estMultipliable($matriceA, $matriceB) AND self::estMultipliable($matriceB, $matriceA)) {
			$resulat1 = self::multMatrices($matriceA, $matriceB);
			$resulat2 = self::multMatrices($matriceB, $matriceA);
			if ($resultat1 === $resultat2) {
				return true;
			}
		}
		return false;
	}

	// Affichage matrice
	public static function afficheMatrice(array $matrice) {
		$iA = count($matrice); // nombre lignes de matriceA
		$jA = count($matrice [1]); // nombre de colonne matriceA
		$chaine = '<table style="border-collapse: collapse;">' ."\n";
		for ($ligne = 0; $ligne < $iA; $ligne++) {
			$chaine .= '<tr>' ."\n";
			for ($colonne = 0; $colonne < $jA; $colonne++) {
				$chaine .= '    ' . '<td style="border: 1px solid black; font-size: x-large;">' . $matrice [$ligne] [$colonne] . "</td>\n";
			}
			$chaine .= '</tr>' . "\n";
		}
		$chaine .= '</table>';
		return $chaine;
	} 
}
?>