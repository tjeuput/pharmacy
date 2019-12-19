

<body id="page-top">

<!-- Page Wrapper -->


  <!-- Content Wrapper -->
  

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
          <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
         
        </div>

        <div class="row">
            <div class="col-lg-8">
           
            <?= form_open_multipart( base_url('user/edit'));?>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                
                <div class="col-sm-10">
                
                <input type="text" name="email" readonly class="form-control-plaintext" id="email" value="<?= $user['EMAIL'];
               ?>">
                
                </div>
             </div>   
            
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                
                <div class="col-sm-10">
                
                <input type="text" name = "name" class="form-control-plaintext" id="name" value="<?= $user['NAME'];?>">
                <?= form_error('name','<small class= "text-danger pl-3">', 
                '</small>');?>
                
                </div>
             </div>   
 
            <div class="form-group row">
            <div class="col-sm-2">Picture</div>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-3">
                   <img src="<?= base_url('assets/img/profile/') . $user['IMAGE'];?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id = "image" name = "image">
                    <label class = "custom-file-label" for="image"> Choose file</label>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div class="form-group row justify-content-end">
            <div class="col-sm-10 mx-n3">
                    <button type="submit" class="btn btn-primary">Edit</button>
            </div>
          </div>  
        </form>  
            
          </div>
            
        </div>

        
    </div>
 
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

