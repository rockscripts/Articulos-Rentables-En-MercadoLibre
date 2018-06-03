<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Articulos Rentables en Mercado Libre</title>
		<meta name="description" content="description">
		<meta name="author" content="Rockscripts">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url()?>template/devoops/plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="<?=base_url()?>template/devoops/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="<?=base_url()?>template/devoops/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="<?=base_url()?>template/devoops/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link href="<?=base_url()?>template/devoops/plugins/xcharts/xcharts.min.css" rel="stylesheet">
		<link href="<?=base_url()?>template/devoops/plugins/select2/select2.css" rel="stylesheet">
		<link href="<?=base_url()?>template/devoops/css/style.css" rel="stylesheet">
		<link href="<?=base_url()?>template/devoops/plugins/DataTablesPro/media/css/jquery.dataTables.css" rel="stylesheet">
		<script src="<?=base_url()?>template/devoops/plugins/DataTablesPro/media/js/jquery.dataTables.js"></script>
		<script>
		var ajax_url = "<?php echo base_url().'index.php/'?>";
		</script>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body> 
<div class="loader-image"></div>
    <header style="background: #fff159;  height: 100px;text-align: center;text-shadow: 3px 1px white;">
        <h1 class='logo-text'>Articulos Rentables</h1>
    </header>


		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10" style="width: 100%!important;">
			
                    <div id="ajax-content">
                     <?=$contents?>
                    </div>
                         <div style="text-align: center">
                    <b>e-mail: </b><a href="mailto:rockscripts@gmail.com">rockscripts@gmail.com</a>
    </div>
		</div>
           
		<!--End Content-->

<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="<?=base_url()?>template/devoops/plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="<?=base_url()?>template/devoops/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>template/devoops/plugins/bootstrap/bootstrap.min.js"></script>
<script src="<?=base_url()?>template/devoops/plugins/justified-gallery/jquery.justifiedgallery.min.js"></script>
<script src="<?=base_url()?>template/devoops/plugins/tinymce/tinymce.min.js"></script>
<script src="<?=base_url()?>template/devoops/plugins/tinymce/jquery.tinymce.min.js"></script>
<script src="<?=base_url()?>template/devoops/js/profits.js"></script>
<!-- All functions for this theme + document.ready processing -->

</body>
</html> 

