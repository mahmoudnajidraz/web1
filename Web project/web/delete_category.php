<?php
include_once 'Db.php';
$id=$_POST['ide'];
echo $id;
$query1="delete from shops where Categories=$id";
   $result1 = mysqli_query( $c, $query1);
    if($result1){
      $query="delete from categories where id=$id";
   $result = mysqli_query( $c, $query);
    if($result){
      header('location:show- Category.php');
    }
  }

