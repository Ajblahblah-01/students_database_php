<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action=<?php echo $_SERVER["PHP_SELF"] ?> method="post">
        <label for="coord_id">Coordinator id</label>
        <input type="text" name="coord_id">
        <br>
        <label for="name">Coordinator Name</label>
        <input type="text" name="name">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection failed: ".mysqli_connect_error());
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST['coord_id'];
            $name = $_POST['name'];

            $sql = "INSERT INTO coordinator(coordinator_id, coordinator_name) VALUES('$id', '$name')";

            if(mysqli_query($conn, $sql)){
                echo "Data inserted successfully";
            }
            else{
                echo "Error: ".$sql."<br>".mysqli_error($conn);
            }
        }
        

    ?>    
</body>
</html>

