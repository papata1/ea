@extends('admin.layouts.template')
@section('page_heading')
@section('content')

<!--Modal add -->

<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Show</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="lname">รหัส</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t51" disabled>
                            <label for="lname">ชื่อระบบ</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t1" disabled>
                            <label for="addre">ปีที่เริ่มพัฒนา</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t5" disabled>
                            <label for="addre">ภาษาที่ใช้</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t2" disabled>
                            <label for="addre">บริษัทที่พัฒนา</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t4" disabled>
                            <label for="addre">ฐานข้อมูล</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t3" disabled>
                            <label for="addre">ค่าซ่อมบำรุง</label>
                             <input type="text" class="form-control txt1" name="addre1" id="t8" size="10" disabled>

                            <label for="addre">รายละเอียด</label>
                            <textarea type="text" class="form-control txt1" name="addre1" id="t7" disabled style="height: 90px;"></textarea>
                            <label for="">ความสัมพันธ์กับระบบสารสนเทศ</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="rela" disabled style="height: 90px;"></textarea>
                            <label for="">ความสัมพันธ์กับข้อมูล</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="rela2" disabled style="height: 90px;"></textarea>
                            <label for="">ความสัมพันธ์กับเทคโนโลยี</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="rela3" disabled style="height: 90px;"></textarea>
                            <label for="">ความสัมพันธ์กับหน่วยงานที่เกี่ยวข้อง</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="rela6" disabled style="height: 90px;"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>
<?php
$i = 0 ;
$a2 = array();
$a3 = array();
foreach($a as $a1) {
    $a2[$i] = $a1->name;
    $a3[$i] = $a1->application_layer_id;
    $i++;
}?>
<?php
$i = 0 ;
$b2 = array();
$b3 = array();
foreach($b as $b1) {
    $b2[$i] = $b1->name;
    $b3[$i] = $b1->application_layer_id;
    $i++;
}?>
<?php
$i = 0 ;
$d2 = array();
$d3 = array();
foreach($d as $d1) {
    $d2[$i] = $d1->name;
    $d3[$i] = $d1->application_layer_id;
    $i++;
}?>
<?php
$i = 0 ;
$t2 = array();
$t3 = array();
foreach($t as $t1) {
    $t2[$i] = $t1->name;
    $t3[$i] = $t1->application_layer_id;
    $i++;
}?>
<?php
$i = 0 ;
$ud2 = array();
$ud3 = array();
foreach($ud as $ud1) {
    $ud2[$i] = $ud1->name;
    $ud3[$i] = $ud1->application_layer_id;
    $i++;
}?>
<?php
$i = 0 ;
$de2 = array();
$de3 = array();
foreach($de as $de1) {
    $de2[$i] = $de1->name;
    $de3[$i] = $de1->application_layer_id;
    $i++;
}?>
<?php
$i = 0 ;
$deg2 = array();
$deg3 = array();
foreach($deg as $deg1) {
    $deg2[$i] = $deg1->name;
    $deg3[$i] = $deg1->application_layer_id;
    $i++;
}?>
<class="container">
  			<div class="form-group"><h1 style="font-size:38px;">ระดับระบบสารสนเทศ</h1></div>
    @if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
 <p> </p>
 <br>

<div class="bs-example" data-example-id="bordered-table">
    <div class="row">
        <div class="col-lg-12">
<div class="panel panel-default" >
    <div class="panel-heading">
       <div class="col-lg-2"> ตารางระบบสารสนเทศ</div><div class="col-lg-8"></div>{{ link_to_route('app.create','เพิ่มระบบสารสนเทศ',null,['class'=>'btn btn-success']) }}
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
                  <tr>
                      <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>หน่วยงานที่เกี่ยวข้อง</th>
                    <th>ปีที่เริ่มใช้</th>
                      <th>ภาษที่ใช้พัฒนา</th>
                    <th>จัดการ</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($apps as $app)
          <tr>
              @foreach($in as $in1)
              @if($app->id < 10 )
              <td>{{ $in1->initial}}0{{ $app->id}} </td>
              @else
                      <td>{{ $in1->initial}}{{ $app->id}} </td>
              @endif
              @endforeach
              <td>{{ $app->name}}  </td>
              <td class="col-lg-2">

                  @foreach($des as $de)
                      @if($app->id ==$de->id )
                          {{ $de->department_id}}
                      @endif
                  @endforeach
              </td>
            <td>{{ $app->getting_start_years}}  </td>
              <td>
                  {{ $app->develop_language}}
              </td>
              <td  class="col-lg-2">
                  {!! Form::open(array('route'=>['app.destroy',$app->id],'method'=>'DELETE')) !!}

                  <button type="button" class="btn btn-default add" data-toggle="modal" data-target="#Add" data-id="{{ $app->id}}" data-id1="{{ $app->name}}"   data-id2="{{ $app->develop_language}}"
                          data-id3="{{ $app->app_database}}"   data-id4="{{ $app->develop_company}}"    data-id5="{{ $app->getting_start_years}}"  data-id6="{{ $app->app_relation}}"
                          data-id7="{{ $app->remark}}"   data-id8="{{ $app->ma_cost}}"    data-id9="{{ $app->department_id}}"
                          @foreach($in as $in1)
                          data-id51="{{ $in1->initial}}"
                          @endforeach
                  ><i class="fa fa fa-eye po4" aria-hidden="true"></i></button>
                  <a href="{{ action('AppController@edit' ,[$app->id] )}}" class="btn btn-default po5" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <i class="btn btn-default po6" aria-hidden="true">{!! Form::button('',['class'=>'fa fa-trash del','type'=>'submit']) !!}</i>
                  {!! Form::close() !!}
                </td>
          </tr>
        @endforeach
              </tbody>
        </table>
    </div>
    </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
</div>
<script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {


        // $('#filer_input').filer();

        // alert('655');

        //$('tr').each(function(){
        $('.add').on('click',function(){
            //$('#add').click(function () {
            //alert('add new branch');
            //$('#Add').modal('show');

            $('#rela').val('');
            $('#rela1').val('');
            $('#rela2').val('');
            $('#rela3').val('');
            $('#rela4').val('');
            $('#rela5').val('');
            $('#rela6').val('');
            $('#rela7').val('');
            var id = $(this).attr('data-id');
            var a = <?php echo json_encode($a2); ?>;
            var aid = <?php echo json_encode($a3); ?>;
            var count = [];
            var count1 = [];
            var count2 = [];
            var count3 = [];
            var count4 = [];
            var count5 = [];
            var count6 = [];
            var count7 = [];

            // alert(id);
            var length = aid.length;
            for (var i = 0; i < aid.length; i++) {
                if (aid[i] == id) {
                    count.push(a[i]);
                    //alert(count[i]);
                    $('#rela').val(count);
                    // document.getElementById("rela").innerHTML = fruits.toString();
                }
            }
            var b = <?php echo json_encode($b2); ?>;
            var bid = <?php echo json_encode($b3); ?>;
            for (var i = 0; i < bid.length; i++) {
                if (bid[i] == id) {
                    count1.push(b[i]);
                    //alert(a[i]);
                    $('#rela1').val(count1);
                }
            }
            var d = <?php echo json_encode($d2); ?>;
            var did = <?php echo json_encode($d3); ?>;
            for (var i = 0; i < did.length; i++) {
                if (did[i] == id) {
                    count2.push(d[i]);
                    // alert(d[i]);
                    $('#rela2').val(count2);
                }
            }
            var t = <?php echo json_encode($t2); ?>;
            var tid = <?php echo json_encode($t3); ?>;
            for (var i = 0; i < tid.length; i++) {
                if (tid[i] == id) {
                    count3.push(t[i]);
                    //  alert(t[i]);
                    $('#rela3').val(count3);
                }
            }
            var ud = <?php echo json_encode($ud2); ?>;
            var udid = <?php echo json_encode($ud3); ?>;
            for (var i = 0; i < udid.length; i++) {
                if (udid[i] == id) {
                    count4.push(ud[i]);
                    //  alert(t[i]);
                    $('#rela4').val(count4);
                }
            }
            var de = <?php echo json_encode($de2); ?>;
            var deid = <?php echo json_encode($de3); ?>;
            for (var i = 0; i < deid.length; i++) {
                if (deid[i] == id) {
                    count6.push(de[i]);
                    //  alert(t[i]);
                    $('#rela6').val(count6);
                }
            }
            var deg = <?php echo json_encode($deg2); ?>;
            var degid = <?php echo json_encode($deg3); ?>;
            for (var i = 0; i < degid.length; i++) {
                if (degid[i] == id) {
                    count6.push(deg[i]);
                    //  alert(t[i]);
                    $('#rela7').val(count6);
                }
            }

        });
        //    });


    });

</script>
@stop
