<?php

session_start();
session_destroy();
$inscription = new PDO('mysql:host=localhost;dbname=ecranmajestueux', 'root', '');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $req = $inscription->prepare('INSERT INTO utilisateurs(nom,prenom,email,mot_de_passe) VALUES(:nom,:prenom,:email,:mot_de_passe)');
    $req->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'mot_de_passe' => $mot_de_passe,
    ));

    echo "Votre compte a bien été inscrit !";
    header('Location: Connexion.php');

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="css/InscriptionConnexion.css" rel="stylesheet">
</head>
<body>
<hr>
<h1>Inscription</h1>
<hr>
<form action="Inscription.php" method="post">
    <p>Entrer un nom :</p>
    <input type="text" name="nom">
    <p>Entrer un prenom :</p>
    <input type="text" name="prenom">
    <p>Entrer un e-mail</p>
    <input type="e-mail" name="email">
    <p>Entrer votre mot de passe :</p>
    <input type="password" name="mot_de_passe">
    <input type="submit" name="validation">
    <a href="Connexion.php"><p>Déjà membre de l'écran majestueux ?</p></a>
</form>
</body>

?>