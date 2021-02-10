<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../page/dashboard.php" class="brand-link">
      <img src="../image/logo.jpg" alt="Logo Sistem" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">HR SYSTEM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../image/user/default.png" alt="Logo Sistem" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $user -> get_fullname()?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="../page/dashboard.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : 'a' ; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="../page/karyawan.php"  class="nav-link  <?php echo (basename($_SERVER['PHP_SELF']) == 'karyawan.php') ? 'active' : 'a' ; ?>">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Karyawan
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="../page/user.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'user.php') ? 'active' : 'a' ; ?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                User
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>