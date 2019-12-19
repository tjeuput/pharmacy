

<body id="page-top">

  <!-- Page Wrapper -->
 

    <!-- Content Wrapper -->
    
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
           
          </div>

          <div class="row">
            <div class="col-lg-6">
              <?= $this->session->flashdata('message'); ?>
            </div>
          </div>

          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/'). $user['IMAGE']; ?>" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $user['NAME'];?></h5>
                  <p class="card-text"><?= $user['EMAIL'];?>
                  <p class="card-text"><small class="text-muted">Member since <?php echo date('d F Y', $user['DATE_CREATED']);?></small></p>
                </div>
              </div>
            </div>
          </div>
          </div>
          
      <!-- End of Main Content -->
<!-- Footer -->
        
      <!-- End of Footer -->
    

    </div>
    <!-- End of Content Wrapper -->
    <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Putri Wulandari <?php echo date('Y'); ?></span>
            </div>
          </div>
      </footer>
  </div>
  <!-- End of Page Wrapper -->

   

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to loggout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('Auth/logout');?>">Yes, log me out</a>
        </div>
      </div>
    </div>
  </div>

 