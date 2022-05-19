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
    <link rel="stylesheet" type="text/css" href="../public/css/todolist.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="../public/js/script.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ToDoList</title>
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <main>
    <?php require_once(__DIR__ . '/errors.php'); ?>
        <div class="container">
            <div class="wrapper">
                <h2 class="title">ToDoList</h2>
                <div class="inputFields">
                    <input type="text" id="taskValue" placeholder="Enter a task.">
                    <button type="submit" id="addBtn" class="btn"><i class="fa fa-plus"></i></button>
                </div>
                <div class="content">
                    <ul id="tasks">

                    </ul>
                </div>
            </div>
        </div>
    </main>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>