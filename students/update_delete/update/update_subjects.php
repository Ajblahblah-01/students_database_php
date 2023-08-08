<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = <?php echo $_SERVER['PHP_SELF'] ;?> method = "post">
        <input type = "text" name = "id" placeholder="Enter subject Id" value = <?php if(isset($_GET['subject_id'])) echo $_GET['subject_id']; ?>>
        <select name = "field">
            <option value = "subject_name">Name</option>
            <option value = "course_id">Course Name</option>
        </select>
        <input type = "submit" value = "submit">
    </form>
    <?php
        include "../../conn.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $field = $_POST["field"];
            $id = $_POST["id"];
            
            if($field == "course_id"){
                header('location: ./update_subject_course.php?subject_id='.$id);
            }else{  
                header('location: ./update_subject_name.php?subject_id='.$id);
            }
        }


          
    ?>
</body>
</html>