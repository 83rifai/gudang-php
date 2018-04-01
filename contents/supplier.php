<?php include '../connection.php'; ?>
<div class="card pd-20 pd-sm-40">
  <?php
    $query = $conn->query("SELECT * FROM supplier");
  ?>
          <p class="mg-b-20 mg-sm-b-30">
              <a href="javascript:void(0)" class="menu-link btn btn-success" data-link="supplier-tambah">TAMBAH SUPPLIER</a>
          </p>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Kode Supplier</th>
                  <th class="wd-15p">Nama Supplier</th>
                  <th class="wd-20p">Contact Person</th>
                  <th class="wd-15p">Alamat</th>
                  <th class="wd-10p"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($result = $query->fetch_assoc()) {
                    ?>
                    <tr>
                      <td><?php echo $result['kode_supplier']; ?></td>
                      <td><?php echo $result['nama_supplier'];?></td>
                      <td><?php echo $result['contact_person'];?></td>
                      <td><?php echo $result['alamat'];?></td>
                      
                      <td align="center">
                        <a href="javascript:void(0)" data-link="supplier-edit" data-id="<?php echo $result['kode_supplier'];?>" title="Edit" class="btn btn-primary btn-sm edit-link"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" title="Delete" data-link="supplier-delete" data-id="<?php echo $result['kode_supplier'];?>" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                  }
                ?>
                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

<script src="lib/datatables/jquery.dataTables.js"></script>
<script src="lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="lib/select2/js/select2.min.js"></script>
   <script>
    $(document).ready(function(){
      $('.menu-link').click(function(){
        var content = this.dataset.link;
        $('#main-content').load('contents/' + content + '.php');
        $('#page-title').text(content.replace('-', ' '));
      }); // end

      $('.edit-link').click(function(){
        var content = this.dataset.link;
        var Id = this.dataset.id;
        $('#main-content').load('contents/' + content + '.php?i=' + Id);
        $('#page-title').text(content.replace('-', ' '));
      }); // end

      $('.delete-link').click(function(){
        var content = this.dataset.link;
        var Id = this.dataset.id;
        $.post('system/function.php?f=delete_barang',{kode_barang:Id}, function(response){
          console.log(response);
          if(response === 'true'){
             $('#main-content').load('contents/barang.php');
          }
        })
       
      }); // end

    })

      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });


        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>