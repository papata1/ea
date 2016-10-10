<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>SB Admin v2.0 in Laravel 5</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- Bootstrap Core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="vendor/morrisjs/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- DataTables CSS -->
	<link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

</head>
<body>
	@yield('body')
</body>
</html>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>
<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

	<script type="text/javascript">
$(document).ready(function() {


  $('#dataTables-example').DataTable({
    responsive: true

  });
	$('#add').click(function () {
		//alert('add new branch');
		  $('#Add').modal('show');
		$('#t0').val($(this).attr('data-id'));
		$('#t1').val($(this).attr('data-id1'));
		$('#t2').val($(this).attr('data-id2'));
		$('#t3').val($(this).attr('data-id3'));
		$('#t4').val($(this).attr('data-id4'));
		$('#t5').val($(this).attr('data-id5'));
		$('#t6').val($(this).attr('data-id6'));
		$('#t7').val($(this).attr('data-id7'));
		$('#t8').val($(this).attr('data-id8'));
		$('#t9').val($(this).attr('data-id9'));

	});

});

</script>
