<?php

// Informations de connexion à la base de données

$serveur = "localhost"; 
$nom_utilisateur = "ntic23courtin1";
$mot_de_passe = "courtin1*";
$nom_base_de_donnees = "ntic23courtin1";

// Connexion à la base de données MySQL

$connect = new mysqli($serveur, $nom_utilisateur, $mot_de_passe, $nom_base_de_donnees);

if (mysqli_connect_errno()){
    echo "Failed to connect";
    exit();
}

?>