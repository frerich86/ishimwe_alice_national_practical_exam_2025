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
        /* button{
           background-color: #4CAF50;
            color: white;
            padding: 6px 7px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        } */
       /* form a{
            text-decoration: none;
            color: white;
            font-size: 20px;
            padding: 10px;
        } */
        table{
            border-collapse: collapse;
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
              View All Students

           </h2>                    <!-- FirstName	LastName	Gender	DateOfBirth	ContactNumber	Email	Address	EnrollmentDate -->

           <table border=1 width=90% align=center>
                <tr>
                     <th>First Name</th>
                     <th>Last Name</th>
                      <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Enrollment Date</th>
                </tr>
                <tr>
                    <?php
                $con=mysqli_connect("localhost","root","","student_record");
                $query="SELECT * FROM students";
                $result=mysqli_query($con,$query);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['FirstName']."</td>";
                        echo "<td>".$row['LastName']."</td>";
                        echo "<td>".$row['Gender']."</td>";
                        echo "<td>".$row['DateOfBirth']."</td>";
                        echo "<td>".$row['ContactNumber']."</td>";
                        echo "<td>".$row['Email']."</td>";
                        echo "<td>".$row['Address']."</td>";
                        echo "<td>".$row['EnrollmentDate']."</td>";
                        if($row['EnrollmentDate'] == date('Y-m-d')){
                            echo "<td><button ><a href='#'>Enroll</a></button></td>";
                        }else{
                            echo "<td><button><a href=''>Not Enrolled</a></button></td>";
                        }
                        echo "</tr>";
                    }}
                
                    
                    ?>
                </tr>

           </table>
       
    
</body>
</html>