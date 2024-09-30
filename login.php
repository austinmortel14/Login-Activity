<?php 
session_start();
include "db.conn.php";

if (isset($_POST["username"]) && $_POST["password"]) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$username = validate($_POST['username']);
$pass = validate($_POST['password']);

if(empty($username)){
header("Location: index.php?error=username is required");
exit();
}
else if(empty($pass)){
    header("Location index.php?error=password is required");
}
$sql = "SELECT * FROM users WHERE username= '$username' AND password='$pass'";
$results = mysqli_query($conn, $sql);

if (mysqli_num_rows($results) === 1){
    $row = mysqli_fetch_assoc($results);
    if($row['username']=== $username && $row['password']=== $pass){
        echo"Logged In";
        $_SESSION["username"] = $row["username"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["id"] = $row["id"];
        header("Location: home.php");
        exit();
    }
    else {
        header("Location: index.php?error=Incorrect username or password");
    }
}
else{
    header("Location: index.php");
    exit();
}