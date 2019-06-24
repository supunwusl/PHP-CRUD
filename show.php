<?php
include('session.php'); 
if(!isset($_SESSION['login_user'])){ 
  header("location: home.php"); // Redirecting To Home Page 
}
?>
<?php
  require_once('db.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "select * from product where ID=".$id;
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Show Products</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </head>
  <body>

      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
          <a class="navbar-brand" href="index.php">Product Details</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <b id="logout"><a href="logout.php">Log Out</a></b>
              <ul class="navbar-nav mr-auto"></ul>

          </div>
        </div>
      </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="card">
            <div class="card-header">
              Details
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md">
                    <img src="<?php echo $upload_dir.$row['Image'] ?>" height="200">
                </div>
                <div class="col-md">
                    <h5 class="form-control"><i class="">
                      Title: <span><?php echo $row['Title'] ?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="">
                      Description: <span><?php echo $row['Description'] ?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="">
                      Price: <span><?php echo $row['Price'] ?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="">
                      Quntity: <span><?php echo $row['Qty'] ?></span>
                    </i></h5>

                      <a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i><span>Back</span></a>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


      <script src="js/bootstrap.min.js" charset="utf-8"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
      <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
        } );
      </script>
    </body>
  </html>
