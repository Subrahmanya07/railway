<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Indian Railway</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        .welcome-section {
            height: 100vh;
            background-image: url('pic2.jpg'); 
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .welcome-content {
            position: relative;
            z-index: 2;
        }
        
        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }
        
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .button {
            background-color: black;
            border: 2px solid #fff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #fff;
            color: #000;
        }
    </style>
</head>
<body>
<?php
        session_start();
        include("header.php");
        if (isset($_POST['logout'])) {
            session_destroy(); 
            header("Location: index.php"); 
            exit();
        }
    ?>
    <div class="welcome-section">
        <a href="index.php"></a>
        <div class="welcome-content">
            <h1>WELCOME TO INDIAN RAILWAY</h1>
            <p>Your ultimate destination for safe and comfortable travel experiences.</p>          
            <?php  
                if(isset($_SESSION['user_info'])){
                    echo '<form action="pnrstatus.php" method="post">
                            <input type="submit" class="button" value="Cancel your ticket!" name="cancel" id="cancel">
                            <input type="submit" class="button" value="Log Out" name="logout" id="logout">
                          </form>';
                } else {
                    echo '<a href="register.php" class="button">Login</a>
                    <a href="register.php" class="button">Register</a>';
                }
            ?>
        </div>
    </div>
</body>
</html>
