<?php
  include("header.php");
?>
<title>Student Dashboard | Internshala</title>
</head>

<body>

    <?php

  if(!isset($_COOKIE["account_type"]) || $_COOKIE["account_type"]!="student"){
    header("Location: login.php");
  }else{
    include("db.php");
    $id = $_COOKIE["user_id"]-5;
    $query="SELECT * FROM offers WHERE user_id = $id";
    $result=mysqli_query($conn,$query);
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
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <?php
                    echo $_COOKIE["account_type"];
                ?>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $_COOKIE["account_type"]; ?>_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary text-danger" href="logout.php">Log Out <i class="fa fa-sign-out"
                            aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container pb-5">

        <div class="mt-5 text-center">
            <h1>Internships Applied To</h1>
            <h6 class="text-muted">Apply More To Increase Chance</h6>
        </div>

        <div class="row my-5 mx-auto">

            <?php
            while($row = mysqli_fetch_assoc($result)){
              $internship_id = $row["internship_id"];
              $application_query = "SELECT * FROM internships WHERE id = $internship_id";
              $application_result = mysqli_query($conn,$application_query);
              $application_row = mysqli_fetch_assoc($application_result);
          ?>
            <div class="col-md-4 mb-3 text-center d-flex justify-content-center">
                <div class="card text-white bg-primary h-100 w-100">
                    <?php
                      if($row["selected"]==1){
                    ?>
                    <div class="card-header text-success">Selected</div>
                    <?php
                      }else{
                    ?>
                    <div class="card-header text-danger">Not Selected</div>
                    <?php
                      }
                    ?>
                    <div class="card-body d-flex align-items-center justify-content-center flex-column">
                        <h4 class="card-title "><?php echo $application_row["name"]; ?></h4>
                        <p class="card-text"><?php echo $application_row["company_name"]; ?></p>
                        <div class="m-2">
                            <span class="p-2 text-muted">Duration</span>
                            <span class="p-2 text-muted">Stipend</span>
                        </div>
                        <div class="m-2">
                            <span class="p-2"><?php echo $application_row["duration"]; ?> Months</span>
                            <span class="p-2">₹ <?php echo $application_row["stipend"]; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
          ?>

        </div>

        <blockquote class="blockquote text-center m-5">
            <p class="mb-0">I too got an internship after several attempts so don't be disheartend if not selected.</p>
            <footer class="blockquote-footer"><cite title="Source Title">Pratyay Rudra</cite></footer>
        </blockquote>

    </div>

    <?php 
  mysqli_close($conn);  
  include("footer.php");
?>