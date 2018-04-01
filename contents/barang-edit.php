 <?php
 include("../connection.php");

 $query = $conn->query("SELECT * FROM barang WHERE kode_barang = '" . $_GET['i'] . "' LIMIT 1 ");
 $result = $query->fetch_assoc();

 ?>

 <form method="post" id="form-input">
 <div class="col-xl-6">
  <div class="card pd-20 pd-sm-40">
      <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Kode Barang: </label>
                  <input class="form-control" type="text" readonly="true" name="kode_barang" placeholder="Kode Barang" value="<?php echo $result['kode_barang']; ?>">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Nama Barang: </label>
                  <input class="form-control" type="text" name="nama_barang" placeholder="Nama Barang" value="<?php echo $result['nama_barang']; ?>" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Jenis Barang: </label>
                  <input class="form-control" type="text" name="jenis_barang" placeholder="Jenis Barang" value="<?php echo $result['jenis_barang']; ?>">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Satuan Barang:</label>
                  <input class="form-control" type="text" name="satuan" placeholder="Satuan Barang" value="<?php echo $result['satuan']; ?>">
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
      $.post('system/function.php?f=edit_barang',$('#form-input').serialize(),function(response){
        if(response === 'true'){
           $('#main-content').load('contents/barang.php');
        }
        return false;
      })
    })
  })

</script>