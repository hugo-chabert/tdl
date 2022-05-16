<?php

$server = "localhost";
$username = "hugo-tdl";
$password = "ToDoList";
$database = "hugo-chabert_tdl";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>