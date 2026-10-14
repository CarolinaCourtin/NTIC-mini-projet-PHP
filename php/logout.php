<?php
include('connect.php');
session_start();
?>
<?php

//Deconnexion de la session

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

?>

<p class='alert alert-danger'>Vous êtes maintenant déconnecté(e).</p>

<?php
header('refresh:2;url=index.php');
?>