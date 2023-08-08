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
        <label for="subject_name">Old Subject Name</label>
        <input type = "text" name = "subject_name" placeholder="Old Subject Name" value = <?php
            include "../../conn.php";
            if(isset($_GET['subject_id'])){ 
                $id = $_GET['subject_id'];
                $sql = "SELECT subject_name FROM subjects WHERE subject_id = '$id'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                echo "'".$row['subject_name']."'";
            }
        ?>>
        <br>
        <label for="name">New Subject Name</label>
        <input type = "text" name = "name" placeholder="Enter Subject Name">
        <br>
        <input type = "submit" value = "submit">
    </form>
    <?php
        include "../../conn.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST["name"];
            $id = $_POST["id"];
            
            $sql = "UPDATE subjects SET subject_name = '$name' WHERE subject_id = '$id'";
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