<?php
echo $_POST['CodeKey'];
if(isset($_POST['CodeKey']) && isset($_POST['NameKey']) && isset($_POST['QuantityKey']) && isset($_POST['PriceKey'])){
    include("create_connection.php");
    $productCode = $_POST['CodeKey'];
    $productName = $_POST['NameKey'];
    $quantity = $_POST['QuantityKey'];
    $price = $_POST['PriceKey'];
    $valor = str_replace(',','.',$price);
    $valor = str_replace('R$ ','',$valor);
    $valor = floatval($valor);
    $statement =  "UPDATE products SET productName = '$productName', quantity = $quantity, price = $valor WHERE productCode = '$productCode'";
    mysqli_query($sqlconnection,$statement) or die(mysqli_error($sqlconnection));
 }

?>
