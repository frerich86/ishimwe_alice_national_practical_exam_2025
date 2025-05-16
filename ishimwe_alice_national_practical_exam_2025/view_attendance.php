<?php
// session
// Start the session
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style>
        body{
            background-color: lightblue;
            padding:0;
            margin:0;
        }

        a{
            text-decoration: none;
            color: black;
            font-size: 20px;
            padding: 10px;
        }
        h1{
            color: #333;
            font-family: Arial, sans-serif;
            text-align: center;
            /* margin-top: 50px; */
           box-shadow: 0 0 10px rgba(0,0,0,0.5);
            padding: 20px;
            background-color: white;
            border-radius: 10px;
        }
        table{
            margin: 0 auto;
            margin-top: 20px;
            /* box-shadow: 0 0 10px rgba(0,0,0,0.5); */
        }
        .form-control{
            background-color:white;
            width: 60%;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            margin-top: 10px;
            text-align: center;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="date"]{
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"],
        input[type="reset"]{
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="radio"]{
            margin: 0 10px;
        }
        label{
            font-size: 18px;
            margin: 10px 0;
            display: block;
        }
        select{
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button{
           background-color: #4CAF50;
            color: white;
            padding: 6px 7px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form a{
            text-decoration: none;
            color: white;
            font-size: 20px;
            padding: 10px;
        }
       .form-control table{
            border-collapse: collapse;
            border-radius:6px;
        }
        
    </style>
</head>
<body>
       <h1 align="center"> WELOME  TO STUDENT  RECORDS  MANAGEMENT</h1>
  <table border=0 width=80% align=center> 
    <tr>
        <td><a href="homepage.php">Home</a></td>
        <td><a href="courses.php">Courses</a></td>
        <td><a href="student.php">Students</a></td>
        <td><a href="Grade.php">Grades</a></td>
                <td><a href="attendance.php">Attendances</a></td>


        <td><a href="report.php">Report</a></td>
        <td><a href="logout.php">Logout</a></td>
        </tr>
          </table>
           <h2 align="center">
               VIEW STUDENT ATTENDANCE
           </h2>
        <div class="form-control">
            <button><a href="attendance.php">create</a></button>
            <button><a href="#">Print</a></button>
            <table border=1 align=center width=100%>
                <tr style="font-weight:bold">
                <td>
                    StudentId
                </td> 
                <td>
                     studentName
                </td>
                <td>
                    CourseName
                </td>
                <td>
                    AttendanceDate
                </td>
                <td>
                    AttendanceStatus
                </td>
                <td colspan=2>
                    Decision</td>
                </tr>
                <tr>
                    <?php
                    
                    $con=mysqli_connect("localhost","root","","student_record");
                    $query=mysqli_query($con,"select * from students,courses,attendance where students.StudentId=attendance.StudentId and courses.CourseId=attendance.CourseId");
                    while($row=mysqli_fetch_array($query)){
                          echo "<tr>";
                            echo "<td>".$row['StudentId']."</td>";
                            echo "<td>".$row['FirstName']." ".$row['LastName']."</td>";
                            echo "<td>".$row['CourseName']."</td>";
                            echo "<td>".$row['AttendanceDate']."</td>";
                            echo "<td>".$row['AttendanceStatus']."</td>";
                            echo "<td><button><a href='delete_attendance.php?id=".$row['AttendanceId']."'>
                           
                            <i class='fa fa-trash' aria-hidden='true'></i>
                        
                            </a></button></td>";
                                echo "<td><button><a href='update_attendance.php?id=".$row['AttendanceId']."'>
                            <i class='fa fa-edit' aria-hidden='true'></i>
                                
                                </a></button></td>";


                                                                                   echo "</tr>";

                        }
                    ?>
                </tr>

            </table>
              
               
                   
        </div>
    
</body>
</html>