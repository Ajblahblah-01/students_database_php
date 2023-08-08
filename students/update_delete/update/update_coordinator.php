<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = <?php echo $_SERVER['PHP_SELF'] ;?> method = "post">
        <input type = "text" name = "id" placeholder="Enter coordinator Id" value = <?php if(isset($_GET['coordinator_id'])) echo $_GET['coordinator_id']; ?>>
        <input type= "text" name = "name" placeholder="Enter new name">
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
            $name = $_POST["name"];
            $id = $_POST["id"];
            $sql = "UPDATE coordinator SET coordinator_name = '$name' WHERE coordinator_id = '$id'";
            $result = mysqli_query($conn,$sql);

            $read = "SELECT * FROM coordinator";
            $result = mysqli_query($conn,$read);

            echo "<table border='1'>
                    <tr>
                        <th>Coordinator Id</th>
                        <th>Coordinator Name</th>  
                    </tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["coordinator_id"]."</td>";
                echo "<td>".$row["coordinator_name"]."</td>";
                echo "</tr>";
            }
            echo "</table>";

        }


          
    ?>
</body>
</html>