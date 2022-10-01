<?php
    $server = "localhost";
    $username = "root";
    $password = "testing123";
    $databaseName = "testDatabase";

    $sqlconnection = mysqli_connect($server, $username, $password, $databaseName);
    if(!$sqlconnection) {
        die("A problem was found while connecting: ".mysqli_connect_error());
    }
?>