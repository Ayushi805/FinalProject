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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cart</title>
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


    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h4 class="mt-4">Hello, <?php echo $_SESSION['username'] ?></h4>
                <a href="menu.php">
                    <h6>Take a look at the products available here!</h6>
                </a>
            </div>

        </div>

    </div>

    <div class="container" style="background-color: white; opacity: 0.8; border-radius: 10px;">


        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>MY CART</h1>
                
            </div>

            <div class="col-lg-9">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Item No.</th>
                            <th scope="col">Item</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>


                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php

                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                // print_r($value);
                                $itemno = $key + 1;

                                echo "
                             <tr>
                               <td>$itemno</td>
                               <td>$value[Item]</td>
                               <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                               <td><input class='text-center iquantity' onchange='subtotal()' type='number' value='$value[Quantity]' min='1' max='10'></td>
                               <td class='itotal'>$value[Price]</td>
                               
                               <td>
                                 <form action='managecart.php' method='POST'>
                                 <button name='RemoveItem' class='btn btn-sm btn-danger'>REMOVE</button>
                                 <input type='hidden' name='Item' value='$value[Item]'>
                                 </form>
                                  
                               </td>
                             </tr>
                             ";
                            }
                        }

                        ?>


                    </tbody>
                </table>
            </div>

            <div class="col-lg-3">
                <div class="border bg-light rounded p-4">
                    <h5>Grand Total:</h5>
                    <h4 class="text-right" id="gtotal"></h4><br>
                    <form class="text-center">
                        <button class="btn btn-primary btn-block">Buy Now</button>
                    </form>
                    <a href="upload.php">
                    <h6 class="mt-4 text-center">Back to items page</h6>
                </a>
                </div>
            </div>
        </div>
    </div>



    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');

        function subtotal() {
            gt = 0;
            for (i = 0; i < iprice.length; i++) {
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }
            gtotal.innerText = gt;
        }

        subtotal();
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>