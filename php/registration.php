<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a class="btn btn-primary btn_entete" href="login.php" role="button">Login</a>
                <a class="btn btn-primary btn_entete" href="documents.php" role="button">Documents</a>
                
            </div>
  
        </div>
        
    </header>

    <!--Zone principale-->
    

    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-auto text-center">

                <!--Titre-->

                <h3>Création d'un compte</h3>

                <!--Champs à remplir avec labels-->

                <form action="traitement_registration.php" method='POST'> 
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control"><br>
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control"><br>
                    <label for="email">Adresse e-mail</label>
                    <input type="text" name="email" id="email" class="form-control"><br>
                    <label for="mdp">Mot de passe</label>
                    <input type="text" name="mdp" id="mdp" class="form-control"><br>

                    <!--Bouton "soumettre"-->

                    <button type="submit" class="btn btn-primary">Soumettre</button><br><br><br><br>

                </form>
            </div>
        </div>
    </div>
    
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
