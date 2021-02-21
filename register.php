<?php


require_once "config.php";

$usernameErr = $emailErr = $passErr = $cpassErr = "";
$username = $email = $password = $confirm_password = "";

if (isset($_POST['submit'])) { 
    if(empty(trim($_POST["username"]))){
        $usernameErr = "Please enter a username.";
    }
    else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $usernameErr = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Validate email

    if (empty(trim($_POST["email"]))) {
        $emailErr = "Email is required";
      } else {
        $email = trim($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
    
}
      
// Validate password
if(empty(trim($_POST["password"]))){
    $passErr = "Please enter a password.";     
} elseif(strlen(trim($_POST["password"])) < 6){
    $passErr = "Password must have atleast 6 characters.";
} else{
    $password = trim($_POST["password"]);
}

// Validate confirm password
if(empty(trim($_POST["confirm_password"]))){
    $cpassErr = "Please confirm password.";     
} else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($passErr) && ($password != $confirm_password)){
        $cpassErr = "Password did not match.";
    }
}

// Check input errors before inserting in database
if(empty($usernameErr) && empty($emailErr) && empty($passErr) && empty($cpassErr)){
        
    // Prepare an insert statement
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
     
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
        $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
        
        // Set parameters
        $param_username = $username;
        $param_email = $email;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            
            // Redirect to login page
            header("location: index.php");
        } else{
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        unset($stmt);
    }
}

// Close connection
unset($conn);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>

    <div class="container">
    <div class="signup-box">
    <div class="title">CREATE ACCOUNT</div>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="txtbox <?php echo (!empty($usernameErr)) ? 'has-error': ''; ?>" >
    <input type="text" placeholder="Username" name="username" value="<?php echo $username;?>">
    <span class="error" align="center"> <?php echo $usernameErr;?></span>
    </div>
    <div class="txtbox">
        <input type="text" placeholder="Email" name="email" value="<?php echo $email;?>">
        <span class="error"> <?php echo $emailErr;?></span>
    </div>
    <div class="txtbox">
        <input type="password" placeholder="Password" name="password" value="<?php echo $password;?>">
        <span class="error"> <?php echo $passErr;?></span>
    </div>
    <div class="txtbox">
        <input type="password" placeholder="Confirm Password" name="confirm_password" value="<?php echo $confirm_password;?>">
        <span class="error"> <?php echo $cpassErr;?></span>
    </div>
        <div class="button" align="center" ><input type="submit" name="submit" value="Sign up"></div>
        <p class="have_acc"> 
            Already having an account? 
            <a href="index.php"> 
                 Login Here! 
            </a> 
        </p>
    </form>

    </div>
    </div>

</body>
</html>