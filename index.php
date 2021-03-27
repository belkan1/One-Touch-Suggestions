<?php
SESSION_START();
date_default_timezone_set("Asia/Karachi");
include 'includes/conn.php'; 

/*$forget=$_GET['forget'];
if($forget==1){
	$sql="select * from users";
	$result= mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_assoc($result);
		$email=$row['email'];
		$password=$row['password'];
		$msg= 'Your Password is: '.$password;
		$from='info@myplot.com.pk';
		if(mail($email, 'Password Recovery' , $msg, 'From'.$from))
			echo '<script>alert("Check your registered email address")</script>';
	}
}*/	
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
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" ><img src='img/Loginimage.jpg' alt='Image' width='100%' height='100%' /></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method='post'>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                    </div>
                    <button type='submit' name='submit' class="btn btn-primary btn-user btn-block">Login</button>
                    <hr>
                  </form>
				  <?php
					if(isset($_POST['submit'])){
						$email= $_POST['email'];
						$password= $_POST['password'];
						$sql = "SELECT * FROM users where email='$email' and password='$password' and role='1'";
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result);
							$_SESSION['name']=$row['name'];
							$_SESSION['login']=true;
							$_SESSION['email']= $row['email'];
							$_SESSION['id']= $row['id'];
							$_SESSION['role']= $row['role'];
							echo "<script>window.location.assign('addcategory.php')</script>";
						} 
						else {
							echo "<script>alert('Username or password is wrong!')</script>";
						}
					}
				  ?>
                 
                  <!--<div class="text-center">
                    <a class="small" href="index.php?forget=1">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
