<?php
    if(isset($_POST['uid'])){
        include "connection.php";
        $uid = $_POST['uid'];
        mysqli_query($conn, "DELETE FROM tb_entry");
        $sql = mysqli_query($conn, "INSERT INTO tb_entry VALUES ('$uid')");
        if($sql){
            echo "Data berhasil disimpan";
        }else{
            echo "Data gagal disimpan";
        }
}
?>