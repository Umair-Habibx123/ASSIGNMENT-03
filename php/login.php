<?php
session_start();

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST["usern"]) ? trim($_POST["usern"]) : "";
    $password = isset($_POST["pass"]) ? trim($_POST["pass"]) : "";

    // Perform more robust server-side validation
    if (empty($username) || empty($password)) {
        $response["success"] = false;
        $response["message"] = "Please enter both username and password.";
    }
    
    else {
        // Perform your authentication logic
        if ($username === "1234" && $password === "1234") {
            $_SESSION["btn"] = "Admin";
            $response["success"] = true;
            // Redirect to index.php on successful login
            header("Location: ASS03.php");
            exit(); // Ensure that no other code is executed after the header redirect
        } else {
            $response["success"] = false;
            $response["message"] = "Incorrect username or password. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="/css/login.css" />
  </head>
  <body>
  <div id="login-page">
        <h1>Login as Admin</h1>

        <?php if (isset($_SESSION["btn"]) && $_SESSION["btn"] === "Admin") : ?>

            <?php
            // Perform automatic logout for admin user
            $_SESSION["btn"] = "User";
            header("Location: ASS03.php");
            exit();
            ?>
        <?php elseif (isset($response["message"])) : ?>
            <p><?php echo $response["message"]; ?></p>
        <?php endif; ?>

        <form method="post" action="">

            <div>
                <label for="usern">Username: </label>
                <input type="text" name="usern" id="usern" placeholder="Username" required />
            </div>
            <div>
                <label for="pass">Password: </label>
                <input type="pass" name="pass" id="pass" placeholder="Password" required />
            </div>

            <div id="buttons">
                <button type="submit" id="submit" onclick="" >Submit</button>
                <button id="cancel" onclick= "window.location.href='ASS03.php'">Cancel</button>
            </div>

        </form>
    </div>
  </body>
</html>
