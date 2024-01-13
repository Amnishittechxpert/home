<?php
require("ever/header.php");

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = array();
}

$nameErr = $lastnameErr = $emailErr = $passwordErr = "";
$name = $lastname = $email = $password = $color = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST['login'])) {
        $loginEmail = test_input($_POST['loginEmail']);
        $loginPassword = $_POST['loginPassword'];

        $user = array_search($loginEmail, array_column($_SESSION['users'], 'email'));

        if ($user !== false && $_SESSION['users'][$user]['password'] == $loginPassword) {
    
             echo "Login successful. Welcome, " . $_SESSION['users'][$user]['name']       ;
        // echo   $_SESSION['users'][$user]['name']  ;
        // header("location: home.php");

          
        } else {
            echo "User not registered or incorrect password";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkPasswordStrength($password) {
   
}
?>

   
    <form action="#" method="POST">
        <div class="form-group">
            <label for="loginEmail">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="loginEmail">
        </div>
        <div class="form-group">
            <label for="loginPassword">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="loginPassword">
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
</div>
