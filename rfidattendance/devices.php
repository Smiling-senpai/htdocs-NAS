<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Devices</title>
	<meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
    <meta http-equiv="pragma" content="no-cache" />
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--   	<link rel="icon" type="image/png" href="images/favicon.png"> -->
    <link rel="stylesheet" type="text/css" href="css/newedits.css">   
    <link rel="stylesheet" type="text/css" href="css/devices.css"/>
	
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"
	        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	        crossorigin="anonymous">
	</script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/dev_config.js"></script>
	<script>
	  	$(window).on("load resize ", function() {
		    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
		    $('.tbl-header').css({'padding-right':scrollWidth});
		}).resize();
	</script>
	<script>
		$(document).ready(function(){
		    $.ajax({
		      	url: "dev_up.php",
		      	type: 'POST',
		      	data: {
		        'dev_up': 1,
		  		}
	      	}).done(function(data) {
	  			$('#devices').html(data);
    		});
		});
	</script>
</head>
<body style="background: rgb(245,240,229);">
<?php include'header.php';?>
<main>
	<h2 class="slideInDown animated" style="font-size: 20px; text-align: center;">Add a new Device/update/remove/Enable/Disable</h2>
	<section class="container py-lg-5">
		<div class="alert_dev"></div>
		<!-- devices -->
		<div class="row">
			<div class="col-lg-12 mt-4">
				<div class="panel">
			      <div class="panel-heading" style="font-size: 19px; font-family: Helvetica, sans-serif;color: white;">Your Devices
			      	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#new-device" id="newdev" >New Device</button>
			      </div>
			      <div class="panel-body">
			      		<div id="devices"></div>                            
			      </div>                          
			    </div>
			</div>
		</div>
		<!-- \\devices -->
		<!-- New Devices -->
		<div class="modal fade" id="new-device" tabindex="-1" role="dialog" aria-labelledby="New Device" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header" style="background-color: black">
		        <h3 class="modal-title" id="exampleModalLongTitle" style="color:#fff">Add new device:</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form action="" method="POST" enctype="multipart/form-data">
			      <div class="modal-body">
			      	<label for="User-mail"><b>Device Name:</b></label>
			      	<input type="text" name="dev_name" id="dev_name" placeholder="Device Name..." required/><br>
			      	<label for="User-mail"><b>Device Department:</b></label>
			      	<input type="text" name="dev_dep" id="dev_dep" placeholder="Device Department..." required/><br>
			      </div>
			      <div class="modal-footer" style="background-color:#000">
			        <button type="button" name="dev_add" id="dev_add" class="btn btn-success" id="crnewdev" style="padding: 1.3em 3em;font-size: 12px;text-transform: uppercase;letter-spacing: 2.5px;font-weight: 500;color: #000;background-color: #fff;border: none;border-radius: 45px;box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);transition: all 0.3s ease 0s;cursor: pointer;outline: none;">Create new Device</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closedev" style="  padding: 1.3em 3em;font-size: 12px;text-transform: uppercase;letter-spacing: 2.5px;font-weight: 500;color: #000;background-color: #ff4d4d ; border: none; border-radius: 45px;box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);transition: all 0.3s ease 0s;cursor: pointer;outline: none;">Close</span></button>
			      </div>
			  </form>
		    </div>
		  </div>
		</div>
		<!-- //New Devices -->
	</section>
</main>
</body>
</html>