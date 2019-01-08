
<?php  
session_start();  
include  "fucntion_query.php";
$page = 'register';

$data = $_REQUEST;

if(isset($data['submit'])){
  $user = insertUser($data);
  if($user >= 1){
     $_SESSION["regis"] = 1;
     header("Location: admin-page.php");
  }
}

?> 
<?php include "header.php" ?>

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
        <div class="col-lg-6 text-center">
         <h2 class="display-5">ลงทะเบียน</h2>
         <br>
         <form class="container" id="needs-validation" novalidate method="post">
           <div class="row">
             <div class="col-md-6 mb-3">
               <label for="validationServer01">รหัสนักศึกษา</label>
               <input type="text" class="form-control " id="validationServer01" placeholder="รหัสนักศึกษา"  required name="username">
               <div class="invalid-feedback">
                 กรุณากรอกรหัสนักศึกษา.
               </div>
             </div>
             <div class="col-md-6 mb-3">
               <label for="validationServer02">รหัสผ่าน</label>
               <input type="password" class="form-control " id="validationServer02" placeholder="รหัสผ่าน" required name="password">
               <div class="invalid-feedback">
                 กรุณากรอกรหัสรหัสผ่าน.
               </div>
             </div>
           </div>
           <div class="row">
             <div class="col-md-6 mb-3">
               <label for="validationServer03">ชื่อ</label>
               <input type="text" class="form-control " id="validationServer03" placeholder="ชื่อ" required name="name">
               <div class="invalid-feedback">
                 กรุณากรอกรหัสชื่อ.
               </div>
             </div>
             <div class="col-md-6 mb-3">
               <label for="validationServer04">นามสกุล</label>
               <input type="text" class="form-control " id="validationServer04" placeholder="นามสกุล" required 
               name=" lastname">
               <div class="invalid-feedback">
                 กรุณากรอกรหัสนามสกุล.
               </div>
             </div>
           </div>

           <button class="btn btn-primary" type="submit" name="submit">ลงทะเบียน</button>
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

  </body>

  </html>
