 <?php
 include("../connection.php");

 $query = $conn->query("SELECT * FROM barang WHERE Kode_Barang = '" . $_GET['i'] . "' LIMIT 1 ");
 $result = $query->fetch_assoc();

 ?>

 <form method="post" id="form-input">
 <div class="col-xl-6">
  <div class="card pd-20 pd-sm-40">
      <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Kode Supplier: </label>
                  <input class="form-control" type="text" name="Kode_Supplier" placeholder="Kode Supplier" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Nama Supplier: </label>
                  <input class="form-control" type="text" name="Nama_Supplier" placeholder="Nama Supplier" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Alamat: <!-- <span class="tx-danger">*</span> --></label>
                  <input class="form-control" type="text" name="Alamat" placeholder="Alamat">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Contact Person: </label>
                  <input class="form-control" type="text" name="Contact_Person" placeholder="Contact Person">
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button type="button" class="btn btn-success mg-r-5" id="button-save">Simpan</button>
              <button class="btn btn-secondary" >Batal</button>
            </div><!-- form-layout-footer -->
      </div><!-- form-layout -->
    </div><!-- card -->
  </div>
</form>


<script type="text/javascript">
  
  $(document).ready(function(){
    $('#button-save').click(function(){
      $.post('system/function.php?f=tambah_barang',function(response){
        console.log(response)
        return false;
      })
    })
  })

</script>