<!DOCTYPE html>
<html lang="en">


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
                <a class="navbar-brand" href="{{ action('BusController@index')}}">Admin</a>
            </div>
            <!-- /.navbar-header -->

            @include('admin.layouts.inc-header')
            <!-- /.navbar-top-links -->

            @include('admin.layouts.inc-left-sidebar')
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <div class="form-group"><h1 style="font-size:38px;">ข้อมูลหลัก</h1></div>

                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel panel-default" >
                            <div class="panel-heading">
                                เมนู
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body" style="margin-right:20px;">
                                <div class="form-group"><h4 >โปรดเลือกหน้าที่ต้องการ</h4></div>
                                <select id="master" name="master" class="form-control info">
                                    <option selected=\"selected\"></option>
                                    <option value="b" href="{{ url ('de') }}">หน่วยงานที่เกี่ยวข้อง</option>
                                    <option value="a" href="{{ url ('brand') }}">ยี่ห้อ</option>
                                    <option value="d" href="{{ url ('coll') }}">ประเภทการเก็บข้อมูล</option>
                                    <option value="r" href="{{ url ('lang') }}">ภาษาที่ใช้พัฒนา</option>
                                    <option value="q" href="{{ url ('place') }}">สถานที่ตั้ง</option>
                                    <option value="w" href="{{ url ('proc') }}">ประเภทกระบวนการ</option>
                                    <option value="g" href="{{ url ('ud') }}">ฐานข้อมูลที่ใช้</option>
                                    <option value="i" href="{{ url ('devg') }}" >บริษัทที่พัฒนา</option>
                                </select>

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->

                    </div>
                </div>

        </div>

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
        document.getElementById('master').onchange = function() {
            window.location.href = this.children[this.selectedIndex].getAttribute('href');
            // alert('4');
        };
        $(".busr").chosen({
          search_contains: true
        });
        $(".appr").chosen({
          search_contains: true
        });
        $(".datar").chosen({
          search_contains: true

        });
        $(".techr").chosen({
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
