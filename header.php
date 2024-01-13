
<?php
require("basic.php");
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="home.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="signup.php">Signup</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="login.php">Login</a>
    </li>
    <?php 
    if(isset($_SESSION['users']) && $_SESSION != ''){ ?>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
    <?php } ?>
  </ul>
</nav>