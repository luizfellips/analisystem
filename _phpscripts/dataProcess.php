<?php
    if(isset($_GET['Valor']) && isset($_GET['KeyUser']) && isset($_GET['quantities'])){
        include ('create_connection.php');
        $array = $_GET['quantities'];
        $productsInformations = array();
        foreach($array as $key => $item){
            $productsInformations[$key] = $item;
        };
        foreach($productsInformations as $code => $quantity){
            $productStatement = "UPDATE products SET quantity = quantity - $quantity WHERE productCode = $code";
            mysqli_query($sqlconnection,$productStatement) or die(mysqli_error($sqlconnection));
        }
        $valor = $_GET['Valor'];
        $usuario = $_GET['KeyUser'];
        $valor = str_replace(',','.',$valor);
        $valor = str_replace('R$ ','',$valor);
        $valor = floatval($valor);
        $statement = "UPDATE users SET valorVendido = valorVendido + $valor, vendasEfetuadas = vendasEfetuadas + 1 WHERE nome = '$usuario' ";
        mysqli_query($sqlconnection,$statement) or die(mysqli_error($sqlconnection));

    }
?>
