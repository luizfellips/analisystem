<?php
include ('create_connection.php');
    if(isset($_GET['KeyUser']) && isset($_GET['CurrentTime'])){
        $user = $_GET['KeyUser'];
        $time = $_GET['CurrentTime'];
        $selectStatement = "SELECT * FROM users where nome = '$user'";
        $updateDate = "UPDATE users set abertura = '$time' where nome = '$user'";
        mysqli_query($sqlconnection,$updateDate) or die(mysqli_error($sqlconnection));
        $executeQuery = mysqli_query($sqlconnection,$selectStatement) or die(mysqli_error($sqlconnection));
        $arrayOfValues = mysqli_fetch_assoc($executeQuery);
        $nome = $arrayOfValues["nome"];
        $valorVendido = "R$ ".number_format($arrayOfValues["valorVendido"],2)."";
        $valorVendido = str_replace('.',',',$valorVendido);
        $vendasEfetuadas = $arrayOfValues["vendasEfetuadas"];
        $abertura = $arrayOfValues["abertura"];
        echo json_encode(array("nome" => $nome, "valorVendido" => $valorVendido,"vendasEfetuadas" => $vendasEfetuadas,"abertura" => $abertura));
    }
?>