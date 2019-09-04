<?php

    include("db.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $internship_id = $_POST["internship_id"];
        $selected = $_POST["selection"];
        $query="UPDATE offers SET selected=$selected WHERE id='$internship_id'";
        $result=mysqli_query($conn,$query);
        if($result){
            header("Location: employer_dashboard.php");
        }
    }else{
        header('location: login');
    }
    mysqli_close($conn);

?>