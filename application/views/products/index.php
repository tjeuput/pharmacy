<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// if(isset($_GET['add'])){

//   echo $_GET['add'];
	// $id = $_GET['add'];
	// $q = 1;
	// $keys = array();
	// // check if value exists:
	// if(array_key_exists($id, $_SESSION['cart'])){
	// 	flash('post_message', 'Produk sudah ada dalam keranjang');
		
	// } else {
	
	// $_SESSION['cart'][] = $id;
	// flash('post_message', 'Sukses pilih produk');
	
	// }


	// else {
  //   echo "";
  // }

  $_SESSION['cart'][] = $this->input->post('id');

  print_r($_SESSION['cart']);


?> 
 <div class="container justify-content-center">
 
    
 
          
            <div class="row">
                <div class="col-lg-10">
                   <h1>Katalog Obat dan Alat Kesehatan</h1>
                    <p>Ketikkan nama obat yang anda cari pada kotak pencarian dan konfirmasikan harga dan pemesanan ke whatsapp kami</p>
                    <br>
            </div>

                    <form action="" method="POST">
                        <div class="input-group text-lg-center">
                            <input type="text" class="form-control" placeholder="cari obat / alat kesehatan" 
                                   name="search_product" value="">

                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari </button>
                            </span>
                        </div> 
                    </form>
                    <a class="btn btn-outline-success btn-lg btn-block mt-3 lg-6" href= "https://api.whatsapp.com/send?phone=6281803152004&text=<?php
          
        
                      echo "Halo Apotek Mitra Pugeran saya mau menanyakan obat: " ;
                      // echo ". Alamat kirim : " . $data['customer']['address'] . " " . $data['customer']['state'] . " " . $data['customer']['zip'] . " " ;
                    ?>" role = "button" >Lanjutkan ke Whatsapp <i class="fa fa-whatsapp" style="font-size:30px"></i> </a>
          
       



                </div>
          
       </div>
           


    
        <div class="container mt-3">
          <div class = "row">
           
          
          </div>  

            <div class="row">
              </ul>
             <?php foreach ($products as $product): ?> 
                <div class="col-xs-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                 
                  <div class="card" style="width: 16rem;">
                  
                  <img width="100%" height= "150px" src= <?php echo base_url() . "images/" . rawurlencode(rtrim($product['NAMA_BARANG'])) .".png";?>

                    class="card-img-top" alt="..."> 
                      <div class="card-body">
                       
                          <p><b><?php echo $product['NAMA_BARANG'];
                        
                          ?></b></p>
                                
                        <form action = "<?= base_url('Products/index'); ?>" method="post">
                        
                        <input type="hidden" class="form-control form-control-user" id="idbarang" name="idbarang" value=<?= $product['ID_BARANG'];?>>
                        <button type="submit" class="btn btn-primary">PILIH</button></form>
                
                     
                        <p class="card-text"><small> Rp. <?= number_format(ceil($product['HARGAJUAL2'])) ;?> / <?php echo strtolower($product['SATUAN']); ?></small> </p>
                        <br/> 
                       

                      </div> 
                      
                    </div>
                       
                    </div>
          <?php endforeach; ?> 
                    
             </div>
          <?php echo $this->pagination->create_links(); ?>
         </div>

         

