<!-- cart code -->
<?php

session_start();

function alertMaker($flag)
{
    if ($flag) {
        echo "<script>
                alert('Added to cart');
                window.location.href='index.php';
             </script>";
    } else {
        echo "
        <script>
            alert('Item is already added in the cart');
            window.location.href='index.php';
        </script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //add yo cart
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
    //remove from cart
    if(isset($_POST['Remove_Item'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['Item_Name'] == $_POST['Item_Name']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>
                        alert('Item removed from cart');
                        window.location.href='mycart.php';
                     </script>";
            }
        }
    }
    //set quantity in session
    if(isset($_POST['Mode_Quantity'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['Item_Name'] == $_POST['Item_Name']){
                $_SESSION['cart'][$key]['Quantity'] = $_POST['Mode_Quantity'];
                echo "<script>
                        window.location.href='mycart.php';
                     </script>";
            }
        }
    }
}

?>