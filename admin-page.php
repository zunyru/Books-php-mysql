
<?php
  session_start(); 
  include  "fucntion_query.php";
  $page = 'admin';
  $data = $_REQUEST;

  if(isset($data['submit'])){
     $login = checkLogin($data['username'],$data['password']);

     if(!is_null($login)){
      $user = getUser($login->user_id);
      if($user->status == 0){
        //user
        $_SESSION["book_id"] = $data['book_id'];
        $_SESSION["status"] = $user->status;
        $_SESSION["id"] = $user->user_id; 
        header("Location: manage-lend.php");
      }else{
        //admin
        $_SESSION["status"] = $user->status;
        $_SESSION["id"] = $user->user_id; 
        header("Location: manage-lend-admin.php");
      }
     }else{
      $_SESSION["check"] = 0; 
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
         <h2 class="display-5">เข้าสู่ระบบ</h2>
         <br>
        <?php if(isset($_SESSION["check"])){ unset($_SESSION["check"]) ?>
         <div class="alert alert-danger" role="alert">
           User name และ Password ไม่ถูกต้อง !
         </div>
        <?php }?> 
        <?php if(isset($_SESSION["regis"])){ unset($_SESSION["regis"]) ?>
         <div class="alert alert-success" role="alert">
           คุณสามารถเข้าสู่ระบบได้แล้วค่ะ !
         </div>
        <?php }?> 

      
         <form class="container" id="needs-validation" novalidate method="post">
           <div class="row">
             <div class="col-md-6 mb-3">
               <label for="validationServer01">user name</label>
               <input type="hidden" value="<?=@$_GET['book_id']?>" name="book_id">
               <input type="text" class="form-control " id="validationServer01" placeholder="username" name="username"  required>
               <div class="invalid-feedback">
                 กรุณากรอก user name.
               </div>
             </div>
             <div class="col-md-6 mb-3">
               <label for="validationServer02">รหัสผ่าน</label>
               <input type="password" class="form-control " id="validationServer02" placeholder="รหัสผ่าน" name="password" required>
               <div class="invalid-feedback">
                 กรุณากรอกรหัสรหัสผ่าน.
               </div>
             </div>
           </div>

           <button class="btn btn-primary" type="submit" name="submit">เข้าสู่ระบบ</button>
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
    <script type="text/javascript">
      $(document).ready(function () {
          $(".alert").fadeIn().delay(2000).fadeOut(1000, function () { $(this).remove(); });
      });
    </script>

  </body>

  </html>
