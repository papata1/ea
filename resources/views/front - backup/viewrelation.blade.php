<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
	<title>EA DOCUMENT REPOSITORY</title>
	<!-- start: META -->
	<meta charset="utf-8" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- end: META -->
	<!-- start: MAIN CSS -->
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/bootstrap/css/bootstrap.min.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/font-awesome/css/font-awesome.min.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/fonts/style.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/css/main.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/css/main-responsive.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/iCheck/skins/all.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/plugins/perfect-scrollbar/src/perfect-scrollbar.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/css/theme_light.css') }}" >
	<link rel="stylesheet" href="{{ URL::asset('css/theme/css/print.css') }}" >
	<link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico') }}" />
<style>
a    {color: black;}
</style>
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
<?php
	if($tablea=="b"){ $linka="BusDetail";}
	if($tablea=="a"){ $linka="AppDetail";}
	if($tablea=="d"){ $linka="DatDetail";}
	if($tablea=="t"){ $linka="TecDetail";}
	if($tableb=="b"){ $linkb="BusDetail";}
	if($tableb=="a"){ $linkb="AppDetail";}
	if($tableb=="d"){ $linkb="DatDetail";}
	if($tableb=="t"){ $linkb="TecDetail";}
?>
					<!-- start: PAGE CONTENT -->

				<script type="text/javascript" src="{{ URL::asset('js/jquery-1.5.1.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('js/jquery.freezeheader.js') }}"></script>
				<script type="text/javascript">

				$(document).ready(function(){
					$("table").freezeHeader({ top: true, left: true });
				});

				</script>
				<table id="maintable" class="data-table" border="1" style="background-color:white;">
				<thead>
					<tr><th style="background-color:white;">&nbsp;<center><a href="<?php echo url(''); ?>">HOME</a></center>&nbsp;</th>@foreach($modela as $modella)

					<th id="{{$modella->id}}" style="background-color:#E6E6E6;">&nbsp;&nbsp;&nbsp;
					<a href="
<?php echo url(''.$linka.'/'.$modella->id); ?>
					">
					{{$modella->name}}
					</a>
					&nbsp;&nbsp;&nbsp;</th>

					@endforeach</tr>
				</thead>
					@foreach($modelb as $modellb)
				<tr>
					<th id="{{$modellb->id}}" style="background-color:#E6E6E6;">
					<a href="
<?php echo url(''.$linkb); ?>/{{$modellb->id}}
					">
					{{$modellb->name}}
					</a>
					</th>
						@foreach($modela as $modella)
					<td a="{{$modella->id}}" b="{{$modellb->id}}"><center>
					<?php $f=0; $n=0; ?>
						@foreach($modelar as $modellar)<?php if($modellar->arid==$modella->id){ $f=1; break; }?>@endforeach
						@foreach($modelbr as $modellbr)<?php if($f==1){ if($modellbr->brid==$modellb->id){ $n=1; break; }}?>@endforeach
						<?php if($f==1&&$n==1){echo '✔';} ?>

					</center></td>@endforeach
				</tr>
					@endforeach
				</table>
					<!-- end: PAGE CONTENT-->

			<!-- end: PAGE -->
			<!-- start: MAIN JAVASCRIPTS -->
			<script src="{{ URL::asset('css/theme/plugins/jQuery-lib/2.0.3/jquery.min.js') }}"></script>
			<!--<![endif]-->
			<script src="{{ URL::asset('css/theme/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}"></script>
			<script src="{{ URL::asset('css/theme/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
			<script src="{{ URL::asset('css/theme/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"></script>
			<script src="{{ URL::asset('css/theme/plugins/blockUI/jquery.blockUI.js') }}"></script>
			<script src="{{ URL::asset('css/theme/plugins/iCheck/jquery.icheck.min.js') }}"></script>
			<script src="{{ URL::asset('css/theme/plugins/perfect-scrollbar/src/jquery.mousewheel.js') }}"></script>
			<script src="{{ URL::asset('css/theme/plugins/perfect-scrollbar/src/perfect-scrollbar.js') }}"></script>
			<script src="{{ URL::asset('css/theme/plugins/less/less-1.5.0.min.js') }}"></script>
			<script src="{{ URL::asset('css/theme/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
			<script src="{{ URL::asset('css/theme/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js') }}"></script>
			<script src="{{ URL::asset('css/theme/js/main.js') }}"></script>

			<!-- end: MAIN JAVASCRIPTS -->
			<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
			<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
				<script type="text/javascript" src="{{ URL::asset('js/jquery-1.5.1.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('js/jquery.freezeheader.js') }}"></script>
				<script type="text/javascript">

				$(document).ready(function(){
					$("table").freezeHeader({ top: true, left: true });
				});
				jQuery(document).ready(function() {
					Main.init();
				});
				</script>
		</body>
		<!-- end: BODY -->
		</html>



