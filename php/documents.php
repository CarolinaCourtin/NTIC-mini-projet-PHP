<?php
session_start();
include('connect.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

    <!--En-tête-->

    <header>

      <!--3 boutons de navigation-->

      <div class="d-flex justify-content-between">

          <!--Bouton bibliothèque retour à la page index-->

          <a class="btn bibliothèque" href="index.php" role="button">Bibliothèque</a>

          <div class="d-grid gap-2 d-md-flex justify-content-md-end align-items-center">

              <!--Boutons de navigation-->

              <a class="btn btn-primary btn_entete" href="index.php" role="button">Home</a>
              <a class="btn btn-primary btn_entete" href="logout.php" role="button">Logout</a>
              <button class="btn btn-primary btn_entete" type="button" disabled>Documents</button>
              
          </div>

      </div>
      
  </header>

    <!--Titre-->

    <h3>Nos documents</h3>

    <div class="card text-center">

<?php

// Même code que dans documents_apres_auth.php mais sans la possibilité d'évaluer le livre 

$sql = $connect->prepare("SELECT COUNT(*) AS nombre_occurrences FROM livres");
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    // Récupère le nombre d'occurrences
    $row = $result->fetch_assoc();
    $nombreOccurrences = $row["nombre_occurrences"];

    // Boucle for pour effectuer une action pour chaque occurrence
    for ($i = 1; $i <= $nombreOccurrences; $i++) {

        $sql_livre = $connect->prepare("SELECT * FROM livres WHERE id_livre = ?");
        $sql_livre->bind_param('s', $i);
        $sql_livre->execute();
        $result_livre = $sql_livre->get_result();

        $row = $result_livre->fetch_assoc();

        $titre = $row['titre'];
        $auteur = $row['auteur'];
        $discipline = $row['discipline'];
        $annee_pub = $row['annee_pub'];
        $langue = $row['langue'];
        $editeur = $row['editeur'];
        $isbn = $row['ISBN'];

        $moyenne = $connect->prepare("SELECT AVG(note_eval) AS moyenne FROM commentaires WHERE id_livre = $i");
        $moyenne->execute();
        $res_moyenne = $moyenne->get_result();

        if ($res_moyenne) {
            $row = $res_moyenne->fetch_assoc();
            $moyenne_value = $row['moyenne'];
        } else {
            echo "Erreur lors de l'exécution de la requête.";
        } 

        $requete_commentaires = $connect->prepare("SELECT COUNT(id_commentaire) AS nombre_commentaires FROM commentaires WHERE id_livre =$i");
        $requete_commentaires->execute();
        $res = $requete_commentaires->get_result();

        if ($res) {
            $row = $res->fetch_assoc();
            $nombre_comm = $row['nombre_commentaires'];
        } else {
            echo "Erreur lors de l'exécution de la requête.";
        } 

        echo "<div class='card text-center'>";
        echo "<div class='card-header'>";
        echo $discipline;
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>";
        echo $titre;
        echo "</h5>";
        echo "<h6 class='auteur'>";
        echo $auteur;
        echo "</h6>";
        echo "<p class='card-text'>";
        echo $editeur . " | " . $annee_pub . " | " . $isbn . " | " . $langue;
        echo "</p>";
        echo "<p class='card-text'>";
        echo "Note moyenne du livre : " . $moyenne_value;
        echo "</p>";
        echo "<p class='card-text'>";
        echo "Nombre d'évaluations : " . $nombre_comm;
        echo "</p>";
        echo "<a class='btn btn-primary btn_co' href='login.php' role='Button'>Connectez-vous pour évaluer ce livre </a>";
        echo "</div>";
        echo "<div class='card-footer text-body-secondary'>";
        echo "<button type='button' class='btn afficher_commentaires'>";
        echo "Afficher les commentaires";
        echo "</button>";
        echo "</div>";
        echo "</div>";
        echo "<br>";
        echo "<br>";
    }
}
?>

    <!--Bas de page-->

    <footer>
        <p>Bâtiment Batelle A,</p>
        <p>7 Route de Drize,</p>
        <p>1227, Carouge</p>
        <p>(123) 456-7890</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
