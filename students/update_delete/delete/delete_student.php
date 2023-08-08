<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = <?php echo $_SERVER['PHP_SELF'] ;?> method = "post">
        <input type = "text" name = "roll" placeholder="Enter Roll No" value=<?php if(isset($_GET['roll_no'])){ $roll = $_GET["roll_no"]; echo $roll;}  ?>>
        <input type = "submit" value = "submit">
    </form>
    <?php
        include "../../conn.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $roll = $_POST["roll"];
            $sql = "DELETE FROM student WHERE roll_no = '$roll'";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "Deleted Successfully";
            }
            else{
                echo "Error: ".$sql."<br>".mysqli_error($conn);
            }
            header("Location: ../../show/show.php");
        }     
    ?>
</body>
</html>