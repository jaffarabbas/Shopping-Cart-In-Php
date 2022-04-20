<?php

session_start();
include("dbconnection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['purchase'])) {
        $query = "INSERT INTO `order_manager`(`Full_Name`, `Phone_No`, `Address`, `Pay_Mode`) VALUES('" . $_POST['fullname'] . "','" . $_POST['phone_num'] . "','" . $_POST['address'] . "','" . $_POST['paymod'] . "')";
        if (mysqli_query($connection, $query)) {
            $Order_ID = mysqli_insert_id($connection);
            $query2 = "INSERT INTO `user_orders`(`Order_Id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($connection, $query2);
            if ($stmt) {
                //isii = integer, string, integer, integer it is the database datatypes
                mysqli_stmt_bind_param($stmt, "isii", $Order_ID, $Item_Name, $Price, $Quantity);
                //insert all cart data into database
                foreach($_SESSION['cart'] as $key => $value){
                    $Item_Name = $value['Item_Name'];
                    $Price = $value['Price'];
                    $Quantity = $value['Quantity'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "<script>
                        alert('Order Placed');
                        window.location.href='mycart.php';
                     </script>";
            } else {
                echo "<script>
                        alert('Query Prepare Error');
                        window.location.href='mycart.php';
                     </script>";
            }
        } else {
            echo "<script>
                    alert('CANNOT CONNECT TO DATABASE');
                    window.location.href='mycart.php';
                 </script>";
        }
    }
}
