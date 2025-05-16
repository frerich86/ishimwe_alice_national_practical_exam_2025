<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            background-color: lightblue;
            width: 30%;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            margin-top: 100px;
            text-align: center;
        }
        input[ type="text"],
        input[ type="password"]{
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[ type="submit"],
        input[ type="reset"]{
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        a{
            text-decoration: none;
            color: #4CAF50;
            font-size: 20px;
            padding: 10px;
        }
        
    </style>
</head>
<body> 

       <form method="POST">
            <h1>Users Login</h1>
        username  <br>
      <input type="text" name="submit" > <br>
        Password  <br>
        <input type="password" name="submit" > <br>
        <input type="submit" name="submit" value="submit">
        <input type="reset" name="reset" value="Cancel"> <br>
          <a href="register.php">CREATE NEW ACCOUNT</a>
       </form>
     
</body>
</html>
<?php
$con=mysqli_connect("localhost","root","","student_record");
if(isset($_POST['submit'])){
    $username=$_POST['username'];
        $password=$_POST['password'];
        #query to check if the user exists 
$query=mysqli_query($con,"select * from users where username='$username' and password ='$password'");
    while($row=mysqli_fetch_array($query)){
     $count=mysqli_num_rows($query);
     if($count>0){
           session_start();  
           $_SESSION['username']=$row['username'];
            $_SESSION['password']=$row['password']; 
        echo "<script>alert('Login successful')</script>";
         echo"<script>(window.location='homepage.php')</script>";
     }else{
        echo "<script>alert('Login failed')</script>";
     echo"<script>(window.location='index.php')</script>";

     }
    }
}



?>