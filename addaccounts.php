<?php
SESSION_START();
date_default_timezone_set("Asia/Karachi");
include_once 'includes/conn.php'; 
if($_SESSION['login']==true && $_SESSION['role']==1){
}
else
	echo "<script>window.location.assign('index.php')</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>My Plot : MyCustomers</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
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
					<h1 class="h3 mb-4 text-gray-800">Add Account</h1>
					<div class="card o-hidden border-0 shadow-lg my-5">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
							 
							  <div class="col-lg-12">
								<div class="p-5">
								  <div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Account</h1>
								  </div>
								  <form class="user" method="post" enctype="multipart/form-data">
									<div class="form-group row">
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Email"  required>
										</div>
										 <div class="col-sm-6">
										<select type="text" class="form-control form-control-user-select" id="role" name="role"  >
											<option value="0" selected >Operator</option>
											<option value="1">Admin</option>
										</select>
									  </div>
									</div>
									<div class="form-group row">
									  <div class="col-sm-6 mb-3 mb-sm-0">
									  <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Name" required>
									  </div>
									  <div class="col-sm-6">
										<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="New Password" required>
									  </div>
									</div>
									<button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
									  Update Details
									</button>
									<hr>
									</form>
									<?php
										if(isset($_POST['submit'])){
											//$hiddenid = $_POST['hiddenid'];
											$name = $_POST['name'];
											$email = $_POST['email'];
											$password = $_POST['password'];
											
											$sql="insert into users (name, email, password, role) values ('$name', '$email', '$password', '$role' ) ";
											if(mysqli_query($conn, $sql)){
												echo "<script>alert('Account add Successfully')</script>";
											}
											else
													echo "<script>alert('Something Went Wrong')</script>";
										}
									?>
								</div>
							  </div>
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
</body>
</html>
