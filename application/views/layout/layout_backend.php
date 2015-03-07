<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title>Administrasi | Rekrutmen Telkom Indonesia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" data-head="<?php echo base_url("backend_assets/css/bootstrap-") ?>" href="#" rel="stylesheet">
	<?php if( isset($css) ){ 
    foreach ($css as $key => $style) {
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $style ?>">
    <?php }} ?>
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="<?php echo base_url("backend_assets/css/bootstrap-responsive.css"); ?>" rel="stylesheet">

	<link href="<?php echo base_url("backend_assets/css/charisma-app.css"); ?>" rel="stylesheet">
	<link href="<?php echo base_url("backend_assets/css/jquery-ui-1.8.21.custom.css"); ?>" rel="stylesheet">
	<link href='<?php echo base_url("backend_assets/css/fullcalendar.css"); ?>' rel='stylesheet'>
	<link href='<?php echo base_url("backend_assets/css/fullcalendar.print.css"); ?>' rel='stylesheet'  media='print'>
	<link href='<?php echo base_url("backend_assets/css/chosen.css"); ?>' rel='stylesheet'>
	<link href='<?php echo base_url("backend_assets/css/uniform.default.css"); ?>' rel='stylesheet'>
	<link href='<?php echo base_url("backend_assets/css/colorbox.css"); ?>' rel='stylesheet'>
	<link href='<?php echo base_url("backend_assets/css/jquery.cleditor.css"); ?>' rel='stylesheet'>
	<link href='<?php echo base_url("backend_assets/css/jquery.noty.css"); ?>' rel='stylesheet'>
	<link href='<?php echo base_url("backend_assets/css/noty_theme_default.css"); ?>' rel='stylesheet'>
	<link href='<?php echo base_url("backend_assets/css/elfinder.min.css"); ?>' rel='stylesheet'>
	<link href='<?php echo base_url("backend_assets/css/elfinder.theme.css"); ?>' rel='stylesheet'>
	<link href='<?php echo base_url("backend_assets/css/jquery.iphone.toggle.css"); ?>' rel='stylesheet'>
	<link href='<?php echo base_url("backend_assets/css/opa-icons.css"); ?>' rel='stylesheet'>
	<link href='<?php echo base_url("backend_assets/css/uploadify.css"); ?>' rel='stylesheet'>
	<link href='<?php echo base_url("backend_assets/datatables/jquery.dataTables.css"); ?>' rel='stylesheet'>

		<script src="<?php echo base_url("backend_assets/js/jquery-1.7.2.min.js"); ?>"></script>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"); ?>"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html">  <span>TELKOM</span></a>
				
				<!-- theme selector starts -->
				<div class="btn-group pull-right theme-container" >
					
				</div>
				<!-- theme selector ends -->
				
				
				
				<div class="top-nav nav-collapse pull-right">
					<ul class="nav">
						<li><a href="<?php echo site_url("login_admin/keluar") ?>"><i class="icon-user icon-white"></i> Logout</a></li>
						
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
						<li><a class="ajax-link" href="<?php echo site_url("administrasi/index") ?>"><i class="icon-home"></i><span class="hidden-tablet"> Beranda</span></a></li>
						<li class="nav-header hidden-tablet">Master AHP</li>
						<li><a class="ajax-link" href="<?php echo site_url("administrasi/kriteria") ?>"><i class="icon-edit"></i><span class="hidden-tablet"> AHP </span></a></li>
						<li><a class="ajax-link" href="<?php echo site_url("administrasi/prioritas") ?>"><i class="icon-eye-open"></i><span class="hidden-tablet"> Tabel Prioritas</span></a></li>
						<li class="nav-header hidden-tablet">Lowongan</li>
						<li><a class="ajax-link" href="<?php echo site_url("administrasi/lowongan") ?>"><i class="icon-folder-open"></i><span class="hidden-tablet"> Data Lowongan</span></a></li>
						
						
						<li class="nav-header hidden-tablet">Akun</li>
						<li><a class="ajax-link" href="<?php echo site_url("login_admin/keluar") ?>"><i class="icon-user"></i><span class="hidden-tablet"> Logout </span></a></li>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<?php echo $breadcrumb?>
			</div>
			<div class="row-fluid">
				<?php echo $output; ?>
			</div>
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<footer>
			<p class="pull-left">&copy; <a href="http://usman.it" target="_blank">PT. Telekomunikasi Indonesia</a> 2015</p>
			<p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
		</footer>
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->

	<!-- jQuery UI -->
	<script src="<?php echo base_url("backend_assets/js/jquery-ui-1.8.21.custom.min.js"); ?>"></script>
	<!-- transition / effect library -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-transition.js"); ?>"></script>
	<!-- alert enhancer library -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-alert.js"); ?>"></script>
	<!-- modal / dialog library -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-modal.js"); ?>"></script>
	<!-- custom dropdown library -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-dropdown.js"); ?>"></script>
	<!-- scrolspy library -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-scrollspy.js"); ?>"></script>
	<!-- library for creating tabs -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-tab.js"); ?>"></script>
	<!-- library for advanced tooltip -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-tooltip.js"); ?>"></script>
	<!-- popover effect library -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-popover.js"); ?>"></script>
	<!-- button enhancer library -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-button.js"); ?>"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-collapse.js"); ?>"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-carousel.js"); ?>"></script>
	<!-- autocomplete library -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-typeahead.js"); ?>"></script>
	<!-- tour library -->
	<script src="<?php echo base_url("backend_assets/js/bootstrap-tour.js"); ?>"></script>
	<!-- library for cookie management -->
	<script src="<?php echo base_url("backend_assets/js/jquery.cookie.js"); ?>"></script>
	<!-- calander plugin -->
	<script src='<?php echo base_url("backend_assets/js/fullcalendar.min.js"); ?>'></script>
	<!-- data table plugin -->
	<script src='<?php echo base_url("backend_assets/js/jquery.dataTables.min.js"); ?>'></script>
	
	<!-- chart libraries start -->
	<script src="<?php echo base_url("backend_assets/js/excanvas.js"); ?>"></script>
	<script src="<?php echo base_url("backend_assets/js/jquery.flot.min.js"); ?>"></script>
	<script src="<?php echo base_url("backend_assets/js/jquery.flot.pie.min.js"); ?>"></script>
	<script src="<?php echo base_url("backend_assets/js/jquery.flot.stack.js"); ?>"></script>
	<script src="<?php echo base_url("backend_assets/js/jquery.flot.resize.min.js"); ?>"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="<?php echo base_url("backend_assets/js/jquery.chosen.min.js"); ?>"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="<?php echo base_url("backend_assets/js/jquery.uniform.min.js"); ?>"></script>
	<!-- plugin for gallery image view -->
	<script src="<?php echo base_url("backend_assets/js/jquery.colorbox.min.js"); ?>"></script>
	<!-- rich text editor library -->
	<script src="<?php echo base_url("backend_assets/js/jquery.cleditor.min.js"); ?>"></script>
	<!-- notification plugin -->
	<script src="<?php echo base_url("backend_assets/js/jquery.noty.js"); ?>"></script>
	<!-- file manager library -->
	<script src="<?php echo base_url("backend_assets/js/jquery.elfinder.min.js"); ?>"></script>
	<!-- star rating plugin -->
	<script src="<?php echo base_url("backend_assets/js/jquery.raty.min.js"); ?>"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?php echo base_url("backend_assets/js/jquery.iphone.toggle.js"); ?>"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?php echo base_url("backend_assets/js/jquery.autogrow-textarea.js"); ?>"></script>
	<!-- multiple file upload plugin -->
	<script src="<?php echo base_url("backend_assets/js/jquery.uploadify-3.1.min.js"); ?>"></script>
	<!-- history.js"); ?> for cross-browser state change on ajax -->
	<script src="<?php echo base_url("backend_assets/js/jquery.history.js"); ?>"></script>
	<!-- application script for Charisma demo -->
	<script src="<?php echo base_url("backend_assets/js/charisma.js"); ?>"></script>

	<!-- application script for Charisma demo -->
	<script src="<?php echo base_url("backend_assets/datatables/jquery.dataTables.js"); ?>"></script>

    

    <?php if( isset($js) ){ 
        foreach ($js as $key => $script) {
    ?>
    <script type="text/javascript" src="<?php echo $script ?>"></script>
    <?php
        }
    ?>
    <?php } ?>
    <?php if( isset($skript) ){ ?>
    <script type="text/javascript">
    <?php echo $skript; ?>
    </script>
    <?php } ?>

		
</body>
</html>
