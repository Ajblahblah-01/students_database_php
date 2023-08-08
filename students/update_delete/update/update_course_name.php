<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = <?php echo $_SERVER['PHP_SELF'] ;?> method = "post">
        <label for="id">Course Id</label>
        <input type = "text" name = "id" placeholder="Enter Course Id" value = <?php
            if(isset($_GET['course_id'])){
                $id = $_GET['course_id'];
                echo $id;
            }
        ?>>
        <br>
        <label for="old">Old Course Name</label>
        <input type = "text" name = "old" placeholder="Old Course Name" value =
        <?php
            include "../../conn.php";
            if(isset($_GET['course_id'])){ 
                $id = $_GET['course_id'];
                $sql = "SELECT course_name FROM course WHERE course_id = '$id'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                echo "'".$row['course_name']."'";
            }
        ?>>
        <br>
        <label for="name">New Course Name</label>
        <input type = "text" name = "name" placeholder="Enter Course Name">
        <br>
        <input type = "submit" value = "submit">
    </form>
    <?php
        include "../../conn.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST["name"];
            $id = $_POST["id"];
            
            $sql = "UPDATE course SET course_name = '$name' WHERE course_id = '$id'";
            $result = mysqli_query($conn,$sql);
            if($result){
                header('location: ../../show/show_course.php');
            }
            else{
                echo "Error: ".$sql."<br>".mysqli_error($conn);
            }
        }
    ?>
</body>
</html>