<?php
function insertIntoDatabase($productCode,$productname,$quantity,$price,$providerName,$providerNumber){
    include("create_connection.php");
    $statement =  "INSERT INTO products(productCode, productName, price,
      providerName, providerNumber) VALUES ('$productCode','$productname','$price',
     '$providerName','$providerNumber')";
     if(!mysqli_query($sqlconnection,$statement)){
        echo 'Error';
     }
     else{
        echo '<h1 class="text-center" style="color: #ff4545">Registered with success</h1>';
     };

}
?>