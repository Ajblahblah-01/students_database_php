<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = <?php echo $_SERVER['PHP_SELF'] ;?> method = "post">
        <label for="roll">Roll No</label>
        <input type = "text" name = "roll" placeholder="Enter Roll No" value=<?php if(isset($_GET['roll_no'])){ echo $_GET["roll_no"];} ?>>
        <br>
        <label for="old">Old Name</label>
        <input type = "text" name = "old" placeholder="Old Name" value = 
        <?php
            include "../../conn.php";
            if(isset($_GET['roll_no'])){ 
                $roll = $_GET['roll_no'];
                $sql = "SELECT name FROM student WHERE roll_no = '$roll'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                echo "'".$row['name']."'";
            }
        ?>>
        <br>
        <label for="new">Enter new name</label>
        <input type= "text" name = "new" placeholder="Enter new name">
        <input type = "submit" value = "submit">
    </form>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $roll = $_POST["roll"];
            $new = $_POST["new"];

            $sql = "UPDATE student SET name = '$new' WHERE roll_no = '$roll'";
            $result = mysqli_query($conn,$sql);

            if($result){
                echo "Successfuly Updated";
            }
            else{
                echo "Error: ".$sql."<br>".mysqli_error($conn);
            }
        }
    ?>
</body>
</html>