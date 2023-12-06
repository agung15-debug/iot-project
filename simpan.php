<?php
    if(isset($_POST['uid']) && $_POST['name'] && $_POST['phone'] && $_POST['address']){
        include "connection.php";
        $uid = $_POST['uid'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $sql = "INSERT INTO tb_user (uid, name, phone, address) VALUES ('$uid', '$name', '$phone', '$address')";
        if(mysqli_query($conn, $sql)){
            mysqli_query($conn, "DELETE FROM tb_entry");
        }
    header("Location: add_card.php");
    }
?>