<?php
function insertIntoDatabase($productCode,$productname,$quantity,$price,$providerName,$providerNumber){
    include("create_connection.php");
    $statement =  "INSERT INTO products(productCode,productName, quantity, price,
      providerName, providerNumber) VALUES ('$productCode','$productname','$quantity','$price',
     '$providerName','$providerNumber')";
     if(!mysqli_query($sqlconnection,$statement)){
        echo 'Error';
     }
     else{
        echo '<h1 class="text-center" style="color: #ff4545">Registered with success</h1>';
     };

}
function retrieveAll(){
   include ("create_connection.php");
   $statement = "SELECT * from products";
   $result = mysqli_query($sqlconnection,$statement) or die(mysqli_error($sqlconnection));
   while($row = mysqli_fetch_assoc($result)){
      echo "<tr>";
      $x = 0;
      foreach($row as $value){
         if($x == 3){
            $value = strval($value);
            $value = str_replace('.',',',$value);
            echo "<td>" ."R$ $value". "</td>";
            $x = 0;
         }
         else{
            echo "<td>" ."$value". "</td>";
            $x++;
         }
      }
      echo "</tr>";
   }
}


?>