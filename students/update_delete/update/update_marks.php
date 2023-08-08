<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = <?php echo $_SERVER['PHP_SELF'] ;?> method = "post">
        <label for="id">Marks Id</label>
        <input type = "text" name = "id" placeholder="Enter marks Id" value = <?php if(isset($_GET['marks_id'])){ echo $_GET["marks_id"]; } else{ echo "";} ?>>
        <br>
        <label for="marks">Old Marks</label>
        <input type = "text" name = "marks" placeholder="Old marks" value = <?php if(isset($_GET['marks'])){ echo $_GET["marks"]; } else{ echo "";}?>>
        <br>
        <label for="subject_id">Enter new marks</label>
        <input type= "text" name = "value" placeholder="Enter new marks">
        <input type = "submit" value = "submit">
    </form>
    <?php
        include "../../conn.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $value = $_POST["value"];
            $id = $_POST["id"];

            $sql = "UPDATE marks SET marks = $value WHERE marks_id = '$id'";
            $result = mysqli_query($conn,$sql);

            echo "Successfuly Updated";
        }

    ?>
</body>
</html>