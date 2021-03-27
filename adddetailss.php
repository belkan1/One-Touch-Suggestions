<?php
session_start();
include("../include/conn.php"); 
date_default_timezone_set("Asia/Karachi");	
?>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<title>Musa Tours</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		<script src="dropzone.js"></script>
		
		<style>          
          #map { 
            height: 300px;    
            width: 600px;            
          } 
/* Always set the map height explicitly to define the size of the div
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	</head>
	<body>
	
		<section class="body">

			<?php include('include/header.php')?>
			<?php include('include/sidebar.php')?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Add Trip Details</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Add Trip Details</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title">Add Trip Details</h2>
									</header>
									<div class="panel-body">
											<form method="post" action=" " style="padding-top: 33px; border-radius: 25px;" >
											
												<div class="form-group">
													<label class="col-md-3 control-label">Trips</label>
													<div class="col-md-6">
														<select class="form-control" onchange="gettripdays(this.value)" id="Trip" name="Trip" required>
														<option value='0'>Select One Trip</option>
															<?php
																$result=mysqli_query($conn,'select * from trips');
																while($row=mysqli_fetch_assoc($result)){
																	echo '<option value="'.$row['Id'].'">'.$row['Name'].'</option>';
																}
															?>
														</select>
													</div> 
												</div>
											<div class="form-group">
												<label class="col-md-3 control-label">Day Name</label>
												<div class="col-md-6">
												<select class="form-control" id="DayName" name="DayName" required>
													<script>
														function gettripdays(str){
															
															var select = document.getElementById('DayName');
															$("#DayName").empty();
															
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
															xmlhttp.open("GET", "ajaxgettripdays.php?name=" + str, true);
															xmlhttp.send();
														 }
													</script>
													</select>
												</div>
											</div>
												<label class="col-md-3 control-label"></label>
												<div class="form-group">
													<div class="col-md-6" style='margin-bottom: 1%;'>
														<input type='submit' class="btn btn-primary" id="submit" name="submit">
														
													</div> 
												</div>
											</form>
											<?php
											if(isset($_POST['submit'])){ ?>
											<form method="post" action=" " style="padding-top: 33px; border-radius: 25px;" class="dropzone" id="keywords" enctype="multipart/form-data">
											<input type='hidden' value='<?php echo $_POST['Trip']; ?>' name='triphidden' />
											<input type='hidden' value='<?php echo $_POST['DayName']; ?>' name='dayhidden' />
											</form>
											
											<!-- Map Code -->
											<div id="latclicked"></div>
											<div id="longclicked"></div>
											
											<div id="latmoved"></div>
											<div id="longmoved"></div>
											<input id="pac-input" class="controls form-control"  type="text" placeholder="Search Box">
											<div style="padding:10px">
												<div id="map"></div>
												<p></p>
											</div>
											
											<!-- Map Code End -->
											<form method="post" action="" >
											<input type='hidden' value='<?php echo $_POST['Trip']; ?>' name='tripmaphidden' />
											<input type='hidden' value='<?php echo $_POST['DayName']; ?>' name='daymaphidden' />
											
											<div id='mapinputs'></div>
											<input type='submit' class='btn btn-primary' name='mapsubmit' />
											
											</form>
											
											
<?php
											}
$ds          = DIRECTORY_SEPARATOR;  //1
$storeFolder = 'trips_images/'; 
if(!empty($_FILES) ){
	$tripid=$_POST['triphidden'];  
	$tripdayid=$_POST['dayhidden'];  
	$tempFile = $_FILES['file']['tmp_name'];

    $tmptime= microtime(true)*10000;
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
	echo "<script>change('d')</script>";
    $aftername="Trip".$tmptime.".jpg";
	$targetFile =  $targetPath. $aftername;  //5
    $real_path =  $_FILES['file']['name'];
   
   if(move_uploaded_file($tempFile,$targetFile)){
		$sql = "INSERT INTO tripsimages (TripId, TripDayId, Image) VALUES ('$tripid','$tripdayid','$aftername')";
        if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Image Upload Successfully')</script>";
		}
   }	
}
if(isset($_POST['mapsubmit'])){
	$i=0;
	$tripid=$_POST['tripmaphidden'];  
	$tripdayid=$_POST['daymaphidden']; 
	for($a=0;$a<50;$a++){
		if(!empty($_POST['maplat'.$a]) && !empty($_POST['maplng'.$a])){
			$lat= $_POST['maplat'.$a];
			$lng= $_POST['maplng'.$a];
			$sql = "INSERT INTO tripsmap (TripId, TripDayId, Lat, Lng) VALUES ('$tripid','$tripdayid','$lat','$lng')";
			mysqli_query($conn, $sql);
			
		$i=1;
		}
	}
	if($i==1){
		echo "<script>alert('Successfully Updated!')</script>";
	}
	else{
		echo "<script>alert('Something Went Wrong!')</script>";
	}
}
?>						           </section>
							</div>
						</div>
					</div>
		</section>
		<!-- Map Code -->
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
            var i=1;
			google.maps.event.addListener(map,'dblclick',function(event) {
				 $("#mapinputs").append("<input type='hidden' name='maplat"+i+"' value='"+event.latLng.lat()+"' /> <input type='hidden' name='maplng"+i+"' value='"+event.latLng.lng()+"'  />");
				 i++;
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
	 	<!-- Map Code End -->
		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
		<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<script>
		Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

	  // The configuration we've talked about above
	  autoProcessQueue: false,
	  uploadMultiple: true,
	  parallelUploads: 100,
	  maxFiles: 100,

	  // The setting up of the dropzone
	  init: function() {
		var myDropzone = this;

		// First change the button to actually tell Dropzone to process the queue.
		this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
		  // Make sure that the form isn't actually being sent.
		  e.preventDefault();
		  e.stopPropagation();
		  myDropzone.processQueue();
		});

		// Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
		// of the sending event because uploadMultiple is set to true.
		this.on("sendingmultiple", function() {
		  // Gets triggered when the form is actually being sent.
		  // Hide the success button or the complete form.
		});
		this.on("successmultiple", function(files, response) {
		  // Gets triggered when the files have successfully been sent.
		  // Redirect user or notify of success.
		});
		this.on("errormultiple", function(files, response) {
		  // Gets triggered when there was an error sending the files.
		  // Maybe show form again, and notify user of error
		});
	  }
	 
	}
		</script>
	</body>
</html>