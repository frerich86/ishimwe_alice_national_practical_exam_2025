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
              CREATE NEW STUDENT
           </h2>
        <div class="form-control">
                <form  method="POST">
                    <!-- FirstName	LastName	Gender	DateOfBirth	ContactNumber	Email	Address	EnrollmentDate -->
                    <label for="FirstName">First Name:</label>
                    <input type="text" id="FirstName" name="FirstName" required><br>
                    <label for="LastName">Last Name:</label>
                    <input type="text" id="LastName" name="LastName" required><br>
                 <label for="">Gender</label>
                    <select name="Gender" id="">
                         <option value="Female">Female</option>
                          <option value="Male">Female</option>
                    </select>                
                 
                    <br>
                    <label for="DateOfBirth">Date of Birth:</label>
                    <input type="date" id="DateOfBirth" name="DateOfBirth" required><br>
                    <label for="ContactNumber">Contact Number:</label>
                    <input type="text" id="ContactNumber" name="ContactNumber" required><br>
                    <label for="Email">Email:</label>
                    <input type="email" id="Email" name="Email" required><br>
                    <label for="Address">Address:</label>
                    <input type="text" id="Address" name="Address" required><br>
                    <label for="EnrollmentDate">Enrollment Date:</label>
                    <input type="date" id="EnrollmentDate" name="EnrollmentDate" required><br>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" value="Reset">
                    <button><a href="view_student.php">View</a></button>
                                         
                </form>
                <?php
                $con=mysqli_connect("localhost","root","","student_record");
                if(isset($_POST['submit'])){
                    $FirstName=$_POST['FirstName'];
                    $LastName=$_POST['LastName'];
                    $Gender=$_POST['Gender'];
                    $DateOfBirth=$_POST['DateOfBirth'];
                    $ContactNumber=$_POST['ContactNumber'];
                    $Email=$_POST['Email'];
                    $Address=$_POST['Address'];
                    $EnrollmentDate=$_POST['EnrollmentDate'];
                    #query to check if the user exists
                    $query=mysqli_query($con,"insert into students values('','$FirstName','$LastName','$Gender','$DateOfBirth','$ContactNumber','$Email','$Address','$EnrollmentDate')");
                    if($query){
                        echo"<script>alert ('Student record successful')</script>";
                    }else{
                        echo"<script>alert('Student record not successful')</script>";
                    }
                    
                }
                ?>
        </div>
    
</body>
</html>