<?php
  include "config.php";

   $mysqli = new mysqli($database, $user , $password , $db_name);
   if(mysqli_connect_error()){
      echo "connection error";
      echo mysqli_connect_error;
    }else{
      $result = $_POST["result"];
      $query = "select * from products where product='$result'";
         $result = mysqli_query($mysqli,$query);
      if(mysqli_num_rows($result)>0)
      {
            while($row = mysqli_fetch_array($result)){
               $id=$row[0];
               $product_id = $row['product_id'];
               $product_name = $row['product_name'];
               $quality = $row['quality'];
               $cost = $row['cost_of_product'];
            }
            if($quality == 0){
              $quality = 1;
            }
            $query2 = "insert into single_customer(product_id,product_name,quality,cost_of_product) values('$product_id','$product_name','$quality','$cost')";
            if(mysqli_query($mysqli,$query2)){
               echo "Sucess";
            }else{
               echo "Failed";
            }
            $query3 = "insert into all_customer(product_id,product_name,quality,cost_of_product) values('$product_id','$product_name','$quality','$cost')";
            if(mysqli_query($mysqli,$query3)){
               echo "Sucess";
            }else{
               echo "Failed";
            }
      }else{
        echo "Failed";
      }
    }
   ?>