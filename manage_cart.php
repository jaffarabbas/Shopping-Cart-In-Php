<!-- cart code -->
<?php

session_start();

function alertMaker($flag)
{
    if ($flag) {
        echo "<script>alert('Added to cart');</script>";
    } else {
        echo "
        <script>
            alert('Item is already added in the cart');
            window.location.href='index.php';
        </script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Add_To_Cart'])) {
        if (isset($_SESSION['cart'])) {
            //item in array
            $item_array = array_column($_SESSION['cart'], 'Item_Name');
            if (in_array($_POST['Item_Name'], $item_array)) {
                alertMaker(false);
            } else {
                //add new item to session array
                $count_cart_index = count($_SESSION['cart']);
                $_SESSION['cart'][$count_cart_index] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                alertMaker(true);
            }
        } else {
            //add first item to session array
            $_SESSION['cart'][0] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
            alertMaker(true);
        }
    }
}

?>