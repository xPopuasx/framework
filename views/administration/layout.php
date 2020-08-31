
<!DOCTYPE html>
<html lang="ru">
    
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

	<script type="text/javascript" src="https://unpkg.com/imask"></script>
	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/pickers/daterangepicker.js"></script>
  	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
  	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/forms/styling/uniform.min.js"></script>
  	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/forms/styling/switchery.min.js"></script>
  	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/forms/selects/select2.min.js"></script>
  	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/pages/form_inputs.js"></script>
    <script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/pages/form_select2.js"></script>
	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/pages/components_popups.js"></script>
	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
  	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/functions.js"></script>
  	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/forms/inputs/passy.js"></script>
	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/plugins/forms/inputs/maxlength.min.js"></script>

  	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/core/app.js"></script>
  	<script type="text/javascript" src="<?= $vars[0];?>/views/assets/js/pages/picker_date.js"></script>


</head>

<body class="sidebar-xs sidebar-opposite-visible">
	<?=$navbar?>
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
            <?=$menu?>

            <?=$content?>
            
            <?php if($vars['has_sidebar'] == true){?>
	        	<?=$right_sidebar?>
	        <?php }?>
        </div>


    </div>
    
</body>

</html>



