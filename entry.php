<?php
    include "connection.php";
    $query = "SELECT * FROM tb_entry";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    if(isset($result['uid'])){
        echo $result['uid'];
    }
?>