<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="{{ URL::asset('images/kmutnb.ico') }}" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    @include('admin.layouts.inc-stylesheet')
	@yield('stylesheet')
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                </button>
                <a class="navbar-brand" href="{{ action('BusController@index')}}">EA DOCUMENT REPOSITORY</a>
            </div>
            <!-- /.navbar-header -->

            @include('admin.layouts.inc-header')
            <!-- /.navbar-top-links -->

            @include('admin.layouts.inc-left-sidebar')
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
	@include('admin.layouts.inc-scripts')
    @yield('scripts')
</body>
<!-- DataTables CSS -->
<link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
<!-- DataTables Responsive CSS -->
	<link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

</html>


<script type="text/javascript">
    $(document).ready(function() {
        $('.delre').click(function() {
            var x = confirm("ต้องการลบใช่ไหม?");
            if (x) {
                return true;
            }
            else {

                event.preventDefault();
                return false;
            }

        });
      /*document.getElementById('master').onchange = function() {

          // alert('4');
      };*/
      $("#master").change(function(){
          window.location.href = this.children[this.selectedIndex].getAttribute('href');
          //alert('555');
      });
      $(".panel-body2").hide();
      $(".panel-body1").hide();
      $("#import").click(function(){
          $(".panel-body1").toggle();
          //alert('555');
      });
      $("#download").click(function(){
          $(".panel-body2").toggle();
          //alert('555');
      });
        $(".busr").chosen({
          search_contains: true,
            disable_search_threshold: 1
        });
        $(".appr").chosen({
          search_contains: true,
        });
        $(".datar").chosen({
          search_contains: true,

        });
        $(".techr").chosen({
          search_contains: true,
        });
        $(".aom").chosen({
            search_contains: true
        });

        // $('#filer_input').filer();

       // alert('655');
        var test = new Array();
        $('#json').val('');

        $('#dataTables-example').DataTable({
          responsive: true


        });
        //$('tr').each(function(){
        $('#dataTables-example').on('click', '.add', function() {
            $('#t111').val($(this).attr('data-id1'));
            $('#t112').val($(this).attr('data-id2'));
            $('#t113').val($(this).attr('data-id3'));
            $('#t117').val($(this).attr('data-id7'));
            $('#t1117').val($(this).attr('data-id17'));
            $('#t116').val($(this).attr('data-id16'));
            $('#t114').val($(this).attr('data-id4'));
            $('#t115').val($(this).attr('data-id15'));
            $('#t441').val($(this).attr('data-id41'));

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
            $('#t10').val($(this).attr('data-id10'));
            $('#t11').val($(this).attr('data-id11'));
            $('#t12').val($(this).attr('data-id12'));
            $('#t13').val($(this).attr('data-id13'));
            $('#t14').val($(this).attr('data-id14'));
            $('#t15').val($(this).attr('data-id15'));
			$('#t16').val($(this).attr('data-id16'));
            $('#t17').val($(this).attr('data-id17'));
			$('#t18').val($(this).attr('data-id18'));
            $('#t41').val($(this).attr('data-id41'));
            $('#t36').val($(this).attr('data-id36'));
            var data1 = $(this).attr('data-id20');
            var data12 = $(this).attr('data-id31');
            var data11 = $(this).attr('data-id32');
            var data40 = $(this).attr('data-id40');
            var app1 = $(this).attr('data-id51');
            var app2 = $(this).attr('data-id');
           //var data14 = 'A'+data12;
           // alert(data40);
            if (data40== 1){
                var datatech = 'เครื่องแม่ข่าย';
            }
            if (data40== 2){
                var datatech = 'อุปกรณ์';
            }

                var data13 = data11+data12;
            var app = app1+app2;
           $('#t30').val(data13);
            $('#t40').val(datatech);
            $('#t51').val(app);
            $('#t140').val(datatech);



        });
        $('#dataTables-example').on('click', '.pic', function() {
            $('#t01').html($(this).attr('data-id'));
            $('#imagepreview').attr('src',$(this).attr('src'));
            $('#pic').modal('show');

        });


        $('#dataTables-example').on('click', '.del', function() {
            var x = confirm("ต้องการลบใช่ไหม?");
            if (x) {
                return true;
            }
            else {

                event.preventDefault();
                return false;
            }

        });
        $('.move').on('click',function(){

            var list = prompt("ใส่เลขที่ต้องการ", "");

            if (list) {

                test.push(list);
                // var json = JSON.stringify(test);
                $('.json').val(JSON.stringify(test));
                // window.location.href = "/moveb?w1=" + list ;
            }
            else {

                event.preventDefault();
                return false;
            }




        });

    //    });
        $('#dataTables-example').on('mouseover','.po', function() {
            $(this).css('cursor','pointer').attr('title', 'ดูความสัมพันธ์');

        });
        $('#dataTables-example').on('mouseover','.po1', function() {
            $(this).css('cursor','pointer').attr('title', 'ย้ายตำแหน่งขึ้น');

        });
        $('#dataTables-example').on('mouseover','.po2', function() {
            $(this).css('cursor','pointer').attr('title', 'ย้ายตำแหน่งลง');

        });
        $('#dataTables-example').on('mouseover','.po3', function() {
            $(this).css('cursor','pointer').attr('title', 'เพิ่มความสัมพันธ์');

        });
        $('#dataTables-example').on('mouseover','.po4', function() {
            $(this).css('cursor','pointer').attr('title', 'เรียกดูข้อมูล');

        });
        $('#dataTables-example').on('mouseover','.po5', function() {
            $(this).css('cursor','pointer').attr('title', 'แก้ไขข้อมูล');

        });
        $('#dataTables-example').on('mouseover','.po6', function() {
            $(this).css('cursor','pointer').attr('title', 'ลบ');

        });
        $('#dataTables-example').on('mouseover','.po7', function() {
            $(this).css('cursor','pointer').attr('title', 'ดูรูปWorkFlow');

        });
        $('#dataTables-example').on('mouseover','.move', function() {
            $(this).css('cursor','pointer').attr('title', 'ย้ายตำแหน่งโดยการใส่เลข');

        });

    });

</script>
