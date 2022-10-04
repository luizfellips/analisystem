<?php
    if(isset($_GET['Key'])){
        $data = $_GET['Key'];
        include ("create_connection.php");
        $code = $data;
        $statement = "DELETE FROM products WHERE productCode = '$code'";
        mysqli_query($sqlconnection,$statement) or die(mysqli_error($sqlconnection));
        echo $code;
    }
?>