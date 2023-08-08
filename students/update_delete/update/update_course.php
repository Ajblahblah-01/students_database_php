<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = <?php echo $_SERVER['PHP_SELF'] ;?> method = "post">
        <input type = "text" name = "id" placeholder="Enter Course Id" value = <?php
            if(isset($_GET['course_id'])){
                $id = $_GET['course_id'];
                echo $id;
            }
        ?>>
        <select name = "field">
            <option value = "course_name">Name</option>
            <option value = "coordinator_id">Coordinator Name</option>
        </select>
        <input type = "submit" value = "submit">
    </form>
    <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $field = $_POST["field"];
            $id = $_POST["id"];
            
            if($field == "coordinator_id"){
                header('location: ./update_course_coordinator.php?course_id='.$id);
            }else{
                header('location: ./update_course_name.php?course_id='.$id);
            }
        }


          
    ?>
</body>
</html>