<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>
<body>
    <label for="coord" >Coordinator</label>
    <select id="coord" name = "coordinator" onchange="getCourse(this.value)">
        <option>Select</option>
    </select>

    <label for="course" >Course</label>
    <select id="course" name = "course" onchange="getStudent(this.value)">
        <option>Select</option>
    </select>

    <label for="student" >Student</label>
    <select id="student" name = "std" onchange="getMarks(this.value)">
        <option>Select</option>
    </select>
    <br>
    <br>
    <table id="list" border="1">
        <thead>
            <tr>
                <th>Roll Number</th>
                <th>Name</th>
                <th>Subject Name</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody id="list-items"></tbody>
    </table>
    

    <!-- Javascript -->
    <script>
        $(document).ready(function() {
            $('#list').hide();
            $.ajax({
                url: 'http://localhost/students/javascript/index.php',
                type: 'GET',
                dataType: 'json', 
                success: function(data) {
                    for(let i = 0; i < data.length; i++) {
                        $('#coord').append('<option value="' + data[i].coordinator_id + '">' + data[i].coordinator_name + '</option>');
                    }
                },
                error: function(xhr, status, error) {                     
                    console.error(error);
                }
            });
        });
        function getCourse(value){
            $.ajax({
                url: 'http://localhost/students/javascript/course.php?id='+value,
                type: 'GET',
                dataType: 'json', 
                success: function(data) {
                    $('#course').children().remove();
                    $('#course').append('<option>Select</option>');
                    for(let i = 0; i < data.length; i++) {
                        $('#course').append('<option value="' + data[i].course_id + '">' + data[i].course_name + '</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        function getStudent(value){
            $.ajax({
                url: 'http://localhost/students/javascript/student.php?id='+value,
                type: 'GET',
                dataType: 'json', 
                success: function(data) {
                    $('#student').children().remove();
                    $('#student').append('<option>Select</option>');
                    for(let i = 0; i < data.length; i++) {
                        $('#student').append('<option value="' + data[i].roll_no + '">' + data[i].name + '</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        function getMarks(value){
            $.ajax({
                url: 'http://localhost/students/javascript/marks.php?id='+value,
                type: 'GET',
                dataType: 'json', 
                success: function(data) {
                    $('#list-items').children().remove();
                    for(let i = 0; i < data.length; i++) {
                        $('#list-items').append(`<tr> 
                                          <td>  ${data[i].roll_no} </td>
                                          <td>   ${data[i].name}</td>
                                          <td>   ${data[i].subject_name}</td>
                                          <td>   ${data[i].marks}</td>
                                          </tr>`);
                    }    
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
            $('#list').show();
        }
    </script>       
</body>
</html>
