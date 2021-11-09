<?php 

session_start();


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Add_to_cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myitems = array_column($_SESSION['cart'], 'Item');
            if(in_array($_POST['Item'], $myitems))
            {
                echo"<script>
                alert('Item already added');
                window.location.href='upload.php';
                </script>
                ";
            }
            else{
                $c=$c+1;
                $count=count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('Item'=>$_POST['Item'], 'Price'=>$_POST['Price'], 'Quantity'=>1);
                echo"<script>
                  
                  window.location.href='upload.php';
                  </script>
                ";
            }
            
        }
        else{
            $_SESSION['cart'][0]=array('Item'=>$_POST['Item'], 'Price'=>$_POST['Price'], 'Quantity'=>1);
            print_r($_SESSION['cart']);

            echo"<script>
            
            window.location.href='upload.php';
            </script>
            ";
        }
    }

    if(isset($_POST['RemoveItem']))
    {
        foreach($_SESSION['cart'] as $key=>$value){
           if($value['Item']==$_POST['Item']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo"<script>
            window.location.href='cart.php';
            </script>
            ";
           }
        }
    }
}

?>
