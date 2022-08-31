<?php
    include_once 'header.php';
?>
    <link rel="stylesheet" href="..\CSS\login.css">
    <div class="login-wrapper">
        <form action="includes/login.inc.php" method="post">
            <p>Username</p>
            <input type="text" name="uid" placeholder="Username">
            <p>Password</p>
            <input type="password" name ="pwd" placeholder="Password">
            <button type="submit" name="submit">Log In</button>
        </form>
    </div>

<?php
    include_once 'footer.php';
?>