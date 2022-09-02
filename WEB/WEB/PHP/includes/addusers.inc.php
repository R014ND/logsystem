<?php

    //auth
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdr = $_POST["pwdr"];
        $isAdmin = $_POST["isAdmin"];

        require_once 'dbconn.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputSignup($name, $uid, $pwd, $pwdr, $isAdmin) !== false){
            header("location: ../addusers.php?error=emptyinput");
            exit();
        }
        if(invalidUid($uid) !== false){
            header("location: ../addusers.php?error=invaliduid");
            exit();
        }
        if(pwdMatch($pwd, $pwdr) !== false){
            header("location: ../addusers.php?error=pwddnm");
            exit();
        }
        if(uidExists($conn, $uid) !== false){
            header("location: ../addusers.php?error=uidtaken");
            exit();
        }

        createUser($conn, $name, $uid, $pwd, $isAdmin);

    }
    else{
        header("location: ../login.php");
        exit();
    }