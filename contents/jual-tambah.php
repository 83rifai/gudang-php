 <?php
 include('../connection.php');
  $query = $conn->query("SELECT no_jual FROM jual WHERE no_jual LIKE '1".date ('y')."%'");
  $count = $query->num_rows;


  $tahunbulan = "1".date ("ymd")."001";
  $nobeli = (int)$tahunbulan+(int)$count;

  $dataBarang = $conn->query("SELECT * FROM barang");
  $dataCustomer = $conn->query("SELECT * FROM customer");
  
 ?>
          
 <form method="post" id="form-input" action="#">

        <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <div class="row">
                <label class="col-sm-4 form-control-label">No Penjualan:</label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="no_pembelian" placeholder="Nomor Jual" value="<?php echo $nobeli; ?>" readonly="true" >
                </div>
              </div><!-- row -->
               <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Tanggal:</label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control datepicker" name="tanggal" placeholder="MM/DD/YYYY">
                </div>
              </div>
            </div><!-- card -->
          </div><!-- col-6 -->

          <div class="col-xl-6">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <div class="row">
                <label class="col-sm-4 form-control-label">Nama Customer:</label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select class="form-control select2-show-search" name="customre" data-placeholder="Choose one">

                    <option label="Choose one"></option>
                     <?php
                    
                    while ($returnCustomer = $dataCustomer->fetch_assoc()) {
                      echo '<option value="'.$returnCustomer['id_customer'].'">'.$returnCustomer['nama_customer'].'</option>';
                    }
                      
                   
                    ?>
                  </select>
                </div>
              </div>
              
            </div>
          </div>

        </div><!-- row -->


        <div class="card pd-20 pd-sm-40 mg-t-20">
          <div class="table-responsive">
            <table class="table mg-b-0">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th width="100px">QTY</th>
                  <th>Harga</th>
                  <th>Satuan</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <td>
                   
                    <select class="form-control select2-show-search" name="barang" data-placeholder="Choose one">

                    <option label="Choose one"></option>
                     <?php
                    
                    while ($returnBarang = $dataBarang->fetch_assoc()) {
                      echo '<option value="'.$returnBarang['kode_barang'].'">'.$returnBarang['nama_barang'].'</option>';
                    }
                      
                   
                    ?>
                  </select>
                </td>
                  <td><input type="text" name="jumlah" class="form-control" placeholder="QTY"></td>
                  <td><input type="text" name="price" class="form-control" placeholder="Harga"></td>
                  <td><input type="text" name="unit" class="form-control" placeholder="Satuan"></td>
                  <td>
                    <button type="button" class="btn btn-success btn-md" id="btn-tambah">TAMBAH</button>
                  </td>
                </tr>
                
              </thead>
              <tbody class="result-row">
              </tbody>
            </table>
          </div>
        </div>

        <div class="card pd-20 pd-sm-40 mg-t-20">
          <button type="button" id="button-save-pembelian" class="btn btn-success btn-md"><i class="fa fa-save"></i>&nbsp;SIMPAN</button>
        </div>



</form>

    

<script type="text/javascript">
  
  $(document).ready(function(){
    $('#button-save').click(function(){
      $.post('system/function.php?f=tambah_barang',function(response){
        console.log(response)
        return false;
      })
    }); // end

    $('#btn-tambah').click(function(){

      let long = $('.result-row').find('tr').length;
      let prodCode = '';
      let prodName = '';

      let row = "";

      prodCode = $('[name=barang] :selected').val();
      prodName = $('[name=barang] :selected').text();
      row += "<tr class='row-count count-"+long+"'>";
        row += "<td>" + prodName +  "</td>";
          row += "<input type='hidden' name='params["+long+"][kode_barang]' value='"+prodCode+"'>";
        row += "<td>" + $('[name=jumlah]').val() + "</td>";
          row += "<input type='hidden' name='params["+long+"][qty]' value='"+ $('[name=jumlah]').val() +"'>";
        row += "<td>" + $('[name=price]').val() + "</td>";
          row += "<input type='hidden' name='params["+long+"][harga]' value='"+ $('[name=price]').val() +"'>";
        row += "<td>" + $('[name=unit]').val() + "</td>";
          row += "<input type='hidden' name='params["+long+"][satuan]' value='"+ $('[name=unit]').val() +"'>";
        row += "<td align='center'><button type='button' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></td>";
      row += "</tr>";


      $('.result-row').append(row);

    });

    $('#button-save-pembelian').click(function(){
      $.post('system/function.php?f=tambah_pembelian',$('#form-input').serialize(),function(response){
        console.log(response)
      })
    });

  })


      $(function(){

        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        // Select2 by showing the search
        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });

         $('.datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });
       
      
      });
    </script>