<?php
if(isset($_POST['cod']) && isset($_POST['qtd'])){
    include("create_connection.php");
    $code = $_POST['cod'];
    $qtd = $_POST['qtd'];
    $statement = "SELECT productCode,productName,price FROM products WHERE productCode = '$code'";
    $queryResult = mysqli_query($sqlconnection,$statement) or die(mysqli_error($sqlconnection));
    $arrayOfValues = mysqli_fetch_assoc($queryResult);
    $description = $arrayOfValues['productName'];
    $id = $arrayOfValues['productCode'];
    $price = $arrayOfValues['price'];
    $total = $qtd * $price;
    $price = str_replace('.',',',$price);
    $total = number_format($total,2, ',','');
    echo json_encode(array("description" => $description, "id" => $id, "price" => $price, "quantity" => $qtd, "total" => $total));

}
?>

