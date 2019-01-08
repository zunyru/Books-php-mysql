<?php
require_once 'connect_db.php';

function checkLogin($username,$pass){
	global $conn ;
	$sql = "SELECT * FROM tb_user WHERE student_id = '$username' AND password = '$pass' ";
	$result = $conn->query($sql);
	$row = $result->fetch_object();

	return $row;
}

function getUser($id){
	global $conn ;
	$sql = "SELECT * FROM tb_user WHERE user_id = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_object();

	return $row;
}

function insertUser($data){
	global $conn ;
	$sql ="INSERT INTO tb_user (user_id, student_id, password, name, lastname, status) 
	VALUES (NULL, '".$data['username']."', '".$data['password']."', '".$data['name']."', '".$data['lastname']."', '0');";
	$result = $conn->query($sql);
	$id = $conn->insert_id;

	return $id;

}

function GetDataBooks(){
	global $conn ;
	$sql = "SELECT * FROM tb_book";
	$result = $conn->query($sql);
	$results = [];
	while ($row = $result->fetch_object()) {
		$results[] = $row;
	}

	return $results;
}

function InsertLendBook($id){
	global $conn ;
	$date = date('Y-m-d H:i:s');

	$sql = "INSERT INTO tb_history (history_id, user_id, history_date, history_status) 
	VALUES (NULL, '$id', '$date', '0');";
	$result = $conn->query($sql);
	$id = $conn->insert_id;

	return $id;
}

function InsertDetailLead($history_id,$boo_id){
	global $conn ;
	$date_strat = date('Y-m-d H:i:s');
	$date_end = date('Y-m-d', strtotime("+30 days"));
	$sql = "INSERT INTO tb_detail (detail_id, history_id, book_id, status_lend, lend_date_end, fine, lent_date_strat) VALUES (NULL, '$history_id', '$boo_id', '0', '$date_end', '0', '$date_strat');";
	$result = $conn->query($sql);
	$id = $conn->insert_id;

	return $id;
}

function UpdatestatusBook($book_id,$status){
	global $conn ;
	echo $sql ="UPDATE tb_book SET book_status = '$status' WHERE book_id = $book_id;";
	$result = $conn->query($sql);
	return "update";

}
function DateThai($strDate)
{
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("n",strtotime($strDate));
	$strDay= date("j",strtotime($strDate));
	$strHour= date("H",strtotime($strDate));
	$strMinute= date("i",strtotime($strDate));
	$strSeconds= date("s",strtotime($strDate));
	$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMonthThai=$strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear";
}

function GetDetailLend($id){
	global $conn ;
	$sql ="SELECT h.*,d.*,b.book_name,b.book_status,b.book_detail FROM tb_history h LEFT JOIN tb_detail d ON h.history_id = d.history_id LEFT JOIN tb_book b ON d.book_id = b.book_id WHERE h.user_id = $id ORDER BY h.history_date DESC";
	$result = $conn->query($sql);
	$results = [];
	while ($row = $result->fetch_object()) {
		$results[] = $row;
	}

	return $results;
}

function GetDataLend(){
	global $conn ;
	$sql ="SELECT h.*,d.*,b.book_name,b.book_status,b.book_detail,u.name,u.lastname,u.student_id FROM tb_history h LEFT JOIN tb_detail d ON h.history_id = d.history_id LEFT JOIN tb_book b ON d.book_id = b.book_id  LEFT JOIN tb_user u ON u.user_id = h.user_id ORDER BY h.history_date DESC";
	$result = $conn->query($sql);
	$results = [];
	while ($row = $result->fetch_object()) {
		$results[] = $row;
	}

	return $results;
}

function UpdateDataLend($book_id,$fine){
	global $conn ;
	$sql ="UPDATE tb_detail SET status_lend = '1',fine = '$fine' WHERE book_id = $book_id;";
	$result = $conn->query($sql);

	return true;
}

function InsertBook($data,$file){
	global $conn ;
	$date = date('Y-m-d');
	echo $sql ="INSERT INTO tb_book (book_id, book_name, book_detail, book_user, book_techer, book_year, book_date, book_status, book_code)
	VALUES (NULL, '".$data['book_name']."', '".$file."', '".$data['book_user']."', '".$data['book_techer']."', '".$data['book_year']."', '".$date."', 'ปกติ', '".$data['book_code']."');";
	$result = $conn->query($sql); 
	
	$id = $conn->insert_id;

	return $id;
}

function GetBook($id){
	global $conn ;
	$sql ="SELECT * FROM tb_book WHERE book_id = $id;";
	$result = $conn->query($sql);

	$row = $result->fetch_object();
	return $row;
}

function UpadateBook($data,$file){
	global $conn ;
	$sql ="UPDATE tb_book SET book_name = '".$data['book_name']."',book_code = '".$data['book_code']."',book_detail = '".$file."',book_user = '".$data['book_user']."',book_techer = '".$data['book_techer']."',book_year = '".$data['book_year']."',book_status = '".$data['book_status']."'  WHERE book_id = '".$data['book_id']."'";
	$result = $conn->query($sql);
}

function DeleteBook($id){
	global $conn ;
	$sql ="DELETE FROM tb_book WHERE book_id = $id";
	$result = $conn->query($sql);
}

function DateDiff($strDate1,$strDate2)
{
    return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
}
function TimeDiff($strTime1,$strTime2)
{
	return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
}

function DateTimeDiff($strDateTime1,$strDateTime2)
{
    return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 * 24); // 1 Hour =  60*60
}

