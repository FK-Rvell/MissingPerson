<?php
$conn=mysqli_connect("localhost","root","","missing");

   if(isset($_GET['id'])){
    $id_delete=$_GET['id'];
    $sql="DELETE FROM signalement WHERE id=$id_delete";
    $execute=mysqli_query($conn,$sql);
    header('location: liste.php');
   }
?>