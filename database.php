<?php
$servername = "localhost";
$username = "root";
$password = "admin123";

$name='';
$id =0;
$update = false;
// Create connection
$conn = new mysqli($servername, $username, $password,'crud') or die(mysqli_error($conn));
if(isset($_POST['save']))
{
  $id = $_POST['ID'];
  $name = $_POST['Name'];
  $conn->query("INSERT into emp (id,name) VALUES('$id','$name')") or die($conn->error);
}

if(isset($_GET['delete']))
{
  $id = $_GET['delete'];
  $conn->query("DELETE from emp where id= $id") or die($conn->error);
}

if(isset($_GET['edit']))
{
  $update = true;
  $id = $_GET['edit'];
  $result = $conn->query("select * FROM emp where id = $id") or die($conn->error);
  if(count(array($result))==1)
  {
    $row = $result->fetch_array();
    $id = $row['id'];
    $name = $row['name'];  
  }
}

if(isset($_POST['update']))
{
  $id = $_POST['ID'];
  $name = $_POST['Name']; 
  $conn->query("UPDATE emp SET name='$name' where id=$id") or die($conn->error);
}

$conn->close();
?> 