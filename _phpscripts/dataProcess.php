<?php
    if(isset($_GET['Valor']) && isset($_GET['KeyUser'])){
        include ('create_connection.php');
        $valor = $_GET['Valor'];
        $usuario = $_GET['KeyUser'];
        $valor = str_replace(',','.',$valor);
        $valor = str_replace('R$ ','',$valor);
        $valor = floatval($valor);
        $statement = "UPDATE users SET valorVendido = valorVendido + $valor, vendasEfetuadas = vendasEfetuadas + 1 WHERE nome = '$usuario' ";
        mysqli_query($sqlconnection,$statement) or die(mysqli_error($sqlconnection));
    }
?>
