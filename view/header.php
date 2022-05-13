<header>
    <nav>
        <a href="../index.php"><img src="https://img.icons8.com/ios-filled/50/000000/hashtag-2.png"/><h1>To Do List</h1></a>
        <?php
        if(isset($_SESSION['user'])){?>
            <ul>
                <hr>
                <a href="disconnect.php"><li>Deconnexion</li></a>
                <hr>
            </ul>
        <?php } ?>
    </nav>
</header>