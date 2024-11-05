<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="" method="POST">
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" value="Submit" class="submit_btn">
        <p>Registered? <a href="login.php">Login</a></p>
    </form> 

    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["email"]) || empty($_POST["username"]) || empty($_POST["password"])){
            $error = "No field can be empty";
             
        }
        if (!empty($error)) {
            echo $error;
            ("Location: login.php?error=" . urlencode($error));
            exit;
        } else {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "soluvetech";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if($conn->$connect_error){
                die ("Connection failed" . $connect_error);
            }
            $sql = "INSERT INTO `Users` (name, email, password) VALUES('{$_POST['username']}', '{$_POST['email']}', '{$_POST['password']}')";
            if($conn->query($sql)=== TRUE){
                    echo "Registered Successfully";
            }else{
                echo("Error: " . $sql . "<br>" . $conn->error);
            }

            $conn->close();
            session_start();
             $_SESSION["email"] = $_POST["email"];
             $_SESSION["username"] = $_POST["username"];
            
            header("Location: welcome.php");

            exit;
            
        }
    }
    
    ?>
</body>
</html>