 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
 </head>
 <body>
   
    <?php

    session_start();
        if (isset($_SESSION["username"]) && isset($_SESSION["email"])) {
            $username = htmlspecialchars($_SESSION["username"]);
            $email = htmlspecialchars($_SESSION["email"]);
            
            echo "<div class='welcome'>Welcome " . $username . "<br>" .
            "Your email address is: " . $email . "</div>";
        } else {
            echo "Username or email not provided.";
        }
?>

    </div>
 </body>
 </html>e