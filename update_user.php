<?php
    if(isset($_POST['uid']) && $_POST['name'] && $_POST['phone'] && $_POST['address']){
        include "connection.php";
        $uid = $_POST['uid'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $sql = "UPDATE tb_user SET name = '$name', phone = '$phone', address = '$address' WHERE uid = '$uid'";
        if(mysqli_query($conn, $sql)){
            mysqli_query($conn, "DELETE FROM tb_entry");
        }
    header("Location: user.php");
    }
?>