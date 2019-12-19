<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-pills"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Mitra <?= $title;?></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <?php
  $role_id = $this->session->userdata('role_id');
  $queryMenu = "SELECT USERMENU.ID, USERMENU.MENU
  FROM USERMENU JOIN USER_ACCESS_MENU
  ON USERMENU.ID = USER_ACCESS_MENU.MENU_ID WHERE USER_ACCESS_MENU.ROLE_ID = $role_id
  ORDER BY USER_ACCESS_MENU.MENU_ID ASC" ;
  
  $menu = $this->db->query($queryMenu)->result_array();
  
  
  ?>

  <!-- Divider -->
  <hr class="sidebar-divider">


  <!-- Heading -->
  <?php foreach($menu as $m): ?>
  <div class="sidebar-heading">
    <?= $m['MENU'];?>
  </div>

 
 <?php 
  $menuId = $m['ID'];
  
  $querySubMenu = "SELECT * FROM SUB_USER_MENU WHERE MENU_ID = $menuId and IS_ACTIVE = 1 "; 
  
  $subMenu = $this->db->query($querySubMenu)->result_array();
  
  ?>

    <?php foreach ($subMenu as $sm): ?>
  
      <?php if($title == $sm['TITLE']): ?>
        
        <li class = "nav-item active">
        
      <?php else:  ?>
        
        <li class = "nav-item">
      
      <?php endif; ?>  

          
          <a class = "nav-link" href = "<?= base_url($sm['URL']);?>">
      
          <i class = "<?= $sm['ICON']; ?>"></i>
      
          <span><?= $sm['TITLE']; ?></span>
          </a>
      
          </li>
      
          <hr class="sidebar-divider">
    
    <?php endforeach; ?>



  <?php endforeach; ?>
  

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    
    <a class="nav-link" href="<?= base_url('Auth/logout');?>"data-toggle="modal" data-target="#logoutModal">
    
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    
      <span>Logout</span></a>
      
  
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
  
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  
  </div>

</ul>
<!-- End of Sidebar -->