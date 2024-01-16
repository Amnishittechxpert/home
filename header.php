<?php
require("basic.php");
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
        </li>
        <?php
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
       
            ?>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <?php
        } else {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="signup.php">Signup</a>
            </li>
            <?php
        }
        ?>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
    </ul>
</nav>
</nav>
