<?php  
session_start(); 
 include  "fucntion_query.php";
 $data = $_REQUEST;
 $_SESSION["id"];

 //print_r($data);

$temp = explode(".", $_FILES["file_up"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["file_up"]["tmp_name"], "./file/" . $newfilename);

$name_file = "./file/" . $newfilename;
$book = InsertBook($data,$name_file);

header("Location: lend.php#example");