<?php 
    include_once 'header.php'
?>
    <link rel="stylesheet" href="..\CSS\newproject.css">
    
    <div class="newproject-wrapper">
        <form action="includes/createproject.inc.php" method="post">
            <input type="text" name="name" placeholder="Project name">
            <input type="text" name="desc" placeholder="Description">
            <input type="text" list="users" name="users">
            <datalist id="users">
                <?php
                    require 'includes/dbconn.inc.php';
                    $sql = "SELECT * FROM users WHERE userType = 'user';";
                
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    while($row = mysqli_fetch_assoc($result)): ?>
                    <option value=<?php echo $row['usersName'];?>><?php echo $row['usersName'];?></option>
                    <?php endwhile; ?>
            </datalist>
            <button type="submit" name="submit-project">Create project</button>
        </form>
    </div>
<?php
    include_once 'footer.php'
?>