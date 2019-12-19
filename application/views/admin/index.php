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
        <div style="background: whitesmoke;padding: 10px;">
        <form class="form-control-sm text-right" id= "form" action="">
  
          <div class="form-group text-right">
          <label for="min">Stok min:</label>
            

            <input type="text" name="min" size = 3 class="form-control-sm ml-2" id="min" 
            value= "<?php echo set_value('min', "3"); ?>"
            > 
            

            <label for="max">Stok max:</label>
            <input type="text" name="max" size = 3 class="form-control-sm ml-2" id="max" value= "<?php echo set_value('max', "14"); ?>" >

            

          </div>
        
        </form>
                
              </div>
              <div class="table-responsive">
                <table class="table table-sm" id="table-barang">
                  <tr>
                  <thead>
                    
                      <th>Kode</th>
                      <th>Obat</th>
                      <th width="50">Op</th>
                      <th>Stok min</th>
                      <th>Stok max</th>
                      <th>Supplier</th>
                      
                      <TH>Order</Th>
                      <TH>Telp</TH>
                      <th>Send</th>

                    
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
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

