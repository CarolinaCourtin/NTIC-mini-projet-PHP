<!--  login.php -->
<?php 

include('connect.php');

session_start();

// Réception du formulaire d'authentification login

if (isset($_POST['identifiant']) && isset($_POST['mdp'])) {
    
    $login = $_POST['identifiant']; // Récuperer le nom d'utilisateur
    $pass = $_POST['mdp']; // Récuperer le mdp¨

    $getuser = $connect->prepare("SELECT `id_utilisateur`, `email`, `mdp`, `nom`, `prenom` FROM `utilisateurs` WHERE `email` = ?");
    $getuser->bind_param('s', $login);  
    $getuser->execute();  
    $userdata = $getuser->get_result();  
    
    if ($userdata->num_rows == 1) {

        // Si la requête renvoit un résultat

        $row =$userdata->fetch_assoc();

        //Si le mot de masse correpond bien à ce qu'il y a dans la base de données

        if ($pass==$row['mdp']) {

            session_regenerate_id(true); 
            $_SESSION['identifiant'] = $login; 
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $id_utilisateur = $row['id_utilisateur'];

            // Enregistrement des données sur l'utilisateur dans la session

            $_SESSION["nom"] = $nom;
            $_SESSION["prenom"] = $prenom;
            $_SESSION["id_utilisateur"] = $id_utilisateur;

            echo "Connexion réussie !";

            header('refresh:2;url=index_apres_auth.php'); // Retourner dans le page d'accueil apres 2 sec
        
        } else {
            echo "Mot de passe incorrect";
            header('refresh:2;url=index.php'); // Retourner dans le page d'accueil
        }

    } else {

        echo "Identifiant incorrect";

        header('refresh:2;url=index.php'); 
    }
}

?>