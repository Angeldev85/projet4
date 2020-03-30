<?php
$connecte = null;


if (isset($_POST['connexion'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
        $user = new Users($_POST['pseudo']);
        if ($_POST['password'] === $user->password) {
            $_SESSION['id'] = $user->id;
            $_SESSION['admin'] = $user->admin;
            $_SESSION['pseudo'] = $user->pseudo;
            $_SESSION['password'] = $user->password;
        } else {
            $connecte = 'Votre identifiant ou mot de passe est incorrect';
        }
    } else {
        $connecte =  'Veuillez renseigner vos informations';
    }
}

if ($_SESSION) {
    if ($_SESSION['id'] !== null) {
        $connecte = 'Bienvenue ' . $_SESSION['pseudo'];
    }
}
