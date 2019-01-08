<?php  
session_start(); 
include  "fucntion_query.php";

$id = $_GET['id'];

$delete =  DeleteBook($id);

header("Location: lend.php");