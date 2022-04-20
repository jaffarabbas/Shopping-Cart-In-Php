<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>My Cart</h1>
            </div>
            <div class="col-lg-9">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Serial No</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                //appending price to total
                                $scount = $key + 1;
                                echo "
                                    <tr>
                                        <th scope='row'>$scount</th>
                                        <td>$value[Item_Name]</td>
                                        <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                                        <td>
                                            <form action='manage_cart.php' method='POST'>
                                                <input class='text-center iquantity' name='Mode_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'/>
                                                <input type='hidden' name='Item_Name' value='$value[Item_Name]'/>
                                            </form>
                                        </td>
                                        <td class='itotal'></td>
                                        <td>
                                            <form action='manage_cart.php' method='POST'>
                                                <button name='Remove_Item' class='btn btn-small btn-outline-danger'>REMOVE</button>
                                                <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                            </form>
                                        </td>
                                    </tr>
                                    ";
                            }
                        } else {
                            echo "
                                <tr>
                                    <td>No data found</td>
                                </tr>
                                ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3">
                <div class="border bg-light rounded p-4">
                    <h3>Grand Total : </h3>
                    <h5 class="text-right" id="grandTotal"></h5>
                    <br>
                    <?php
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    ?>
                        <form action="purchase.php" method="POST">
                            <div class="form-group">
                                <label>Full name</label>
                                <input type="text" name="fullname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Number</label>
                                <input type="number" name="phone_num" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymod" id="exampleRadios1" value="COD" checked required>
                                <label class="form-check-label" for="exampleRadios1">
                                    Cash on Delivery
                                </label>
                            </div>
                            <br>
                            <button class="btn btn-primary btn-block" name="purchase">Make Purchace</button>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var grandTotal = document.getElementById('grandTotal');

    function subTotal() {
        var grandTotalValue = 0;
        for (i = 0; i < iprice.length; i++) {
            itotal[i].innerText = (iprice[i].value * iquantity[i].value);
            grandTotalValue += parseInt(itotal[i].innerText);
        }
        grandTotal.innerText = grandTotalValue;
    }

    subTotal();
</script>

</html>