<?php
    include("db.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $account_type = $_POST['account_type'];
        $query="INSERT INTO user(name,email,password,account_type) VALUES('$name','$email','$password','$account_type')";
	    $result=mysqli_query($conn,$query);
	    if($result){
            setcookie("account_type", $account_type, time() + (86400 * 30));
            setcookie("user_id", mysqli_insert_id($conn)+5, time() + (86400 * 30));
            header('Location: index.php');
	    }
    }else{
        header('location: login');
    }
    mysqli_close($conn);
    
?>