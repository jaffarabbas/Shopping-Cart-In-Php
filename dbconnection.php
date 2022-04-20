<?php
$connection = mysqli_connect('localhost', 'root', '', 'test');
if (mysqli_connect_error()) {
    echo "<script>
            alert('cANNOT CONNECT TO DATABASE');
            window.location.href='mycart.php';
        </script>";
        exit();
}
