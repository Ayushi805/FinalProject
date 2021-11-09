<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}

  $c=0;
  if(isset($_SESSION['cart']))
  {
      $c=count($_SESSION['cart']);
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

    <title>Contact us</title>
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

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#"><b>Project</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li> -->



            </ul>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <img src="https://www.virtualdj.com/images/v9/menu/menu-login.png" width="30px"> <?php echo $_SESSION['username'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart (<?php echo $c; ?>)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row">
        <div class="col-lg-5 mt-5">
            <div class="pic m-5 p-2">
            <img src="https://cdn.dribbble.com/users/3822476/screenshots/13953499/contact_us_illustration_4x.png" alt="picture" width="800px">
            </div>
        </div>
        <div class="col-lg-6 px-5 mx-5">
            <div class="container mt-1 pt-5 mx-5 px-4">
                <h3 class="mt-5">Connect with us</h3>
                <hr>
                <form action="contactdata.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="text" style="height: 50px" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phno">Phone number</label>
                            <input type="text"  style="height: 50px"  class="form-control" name="phno" id="phno" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="feedback">Write to us</label>
                        <input type="text"  style="height: 100px" class="form-control" name="feedback" id="feedback" placeholder="Please provide feedback">
                    </div>
                    
                    <br>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary " style="width: 300px; height: 50px">Connect</button>
                    </div>
                    <br>
                    <hr>
                    <h6 class="text-center">Follow us on </h6>
    <div class="socialapps text-center">
    <button  class="btn" ><img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="" width="30px"></button>
    <button  class="btn" ><img src="https://assets.stickpng.com/images/580b57fcd9996e24bc43c521.png" alt="" width="30px"></button>
    <button  class="btn" ><img src="https://brandlogos.net/wp-content/uploads/2016/11/twitter-icon-square-logo-preview.png" alt="" width="30px"></button>
    <button  class="btn" ><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Facebook_logo_%28square%29.png/240px-Facebook_logo_%28square%29.png" alt="" width="30px"></button>    
    </div>
                </form>
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