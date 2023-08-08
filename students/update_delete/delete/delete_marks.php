<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "../../conn.php";
        $marks_id = $_GET['marks_id'];
        $sql = "DELETE FROM marks WHERE marks_id = '$marks_id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Data deleted successfully";
        }
        else{
            echo "Error: ".$sql."<br>".mysqli_error($conn);
        }          
    ?>
</body>
</html>
