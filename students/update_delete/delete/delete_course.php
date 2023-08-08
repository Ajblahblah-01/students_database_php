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
        <input type = "submit" value = "submit">
    </form>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "students";

        $conn = mysqli_connect($servername,$username,$password,$database);
        if(!$conn){
            die("Connect Failed".mysqli_connect_error());
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["id"];
            $sql = "DELETE FROM course WHERE course_id = '$id'";
            $result = mysqli_query($conn,$sql);

            $read = "SELECT * FROM course";
            $result = mysqli_query($conn,$read);

            $num = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)){
                echo $row["course_id"]." ".$row["course_name"]."<br>";
            }
        }


          
    ?>
</body>
</html>