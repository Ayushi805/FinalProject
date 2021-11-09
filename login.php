<?php
//This script will handle login
session_start();

// check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username + password";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


    if (empty($err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;


        // Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // this means the password is corrct. Allow user to login
                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        //Redirect user to welcome page
                        header("location: welcome.php");
                    }
                }
            }
        }
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Project</title>
    <style>
        /* Modify the background color */
         
        .navbar-custom {
            background-color: #5e9b8a;
        }
        /* Modify brand and text color */
         
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text,
        .nav-link{
            color: white;
        }

        a:hover {
            color: #2f453c;
        }

        .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
         background-color: #5e9b8a !important;
       }
    </style>
</head>

<body >
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#"><b>Project</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li> -->



            </ul>
        </div>
    </nav>

    <div class="row">
    <div class="col-lg-6">
    <div class="container m-5 p-4">
      <img src="https://media.istockphoto.com/vectors/small-people-stand-next-to-a-large-todo-list-vector-id1267267142?k=20&m=1267267142&s=612x612&w=0&h=L-qycNGl5kSTk989mNlKo5E7H9fGtTLRYc6XFpQD3CU=" alt="picture" width="850px">
    </div>
    </div>
    <div class="col-lg-4 mx-5">
    <div class="container m-5 p-5">
        <h3 class="pt-5">Login</h3>
        <hr>

        <form action="" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" style="height: 50px" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="abc@xyz.com">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" style="height: 50px" name="password" class="form-control" id="exampleInputPassword1" placeholder="********">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary" style="width:455px; height: 50px">Submit</button>
        </form>

        <br>
        <h6 class="text-center"><a href="register.php">Don't have an account? Sign up here.</a></h6>
        
    </div>
    </div>
   
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>