
<?php
    $active_index = '';
    $active_register = '';
    $active_admin  ='';
    $active_lend = '';
    $active_return = '';
    $active_book = '';

    if($page == 'index'){
       $active_index = 'active';
    }elseif($page == 'register'){
      $active_register = 'active';

    }elseif($page == 'admin'){
      $active_admin = 'active';
    }elseif($page == 'lend'){
      $active_lend = 'active';

    }elseif($page == 'return'){
      $active_return = 'active';

    }elseif($page == 'book'){
      $active_book = 'active';
    }
?>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">ระบบยืม-คืนโครงงานนักศึกษา สาขาคอมพิวเตอร์ธุรกิจ</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <?php 
    if(isset($_SESSION["status"])){
        $user = getUser($_SESSION["id"]);
      if($_SESSION["status"] == 0){ 

         ?>
    <!-- User -->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?=$active_index?>">
            <a class="nav-link" href="index.php">หน้าแรก
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item <?=$active_lend?>">
            <a class="nav-link" href="manage-lend.php#example">ยืม</a>
          </li>
          <li class="nav-item <?=$active_return?>">
            <a class="nav-link" href="returns.php?id=<?php echo $_SESSION["id"]?>#example">ตารางยืม</a>
          </li>
          <li class="nav-item <?=$active_admin?>">
            <a class="nav-link" href="logout.php">อกกจากระบบ</a>
          </li>
        </ul>
      </div>
    <?php }else{ ?>
    <!-- Admin -->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?=$active_index?>">
            <a class="nav-link" href="index.php">หน้าแรก
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item <?=$active_return?>">
            <a class="nav-link" href="manage-lend-admin.php">จัดการการยืม-คืน</a>
          </li>
          <li class="nav-item <?=$active_lend?>">
              <a class="nav-link" href="lend.php">การจัดการข้อมูลหนังสือ</a>
            </li>
          <li class="nav-item <?=$active_book?>">
            <a class="nav-link" href="book.php">เพิ่มโครงงานใหม่</a>
          </li>
          <li class="nav-item <?=$active_admin?>">
            <a class="nav-link" href="logout.php">อกกจากระบบ</a>
          </li>
        </ul>
      </div>
    <?php }
       }else{?>
      <!-- orther -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?=$active_index?>">
              <a class="nav-link" href="index.php">หน้าแรก
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item <?=$active_lend?>">
              <a class="nav-link" href="lend.php">ค้นหาขั้นสูง</a>
            </li>
            <li class="nav-item <?=$active_register?>">
              <a class="nav-link" href="register.php">ลงทะเบียน</a>
            </li>
            <li class="nav-item <?=$active_admin?>">
              <a class="nav-link" href="admin-page.php">เข้าสู่ระบบ</a>
            </li>
          </ul>
        </div>

    <?php }?>
    </div>
  </nav>
</div>  
