<?php
include("connection.php");
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `information` where id=$id";
    $result=mysqli_query($connection,$sql);
    if($result){
        // echo"deleted";
        header("location:dashboard.php");
    }
}
?>
