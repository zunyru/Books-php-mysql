<?php
 session_start(); 
 include  "fucntion_query.php";

 //print_r($_POST['book_id']);
$id = $_SESSION["id"];
$data = $_POST['book_id'];

$history_id =  InsertLendBook($id);

foreach ($data as $key => $value) {

  $detail = InsertDetailLead($history_id,$value);
  $update = UpdatestatusBook($value,'ถูกยืม');
	
}

header("Location: returns.php?id=$id");