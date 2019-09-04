<?php

    include("db.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST["name"];
        $duration = $_POST["duration"];
        $stipend = $_POST["stipend"];
        $details = $_POST["details"];
        $employer_id = $_COOKIE["user_id"]-5;

        $company_query = "SELECT * FROM user WHERE id = '$employer_id'";
        $company_result = mysqli_query($conn,$company_query);
        $company_row = mysqli_fetch_assoc($company_result);
        $company_name = $company_row["name"];

        $query = "INSERT INTO internships(name,duration,stipend,details,company_name) VALUES ('$name','$duration','$stipend','$details','$company_name')";
        $result = mysqli_query($conn,$query);
        if($result){
            header("Location: index.php");
        }
    }else{
        header('location: login');
    }
    mysqli_close($conn);

?>