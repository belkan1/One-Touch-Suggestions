<?php
SESSION_START();
date_default_timezone_set("Asia/Karachi");
include_once 'includes/conn.php'; 
if($_SESSION['login']==true && $_SESSION['role']==1){
}
else
	echo "<script>window.location.assign('index.php')</script>";

if(isset($_POST['deletesubmit'])){
	$deleteid= $_POST['deleteid'];
	$sqldelete= "delete from category where id='".$deleteid."'";
	if(mysqli_query($conn, $sqldelete))
		echo "<script>alert('Record Delete Successfilly!')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title></title>
  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
	<?php include_once 'includes/sidebar.php' ; ?> 
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
		<?php include_once 'includes/header.php'; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">View Category</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">View Category</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Rating</th>
                      <th>Discount</th>
                      <th>Create Date</th>
					  <th></th>
                     <!-- <th></th>-->
                    </tr>
                  </thead>
                  <tbody>
                   <?php
						$sql="select * from category order by id desc";
						$result= mysqli_query($conn, $sql);
						if(mysqli_num_rows($result)>0){
							while($row=mysqli_fetch_assoc($result)){
								echo "<tr>";
								if($row['type']==1)
    								echo "<td>Restaurant</td>";
								else
									echo "<td>Cinema</td>";
								echo "<td>".$row['name']."</td>";
								echo "<td><img src='".$row['image']."' width='30%' ></td>";
								echo "<td>".$row['rating']."</td>";
								echo "<td>".$row['discount']."</td>";
								echo "<td>".$row['createdate']."</td>";
								//echo "<td><form method='post' action='updatedetails.php' ><input type='hidden' name='editid' value='".$row['id']."' > <input type='submit' class='btn btn-primary' name='editsubmit' value='Edit' ></form></td>";
								echo "<td><form method='post' ><input type='hidden' name='deleteid' value='".$row['id']."' > <input type='submit' class='btn btn-danger' name='deletesubmit' value='Del' ></form></td>";
								echo "</tr>";
								
							}
						}
				   ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include_once 'includes/footer.php'; ?>
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
