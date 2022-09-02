<?php
    if(isset($_POST["submit-project"])){
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        $user = $_POST["users"];

        require_once 'dbconn.inc.php';
        require_once 'functions.inc.php';
        
        if(emptyInputProject($name, $desc, $user) !== false){
            header("location: ../newproject.php?error=emptyinput");
            exit();
        }
        else{
            createProject($conn, $name, $desc, $user);
        }
    }