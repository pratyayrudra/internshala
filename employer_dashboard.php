<?php
  include("header.php");
?>
    <title>Employer Dashboard | Internshala</title>
</head>
<body>
<?php 

  if(!isset($_COOKIE["account_type"]) || $_COOKIE["account_type"]!="employer"){
    header("Location: login.php");
  }else{
    include("db.php");
    $employer_id = $_COOKIE["user_id"]-5;
    $query = "SELECT * FROM offers WHERE employer_id = '$employer_id'";
    $result = mysqli_query($conn,$query);
  }

?>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Internshala</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fa fa-users" aria-hidden="true"></i>
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
              <a class="btn btn-primary text-danger" href="logout.php">Log Out <i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </li>
          </ul>
        </div>
    </nav>

    <div class="container pb-5">

        <div class="row text-center">
          <div class="col mt-5">
              <a href="internship_add.php" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Internships</a>
          </div>
        </div>

        <div class="mt-5 text-center">
            <h1>Candites Who Applied</h1>
            <h6 class="text-muted">Choose wisely</h6>
        </div>

        <div class="row my-5 mx-auto">

          <?php
            while($row = mysqli_fetch_assoc($result)){
              $user_id = $row["user_id"];
              $user_query = "SELECT * FROM user WHERE id = '$user_id'";
              $user_result = mysqli_query($conn,$user_query);
              $user_row = mysqli_fetch_assoc($user_result);

              $internship_id = $row["internship_id"];
              $internship_query = "SELECT * FROM internships WHERE id = '$internship_id'";
              $internship_result = mysqli_query($conn,$internship_query);
              $internship_row = mysqli_fetch_assoc($internship_result);
          ?>
            <div class="col-md-4 mb-3 text-center d-flex justify-content-center">
                <div class="card text-white bg-primary h-100 w-100">
                    <?php
                      if($row["selected"] == 1){
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
                      <h4 class="card-title "><?php echo $user_row["name"]; ?></h4>
                      <p class="card-text"><?php echo $internship_row["name"]; ?></p>
                      <div class="m-2">
                          <span class="p-2 text-muted">Email:</span>
                          <span class="p-2"><?php echo $user_row["email"]; ?></span>
                      </div>
                      <?php
                        if($row["selected"]==0){
                      ?>
                        <form action="internship_selection_handler.php" method="post">
                          <input type="hidden" name="internship_id" value="<?php echo $row["id"]; ?>">
                          <input type="hidden" name="selection" value="1">
                          <button type="submit" class="btn btn-light text-success m-3">Select This Application</button>
                        </form>
                      <?php
                        }else{
                      ?>
                        <form action="internship_selection_handler.php" method="post">
                          <input type="hidden" name="internship_id" value="<?php echo $row["id"]; ?>">
                          <input type="hidden" name="selection" value="0">
                          <button type="submit" class="btn btn-light text-danger m-3">Reject This Application</button>
                        </form>
                      <?php
                        }
                      ?>
                    </div>
                </div>
            </div>
          
          <?php
            }
          ?>

        </div>

        <blockquote class="blockquote text-center m-5">
            <p class="mb-0">Post more internships to give more chances.</p>
            <footer class="blockquote-footer"><cite title="Source Title">Pratyay Rudra</cite></footer>
        </blockquote>

    </div>

<?php 
  mysqli_close($conn);  
  include("footer.php");
?>