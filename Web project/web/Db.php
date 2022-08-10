<?php
$c= mysqli_connect('localhost','root','','project2');

if(!$c){
    die("error". mysqli_connect_error());
}