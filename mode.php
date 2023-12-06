<?php
    include "connection.php";
    if(isset($_POST['mode'])== "read"){
        $mode = $_POST['mode'];
        if(isset($_POST['start-enter'])){
            $start_enter = $_POST['start-enter'];
            $start_leave = $_POST['start-leave'];
            $start_break = $_POST['start-break'];
            $start_returned = $_POST['start-returned'];
            $end_enter = $_POST['end-enter'];
            $end_leave = $_POST['end-leave'];
            $end_break = $_POST['end-break'];
            $end_returned = $_POST['end-returned'];
            mysqli_query($conn, "DELETE FROM tb_time");
            mysqli_query($conn, "DELETE FROM tb_mode");
            $query = "INSERT INTO tb_time VALUES(NOW(), '$start_enter', '$end_enter', '$start_break', '$end_break', '$start_returned', '$end_returned', '$start_leave', '$end_leave')";
            $set_mode = "INSERT INTO tb_mode VALUES('$mode')";
            $sql = mysqli_query($conn, $query);
            $sql_mode = mysqli_query($conn, $set_mode);
        }
        header("Location: log.php");
    } else{
        $mode = "add";
        mysqli_query($conn, "DELETE FROM tb_mode");
        $set_mode = "INSERT INTO tb_mode VALUES('$mode')";
        $sql_mode = mysqli_query($conn, $set_mode);
        header("Location: add_card.php");
    }
?>