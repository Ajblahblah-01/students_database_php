<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = <?php echo $_SERVER['PHP_SELF'] ;?> method = "post">
        <select name = "field">
            <option value="student">Student</option>
            <option value="marks">Marks</option>
            <option value="subjects">Subjects</option>
            <option value="coordinator">Coordinator</option>
            <option value="course">Course</option>
        </select>
        <input type = "submit" value = "submit">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $dest = $_POST["field"];
            header("Location: update_$dest.php");
        }
    ?>
</body>
</html>