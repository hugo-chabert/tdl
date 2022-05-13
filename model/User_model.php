<?php
require_once(__DIR__ . '/../database/DB.php');
require_once(__DIR__ . '/../controller/Security.php');

class User_model{

    public static function sql_register($login, $password){
        $login_safe = Security::safeHTML($login);
        $password_safe = Security::safeHTML($password);

        if(User_model::info_user_login($login_safe) == false){
            $password_hash = password_hash($password_safe, PASSWORD_BCRYPT);
            $req = "INSERT INTO users (login, password, rights) VALUES (:login, :password, 0)";
            $stmt = Database::connect_db()->prepare($req);
            $stmt->execute(array(
                ":login" => $login_safe,
                ":password" => $password_hash
            ));
            Toolbox::addMessageAlert("Le compte est créé!", Toolbox::GREEN_COLOR);
            header("Location: ./index.php");
            exit();
        }

        if(User_model::info_user_login($login_safe) == true){
            Toolbox::addMessageAlert("Ce login est déjà utilisé !", Toolbox::RED_COLOR);
            header("Location: ./index.php");
            exit();
        }
    }

    public static function sql_connection($login, $password){
        $login_safe = Security::safeHTML($login);
        $password_safe = Security::safeHTML($password);

        if(User_model::info_user_login($login_safe) == true){
            $results = User_model::info_user_login($login_safe);
            if(password_verify($password_safe, $results["password"])){
                $_SESSION["user"]["id"] = $results["id"];
                $_SESSION["user"]["login"] = $results["login"];
                $_SESSION["user"]["rights"] = $results["rights"];
                Toolbox::addMessageAlert("Connexion faite.", Toolbox::GREEN_COLOR);
                header("Location: ./view/todolist.php");
                exit();
            }
            else{
                Toolbox::addMessageAlert("Mot de passe incorrect.", Toolbox::RED_COLOR);
                header("Location: ./index.php");
                exit();
            }
        }
        elseif(User_model::info_user_login($login) == false){
            Toolbox::addMessageAlert("Login incorrect.", Toolbox::RED_COLOR);
            header("Location: ./index.php");
            exit();
        }
    }

    public static function info_user_login($login){
        $req = "SELECT * FROM users WHERE login = :login";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":login" => $login
        ));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }

}