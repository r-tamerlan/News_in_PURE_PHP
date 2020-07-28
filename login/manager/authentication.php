<?php session_start();
require_once("../connection/connection.php");


if (isset($_POST["btn"])):


    $email = htmlspecialchars($_POST["poct"]);
    $password = htmlspecialchars($_POST["sifre"]);

    $sql = $db->prepare("SELECT * FROM author a WHERE a.email='$email'");
    $sql->execute();
    $istifadeci = $sql->fetch();

    if (!$istifadeci):
        header("Location: ../error.php");
        return;
    endif;

    if (password_verify($password, $istifadeci["password"])):


        $_SESSION["email"] = $email;


        header("Location: http://localhost/x-Blog/admin/index.php");

        return;

    else:
        header("Location: ../errorpass.php");

    endif;


endif;


?>