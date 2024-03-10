<nav class="navbar">
    <div>QuizMaster</div>
    <div>
        <?php
        if (!empty($_SESSION["username"])) {
            echo "Logged in as {$_SESSION['username']}";
            echo "<a class='button' href='/logout.php'>Logout</a>";
        }
        ?>
    </div>
</nav>
