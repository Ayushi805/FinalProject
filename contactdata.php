
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks for connecting.</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 pt-5">
        
    <?php

// servername => localhost
// username => root
// password => empty
// database name => staff
$conn = mysqli_connect("localhost", "root", "", "login");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

// Taking all 3 values from the form data(input)
$email = $_REQUEST['email'];
$phno = $_REQUEST['phno'];
$feedback = $_REQUEST['feedback'];


// Performing insert query execution
// here our table name is staff
$sql = "INSERT INTO contact VALUES ('$email',
    '$phno','$feedback')";

if(mysqli_query($conn, $sql)){
    echo "<h1>Thanks for connecting!"
        . " Your details have been recorded."
        . " We'll reach out to you soon! </h1>";

} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <div class="container">
    <img src="https://st4.depositphotos.com/7781012/38993/v/950/depositphotos_389932252-stock-illustration-people-holding-thank-you-woman.jpg" alt="thankyou">
    <br>
    <div class="home text-center">
    <button class="btn btn-success m-3 px-5" onclick="location.href = 'login.php';">Go to Home Page</button>
    </div>
    <hr>
    <h6 class="text-center">Follow us on </h6>
    <div class="socialapps text-center">
    <button  class="btn" ><img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="" width="30px"></button>
    <button  class="btn" ><img src="https://assets.stickpng.com/images/580b57fcd9996e24bc43c521.png" alt="" width="30px"></button>
    <button  class="btn" ><img src="https://brandlogos.net/wp-content/uploads/2016/11/twitter-icon-square-logo-preview.png" alt="" width="30px"></button>
    <button  class="btn" ><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Facebook_logo_%28square%29.png/240px-Facebook_logo_%28square%29.png" alt="" width="30px"></button>    
    </div>
</div>

</body>
</html>
