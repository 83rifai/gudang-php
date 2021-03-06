<?php include '../connection.php'; ?>
<div class="card pd-20 pd-sm-40">
  <?php
    $query = $conn->query("SELECT * FROM jual");
  ?>
          <p class="mg-b-20 mg-sm-b-30">
              <a href="javascript:void(0)" class="menu-link btn btn-success" data-link="jual-tambah">TAMBAH PENJUALAN</a>
          </p>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">No Jual</th>
                  <th class="wd-15p">Tanggal</th>
                  <th class="wd-20p">Customer</th>
                  <th class="wd-10p"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($result = $query->fetch_assoc()) {
                    ?>
                    <tr>
                      <td><?php echo $result['no_jual']; ?></td>
                      <td><?php echo $result['tanggal_jual'];?></td>
                      <td><?php echo $result['id_customer'];?></td>
                      <td align="center">
                        <a href="javascript:void(0)" data-link="barang-edit" data-id="<?php echo $result['no_jual'];?>" title="Edit" class="btn btn-primary btn-sm edit-link"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
        $('#page-title').text(content);
      }); // end

      $('.edit-link').click(function(){
        var content = this.dataset.link;
        var Id = this.dataset.id;
        console.log(this)
        $('#main-content').load('contents/' + content + '.php?i=' + Id);
        $('#page-title').text(content);
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