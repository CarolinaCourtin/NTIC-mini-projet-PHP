<?php

include('connect.php');

session_start();

// Traitement de la note et d'un commentaire entré par un utilisateur sur un livre 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["choix_note"]) && isset($_POST["livre_id"])) {

        // Récupération des données entrées à mettre dans la BD 
        $choix = $_POST["choix_note"];
        $livre_id = $_POST["livre_id"];
        $commentaire = $_POST["commentaires"];
        $date = date("Y-m-d");

        // Informations de session de l'utilisateur 

        $nom = $_SESSION["nom"];
        $id = $_SESSION["id_utilisateur"];

        // Insertion des données dans la BD

        $nouveau_comm = $connect->prepare("INSERT INTO `commentaires` (`id_livre`, `note_eval`, `texte_commentaire`, `date_commentaire`, `nom`, `id_utilisateur`) VALUES (?, ?, ?, ?, ?, ?)");
        $nouveau_comm->bind_param('ssssss', $livre_id, $choix, $commentaire, $date, $nom, $id);
        $nouveau_comm->execute();

        echo "Votre avis a été pris en compte.";

        header('refresh:2;url=documents_apres_auth.php');

    } else {
        echo "Erreur : Choix non spécifié";
    }
} else {

    header("Location: index.php");
    exit();
}
?>



