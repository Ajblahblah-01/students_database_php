<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = <?php echo $_SERVER['PHP_SELF'] ;?> method = "post">
        <label for="id">Subject Id</label>
        <input type = "text" name = "id" placeholder="Enter Subject Id" value = <?php
            if(isset($_GET['subject_id'])){
                $id = $_GET['subject_id'];
                echo $id;
            }
        ?>>
        <br>
        <label for="course_name"> New Course Name</label>
        <select name = "value">
            <?php
                include "../../conn.php";
                $old = "SELECT course_id FROM subjects WHERE subject_id = '$id'";
                $old_result = mysqli_query($conn,$old);
                $old_row = mysqli_fetch_assoc($old_result);
                $old_id = $old_row['course_id'];
                $sql = "SELECT course_name,course_id FROM course WHERE course_id != '$old_id'";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value = ".$row['course_id'].">".$row['course_name']."</option>";
                }
            ?>
        </select>
        <br>
        <input type = "submit" value = "submit">
    </form>
    <?php
        include "../../conn.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $value = $_POST["value"];
            $id = $_POST["id"];
            
            $sql = "UPDATE subjects SET course_id = '$value' WHERE subject_id = '$id'";
            $result = mysqli_query($conn,$sql);
            if($result){
                header('location: ../../show/show_subjects.php');
            }
            else{
                echo "Error: ".$sql."<br>".mysqli_error($conn);
            }
        }
    ?>
</body>
</html>