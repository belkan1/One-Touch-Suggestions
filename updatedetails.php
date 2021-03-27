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
$sql="select * from vendors where id='$editid'";
$result= mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
	$ename = $row['name'];
	$emaplat = $row['maplat'];
	$emaplng = $row['maplng'];
}
?>
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
	<style>          
          #map { 
            height: 600px;    
            width: 950px;            
          } 
		/* Alway set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }		  
    </style>
		

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
					<h1 class="h3 mb-4 text-gray-800">Update Cinema Or Restaurant</h1>
					<div class="card o-hidden border-0 shadow-lg my-5" style="height: 1000px">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
							 
							  <div class="col-lg-12">
								<div class="p-5">
									<!-- Map Code -->
									<div id="latclicked"></div>
									<div id="longclicked"></div>
									
									<div id="latmoved"></div>
									<div id="longmoved"></div>
									<input id="pac-input" class="controls form-control"  type="text" placeholder="Search Box">
									<div style="padding:10px; height: 400px;">
										<div id="map"></div>
										<p></p>
									</div>
									
									<!-- Map Code End -->
									<form method="post" action="" >
									<div class="form-group row">
									<input type='hidden' name='updateid' value='<?php echo $editid ;?>' >
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="text" class="form-control form-control-user" value='<?php echo $ename; ?>' name="name" id="name" placeholder="Name" required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="text" class="form-control form-control-user" value='<?php echo $emaplat; ?>' name="maplat" id="maplat" placeholder="Map Lat" readonly required>
										</div>
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="text" class="form-control form-control-user" name="maplng" value='<?php echo $emaplng; ?>' id="maplng" placeholder="Map Lng" required readonly>
										</div>
									</div>
									<hr>
									<div id='mapinputs'></div>
									<button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
									  Update
									</button>
									<hr>
									
									</form>
									<?php
										if(isset($_POST['submit'])){
											$name= $_POST['name'];
											$updateid= $_POST['updateid'];
											$maplat = $_POST['maplat'];
											$maplng = $_POST['maplng'];
											$date = date('Y-m-d');
											
											$sql = "update vendors set name='$name', maplat='$maplat', maplng='$maplng' where id='$updateid'";
											if (mysqli_query($conn, $sql)) {
												echo "<script>alert('Record Update successfully') </script>";
												echo "<script>window.location.assign('viewdetails.php') </script>";
											} else {
												echo "Error: " . $sql . "<br>" . mysqli_error($conn);
											}
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
<!-- Google Map Script Start -->
  <script>
		function initAutocomplete() {
		 var latitude = 31.522413387050424; // YOUR LATITUDE VALUE
            var longitude = 74.34812221015625; // YOUR LONGITUDE VALUE
            
            var myLatLng = {lat: latitude, lng: longitude};
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 13,
          mapTypeId: 'roadmap',
		  disableDoubleClickZoom: true
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
google.maps.event.addListener(map,'click',function(event) {                
              //  document.getElementById('latclicked').innerHTML = event.latLng.lat();
              //  document.getElementById('longclicked').innerHTML =  event.latLng.lng();
            });
			// Update lat/long value of div when you move the mouse over the map
        //    google.maps.event.addListener(map,'mousemove',function(event) {
             //   document.getElementById('latmoved').innerHTML = event.latLng.lat();
            //    document.getElementById('longmoved').innerHTML = event.latLng.lng();
         //   });
			
        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

				

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
		var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              //title: 'Hello World'
              
              // setting latitude & longitude as title of the marker
              // title is shown when you hover over the marker
              title: latitude + ', ' + longitude 
            });   
			 marker.addListener('click', function(event) {              
              document.getElementById('latclicked').innerHTML = event.latLng.lat();
              document.getElementById('longclicked').innerHTML =  event.latLng.lng();
            });
			 // Create new marker on double click event on the map
            google.maps.event.addListener(map,'dblclick',function(event) {
				document.getElementById('maplat').value = event.latLng.lat();
				document.getElementById('maplng').value = event.latLng.lng();

				var marker = new google.maps.Marker({
                  position: event.latLng, 
                  map: map, 
                  title: event.latLng.lat()+', '+event.latLng.lng()
                });
                
                // Update lat/long value of div when the marker is clicked
                marker.addListener('click', function() {
				document.getElementById('latclicked').innerHTML = event.latLng.lat();
                  document.getElementById('longclicked').innerHTML =  event.latLng.lng();
                }); 
				marker.addListener('click', function() {
                  
				  $("p").append("<b>Appended text</b>");
				document.getElementById('latclicked').innerHTML = event.latLng.lat();
                  document.getElementById('longclicked').innerHTML =  event.latLng.lng();
                });            
            });
      }
		</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8L9m4mXdgc4qjkFf-RIKOdavwoUO-iZs&libraries=places&callback=initAutocomplete"
         async defer></script>
	 	
<!-- Google Map Script End -->
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
