<?php
require_once 'classes/jeu.php';

$resultat = "";
$chevalier = new Personnage($_POST['nomChevalier'], (int)$_POST['vieChevalier'], (int)$_POST['attaqueChevalier']);
$dragon = new Personnage($_POST['nomDragon'], (int)$_POST['vieDragon'], (int)$_POST['attaqueDragon']);
$jeu = new Jeu($chevalier, $dragon);
$resultat = $jeu->lancerCombat();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Donjon et Dragon</title>
    <style>
        .cadre {
            width: 500px;  /* Largeur du cadre */
            height: 50px; /* Hauteur du cadre */
            border: 5px solid black; /* Bordure noire épaisse */
            padding: 20px; /* Espacement à l'intérieur */
            text-align: center; /* Centrer le texte */
            margin: 50px auto; /* Centrer le cadre horizontalement */
            background-color: lightgray; /* Couleur de fond */
        }
    </style>
</head>
<body>
    <h1>Donjon Et Dragon</h1>
    
    <form action="donjon.php" method="post">
        <h2>Chevalier</h2>
        <label>Nom : <input type="text" name="nomChevalier" required></label>
        <label>Attaque : <input type="number" name="attaqueChevalier" required></label>
        <label>Vie : <input type="number" name="vieChevalier" required></label>

        <h2>Dragon</h2>
        <label>Nom : <input type="text" name="nomDragon" required></label>
        <label>Attaque : <input type="number" name="attaqueDragon" required></label>
        <label>Vie : <input type="number" name="vieDragon" required></label>

        <br><br>
        <input type="submit" value="Lancer le combat">
        <div class="cadre">
        <?php
            echo 'Nom Chevalier : '.$chevalier->getNom().
            ' | atk : '.(int)$chevalier->getAtk(). 
            ' | hp : '.(int)$chevalier->getHp(). '<br>';
            echo
            'Nom Dragon : '.$dragon->getNom().
            ' | atk : '.(int)$dragon->getAtk(). 
            ' | hp : '.(int)$dragon->getHp();
        ?>
    </div>
    </form>
    <?php if (!empty($resultat)) : ?>
        <h2>Résultat :</h2>
        <p><?= $resultat; ?></p>
    <?php endif; ?>
</body>
</html>
