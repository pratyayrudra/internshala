<?php
    include("db.php");
        $email = $_POST['data'];
        $query = "SELECT * FROM user WHERE email='$email'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result);
        if($row>0){
            echo "exits";
        }
    mysqli_close($conn);
?>