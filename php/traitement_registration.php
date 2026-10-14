<?php 

include('connect.php');

session_start();

// Traitement du formulaire d'inscription

if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp'])) {

    // Récupération des données en entrée 
    
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom']; 
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    // Envoi d'une requête avec ces informations pour vérifier que l'utilisateur n'exsite pas déjà

    $getuser = $connect->prepare("SELECT `email`, `mdp`, `nom`, `prenom` FROM `utilisateurs` WHERE `email` = ?");
    $getuser->bind_param('s', $email);
    $getuser->execute();  
    $userdata = $getuser->get_result();  
    
    if ($userdata->num_rows == 0) { // Si le mail n'existe pas, on peut créer le compte
        
        $requete_nom_prenom = $connect->prepare("SELECT `email`, `mdp`, `nom`, `prenom` FROM `utilisateurs` WHERE `nom` = ? AND `prenom` = ?");
        $requete_nom_prenom->bind_param('ss', $nom, $prenom); 
        $requete_nom_prenom->execute();
        $res = $requete_nom_prenom->get_result();

        if ($res->num_rows == 0) { //Si combinaison nom-prenom n'existe pas, on peut créer le compte
            $nouveau_compte = $connect->prepare("INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `mdp`) VALUES (?, ?, ?, ?)");
            $nouveau_compte->bind_param('ssss', $nom, $prenom, $email, $mdp);
            $nouveau_compte->execute();

            // Informations de session nom et prenom

            $_SESSION["nom"] = $nom;
            $_SESSION["prenom"] = $prenom;

            // Information de session pour l'identifiant 

            $id_ut = $connect->prepare("SELECT `id_utilisateur` FROM `utilisateurs` WHERE `nom` = ? AND `prenom` = ?");
            $id_ut->bind_param('ss', $nom, $prenom); 
            $id_ut->execute();
            $res2 = $id_ut->get_result();

            if ($res2){
                $row_id = $res2->fetch_assoc();
                $id_utilisateur = $row_id['id_utilisateur'];
                $_SESSION["id_utilisateur"] = $id_utilisateur;
            }
    

            echo "Votre compte a été créé";
            header('refresh:2;url=index_apres_auth.php');

        } else { // Si la combinaison nom-prenom existe déjà 
            echo "La combinaison nom-prénom existe déjà.";
            header('refresh:2;url=registration.php'); 

        }

    } else { // Si le mail est déjà utilisé 

        echo "Ce mail existe déjà, veuillez en entrer utiliser un autre";
        header('refresh:2;url=registration.php'); 
    }

} else { // Si tous les champs ne sont pas remplis 

    echo "Veuillez remplir tous les champs";
    header('refresh:2;url=registration.php');
}

?>