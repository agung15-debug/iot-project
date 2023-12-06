<?php
    include "./connection.php";

    $query = "SELECT u.uid, u.name, a.time , s.status FROM tb_user u INNER JOIN tb_attendance a ON u.uid = a.uid INNER JOIN tb_status s on a.status_id = s.id ORDER BY a.time DESC";
    $result = mysqli_query($conn, $query);
?>
