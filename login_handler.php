<?php

    include("db.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $query="SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result=mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        if($row>0){
            setcookie("account_type", $row["account_type"], time() + (86400 * 30));
            setcookie("user_id", $row["id"]+5, time() + (86400 * 30));
            header('Location: index.php');
        }else{
            setcookie("error", "error", time() + (10));
            header('Location: login.php');
        }
    }else{
        header('location: login');
    }
    mysqli_close($conn);

?>