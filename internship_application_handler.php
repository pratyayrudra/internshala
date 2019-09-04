<?php

    include("db.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $user_id = $_POST["user_id"];
        $internship_id = $_POST["internship_id"];
        $employer_name = $_POST["company_name"];

        $employer_query = "SELECT * FROM user WHERE name = '$employer_name'";
        $employer_result = mysqli_query($conn,$employer_query);
        $employer_row = mysqli_fetch_assoc($employer_result);
        $employer_id = $employer_row["id"];

        $query = "INSERT INTO offers(user_id,employer_id,internship_id,selected) VALUES('$user_id','$employer_id','$internship_id','0')";
        $result = mysqli_query($conn,$query);
        if($result){
            header("Location: internship.php?id=$internship_id");
        }
    }else{
        header('location: login');
    }
    mysqli_close($conn);
    
?>