<?php
require(__DIR__ . '/../src/user.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="./jss/jquery-3.6.3.min.js"></script>
    <script src="./jss/script.js"></script>
</head>

<body>
    <header>
        <div class="header">
            <div class="header_left">
                <p href="#">Boekenhandel</p>
                <button id="hamburger-button">&#9776; Menu</button>
            </div>
            <div class="header_right">
                <a href="home.php">Home</a>
                <a href="shop.php">Shop</a>
                <?php
                    if(isset($_SESSION['username']))
                    {
                        echo '<a href="logout.php">Logout</a>';
                    }
                    else
                    {
                        echo '<a href="login.php">Login</a>';
                    }
                    if(isset($_SESSION['type']))
                    {
                        if($_SESSION['type'] >= 1)
                        {
                            echo '<a href="admin.php">AdminPanel</a>';
                        }
                    }
                ?>
            </div>
        </div>
    </header> 

</body>

</html>