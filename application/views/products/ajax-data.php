<!-- Display posts list -->
<?php if(!empty($products)){ foreach($products as $row){ ?>
	<div class="list-item"><a href="#"><?php echo $row["NAMA_BARANG"]; ?></a></div>
<?php } }else{ ?>
	<p>Maaf produk tidak tersedia...</p>
<?php } ?>

<!-- Render pagination links -->
<?php echo $this->ajax_pagination->create_links(); ?>
