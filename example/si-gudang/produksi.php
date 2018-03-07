<?php

require_once 'connect.php';




	$q = mysql_query("SELECT
						p.No_Produksi, p.Item_Jual, p.Tanggal_Selesai_Produksi, p.Qty_Jadi, 
						dj.No_Jual, dj.Satuan AS Satuan_dp,
						dp.Kode_Barang, dp.Qty, dp.Satuan AS Satuan_dj, 
						b.Nama_Barang
					FROM produksi p
						LEFT JOIN detail_produksi dp ON (p.No_Produksi=dp.No_Produksi)
						LEFT JOIN detail_jual  dj ON (p.No_Produksi=dj.No_Produksi)
						LEFT JOIN barang b ON (dp.Kode_Barang=b.Kode_Barang)
					
	")or die (mysql_error()." line ".__LINE__);	
	
	$no = 1;
	$body = '';
	$awal = '';
	$i=0;
	$hitung=0;
	
	
	
	while($dt = mysql_fetch_array($q)){
		
			
				
			
				if($i == 0){
				$q_num	= mysql_query("SELECT No_Produksi FROM detail_produksi WHERE No_Produksi='".$dt['No_Produksi']."'");
				$num	= mysql_num_rows($q_num);
				$awal0 = '<td rowspan="'.$num.'">'.$no.'</td>';
				$awal = '<td rowspan="'.$num.'">'.$dt['Tanggal_Selesai_Produksi'].'</td>';
				$awal2 = '<td rowspan="'.$num.'">'.$dt['No_Produksi'].'</td>';
				$awal3 = '<td rowspan="'.$num.'">'.$dt['No_Jual'].'</td>'; 
				$awal4 = '<td rowspan="'.$num.'">'.$dt['Item_Jual'].'</td>';
				$awal5 = '<td align="center" rowspan="'.$num.'">'.$dt['Qty_Jadi'].'</td>';
				$awal6 = '<td rowspan="'.$num.'">'.$dt['Satuan_dj'].'</td>';
				$awal7 = '<td rowspan="'.$num.'">'.$dt['Satuan_dp'].'</td>';
				
				
				 
				 
				$i=1;
				$hitung=1;

				}else{
					$hitung++;
					$awal0 = "";
					$awal ="";
					$awal2 ="";
					$awal3 ="";
					$awal4 ="";
					$awal5 ="";
					$awal6 ="";
					$awal7 ="";
				
					if($hitung == $num){
						$i=0;
						$no++;
					}
				}
		$body .=
				$awal0
				.$awal."
				".$awal2."
				".$awal3."
				".$awal4."
				".$awal5."
				".$awal7."
				<td>".$dt['Nama_Barang']."</td>
				<td>".$dt['Qty']."</td>
				".$awal6."
			
			<td>
				<a href='../produksi/edit_produksi.php?No_Produksi=".$dt['No_Produksi']."'>Edit | </a>
				<a href='../produksi/hapus_produksi.php?No_Produksi=".$dt['No_Produksi']."'>Hapus</a>
			</td>
		</tr>
		";
		
	};
	
	$page = '
		<html>
		<head><title></title>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/style.css" rel="stylesheet">
		
		<a href="../produksi/tambah_produksi.php">Home / <b> Tambah </b></a>
		
		
													<!-- SEARCH FORM -->

			<div class="row">
					<div class="col-lg-4">
						<div class="input-group">
							<input type="text" name="No_Produksi" id="No_Produksi" maxlength="15" placeholder="SEARCH"/>
							
			<br/>
			

							<span class="input-group-btn">
								<a href="#skills" > <input type="submit" class="btn btn-secondary" value="SEARCH" name="cari" ></a>
								<!--<button class="btn btn-secondary" type="button">Go!</button>-->
							</span>
						</div>
					</div>
				</div>

			</tr>
			</form><br/>	
			
															<!-- END SEARCH FORM -->
		
		
		<table align="center" class="table table-striped table-bordered">


			<tr>
				<td colspan="11" align = "center">Daftar Produksi</td>
			</tr>
			
			
			
			<tr>
				<th scope="row" class="thblue" align="center">No</td>
				<th scope="row" class="thblue" align="center">Tanggal Selesai Produksi</td>
				<th scope="row" class="thblue" align="center">No Produksi</td>
				<th scope="row" class="thblue" align="center">No Jual</td>
				<th scope="row" class="thblue" align="center">Item Jual</td>
				<th scope="row" class="thblue" align="center">Qty Jadi</td>
				<th scope="row" class="thblue" align="center">Satuan</td>
				<th scope="row" class="thblue" align="center">Nama Barang</td>
				<th scope="row" class="thblue" align="center">Qty</td>
				<th scope="row" class="thblue" align="center">Satuan</td>
				<th scope="row" class="thblue" align="center">Tombol</td>
			</tr>
				'.$body.'
			<tr>
				<td colspan="11" align="center">	<a href="../produksi/tambah_produksi.php">Tambah</a></td>
			</tr>
		</table>

		</body>
		</html>';

	echo $page;

?>