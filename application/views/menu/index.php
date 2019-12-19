

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

        <a href ="#" class= "btn btn-primary mb-2" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
        <?= $this->session->flashdata('message'); ?>
        <?php echo $this->input->post('newdata');?>

        
        <table class="table table-hover mt-3">
        <?= form_error('menu','<div class= "alert alert-danger col-6" role="alert">', 
                '</div>');?>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Menu</th>
              <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($menu as $m): ?>
              <tr>
              <?php $i = 1; ?>
                <th scope="row"><?= $m['ID']; ?></th>
                <td><?= $m['MENU']; ?></td>
                <td><a class = "badge badge-info" href="">Edit</a> | <a class = "badge badge-danger" href="">Delete</a></td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?> 
            </tbody>
          </table>
                  
    <!-- End of Main Content -->
<!-- Footer -->
      
    <!-- End of Footer -->
  

  </div>
 

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModal">Add New Menu</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action = "<?= base_url('Menu/index'); ?>" method="post">
      <div class="modal-body">
      <div class="form-group"> <input type="text" class="form-control form-control-user" id="newdata" name="newdata" placeholder="">
                </div></div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add</a>
        </form>
      </div>
      
      </div>
     
    </div>
  </div>
</div>

