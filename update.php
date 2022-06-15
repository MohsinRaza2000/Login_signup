<?php
include("connection.php");
$id=$_GET['updateid'];
$sql="SELECT * FROM `information` where id = $id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$rollno=$row['rollno'];
$class=$row['class'];
$section=$row['section'];
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $rollno=$_POST['rollno'];
    $class=$_POST['class'];
    $section=$_POST['section'];
    $query="UPDATE `information` SET `id`='$id',`name`='$name',`rollno`='$rollno',`class`='$class',`section`='$section' WHERE id=$id";
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
Name: <input type="text" name="name" value=<?php echo $name ?>><br>
Roll no:  <input type="text" name="rollno" value=<?php echo $rollno ?>><br>
Class:  <input type="text" name="class" value=<?php echo $class ?> ><br>
Section:  <input type="text" name="section" value=<?php echo $section ?>><br>
<input  name ="submit" type="submit">
</form>

    </body>
</html>
