<?php
SESSION_START();
date_default_timezone_set("Asia/Karachi");
include_once 'includes/conn.php'; 
if($_SESSION['login']==true){
}
else
	echo "<script>window.location.assign('index.php')</script>";
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title></title>
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
					<h1 class="h3 mb-4 text-gray-800">Add Cinema Or Restaurant</h1>
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
									<form method="post" action="" enctype='multipart/form-data' >
									<div class="form-group row">
									    <div class="col-sm-6 mb-3 mb-sm-0">
											<select type="text" class="form-control form-control-user" onchange='checktype(this.value)' name="type" id="type" required>
											    <option value='-1'>Select any Type</option>
											    <option value='1'>Restaurant</option>
											    <option value='0'>Cinema</option>
											</select>
										</div>
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Name" required>
										</div>
									</div>
									<div class="form-group row">
									    <div class="col-sm-6 mb-3 mb-sm-0">
											<input type="file" class="form-control form-control-user" name="uploaded_file" id="uploaded_file" required>
										</div>
										<div class="col-sm-6 mb-3 mb-sm-0">
											<select type="number" class="form-control form-control-user" name="rating" id="rating" placeholder="Rating" required>
										        <option value='0'>Give Rating</option>
										        <option value='1'>1</option>
										        <option value='2'>2</option>
										        <option value='3'>3</option>
										        <option value='4'>4</option>
										        <option value='5'>5</option>
										    </select>
										</div>
									</div>
									<div class="form-group row">
									    <div class="col-sm-6 mb-3 mb-sm-0">
											<input type="number" class="form-control form-control-user" name="discount" id="discount" placeholder="Promotion" required>
										</div>
										<div class="col-sm-6 mb-3 mb-sm-0">
										    <input type="text" class="form-control form-control-user" name="maplat" id="maplat" placeholder="Map Lat" readonly required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="text" class="form-control form-control-user" name="maplng" id="maplng" placeholder="Map Lng" required readonly>
										</div>
									</div>
									<hr>
									<div id='mapinputs'></div>
									<button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
									  Submit
									</button>
									<hr>
									
									</form>
									<?php
										if(isset($_POST['submit'])){
										    
										    $file_path = "upload_images/";
										    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
										    
										    $name= $_POST['name'];
											$type= $_POST['type'];
											$rating= $_POST['rating'];
											$discount= $_POST['discount'];
											$maplat = $_POST['maplat'];
											$maplng = $_POST['maplng'];
											$createdate = date('Y-m-d');
											
										    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path) ){
										        
    											$sql = "INSERT INTO category (type, name, rating, lat, lng, image, discount , createdate) VALUES 
    											        ('$type', '$name','$rating', '$maplat', '$maplng', '$file_path', '$discount',  '$createdate')";
    											if (mysqli_query($conn, $sql)) {
    												echo "<script>alert('New record created successfully') </script>";
    												echo "<script>window.location.assign('addcategory.php') </script>";
    											} else {
    												 echo "<script>alert('Something Went Wrong!') </script>"; //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    											}
    									    }else
    									        echo "<script>alert('".$_FILES['uploaded_file']['tmp_name']."') </script>";
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
<script>
    function checktype(value){
        if(value==0)
            document.getElementById("rating").disabled = true;
        else
            document.getElementById("rating").disabled = false;
    }
</script>
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
