<?php

require_once(__DIR__ . '/../database/DB.php');

$id = $_POST['id'];

$req = "DELETE FROM tasks WHERE id = :id";
$stmt = Database::connect_db()->prepare($req);
$stmt->execute(array(
    ":id" => $id,
    ':id' => $id
));

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>