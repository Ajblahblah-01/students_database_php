<?php
    include "../../conn.php";

    if(isset($_GET["subject_id"])){
        $subject_id = $_GET["subject_id"];
        $sql = "DELETE FROM subjects WHERE subject_id = '$subject_id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "Data deleted successfully";
        }
        else{
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }
    }
?>
