<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}

$c = 0;
if (isset($_SESSION['cart'])) {
    $c = count($_SESSION['cart']);
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
        <a class="navbar-brand" href="#"><b>PROJECT</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="welcome.php">Home</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li> -->
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
                    <a class="nav-link" href="cart.php">Cart (<?php echo $c; ?>)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>




    <div class="container pt-5">


        <div class="col-lg-12">
            <?php
            // echo "<h3 class='mt-2 text-secondary'>Image uploaded : </h3>";
            if (isset($_FILES['image'])) {
                $file_name = $_FILES['image']['name'];
                $file_tmp = $_FILES['image']['tmp_name'];
                move_uploaded_file($file_tmp, "images/" . $file_name);

                // echo '<img src="images/' . $file_name . '" style="width:70%";>';

                shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "C:\\xampp\\htdocs\\FinalProject\\images\\' . $file_name . '" out');

                // echo "<br><h3>After Scanning</h3><pre>";

                $myfile = fopen("out.txt", "r") or die("Unable to open file!");
                // echo fread($myfile,filesize("out.txt"));
                fclose($myfile);
                echo "</pre>";
            }
            ?>

            <?php
            $file = fopen("out.txt", "r");
            $Items = array();
            while (!feof($file)) {
                $Items[] = fgets($file);
            }
            // echo "<br><h3>Storing each item in array</h3>";
            // fclose($file);
            // print_r($Items);
            $NoOfItems = count($Items) - 2;

            echo "<h5 class='mt-5 text-secondary text-center'>No of Items scanned in the image: $NoOfItems</h5>";
            ?>
        </div>

        <?php
        if ($NoOfItems == 3) {
            echo "
                <div class='col-lg-12'>
                <ul class='list-group px-5'>
                    <li class='list-group-item list-group-item-success'>List</li>


                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-10'>
                               <h5 class='card-title'>Kurkure</h5>
                               
                            </div>
                            <div class='col-lg-2'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Kurkure'>
                             <input type='hidden' name='Price' value='20'>
                            </div>
                        </div>
                </form>
                       
                    </li>
                        
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-10'>
                               <h5 class='card-title'>Lays</h5>
                               
                            </div>
                            <div class='col-lg-2'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Lays'>
                             <input type='hidden' name='Price' value='20'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-10'>
                               <h5 class='card-title'>Choco Pie</h5>
                               
                            </div>
                            <div class='col-lg-2'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Chocopie'>
                             <input type='hidden' name='Price' value='40'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>
                </ul>
            </div>
                ";
        }

        if ($NoOfItems == 4) {
            echo "
                <div class='col-lg-12'>
                <ul class='list-group px-5'>
                    <li class='list-group-item list-group-item-success'>List</li>


                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-10'>
                               <h5 class='card-title'>Bread</h5>
                               
                            </div>
                            <div class='col-lg-2'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Bread'>
                             <input type='hidden' name='Price' value='50'>
                            </div>
                        </div>
                </form>
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-10'>
                               <h5 class='card-title'>Tea</h5>
                               
                            </div>
                            <div class='col-lg-2'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Tea'>
                             <input type='hidden' name='Price' value='200'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-10'>
                               <h5 class='card-title'>Coffee</h5>
                               
                            </div>
                            <div class='col-lg-2'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Coffee'>
                             <input type='hidden' name='Price' value='280'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-10'>
                               <h5 class='card-title'>Sugar</h5>
                               
                            </div>
                            <div class='col-lg-2'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Sugar'>
                             <input type='hidden' name='Price' value='150'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>
                </ul>
            </div>
                ";
        }

        if ($NoOfItems == 5) {
            echo "
                <div class='col-lg-12'>
                <ul class='list-group px-5'>
                    <li class='list-group-item list-group-item-success'>List</li>


                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-9'>
                               <h5 class='card-title'>Lays</h5>
                               
                            </div>
                            <div class='col-lg-3'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Lays'>
                             <input type='hidden' name='Price' value='20'>
                            </div>
                        </div>
                </form>
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-9'>
                               <h5 class='card-title'>Chocolate</h5>
                               
                            </div>
                            <div class='col-lg-3'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Chocolate'>
                             <input type='hidden' name='Price' value='130'>
                            </div> 
                        </div>
                </form>
                        
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-9'>
                               <h5 class='card-title'>Tea</h5>
                               
                            </div>
                            <div class='col-lg-3'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Tea'>
                             <input type='hidden' name='Price' value='200'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-9'>
                               <h5 class='card-title'>Coffee</h5>
                               
                            </div>
                            <div class='col-lg-3'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Coffee'>
                             <input type='hidden' name='Price' value='280'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-9'>
                               <h5 class='card-title'>Bread</h5>
                               
                            </div>
                            <div class='col-lg-3'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Bread'>
                             <input type='hidden' name='Price' value='50'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>
                </ul>
            </div>
                ";
        }

        if ($NoOfItems == 7) {
            echo "
                <div class='col-lg-12'>
                <ul class='list-group px-5'>
                    <li class='list-group-item list-group-item-success'>List</li>


                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-9'>
                               <h5 class='card-title'>Bread</h5>
                               
                            </div>
                            <div class='col-lg-3'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Bread'>
                             <input type='hidden' name='Price' value='50'>
                            </div>
                        </div>
                </form>
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-9'>
                               <h5 class='card-title'>Kurkure</h5>
                               
                            </div>
                            <div class='col-lg-3'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Kurkure'>
                             <input type='hidden' name='Price' value='20'>
                            </div> 
                        </div>
                </form>
                        
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-9'>
                               <h5 class='card-title'>Butter</h5>
                               
                            </div>
                            <div class='col-lg-3'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Butter'>
                             <input type='hidden' name='Price' value='80'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-9'>
                               <h5 class='card-title'>Sugar</h5>
                               
                            </div>
                            <div class='col-lg-3'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Sugar'>
                             <input type='hidden' name='Price' value='150'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-9'>
                               <h5 class='card-title'>Juice</h5>
                               
                            </div>
                            <div class='col-lg-3'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Juice'>
                             <input type='hidden' name='Price' value='50'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-9'>
                               <h5 class='card-title'>Tea</h5>
                               
                            </div>
                            <div class='col-lg-3'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Tea'>
                             <input type='hidden' name='Price' value='200'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                <div class='row'>
                            <div class='col-lg-9'>
                               <h5 class='card-title'>Chocos</h5>
                               
                            </div>
                            <div class='col-lg-3'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Chocos'>
                             <input type='hidden' name='Price' value='200'>
                            </div>
                        </div>
                </form>
                        
                       
                    </li>
                </ul>
            </div>
                ";
        }

        if ($NoOfItems == 2) {
            echo "
                <div class='col-lg-12'>
                <ul class='list-group px-5'>
                    <li class='list-group-item list-group-item-success'>List</li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                       <div class='row'>
                            <div class='col-lg-10'>
                               <h5 class='card-title'>Bread</h5>
                               
                            </div>
                            <div class='col-lg-2'>
                            <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                            <input type='hidden' name='Item' value='Tea'>
                             <input type='hidden' name='Price' value='200'>
                            </div>
                         </div>
                        </form>        
                    </li>

                    <li class='list-group-item list-group-item-light'>
                    <form action='managecart.php' method='POST'>
                      <div class='row'>
                        <div class='col-lg-10'>
                           <h5 class='card-title'>Juice</h5>   
                        </div>
                        <div class='col-lg-2'>
                        <button name='Add_to_cart' type='submit' class='btn btn-outline-success'>Add to cart</button>
                        <input type='hidden' name='Item' value='Chocos'>
                         <input type='hidden' name='Price' value='200'>
                        </div>
                     </div>
                    </form>  
                  </li>
    
                </ul>
                 </div>";
        }
        ?>




    </div>

    </div>



    </div>

    <script type="text/javascript">
        var user_list = <?php echo json_encode($Items); ?>;
        var len = user_list.length - 2;

        function please() {
            for (var i = 0; i < len; i++) {
                document.getElementById("getid").innerHTML +=
                    "<h5>" + user_list[i] + "</h5>" +
                    "<button id='addbt'>" + "＋" + "</button>" + "<button id='removebt'>" +
                    " − " + "</button><hr>";
            }
        }

        please();
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>