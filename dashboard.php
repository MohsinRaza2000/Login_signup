<?php



include("connection.php");
session_start();
echo "The user is ".$_SESSION['email'];
if(!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();

}
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $rollno=$_POST['rollno'];
    $class=$_POST['class'];
    $section=$_POST['section'];
    $query="INSERT INTO `information`( `name`, `rollno`, `class`, `section`) VALUES ('$name','$rollno','$class','$section')";
    $result=mysqli_query($connection,$query);
    if($result==true){
        header("location:dashboard.php");
    }
}


?>
  <p>You are now user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
<html>
    <body>
    <form action="" method="post">
Name: <input type="text" name="name"><br>
Roll no:  <input type="text" name="rollno"><br>
Class:  <input type="text" name="class"><br>
Section:  <input type="text" name="section"><br>
<input  name ="submit" type="submit">
</form>

    </body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #DDD;
}

tr:hover {background-color: #D6EEEE;}
</style>
</head>
<body>
<table>
  <tr>
  <th> id</th>
    <th> Name</th>
    <th>Roll No</th>
    <th>Class</th>
    <th>Section</th>
    <th>Operation</th>
  </tr>
  <?php
  $sql="SELECT * from `information`";
  $result=mysqli_query($connection,$sql);
  if($result){
    // $row=mysqli_fetch_assoc($result);
    // echo $row['name'];
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $rollno=$row['rollno'];
        $class=$row['class'];
        $section=$row['section'];
        echo'<tr>
        <td>'.$id.'</td>
        <td>'.$name.'</td>
        <td>'.$rollno.'</td>
        <td>'.$class.'</td>
        <td>'.$section.'</td>
        <td>
        <button><a href="update.php? updateid='.$id.'">Update</a></button>
        <button><a href="delete.php? deleteid='.$id.'">Delete</a></button>
      </td>
      </tr>';
    }

  }
  ?>
  <!-- <td>
    <button><a href="">Update</a></button>
    <button><a href="">Delete</a></button>
  </td> -->
  <!-- <tr>
    <td>Peter</td>
    <td>Griffin</td>
    <td>$100</td>
  </tr>
  <tr>
    <td>Lois</td>
    <td>Griffin</td>
    <td>$150</td>
  </tr>
  <tr>
    <td>Joe</td>
    <td>Swanson</td>
    <td>$300</td>
  </tr>
  <tr>
    <td>Cleveland</td>
    <td>Brown</td>
    <td>$250</td>
  </tr> -->
</table>
</body>
</html>






