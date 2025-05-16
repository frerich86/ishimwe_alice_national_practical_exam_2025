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
    </style>
    </style>
</head>
<body>
       <h1 align="center"> WELOME  TO STUDENT  RECORDS  MANAGEMENT</h1>
  <table border=0 width=60% align=center> 
    <tr>
        <td><a href="homepage.php">Home</a></td>
        <td><a href="courses.php">Courses</a></td>
        <td><a href="student.php">Students</a></td>
        <td><a href="grade.php">Grades</a></td>
                <td><a href="attendance.php">Attendances</a></td>

        <td><a href="report.php">Report</a></td>
        <td><a href="logout.php">Logout</a></td>
        </tr>

         </table>
          <h2 align="center">
              CREATE NEW COURSE
         
          </h2>
    
</body>
</html>