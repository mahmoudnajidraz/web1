<?php
include_once 'Db.php';
$id=$_POST['id'];

$query="delete from managers where id=$id";
   $result = mysqli_query( $c, $query);
    if($result){
      header('location:show_Managers.php');
    }