<?php
SESSION_START();
date_default_timezone_set("Asia/Karachi");
include_once 'includes/conn.php'; 
if($_SESSION['login']==true){
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
					<h1 class="h3 mb-4 text-gray-800">Add Menu Details</h1>
					<div class="card o-hidden border-0 shadow-lg my-5">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
							 
							  <div class="col-lg-12">
								<div class="p-5">
								  <div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Add Menu</h1>
								  </div>
								  <form class="user" method="post" enctype="multipart/form-data">
									<div class="form-group row">
									  <div class="col-sm-6">
										<select type="text" onchange='getcategory(this.value)' class="form-control form-control-user-select" id="type" name="type"  >
											<option value="-1" >Select any type</option>
											<option value="1" >Restaurant</option>
											<option value="0" >Cinema</option>
										</select>
									  </div>
									<div class="col-sm-6">
										<select type="text" class="form-control form-control-user-select" id="category" name="category"  >
											<script>
												function getcategory(str){
													if(str=='1'){
														document.getElementById('time').disabled=true;
														document.getElementById('date').disabled=true;
														document.getElementById('rating').disabled=true;
													}else
													{
														document.getElementById('time').disabled=false;
														document.getElementById('date').disabled=false;
														document.getElementById('rating').disabled=false;
													}
													var select = document.getElementById('category');
													$("#category").empty();
													
													var opt = document.createElement('option');
													opt.value = -1;
													opt.innerHTML = "Select Option";
													select.appendChild(opt);
													
													var xmlhttp = new XMLHttpRequest();
													xmlhttp.onreadystatechange = function() {
														if (this.readyState == 4 && this.status == 200) {
															
															var string=this.responseText;
															var fields= string.split('===');
															
															for(i=0;i<fields.length; i+=2){
																var opt = document.createElement('option');
																opt.value = fields[i];
																opt.innerHTML = fields[i+1];
																select.appendChild(opt);
															}
														}
													};
													xmlhttp.open("GET", "ajaxgetcategory.php?type=" + str, true);
													xmlhttp.send();
												 }
											</script>
										</select>
									  </div>
									</div>
									<div class="form-group row">
									  <div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Name">	  
									  </div>
									   <div class="col-sm-6">
										<input type="text" class="form-control form-control-user" id="price" name="price" placeholder="price">
									   </div>
									</div>
									<div class="form-group row">
									  <div class="col-sm-6 mb-3 mb-sm-0">
										<input type="file" class="form-control form-control-user" name="uploaded_file" id="uploaded_file" required>	  
									  </div>
									   <div class="col-sm-6">
										<input type="text" class="form-control form-control-user" id="rating" name="rating" placeholder="Rating">
									   </div>
									</div>
									<div class="form-group row">
									   <div class="col-sm-12">
									    	<input type="text" class="form-control form-control-user" id="description" name="description" placeholder="Description. . . . ">
									   </div>
									</div>
									<div class="form-group row">
									  <div class="col-sm-6 mb-3 mb-sm-0">
										<input type="date" class="form-control form-control-user" name="date" id="date" placeholder="Date">
									  </div>
									  <div class="col-sm-6">
										<input type="time" class="form-control form-control-user" id="time" name="time" placeholder="Time">
									  </div>
									</div>
									<div class="form-group row">
									  <div class="col-sm-6 mb-3 mb-sm-0">
										<input type="number" class="form-control form-control-user" name="discount" id="discount" placeholder="Discount">
									  </div>
									</div>
									<button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
									  Update Details
									</button>
									<hr>
									</form>
									<?php
										if(isset($_POST['submit'])){
										    
										    $file_path = "upload_images/";
										    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
										    
											$name = $_POST['name'];
											$description = $_POST['description'];
											$rating = $_POST['rating'];
											$moviedate = $_POST['date'];
											$movietime = $_POST['time'];
											$price = $_POST['price'];
											$type = $_POST['type'];
											$discount = $_POST['discount'];
											$category = $_POST['category'];
											$createdate = date('Y/m/d');
											
											if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path) ){
    											
    											$sql="insert into details (type, categoryid, name, description, price, rating, image, moviedate, movietime, createdate, discount) values 
    											('$type', '$category', '$name', '$description', '$price', '$rating', '$file_path', '$moviedate', '$movietime', '$createdate', '$discount' )"; 

    											if(mysqli_query($conn, $sql)){
    												echo "<script>alert('Add Successfully')</script>";
    												echo "<script>window.location.assign('addmenudetails.php')</script>";
    											}
    											else
    												echo "<script>alert('Something Went Wrong')</script>";
										
											}else
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
