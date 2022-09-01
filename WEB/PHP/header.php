<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\CSS\navbar.css">
    <link rel="stylesheet" href="..\CSS\logout.css">
    <title>Index</title>
</head>
<body>
    <div class="navbar-wrapper">
        <ul>
            <?php    
                session_start();   
                if(isset($_SESSION['userId'])){     
                    require 'navbarin.php';
                }
                else{
                    require 'navbarout.php';
                } 
            ?>
        </ul>
    </div>