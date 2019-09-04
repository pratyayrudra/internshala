<?php
  include("header.php");
?>
<title>Add Internship | Internshala</title>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
</head>

<body>

    <?php 

    if(!isset($_COOKIE["account_type"]) || $_COOKIE["account_type"]!="employer"){
      header("Location: index.php");
    }else{
      include("db.php");
      $employer_id = $_COOKIE["user_id"]-5;
      $query = "SELECT * FROM offers WHERE employer_id = '$employer_id'";
      $result = mysqli_query($conn,$query);
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
                    <a class="btn btn-primary text-danger" href="logout.php">Log Out <i class="fa fa-sign-out"
                            aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container p-5">

        <div class="text-center">
            <h1>Add New Internship</h1>
            <h6 class="text-muted">Add Now</h6>
        </div>

        <form class="py-5" action="internship_add_handler.php" method="POST">
            <div class="form-group">
                <label>Internship Name</label>
                <input type="text" class="form-control" placeholder="Eg: Web Development" name="name" id="name"
                    required />
            </div>
            <div class="form-group">
                <label>Duration</label>
                <select class="form-control" id="duration" name="duration" required>
                    <option value="1">1 month</option>
                    <option value="2">2 months</option>
                    <option value="3">3 months</option>
                    <option value="4">4 months</option>
                    <option value="5">5 months</option>
                    <option value="6">6 months</option>
                </select>
            </div>
            <div class="form-group">
                <label>Stipend</label>
                <input type="number" class="form-control" placeholder="Eg: 2000" name="stipend" id="stipend" required />
            </div>
            <div class="form-group">
                <label>Internship Details</label>
                <textarea class="form-control" id="editor" name="details" rows="10" required></textarea>
            </div>
            <div class="alert alert-dismissible alert-warning">
                <button type="button" class="close" id="alert_close" data-dismiss="alert">&times;</button>
                <h4 class="alert-heading">Warning!</h4>
                <p class="mb-0">Details can't be empty.</p>
            </div>
            <button id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
    CKEDITOR.replace("editor");
    $(document).ready(() => {
        $(".alert").hide();
        $("#submit").click(() => {
            if (CKEDITOR.instances['editor'].getData() == '') {
                $(".alert").show();
                $("#submit").attr("disabled", true);
            }
        });
        $("#alert_close").click(() => {
            $("#submit").attr("disabled", false);
        });
    });
    </script>

    <?php 
  mysqli_close($conn);  
  include("footer.php");
?>