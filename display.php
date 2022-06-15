<?php
include("connection.php");
?>
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
