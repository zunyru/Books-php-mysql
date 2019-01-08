<?php  
session_start(); 
$page = 'book';
$_SESSION["id"];?> 
<?php 
include "header.php";
include  "fucntion_query.php";

$book_id = $_GET['book_id'];
$book =  GetBook($book_id);

//print_r($book);
?>

<body>

	<!-- Navigation -->
	<?php include "navbar.php"; ?>
	<!-- Page Content -->

	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<img src="images/banner.jpg" class="img-fluid" alt="Responsive image">
			</div>
		</div>

		<div class="jumbotron">

			<div class="row">
				<div class="col col-lg-3">
				</div>
				<div class="col-lg-6 ">
					<h2 class="display-5 text-center">แก้ไขโครงงาน</h2>
					<br>
					<form class="container" action="update_book.php" method="post" id="needs-validation" novalidate enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom03">รหัสโครงงาน <span style="color: red"> *</span></label>
								<input type="text" class="form-control" id="validationCustom03" placeholder="รหัสโครงงาน" name="book_code" value="<?=$book->book_code?>" required>
								<div class="invalid-feedback">
									กรุณาระบุรหัสโครงงาน.
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom04">ชื่อโครงงาน<span style="color: red"> *</span></label>
								<input type="text" class="form-control" id="validationCustom04" placeholder="ชื่อโครงงาน" name="book_name" value="<?=$book->book_name?>" required>
								<div class="invalid-feedback">
									กรุณาระบุชื่อโครงงาน.
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom05">ผู้จัดทำ<span style="color: red"> *</span></label>
								<textarea name="book_user" class="form-control" id="validationCustom05" placeholder="ผู้จัดทำ" required rows="4"><?=$book->book_user?></textarea>
								<div class="invalid-feedback">
									กรุณาระบุผู้จัดทำ.
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom06">อาจารย์ที่ปรึกษา<span style="color: red"> *</span></label>
								<input type="text" class="form-control" id="validationCustom06" placeholder="ชื่ออาจารย์ที่ปรึกษา" name="book_techer"  value="<?=$book->book_techer?>" required>
								<div class="invalid-feedback">
									กรุณาระบุชื่ออาจารย์ที่ปรึกษา.
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom07">เลือกปี<span style="color: red"> *</span></label>
								<select class="custom-select" name="book_year" id="validationCustom07" required>
									<option value="" selected>เลือกปี </option>
									<?php 
									$selected = '';
									 for($i = 5; $i > 0; $i--){ 
									 if(date('Y')+544-$i == $book->book_year){
									 	 $selected = 'selected';
									 }	
                                    
									?>
									<option  value="<?=date('Y')+544-$i?>" <?=$selected?>><?=date('Y')+544-$i?></option>
									<?php } ?>
								</select>
								<div class="invalid-feedback">
									กรุณาเลือกปี.
								</div>
							</div>
						</div>
                       
                       <?php if($book->book_detail != ''){?>
						<div class="row">
							<div class="col-md-12 mb-3">
								<input type="hidden" name="file" value="<?=$book->book_detail?>">
								<a href="<?=$book->book_detail?>"><p>ดูเอกสาร บทคัดย่อ</p></a>
							</div>
						</div>	
						<?php }?>

						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom06">อัปบทย่อใหม่</label>
								<label class="custom-file">
									<input type="file" id="file2" name="file_up" class="custom-file-input">
									<span class="custom-file-control"></span>
								</label>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 mb-3">
								<label for="validationCustom07">เลือกสถานะโครงงาน <span style="color: red"> *</span></label>
								<select class="custom-select" name="book_status" id="validationCustom07" required>
									<option value="" selected>เลือกสถานะ </option>
									
									<option  value="ปกติ" <?=$book->book_status=='ปกติ' ? 'selected' : '';?>>ปกติ</option>
									<option value="หาย" <?=$book->book_status=='หาย' ? 'selected' : '';?>>หาย</option>
									<option value="อื่นๆ" <?=$book->book_status=='อื่นๆ' ? 'selected' : '';?>>อื่นๆ</option>
									
								</select>
								<div class="invalid-feedback">
									กรุณาเลือกปี.
								</div>
							</div>
						</div>

						<br>
						<div class="row">
							<div class="col-md-6 mb-3">
								<input type="hidden" name="book_id" value="<?=$book_id?>">
								<a href="delete_book.php?id=<?=$book_id?>" onclick="return checkDelete()"><button class="btn btn-danger" type="button">ลบโครงงาน</button></a>
								<button class="btn btn-warning" type="submit" onclick="myFunction()">บันทึกการแก้ไข</button>
							</div>
						</div> 
					</form>

					<script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
              	"use strict";
              	window.addEventListener("load", function() {
              		var form = document.getElementById("needs-validation");
              		form.addEventListener("submit", function(event) {
              			if (form.checkValidity() == false) {
              				event.preventDefault();
              				event.stopPropagation();
              			}
              			form.classList.add("was-validated");
              		}, false);
              	}, false);
              }());
          </script>
      </div>
  </div>
</div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
function myFunction() {
    alert("แก้ไขข้อมูลเรียบร้อย !");
}
function checkDelete(){
    return confirm('คุณต้องการที่จะลบข้อมูลโครงงานนี้ ?');
}
</script>

</body>

</html>
