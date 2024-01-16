<?php
require("ever/header.php");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $loginEmail = test_input($_POST['loginEmail']);
    $loginPassword = $_POST['loginPassword'];

    $user = array_search($loginEmail, array_column($_SESSION['users'], 'email'));

    if ($user !== false && md5($loginPassword) == $_SESSION['users'][$user]['password']) {
        $_SESSION['user'] = $_SESSION['users'][$user]; 
        header("Location: home.php");
        exit();
    } else {
        echo "User not registered or incorrect password";
    }
}
    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

   
    <form action="#" method="POST">
        <div class="form-group">
            <label for="loginEmail">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="loginEmail" >
        </div>
        <div class="form-group">
            <label for="loginPassword">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="loginPassword">
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
</div>
