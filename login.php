<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Katniss">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/katniss/img/katniss-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/katniss">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/katniss/img/katniss-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/katniss/img/katniss-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">


    <title>Katniss Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Katniss CSS -->
    <link rel="stylesheet" href="css/katniss.css">
  </head>

  <body>
<form method="post" id="form-login">
    <div class="signpanel-wrapper">
      <div class="signbox">
        <div class="signbox-header">
          <h4>CV. PENUH BERKAH</h4>
          <p class="mg-b-0">Warehouse Inventory System</p>
        </div><!-- signbox-header -->
        <div class="signbox-body">
          <div class="form-group">
            <label class="form-control-label">Username:</label>
            <input type="text" name="username" placeholder="Enter your username" class="form-control">
          </div><!-- form-group -->
          <div class="form-group">
            <label class="form-control-label">Password:</label>
            <input type="password" name="password" placeholder="Enter your password" class="form-control">
          </div><!-- form-group -->
          <div class="form-group">
            <!-- <a href="">Forgot password?</a> -->
          </div><!-- form-group -->
          <button class="btn btn-primary btn-block" id="btn-login">Sign In</button>
          <!-- <div class="tx-center bd pd-10 mg-t-40">Not yet a member? <a href="page-signup.html">Create an account</a></div> -->
        </div><!-- signbox-body -->
      </div><!-- signbox -->
    </div><!-- signpanel-wrapper -->
</form>
    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
  </body>
</html>


<script type="text/javascript">
  $(document).ready(function(){
    $('#btn-login').click(function(){
      $.post('system/function.php?f=auth',$('#form-login').serialize(), function(response){
        console.log(response);
      });
      return false;
    });
  });
</script>