<?php
  include("header.php");
?>
<title>Login | Internshala</title>
</head>

<body>
    <?php 
  if(isset($_COOKIE["account_type"])){
    header("Location: index.php");
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
                    <a class="nav-link">Guest</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container py-5 d-flex flex-column justify-content-center align-items-center">
        <span class="badge badge-pill badge-primary my-3 mx-5 py-3 px-5">Internshala</span>

        <?php
        if(isset($_COOKIE['error'])){
          ?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Wrong</strong> Email ID / Password.
        </div>
        <?php
        }
      ?>

        <form class="text-center" action="login_handler.php" method="POST">
            <h4 class="text-muted">Log In</h4>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control border border-primary rounded-pill" placeholder="Enter email"
                    name="email" required />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control border border-primary rounded-pill" placeholder="Password"
                    name="password" required />
            </div>
            <button type="submit" class="btn btn-primary border rounded-pill">
                Login
            </button>
        </form>
        <div class="row my-5">
            <div class="col text-center">Not yet registered? <a href="user_register.php">Sign Up</a> now</div>
        </div>
    </div>
    <?php 
      include("footer.php");
    ?>