<!DOCTYPE html>
<html lang="en">

<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title><?php #echo $title; ?></title>
	<meta name="description" content="Perfectum Dashboard Bootstrap Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<?php Asset::add_path('themes/perfectum/', array('css', 'js', 'img')); //To Do later: Pfad aus Config auslesen
		echo Asset::css(array('bootstrap.css'), array('id' => 'bootstrap-style'), NULL, false); 
		echo Asset::css(array('bootstrap-responsive.css'), array('id' => ''), NULL, false); 	
		echo Asset::css(array('style.css'), array('id' => 'base-style'), NULL, false);	
		echo Asset::css(array('style-responsive.css'), array('id' => 'base-style-responsive'), NULL, false);
	?>

	<!--[if lt IE 7 ]>
	<?php #echo Asset::css(array('style-ie.css'), array('id' => 'ie-style'), NULL, false); ?>
	<![endif]-->
	<!--[if IE 8 ]>
	<?php #echo Asset::css(array('style-ie.css'), array('id' => 'ie-style'), NULL, false); ?>
	<![endif]-->

	<!-- end: CSS -->

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="/favicon.ico">
	<!-- end: Favicon -->
</head>

<body>
	<!-- Loading Screen with bullets -->
	<div id="overlay">
		<ul>
		  <li class="li1"></li>
		  <li class="li2"></li>
		  <li class="li3"></li>
		  <li class="li4"></li>
		  <li class="li5"></li>
		  <li class="li6"></li>
		</ul>
	</div>	

	<!-- Loading MessageBar -->
	<?php echo \Theme::instance()->view('templates/messagebar'); //To Do later: umbauen in Partial ?> 
	
	<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- Loading Navigation -->
			<?php echo $partials['navigation']; ?> 

			<!-- Showing Errors here -->
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>

			<!-- start: Content -->			
			<div id="content" class="span10" style="min-height: 1051px">
			<!-- To Do later: Monitorhöhe auslesen 
			<script type="text/javascript">
				var screenheight = screen.height;
				alert(screenheight);
				document.getElementById("content").style.minHeight=screenheight;
			</script> -->	

			<!-- Showing Breadcrumb -->			
			<?php echo $partials['breadcrumb']; ?>
						
				<!-- Start dynamischer Bereich -->	
				<?php echo $partials['messages']; ?>	
				<?php echo $partials['content']; ?>
				<!-- Ende dynamischer Bereich -->	

			<!-- end: Content -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->

		<!-- Loading Modal Windows (aktuell ausgeblendet) -->
		<?php #echo $partials['modals']; ?>		
		
		<div class="clearfix"></div>
		
		<!-- Loading Footer -->
		<footer>
			<p>
				<span style="text-align:left;float:left">&copy; <a href="#" target="_blank">creativeLabs</a> 2012</span>
				<span style="text-align:right;float:right">Powered by: <a href="#">Perfectum Dashboard</a></span>
			</p>
			<div class="clearfix"></div>
		</footer>
				
	</div><!--/.fluid-container-->

	<!-- Loading Scripts -->
	<?php echo Asset::js(array(
	'jquery-1.7.2.min.js', 
	'jquery-ui-1.8.21.custom.min.js',
	'bootstrap.js',
	'jquery.cookie.js',
	'fullcalendar.min.js',
	'jquery.dataTables.min.js',
	'excanvas.js',
	'jquery.flot.min.js',
	'jquery.flot.pie.min.js',
	'jquery.flot.stack.js',
	'jquery.flot.resize.min.js',
	'jquery.chosen.min.js',
	'jquery.uniform.min.js',
	'jquery.cleditor.min.js',
	'jquery.noty.js',
	'jquery.elfinder.min.js',
	'jquery.raty.min.js',
	'jquery.iphone.toggle.js',
	'jquery.uploadify-3.1.min.js',
	'jquery.gritter.min.js',
	'jquery.imagesloaded.js',
	'jquery.masonry.min.js',
	'jquery.knob.js',
	'jquery.sparkline.min.js',
	'custom.js',
	), array(), NULL, false); ?>

</body>

<!-- Mirrored from wbpreview.com/previews/WB0PHMG9K/ by HTTrack Website Copier/3.x [XR&CO'2010], Sat, 03 Nov 2012 14:59:21 GMT -->
</html>