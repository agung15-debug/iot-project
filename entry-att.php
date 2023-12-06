<?php
date_default_timezone_set('Asia/Jakarta');
    if(isset($_POST['uid'])){
        include "connection.php";
        $uid = $_POST['uid'];
        $query_status = "SELECT * FROM tb_time";
        $sql_status = mysqli_query($conn, $query_status);
        $result_status = mysqli_fetch_assoc($sql_status);
        $start_enter = $result_status['start_enter'];
        $end_enter = $result_status['end_enter'];
        $start_break = $result_status['start_break'];
        $end_break = $result_status['end_break'];
        $start_returned = $result_status['start_returned'];
        $end_returned = $result_status['end_returned'];
        $start_leave = $result_status['start_leave'];
        $end_leave = $result_status['end_leave'];
        $time = date("H:i:s");
        $status_time = date("Y-m-d");
        $status = 0;
        if (strtotime($time) >= strtotime($start_enter) && strtotime($time) <= strtotime($end_enter)){
            $status = 1;
        } else if (strtotime($time) >= strtotime($start_leave) && strtotime($time) <= strtotime($end_leave)){
            $status = 2;
        } else if (strtotime($time) >= strtotime($end_enter) && strtotime($time) <= strtotime($start_break)){
            $status = 3;
        } else if (strtotime($time) >= strtotime($end_break) && strtotime($time) <= strtotime($start_leave)){
            $status = 4; 
        } else if (strtotime($time) >= strtotime($start_break) && strtotime($time) <= strtotime($end_break)){
            $status = 5;
        } else if (strtotime($time) >= strtotime($start_returned) && strtotime($time) <= strtotime($end_returned)){
            $status = 6;
        } else {
            $status = 7;
        }
        $sql = "INSERT INTO tb_attendance(uid, time, status_id) VALUES ('$uid', NOW(), $status)";
        $query = mysqli_query($conn, $sql);
        if($sql){
            echo "Data berhasil disimpan";
        }else{
            echo "Data gagal disimpan";
        }
    }
?>