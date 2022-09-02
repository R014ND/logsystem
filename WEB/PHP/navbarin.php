<li><a href="index.php">Index</a></li>
<?php
    if("admin" === $_SESSION["userType"]) : ?>
        <li><a href="projects.php">Projects</a></li>
        <li><a href="addusers.php">Add users</a></li>
        <li><a href="newproject.php">New project</a></li>
    <?php endif; ?>
    
    <li>
        <form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit" class="logout">Log out</button>
        </form>
    </li>
