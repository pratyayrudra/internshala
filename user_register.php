<?php
  include("header.php");
?>
<title>Register | Internshala</title>
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
                <li class="nav-item">
                    <a class="btn btn-primary text-light" href="login.php">Log In <i class="fa fa-sign-in"
                            aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container py-5 d-flex flex-column justify-content-center align-items-center">
        <div class="alert alert-dismissible alert-warning" id="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p class="mb-0">Email ID is already in use.</a>.</p>
        </div>
        <span class="badge badge-pill badge-primary my-3 mx-5 py-3 px-5">Internshala</span>

        <form class="text-center pb-5" action="user_register_handler.php" method="POST">
            <h4 class="text-muted">Sign Up</h4>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control border border-primary rounded-pill"
                    placeholder="User / Company Name" name="name" id="name" required />
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control border border-primary rounded-pill" placeholder="Enter email"
                    name="email" id="email" required />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control border border-primary rounded-pill" placeholder="Password"
                    name="password" id="password" required />
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="account_type" value="employer" checked />
                <label class="form-check-label">
                    Employer
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="account_type" value="student" />
                <label class="form-check-label">
                    Student
                </label>
            </div>
            <button type="submit" class="btn btn-primary border rounded-pill my-2" id="submit">
                Register
            </button>
        </form>
    </div>



    <script>
    $(document).ready(() => {
        $("#alert").hide();
        $("input").keyup(() => {
            if ($("#email").val() != '') {
                $.ajax({
                    type: "POST",
                    url: "email_checker.php",
                    data: {
                        "data": $("#email").val()
                    },
                    success: (data) => {
                        if (data == "exits") {
                            $("#alert").show();
                            $("#submit").attr("disabled", true);
                        } else {
                            $("#alert").hide();
                            $("#submit").attr("disabled", false);
                        }
                    }
                })
            }
        })
    });
    </script>

    <?php
  include("footer.php");
?>