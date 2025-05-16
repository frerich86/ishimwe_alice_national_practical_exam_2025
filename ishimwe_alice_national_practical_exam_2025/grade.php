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
        form{
            background-color: lightblue;
            width: 60%;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            margin-top: 10px;
            text-align: center;
        }
        button{
            background-color: #4CAF50;
            color: white;
            padding: 0px 1px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

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
              CREATE NEW GRADE
         
          </h2>
            <form method="POST">
                   Course_name  
              <input type="text" name="course_name"  required>
              Marks <input type="text" name="marks" required>
               <input type="submit" name="submit" value="Add"> 
                <button><a href=""><i class="fa-solid fa-bars">View</i></a></button>           
            </form>
            <?php
    $con=mysqli_connect("localhost","root","","student_record");
if(isset($_POST['submit'])){
    $courses=$_POST['course_name'];
        $marks=$_POST['marks'];
 if($marks>70 && $marks<=100){
    $insert=mysqli_query($con,"INSERT INTO grade VALUES('','$courses','$marks','Competent')");

        }else if($marks>0 && $marks<=70){
        $insert=mysqli_query($con,"INSERT INTO grade VALUES('','$courses','$marks','Not Yet Competent')");
                }else{
                echo"<script>alert('invalid marks')</script>";
                }   
             if($insert){
                echo"<script>alert ('Grade recorded successful')</script>";
                }else{
        echo"<script>alert('Grade not recorded')</script>";
        }
 }
 ?>
    
</body>
</html>