<?php

require_once(__DIR__ . '/../database/DB.php');

session_start();

$task = $_POST['task'];
$user_id = $_SESSION['user']['id'];


$req = "INSERT INTO tasks (text, id_user) VALUES (:task, :user_id)";
$stmt = Database::connect_db()->prepare($req);
$stmt->execute(array(
    ":task" => $task,
    ':user_id' => $user_id
));

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>