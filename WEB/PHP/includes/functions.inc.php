<?php
    //error handling
    function emptyInputSignup($name, $uid, $pwd, $pwdr, $isAdmin){
        $result;
        if(empty($name) || empty($uid) || empty($pwd) || empty($pwdr) || empty($isAdmin)){
            $result = true;
        }
        else{
            $result = false;
        }

        return $result;
    }

    function emptyInputLogin($uid, $pwd){
        $result;
        if(empty($uid) || empty($pwd)){
            $result = true;
        }
        else{
            $result = false;
        }

        return $result;
    }

    function invalidUid($uid){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $uid)){
            $result = true;
        }
        else{
            $result = false;
        }

        return $result;
    }

    function pwdMatch($pwd, $pwdr){
        $result;
        if($pwd !== $pwdr){
            $result = true;
        }
        else{
            $result = false;
        }

        return $result;
    }

    function uidExists($conn, $uid){
        $sql = "SELECT * FROM users WHERE usersUid = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $uid);
        mysqli_stmt_execute($stmt);

        $resultdata = mysqli_stmt_get_result($stmt);
        
        if($row = mysqli_fetch_assoc($resultdata)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }
    //-------------------------

    function createUser($conn, $name, $uid, $pwd, $isAdmin){
        $sql = "INSERT INTO users (usersName, usersUid, usersPassword, userType) VALUES (?, ?, ?, ?);";
        
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../addusers.php?error=stmtfailed");
            exit();
        }

        $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
        
        mysqli_stmt_bind_param($stmt, "ssss", $name, $uid, $hashPwd, $isAdmin);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../addusers.php?error=none");
        exit();
    }

    function loginUser($conn, $uid, $pwd){
        
        $uidExists = uidExists($conn, $uid);

        if($uidExists === false){
            header("location: ../login.php?error=loginfailed");
            exit();
        }

        $hashPwd = $uidExists["usersPassword"];
        $checkPwd = password_verify($pwd, $hashPwd);

        if($checkPwd === false){
            header("location: ../login.php?error=loginfailed");
            exit();
        }
        else if($checkPwd === true){
            session_start();
            $_SESSION["userId"] = $uidExists["usersId"];
            $_SESSION["userName"] = $uidExists["usersName"];
            $_SESSION["userUid"] = $uidExists["usersUid"];
            header("location: ../index.php?success");
            echo $_SESSION["userUid"];
            exit();
        }
    }