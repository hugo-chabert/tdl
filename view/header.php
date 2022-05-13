<header>
    <nav>
        <a href="../index.php"><img src="https://img.icons8.com/external-anggara-line-anggara-putra/344/external-checklist-ecommerce-anggara-line-anggara-putra.png"/><h1>To Do List</h1></a>
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