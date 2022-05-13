<?php

require_once(__DIR__ . '/../controller/User.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();


if(!Security::isConnect()){
    header('Location: ../index.php');
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../public/css/root.css" />
    <link rel="stylesheet" type="text/css" href="../public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/css/header.css">
    <script src="../public/js/script.js" type="text/javascript"></script>
    <title>ToDoList</title>
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <main>

    <?php require_once(__DIR__ . '/errors.php'); ?>
    </main>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>