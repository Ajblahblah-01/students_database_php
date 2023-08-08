<?php
    header("Access-Control-Allow-Origin: *"); // This allows requests from any origin
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Specify the allowed HTTP methods
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    include "../conn.php";

    $id = $_GET['id'];

    $sql = "SELECT student.name ,subjects.subject_name ,marks.roll_no,marks
            FROM marks 
            JOIN student on marks.roll_no = student.roll_no
            JOIN subjects on marks.subject_id = subjects.subject_id
            WHERE marks.roll_no = '$id'";
    $result = mysqli_query($conn, $sql);
    $data = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($data, $row);
    }
    echo json_encode($data);
    // while($row = mysqli_fetch_assoc($result)){
    //     echo $row['name']." ".$row['subject_name']." ".$row['roll_no']." ".$row['marks'];
    // }
?>
  