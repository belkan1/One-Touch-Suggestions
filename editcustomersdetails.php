<?php
SESSION_START();
date_default_timezone_set("Asia/Karachi");
include_once 'includes/conn.php'; 
if($_SESSION['login']==true){
}
else
	echo "<script>window.location.assign('index.php')</script>";

if(isset($_POST['editsubmit'])){
	$editid= $_POST['editid'];
$sql="select * from customersdetails where id='$editid'";
$result= mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
	$ename = $row['name'];
	$emobile = $row['mobile'];
	$eemail = $row['email'];
	$einterest = $row['interest'];
	$ecnic = $row['cnic'];
	$esociety = $row['society'];
	$ephase = $row['phase'];
	$estreet = $row['street'];
	$eplot = $row['plot'];
	$edemand = $row['demand'];
	$ecity = $row['city'];
	$edescription = $row['description'];
	$enextcontact = $row['nextcontact'];
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
					<h1 class="h3 mb-4 text-gray-800">Edit Customers Details</h1>
					<div class="card o-hidden border-0 shadow-lg my-5">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
							 
							  <div class="col-lg-12">
								<div class="p-5">
								  <div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Edit Details</h1>
								  </div>
								  <form class="user" method="post" enctype="multipart/form-data">
									<input type="hidden" name="hiddenid" value='<?php echo $editid ;?>' >
									<div class="form-group row">
									  <div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" value="<?php echo $ename ;?>" name="name" id="name" placeholder="Name">
									  </div>
									  <div class="col-sm-6">
										<input type="text" class="form-control form-control-user" id="mobile" value="<?php echo $emobile ;?>" name="mobile" placeholder="Mobile">
									  </div>
									</div>
									<div class="form-group row">
									  <div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" value="<?php echo $eemail ;?>" name="email" id="email" placeholder="Email">
									  </div>
									  <div class="col-sm-6">
										<select type="text" class="form-control form-control-user-select" id="interest" name="interest"  >
										<option value="General" <?php if($einterest=='General') echo 'selected' ;?> >General</option>
										<option value="Sale" <?php if($einterest=='Sale') echo 'selected' ;?> >Sale</option>
										<option value="Purchase" <?php if($einterest=='Purchase') echo 'selected' ;?> >Purchase</option>
										</select>
									  </div>
									</div>
									<div class="form-group row">
									  <div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" value="<?php echo $ecnic ;?>" id="cnic" name="cnic" placeholder="CNIC No.">	  
									  </div>
									   <div class="col-sm-6">
										<input type="text" class="form-control form-control-user" value="<?php echo $ecity ;?>" id="city" name="city" placeholder="City">
									   </div>
									</div>
									<div class="form-group row">
									  <div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" value="<?php echo $esociety ;?>" name="society" id="society" placeholder="Interested Society">
									  </div>
									  <div class="col-sm-6">
										<input type="text" class="form-control form-control-user" id="phase" value="<?php echo $ephase ;?>" name="phase" placeholder="Interested Phase">
									  </div>
									</div>
									<div class="form-group row">
									  <div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" value="<?php echo $estreet ;?>" name="street" id="street" placeholder="Interested Street">
									  </div>
									  <div class="col-sm-6">
										<input type="text" class="form-control form-control-user" id="plot" value="<?php echo $eplot ;?>" name="plot" placeholder="Interested Plot">
									  </div>
									</div>
									<div class="form-group row">
									  <div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user" value="<?php echo $edemand ;?>" name="demand" id="demand" placeholder="Interested Demand">
									  </div>
									  <div class="col-sm-2 mb-2 mb-sm-0">
										<label>Next Contact</label>
									  </div>
									  <div class="col-sm-4">
										<input type="date" class="form-control form-control-user" id="nextcontact" value="<?php echo $enextcontact ;?>" name="nextcontact" placeholder="Next Contact">
									  </div>
									</div>
									<div class="form-group row">
									  <input type="file" style="height: 5.3rem;" class="form-control form-control-user" name="upload[]" id="name" placeholder="Name"  multiple="multiple">
									 </div>
									<div class="form-group">
									  <textarea type="text" class="form-control  " id="description" name="description" placeholder="Description . . . ." rows='5'      cols="2" ><?php echo $edescription ;?></textarea>
									</div>
									
									<button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
									  Update Details
									</button>
									<hr>
									</form>
									<?php
										if(isset($_POST['submit'])){
											$hiddenid = $_POST['hiddenid'];
											$userid = $_SESSION['id'];
											$name = $_POST['name'];
											$mobile = $_POST['mobile'];
											$email = $_POST['email'];
											$interest = $_POST['interest'];
											$society = $_POST['society'];
											$phase = $_POST['phase'];
											$street = $_POST['street'];
											$plot = $_POST['plot'];
											$demand = $_POST['demand'];
											$city = $_POST['city'];
											$cnic = $_POST['cnic'];
											$nextcontact = $_POST['nextcontact'];
											$description = $_POST['description'];
											$date = date('Y/m/d');
											
											$sql="update customersdetails set name='$name', mobile='$mobile', email='$email', interest='$interest', society='$society', phase='$phase', cnic='$cnic', nextcontact='$nextcontact', description='$description' , street='$street', plot='$plot', demand='$demand', city='$city' where id='$hiddenid'";
											if(mysqli_query($conn, $sql)){
												echo "<script>alert('Details Edit Successfully')</script>";
												
												// add files in database
												$total = count($_FILES['upload']['name']);
												
												for( $i=0 ; $i < $total ; $i++ ) {
													$tmpFilePath = $_FILES['upload']['tmp_name'][$i];
													if ($tmpFilePath != ""){
														$tmptime= microtime(true)*10000;
														$filename= $tmptime.$_FILES['upload']['name'][$i];
														$newFilePath = "./uploadfiles/" . $filename;
														if(move_uploaded_file($tmpFilePath, $newFilePath)) {
															
															$sqldocuments="insert into customersdocuments (customerid, name) values ('$hiddenid', '$filename') ";
															if(mysqli_query($conn, $sqldocuments))
																echo "<script>alert('Upload file done')</script>";
														}
														else
															echo "<script>alert('Upload file error')</script>";
															
													}
												}
												echo "<script>window.location.assign('viewcustomersdetails.php')</script>";
											}
											else
												echo mysqli_error($conn);
												///echo "<script>alert('Something Went Wrong')</script>";
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
