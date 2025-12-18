 <div class="sidebar pe-4 pb-3">
     <nav class="navbar bg-secondary navbar-dark">
         <a href="index.php" class="navbar-brand mx-4 mb-3">
             <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin Panel</h3>
         </a>
         <div class="d-flex align-items-center ms-4 mb-4">
             <div class="position-relative">
                 <img class="rounded-circle" src="assets/img/user_red.jpg" alt="" style="width: 40px; height: 40px;">
                 <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
             </div>
             <div class="ms-3">
                 <h6 class="mb-0"> <?php echo $_SESSION['login_user']; ?>
                 </h6>
                 <span><?php echo ucfirst($_SESSION['role']); ?></span>
             </div>
         </div>
         <div class="navbar-nav w-100">
             <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Data Master</a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="data_dosen.php" class="dropdown-item">Data Dosen</a>
                     <a href="data_mahasiswa.php" class="dropdown-item">Data Mahasiswa</a>
                     <a href="data_matakuliah.php" class="dropdown-item">Data Matakuliah</a>
                     <a href="data_nilai.php" class="dropdown-item">Data Nilai</a>
                 </div>
             </div>
     </nav>
 </div>