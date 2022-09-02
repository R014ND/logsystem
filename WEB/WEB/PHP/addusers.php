<?php 
    include_once 'header.php'
?>
    <link rel="stylesheet" href="..\CSS\addusers.css">
    
    <div class="addusers-wrapper">
        <form action="includes/addusers.inc.php" method="post">
            <input type="text" name="name" placeholder="Full name">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwdr" placeholder="Repeat">
            <input type="text" name="isAdmin" placeholder="admin/user">
            <button type="submit" name="submit">Add User</button>
        </form>
    </div>

    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            }
            else if($_GET["error"] == "invaliduid"){
                echo "<p>Choose a proper username!</p>";
            }
            else if($_GET["error"] == "pwddnm"){
                echo "<p>Passwords doesn't match!</p>";
            }
            else if($_GET["error"] == "uidtaken"){
                echo "<p>Username already taken!</p>";
            }
            else if($_GET["error"] == "stmtfailed"){
                echo "<p>Something went wrong, try again!</p>";
            }
            else if($_GET["error"] == "none"){
            }
        }
    ?>
<?php
    include_once 'footer.php'
?>