<?php
include ('create_connection.php');
    if(isset($_GET['MyKey'])){
        $data = $_GET['MyKey'];
        $selectstatement = "SELECT * FROM users where nome = '$data'";
        $sumstatement = "UPDATE users set valorVendido = dinheiroEspecie + pix + cartao";
        mysqli_query($sqlconnection,$sumstatement) or die(mysqli_error($sqlconnection));
        $executeQuery = mysqli_query($sqlconnection,$selectstatement) or die(mysqli_error($sqlconnection));
        $arrayOfValues = mysqli_fetch_assoc($executeQuery);
        $nome = $arrayOfValues["nome"];
        $valorVendido = "R$ ".number_format($arrayOfValues["valorVendido"],2)."";
        $valorVendido = str_replace('.',',',$valorVendido);
        $vendasEfetuadas = $arrayOfValues["vendasEfetuadas"];
        $dinheiroEspecie = "R$ ".number_format($arrayOfValues["dinheiroEspecie"],2)."";
        $dinheiroEspecie = str_replace('.',',',$dinheiroEspecie);
        $pix = "R$ ".number_format($arrayOfValues["pix"],2)."";
        $pix = str_replace('.',',',$pix);
        $cartao = "R$ ".number_format($arrayOfValues["cartao"],2)."";
        $cartao = str_replace('.',',',$cartao);
        echo json_encode(array("nome" => $nome, "valorVendido" => $valorVendido,"vendasEfetuadas" => $vendasEfetuadas,"dinheiroEspecie" => $dinheiroEspecie,"pix" => $pix,"cartao" => $cartao));
    }
?>