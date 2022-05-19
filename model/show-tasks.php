<?php

require_once(__DIR__ . '/../database/DB.php');


$req = "SELECT * FROM tasks";
$stmt = Database::connect_db()->prepare($req);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($result == true){
    $task_number = 0;
    foreach($result AS $row){

    ?>

    <li>
        <span class="text"><?php echo $row['text']."<br>".$row['date']; ?></span>
        <i id="removeBtn" class="icon fa fa-trash" data-id="<?php echo $row['id']; ?>"></i>
    </li>

    <?php
    $task_number += 1;
    }
    if($task_number == 1){
        echo '<div class="pending-text">Vous avez ' . $task_number . ' tache.</div>';
    }
    elseif($task_number > 1){
        echo '<div class="pending-text">Vous avez ' . $task_number . ' taches.</div>';
    }
}
else{
    echo "<li><span class='text'>Vous n'avez aucune tache.</span></li>";
}

?>