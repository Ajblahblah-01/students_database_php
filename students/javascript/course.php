<?php
    header("Access-Control-Allow-Origin: *"); // This allows requests from any origin
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Specify the allowed HTTP methods
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    include "../conn.php";

    $id = $_GET['id'];

    $sql = "SELECT course_id,course_name FROM course WHERE coordinator_id = $id";
    $result = mysqli_query($conn, $sql);
    $data = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($data, $row);
    }
    echo json_encode($data);
?>
