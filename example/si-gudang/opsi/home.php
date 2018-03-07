<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CV. PENUH BERKAH</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/style.css" rel="stylesheet">


    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">
	

  </head>

  <body id="page-top">
  


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
		<a href="../index.php" align="left" class="LOGOUT">LOGOUT</a>
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">CV. PENUH BERKAH</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="">
        </span>
      </a>
	  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
		
      </button>
	
		
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav">
		<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#profile">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">BARANG</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#experience">PEMBELIAN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#education">JUAL</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#skills">PRODUKSI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#interests">CUSTOMER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#awards">SUPPLIER</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#StokOpname">STOK OPNAME</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#Stok">STOK</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#StokAwal">STOK AWAL</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#History">HISTORY</a>
          </li>
		  
        </ul>
      </div>
    </nav>

	 
    <div class="container-fluid p-0">
	
<section class="resume-section p-3 p-lg-5 d-flex d-column" id="profile">
        <div class="my-auto">
          
          <div class="subheading mb-5">


	  

<div class="page-header">


	<h2 align="center"><strong>CV. PENUH BERKAH</strong></h2>


 
	<table border="0" align="center">
	
	  
	<td align="center"><b>Office:
	<h6>JL. Sunan Bonang, link.Cigading Pasar Kubang Sari Kec.Ciwandan Cilegon - Banten</h6>
	<h6>Telp/Fax: (0254) 8317001</h6>
	<h6>email : penuhberkah_banten@yahoo.co.id</h6></td>
	
	<td align="center"><b>Workshop:
	<h6>JL. Lingkar Selatan Link. Kampung Baru RT. 07 RW.03 Kel. Tegal Ratu Kec. Ciwandan Kota Cilegon - Banten</h6>
	<h6>Telp/Fax : (0254) 8317001</h6>
	<h6>email : penuhberkah_banten@yahoo.co.id</h6></td>
	
	</table>
</div>
<div class="container">

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
     
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="../img/01.jpg" alt="..." style="height:150px">
		</div>
		</div>
		</div>
		
		
	  </section>
	  
      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="">
          <h2 class="mb-0">
            <span class="text-primary">BARANG</span>
          </h2>
		  
             <?php
/*		  $barang="barang.php";
		  $handle=fopen ($barang,"r");
			if(!$handle){
				echo"<b>file tidak dapat dibuka atau belum ada</b>";
			}else{
				$isi=fread($handle,2048);
				//$isi2=fread($handle,20);
				echo"barang.php:$isi<br>";
				//echo"isi2:$isi2<br>";
			}
			fclose($handle); */
			require_once '../barang.php';
			'.$page.'
			?>
          </div>
      </section>
	  

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="border-radius col-lg-4">
        
		  <h2 class="mb-0">Daftar
            <span class="text-primary">Pembelian</span>
			</h2>

		</div>
<?php

			require_once '../pembelian.php';
			'.$page.'
?>
         

      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="border-radius col-lg-4">
        
			<h2 class="mb-0">Daftar
            <span class="text-primary ">Jual</span>
			</h2>
		</div>
		<br/><br/>
       <?php

			require_once '../jual.php';
			'.$pageS.';
?>   	
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="">
        
		  <h2 class="mb-0">Daftar
            <span class="text-primary">Produksi</span>
			</h2>
		  
 <?php

			require_once '../produksi.php';
			'.$page.'
?>   
         
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
        <div class="">
          
		  <h2 class="mb-0">Daftar
            <span class="text-primary">Customer</span>
			</h2>
		  
<?php

			require_once '../customer.php';
			'.$page.'
?> 
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">
        <div class="">

		  <h2 class="mb-0">Daftar
            <span class="text-primary">Supplier</span>
			</h2>
<?php

			require_once '../supplier.php';
			'.$page.'
?>
      </section>
	  
	  

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="StokOpname">
        <div class="">

		  <h2 class="mb-0">Stok 
            <span class="text-primary">Opname</span>
			</h2>
			<table border="0" align="center">
			<tr>
<?php

			require_once '../pendataan_fisik.php';
			'.$page.'
			
			
?>
	</section>
	
	<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="Stok">
        <div class="">

		  <h2 class="mb-0">Stok 
            <span class="text-primary"></span>
			</h2>
			<table border="0" align="center">
			<tr>
<?php

			require_once '../stok.php';
			'.$page.'
			
			
?>
	</section>
	
	</section>
	
	<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="StokAwal">
        <div class="">

		  <h2 class="mb-0">Stok 
            <span class="text-primary">Awal</span>
			</h2>
			<table border="0" align="center">
			<tr>
<?php

			require_once '../stok_awal.php';
			'.$page.'
			
			
?>
	</section>

	
	</section>
	
	<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="History">
        <div class="">

		  <h2 class="mb-0">History 
            <span class="text-primary"></span>
			</h2>
			<table border="0" align="center">
			<tr>
<?php

			require_once '../history.php';
			'.$page.'
			
			
?>
	</section>


</tr>

</table>
      

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

</html>
