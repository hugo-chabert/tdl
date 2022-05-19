<?php

require_once(__DIR__ . '/controller/User.php');
require_once(__DIR__ . '/controller/Toolbox.php');
require_once(__DIR__ . '/controller/Security.php');

session_start();

if(isset($_POST['connection'])){
    if(!empty($_POST['loginC']) && !empty($_POST['passwordC'])){
        $user = new User();
        $user->connection($_POST['loginC'], $_POST['passwordC']);
    }
    else{
        Toolbox::addMessageAlert("Remplir tous les champs.", Toolbox::RED_COLOR);
    }
}

if(isset($_POST['register'])){
    if(!empty($_POST['loginR']) && !empty($_POST['passwordR']) && !empty($_POST['conf-password'])){
        if($_POST['passwordR'] == $_POST['conf-password']){
            $user = new User();
            $user->register($_POST['loginR'], $_POST['passwordR']);
        }
        else{
            Toolbox::addMessageAlert("Mots de passe non identiques", Toolbox::RED_COLOR);
        }
    }
    else{
        Toolbox::addMessageAlert("Remplir tous les champs.", Toolbox::RED_COLOR);
    }
}

if(Security::isConnect()){
    header('Location: ./view/todolist.php');
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="public/css/root.css" />
    <link rel="stylesheet" type="text/css" href="public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="public/css/header.css">
    <script src="public/js/script.js" type="text/javascript"></script>
    <title>Accueil</title>
</head>
<body>
    <?php require_once(__DIR__ . '/view/header.php'); ?>
    <main>
        <?php require_once(__DIR__ . '/view/errors.php'); ?>
        <div class="container">
            <div class="container-fieldset">
                <form action="" method="post">
                    <fieldset>
                        <legend>Connectez-vous</legend>
                        <label for ="loginC">Login :</label>
                        <input id="loginC" type="text" name="loginC" placeholder="Login" />
                        <br>
                        <label for ="passwordC">  Mot de passe :</label>
                        <input id="passwordC" type="password" name="passwordC" placeholder="Mot de passe" />
                        <button type="submit" name="connection">Connexion</button>
                    </fieldset>
                </form>
            </div>
            <div class="container-fieldset">
                <form action="" method="post">
                    <fieldset>
                        <legend>Creer un compte</legend>
                        <label for ="loginR">Login :</label>
                        <input id="loginR" type="text" name="loginR" placeholder="Login" />
                        <br>
                        <label for ="passwordR">  Mot de passe :</label>
                        <input id="passwordR" type="password" name="passwordR" placeholder="Mot de passe" />
                        <br>
                        <label for ="conf-password">Confirmez le mot de passe :</label>
                        <input id="conf-password" type="password" name="conf-password" placeholder="Confirmez le mot de passe" />
                        <button type="submit" name="register">Creer un compte</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
    <?php require_once(__DIR__ . '/view/footer.php'); ?>
</body>
</html>