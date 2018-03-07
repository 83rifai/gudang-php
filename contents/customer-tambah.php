 <form method="post" id="form-input">
 <div class="col-xl-6">
  <div class="card pd-20 pd-sm-40">
      <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">ID Customer: </label>
                  <input class="form-control" type="text" name="id_customer" placeholder="ID Customer" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Nama Customer: </label>
                  <input class="form-control" type="text" name="Nama_Customer" placeholder="Nama Customer" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Alamat: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="Alamat" placeholder="Alamat">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Contact Person: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="Contact_person" placeholder="Contact Person">
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
      $.post('system/function.php?f=tambah_customer',function(response){
        console.log(response)
        return false;
      })
    })
  })

</script>