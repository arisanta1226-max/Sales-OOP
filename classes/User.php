<?php

require_once "database.php";

class User extends Database
{

public function register($request)
{
    $first_name = $request['first_name'];
    $last_name = $request['last_name'];
    $username = $request['username'];
    $password = password_hash($request['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO Users (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password')";

    if($this->conn->query($sql)){
        header('location: ../views/index.php');
        exit();
    }else{
        die('Error creating the user ' . $this->conn->error);
    }
}

public function login($request)
{
    $username = $request['username'];
    $password = $request['password'];

    $sql = "SELECT * FROM Users WHERE username = '$username'";

    $result = $this->conn->query($sql);

    if($result->num_rows == 1){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password']))
            {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                header('location: ../views/dashboard.php');
                exit();
            }else{
                die('password is incorrect.');
            }
    }else{
        die('Username not found.');
    }
}
}

?>