<?php
  include("header.php");
?>
<title>Internshala</title>
</head>

<body>

    <?php 
include('db.php');
$query="SELECT * FROM internships";
$result=mysqli_query($conn,$query);
?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Internshala</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <?php
                 if(isset($_COOKIE["account_type"])){
                  if($_COOKIE["account_type"]=="employer"){
                ?>
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <?php
                  }else{
                ?>
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <?php
                  }
                   echo $_COOKIE["account_type"];
                 }else{
                   echo "Guest";
                 }
                ?>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <?php 
              if(isset($_COOKIE["account_type"])){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_COOKIE["account_type"]; ?>_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary text-danger" href="logout.php">Log Out <i class="fa fa-sign-out"
                            aria-hidden="true"></i></a>
                </li>
                <?php
              }else{
                ?>
                <li class="nav-item">
                    <a class="btn btn-primary text-light" href="login.php">Log In <i class="fa fa-sign-in"
                            aria-hidden="true"></i></a>
                </li>
                <?php
              }
            ?>
            </ul>
        </div>
    </nav>

    <div class="container pb-5">

        <div class="mt-5 text-center">
            <h1>Internships</h1>
            <h6 class="text-muted">Apply Now</h6>
        </div>

        <div class="row my-5 mx-auto">

            <?php
	            while($row=mysqli_fetch_assoc($result)){
            ?>
            <div class="col-md-4 mb-3 text-center d-flex justify-content-center">

                <div class="card text-white bg-primary h-100 w-100">
                    <?php 
                      if(isset($_COOKIE["account_type"]) && $_COOKIE["account_type"]=="student"){
                        $id = $row['id'];
                        $user_id = $_COOKIE["user_id"]-5;
                        $application_query = "SELECT * FROM offers WHERE user_id ='$user_id' AND internship_id = $id";
                        $application_result = mysqli_query($conn,$application_query);
                        $application_row = mysqli_fetch_assoc($application_result);
                        if($application_row>0){
                    ?>
                    <div class="card-header text-success">Applied</div>
                    <?php 
                        }else{
                        ?>
                    <div class="card-header text-danger">Not Applied</div>
                    <?php
                        }
                      }
                    ?>
                    <div class="card-body d-flex align-items-center justify-content-center flex-column">
                        <h4 class="card-title "><?php echo $row['name']; ?></h4>
                        <p class="card-text"><?php echo $row['company_name']; ?></p>
                        <div class="m-2">
                            <span class="p-2 text-muted">Duration</span>
                            <span class="p-2 text-muted">Stipend</span>
                        </div>
                        <div class="m-2">
                            <span class="p-2"><?php echo $row['duration']; ?> Months</span>
                            <span class="p-2">₹ <?php echo $row['stipend']; ?></span>
                        </div>
                    </div>
                    <a href="internship.php?id=<?php echo $row["id"]; ?>" class="card-link text-light pb-3"><i
                            class="fa fa-eye" aria-hidden="true"></i> View</a>
                </div>

            </div>
            <?php 
              }
            ?>

        </div>

        <blockquote class="blockquote text-center m-5">
            <p class="mb-0">Two Internship per semester should be the target.</p>
            <footer class="blockquote-footer"><cite title="Source Title">Pratyay Rudra</cite></footer>
        </blockquote>

    </div>

    <?php 
  mysqli_close($conn);  
  include("footer.php");
?>