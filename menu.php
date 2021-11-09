<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <style>
      

        .navbar-custom {
            background-color: #5e9b8a;
        }


        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text,
        .nav-link {
            color: white;
        }

        a:hover {
            color: #2f453c;
        }

        .btn-primary,
        .btn-primary:hover,
        .btn-primary:active,
        .btn-primary:visited {
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
                    <a class="nav-link" href="upload.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>


            </ul>

        </div>
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <img src="https://www.virtualdj.com/images/v9/menu/menu-login.png" width="30px"> <?php echo $_SESSION['username'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
<div class="container mt-5 mb-5">
        <div class="row">

            <div class="col-lg-3">
                <div class="card shadow " style="width: 16rem;">
                    <img src="https://i.ebayimg.com/images/g/IYAAAOSw5J5gLMy2/s-l640.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center ">
                        <h5 class="card-title">Tea</h5>
                        <p class="card-text">Price : ₹200</p>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-3 ">
                <div class="card shadow " style="width: 16rem;">
                    <img src="https://st.focusedcollection.com/13397678/i/650/focused_168131434-stock-photo-white-brown-toast-toast-rack.jpg" height="253px" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Bread</h5>
                        <p class="card-text">Price : ₹50</p>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-3 ">
                <div class="card shadow " style="width: 16rem;">
                    <img src="https://i.pinimg.com/originals/97/03/79/9703793b2e2651b8a0bddc760e3c4b9b.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Coffee</h5>
                        <p class="card-text">Price : ₹280</p>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="card shadow " style="width: 16rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfTLmxtrHbWRsFBu627Y4HCf8k-mZPGpZkWA&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Cornflakes</h5>
                        <p class="card-text">Price : ₹100</p>
                
                    </div>
                </div>
            </div>
            
           
        
        </div>

</div>
    <div class="container mt-5 mb-5">
        <div class="row">
        <div class="col-lg-3 ">
                <div class="card shadow " style="width: 16rem;">
                    <img src="https://m.media-amazon.com/images/I/711ln258upL._SL1000_.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Chocos</h5>
                        <p class="card-text">Price : ₹200</p>
                     
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="card shadow " style="width: 16rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQP2DIvEJtcXUmL5WXVXc-4cTKbwJ7qlj4Pxg&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kurkure</h5>
                        <p class="card-text">Price : ₹20</p>
                     
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="card shadow " style="width: 16rem;">
                    <img src="https://i.pinimg.com/originals/fa/f5/c4/faf5c45bc24659d0804484a588e06f4f.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Lays</h5>
                        <p class="card-text">Price : ₹20</p>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="card shadow " style="width: 16rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6FkE5HrT2cBcnSmc0Mdy8ORqUREjdJ4CHKw&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">ChocoPie</h5>
                        <p class="card-text">Price : ₹40</p>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 pb-5">
        <div class="row">
            
        <div class="col-lg-3 ">
                <div class="card shadow " style="width: 16rem;">
                    <img src="https://mydukaan-prod.s3.amazonaws.com/620788/849793db-8471-4b4f-9da8-a8cf7157de79.png" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Butter</h5>
                        <p class="card-text">Price : ₹80</p>
                     
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="card shadow " style="width: 16rem;">
                    <img src="https://m.media-amazon.com/images/I/71jQMW9E-WL._SL1080_.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Juice</h5>
                        <p class="card-text">Price : ₹50</p>
                     
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="card shadow " style="width: 16rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9sGkJdxKk7PQRD2uu-eTd4RfU8ZFr-r7tpg&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Chocolate</h5>
                        <p class="card-text">Price : ₹130</p>
                       
                    </div>
                </div>
            </div>
          
            <div class="col-lg-3">
                <div class="card shadow" style="width: 16rem;">
                    <img src="https://cpimg.tistatic.com/05899545/b/4/Organic-Brown-Sugar.jpg?tr=n-w410" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title ">Sugar</h5>
                        <p class="card-text ">Price : ₹150</p>
                        
                    </div>
                </div>
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