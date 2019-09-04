<?php
  include("header.php");
?>
<title>Internship | Internshala</title>
</head>

<body>

    <?php

    include("db.php");
    $internship_id = $_GET["id"];
    $query = "SELECT * FROM internships WHERE id = '$internship_id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    if(!$row>0){
      header("Location: index.php");
    }else{
      if(isset($_COOKIE["user_id"])){
        $user_id = $_COOKIE["user_id"]-5;
        $internship_id = $row["id"];
        $offer_query = "SELECT * FROM offers WHERE user_id = '$user_id' AND internship_id = '$internship_id'";
        $offer_result = mysqli_query($conn,$offer_query);
        $offer_row = mysqli_fetch_assoc($offer_result);
      }
    }

  ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Internshala</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <?php 
              if(isset($_COOKIE["account_type"])){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_COOKIE["account_type"]; ?>_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary text-danger" href="logout.php">Log Out</a>
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
        <div class="card my-5 mx-auto w-100">
            <h3 class="card-header text-primary"><?php echo $row["name"]; ?></h3>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["company_name"]; ?></h5>
            </div>
            <div class="card-body">
                <p class="card-text text-primary"><?php echo $row["details"]; ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Duration: <span class="text-primary"><?php echo $row["duration"]; ?>
                        months</span></li>
                <li class="list-group-item">Stipend: <span class="text-primary">₹ <?php echo $row["stipend"]; ?></span>
                </li>
            </ul>
            <?php
                      if(isset($_COOKIE["account_type"]) && $_COOKIE["account_type"]=="student" && !$offer_row>0){
                    ?>
            <div class="card-body">
                <form action="internship_application_handler.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <input type="hidden" name="internship_id" value="<?php echo $internship_id; ?>">
                    <input type="hidden" name="company_name" value="<?php echo $row["company_name"]; ?>">
                    <button type="submit" class="btn btn-primary">Apply Now</button>
                </form>
            </div>
            <div class="card-footer text-muted">
                Not Applied
            </div>
            <?php
                      }elseif(isset($_COOKIE["account_type"]) && $_COOKIE["account_type"]=="student" && $offer_row>0){
                    ?>
            <div class="card-body">
                <button class="btn btn-primary" disabled>Apply Now</button>
            </div>
            <div class="card-footer text-muted">
                Applied
            </div>
            <?php
                      }
                    ?>
        </div>
        <?php
                      if(isset($_COOKIE["account_type"]) && $_COOKIE["account_type"]=="employer"){
                    ?>
        <div class="my-5">
            <div class="text-center">Only a <b class="text-primary">Student</b> can apply</div>
        </div>
        <?php
                      }elseif(!isset($_COOKIE["account_type"])){
                    ?>
        <div class=" my-5">
            <div class="text-center">Are You a <b class="text-primary">Student</b>? <a href="login.php">Login Now</a> to
                apply.</div>
        </div>
        <?php
                      }
                    ?>
    </div>

    <?php 
  mysqli_close($conn);  
  include("footer.php");
?>