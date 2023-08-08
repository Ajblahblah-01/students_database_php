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
        <label for="old">New Coordinator</label>
        <select name = "new">
            <?php
                include "../../conn.php";
                if(isset($_GET['course_id'])){ 
                    $id = $_GET['course_id'];
                    $sql = "SELECT coordinator_id FROM course WHERE course_id = '$id'";
                    $result = mysqli_query($conn,$sql);
                    $old_id_row = mysqli_fetch_assoc($result);
                    $old_id = $old_id_row['coordinator_id'];

                    $sql = "SELECT coordinator_name,coordinator_id FROM coordinator WHERE coordinator_id != '$old_id'";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value = ".$row['coordinator_id'].">".$row['coordinator_name']."</option>";
                    }

                }
            ?>>
        </select>
        <input type = "submit" value = "submit">
    </form>
    <?php
        include "../../conn.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $new = $_POST["new"];
            $id = $_POST["id"];
            $sql = "UPDATE course SET coordinator_id = '$new' WHERE course_id = '$id'";
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