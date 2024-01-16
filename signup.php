<?php

require("ever/header.php");

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = array();
}

$nameErr = $lastnameErr = $emailErr = $passwordErr = "";
$name = $lastname = $email = $password  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Invalid name format";
        }
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "Last name is required";
    } else {
        $lastname = test_input($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
            $lastnameErr = "Invalid last name format";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
            $emailErr = "Invalid email format";
        }
    }
    if(!empty($_POST["password"]) && isset( $_POST['password'] )) {
        $password = $_POST["password"];
        if (mb_strlen($_POST["password"]) <= 8) {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
        elseif(!preg_match("#[\W]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Special Character!";
        } 
        $password = $_POST["password"];
        $hashedPassword = md5($password);
       
    } else {
        $passwordErr = "Please enter password  ";
    }

    if (empty($nameErr) && empty($lastnameErr) && empty($emailErr) && empty($passwordErr)) {
      
        $user = array_search($email, array_column($_SESSION['users'], 'email'));

        if ($user !== false) {
            echo "User already exists";
        } else {
            $_SESSION['users'][] = array('name' => $name, 'lastname' => $lastname, 'email' => $email, 'password' => $hashedPassword);
            echo "Signup successful login Button To Countiue";
         
            // header("Location: login.php");  
        }
    }
}
// echo $email;
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>


<div class="container">
    <form action="#" method="POST">
        <div class="form-group">
            <label for="name">First name:</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name" value="<?php echo $name; ?>">
            <span class="error"><?php echo $nameErr; ?></span>
        </div>
        <div class="form-group">
            <label for="lastname">Last name:</label>
            <input type="text" class="form-control" placeholder="Enter last name" name="lastname"value="<?php echo $lastname; ?>">
            <span class="error"><?php echo $lastnameErr; ?></span>
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email"value="<?php echo $email; ?>">
            <span class="error"><?php echo $emailErr; ?></span>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="password"value="<?php echo $password; ?>">
            <span class="error"><?php echo $passwordErr; ?></span>
            
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
