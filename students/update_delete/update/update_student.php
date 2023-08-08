<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = <?php echo $_SERVER['PHP_SELF'] ;?> method = "post">
        <input type = "text" name = "roll" placeholder="Enter Roll No" value=<?php if(isset($_GET['roll_no'])){ $roll = $_GET["roll_no"]; echo $roll;}else{echo "";}  ?>>
        <select name = "field">
            <option value = "name">Name</option>
            <option value = "course">Course Name</option>
        </select> 
        <input type = "submit" value = "submit">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $f = $_POST["field"];
            $roll = $_POST["roll"];
            if($f == "name"){
                header("Location: ./update_student_name.php?roll_no=$roll");
            }else{
                header("Location: ./update_student_course.php?roll_no=$roll");
            }
            
        }
    ?>
</body>
</html>