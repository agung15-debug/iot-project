<?php
   include "connection.php";
   $query = "SELECT * FROM tb_mode";
   $sql = mysqli_query($conn, $query);
   $result = mysqli_fetch_assoc($sql);
   if(isset($result['mode'])){
       echo $result['mode'];
   }  
?>