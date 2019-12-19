<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">


    $(document).ready(function() {

    
          

         var tabel = $('#table-barang').DataTable({

            
          
        
            "processing": true,
            "serverSide": true,
          

            "ajax":
            {
                "url": "<?php echo base_url(); ?>admin/view", // URL file untuk proses select datanya
                "type": "POST"           

            },
            
             
            
            "lengthMenu": [ [ 50, 100, -1], [50, 100, "All"] ],
            "pageLength": 100,
            "columns": [
                { "data": "ID_BARANG" }, 
                { "data": "NAMA_BARANG" },
                { "data": "STOK_OPNAME" },
                { "data": null,
                  "render" : function(data, type, row){
                    return (Math.ceil(data['MULTIPLY']))
                    ;

                 }
               },

                { "data": null,
                  "render" : function(data, type, row){
                    return (Math.ceil(data['MULTIPLY_01']))}},
                { "render" : function (data, type, row, meta){
                    return row['NAMA_SUPPLIER'];
                    
                  }

                  },
                  
                { "data": null,
                  "render": function(data, type, row){
                    return data['CEILING'] + '' + data['SATUAN_PEMBELIAN'];
                    }

                 },
            
            
                
                { "data": "HP" },
                {
                  "mRender" : function (data, type, row, meta){
                    return '<a class="btn btn-primary btn-sm" href="https://api.whatsapp.com/send?phone=6281803152004&text=%20pesanan%20:%20'+ row.NAMA_BARANG+'%20Jumlah%20:'+row.CEILING+'%20'+row.SATUAN_PEMBELIAN+'" > Send </a>';
                    
                  }
                }

            
            ],
            "columnDefs": [
            {
                "searchable": true,
                "targets": [1,5]

            }
           ]
           




        });
  
        
        $('#max').on('change blur', function(){

    
          if($(this).val().trim().length === 0){
            this.value = this.value.trim() || this.defaultValue;
            tabel.columns(3).search(this.defaultValue);
           console.log(this.value)
          } else {
            tabel.columns(4).search(this.value);
           console.log(this.value)
          
          }

           tabel.draw();
          
        });
        
       
        $('#min').on('change blur', function(){
          if($(this).val().trim().length === 0){
            this.value = this.value.trim() || this.defaultValue;
        
          } else {
          tabel.columns(3).search(this.value);
          
         

        }

         tabel.draw();

        ;
    
        });

    }) ; 

   
    </script>
  </body>
</html>