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
        .form-control{
            background-color: lightblue;
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
    </style>
</head>
<body>
       <h1 align="center"> WELOME  TO STUDENT  RECORDS  MANAGEMENT</h1>
  <table border=0 width=60% align=center> 
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
              CREATE ATTENDANCE
           </h2>
        <div class="form-control">
              
                <form  method="POST">
                    <!--StudentId	CourseId	AttendanceDate	AttendanceStatus -->
                    <label for="StudentId">StudentName</label>
                    <select name="studentName" id="">
                        <option value="">Select student....</option>
                 <?php
                 $con=mysqli_connect("localhost","root","","student_record");
                 $query=mysqli_query($con,"select * from students");
                 while($row=mysqli_fetch_array($query)){
          
                                               ?>
                    <option value="<?php echo $row['StudentId'];?>"><?php echo $row['FirstName']." ". $row['LastName'];?></option>;
                    <?php
                  }
                    ?>
                    </select>
                    <label for="CourseId">CourseName</label>
                    <select name="courseName" id="">
                    <?php
                    $con=mysqli_connect("localhost","root","","student_record");
                    $query=mysqli_query($con,"select * from courses");
                    while($row=mysqli_fetch_array($query)){
          
                                               ?>
                    <option value="<?php echo $row['CourseId'];?>"><?php echo $row['CourseName'];?></option>;
                    <?php
                    }
                    ?>
                    </select>
                    <label for="AttendanceDate">Attendance Date:</label>
                    <input type="date" id="AttendanceDate" name="AttendanceDate" required><br>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" value="Reset">
                    <button><a href="view_attendance.php">View</a></button>
                </form>
                <?php
                $con=mysqli_connect("localhost","root","","student_record");
                if(isset($_POST['submit'])){
                    $StudentId=$_POST['studentName'];
                    $CourseId=$_POST['courseName'];
                    $AttendanceDate=$_POST['AttendanceDate'];
                    if($AttendanceDate>0){
                    $query=mysqli_query($con,"insert into attendance values('','$StudentId','$CourseId','$AttendanceDate','Present')");
                    }else{
                        $query=mysqli_query($con,"insert into attendance values('','$StudentId','$CourseId','$AttendanceDate','Absent')");
                    }
                    if($query){
                        echo"<script>alert ('Attendance record successful')</script>";
                    }else{
                        echo"<script>alert('Attendance record not successful')</script>";
                    }
                }

                    ?>
                   
        </div>
    
</body>
</html>