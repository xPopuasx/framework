<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=0">
	<title><?=$vars['title']?></title>
	<link rel="shortcut icon" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/views/images/system_images/favicon.ico'?>">

	<!-- css -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= $vars[0];?>/views/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= $vars[0];?>/views/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= $vars[0];?>/views/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= $vars[0];?>/views/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= $vars[0];?>/views/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- css -->

	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/notifications/pnotify.min.js"></script>
  	<script src="<?= $vars[0];?>/views/assets/js/functions.js"></script>


	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/asyc.js"></script>
    <script src="<?= $vars[0];?>/views/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="<?= $vars[0];?>/views/assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>



  	<script src="<?= $vars[0];?>/views/assets/js/core/app.js"></script>


</head>

<body>

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">


			<!-- Main content -->
			<?=$content?>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
