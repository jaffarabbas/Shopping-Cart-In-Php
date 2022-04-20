<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card">
                        <img src="./images/productPic1.png" class="card-img-top" height="200px" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Necless 0</h5>
                            <p class="card-text">Price : 34 Rs</p>
                            <button type="submit" name="Add_To_Cart" href="#" class="btn btn-success">Add to Cart</button>
                            <input type="hidden" name="Item_Name" value="Necless">
                            <input type="hidden" name="Price" value="34">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card">
                        <img src="./images/productPic2.png" class="card-img-top" height="200px" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Necless 1</h5>
                            <p class="card-text">Price : 344 Rs</p>
                            <button type="submit" name="Add_To_Cart" href="#" class="btn btn-success">Add to Cart</button>
                            <input type="hidden" name="Item_Name" value="Necless">
                            <input type="hidden" name="Price" value="34">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card">
                        <img src="./images/productPic3.png" class="card-img-top" height="200px" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Necless 2</h5>
                            <p class="card-text">Price : 534 Rs</p>
                            <button type="submit" name="Add_To_Cart" href="#" class="btn btn-success">Add to Cart</button>
                            <input type="hidden" name="Item_Name" value="Necless">
                            <input type="hidden" name="Price" value="34">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card">
                        <img src="./images/productPic4.png" class="card-img-top" height="200px" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Necless 3</h5>
                            <p class="card-text">Price : 5434 Rs</p>
                            <button type="submit" name="Add_To_Cart" href="#" class="btn btn-success">Add to Cart</button>
                            <input type="hidden" name="Item_Name" value="Necless">
                            <input type="hidden" name="Price" value="34">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>