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

                            <label for="lname">ชื่ออุปกรณ์</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t1" disabled>
                            <label for="name">ประเภท</label>
                            <input type="text" class="form-control txt1" name="name1" id="t40" disabled>
                            <label for="divi">สเปค</label>
                            <input type="text" class="form-control txt1" name="divi1" id="t2" disabled>
                            <label for="email">รุ่น</label>
                            <input type="text" class="form-control txt1" name="email1" id="t3" disabled>
                            <label for="email">ยี่ห้อ</label>
                            <input type="text" class="form-control txt1" name="email1" id="t4" disabled>
                            <label for="addre">จำนวน</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t7" disabled>
                            <label for="addre">ระบบปฏิบัติการ</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t8" disabled>
                            <label for="addre">CPU USE</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t9" disabled>
                            <label for="addre">Memory Total</label>
                                 <div class="row">
                            <div class="col-sm-6" ><input type="text" class="form-control txt1" name="addre1" id="t10" disabled></div>
                            <div class="col-sm-2" ><label for="addre1">GB</label></div></div>
                            <label for="addre">Memory Used</label>
                            <div class="row">
                             <div class="col-sm-6" ><input type="text" class="form-control txt1" name="addre1" id="t11" disabled></div>
                            <div class="col-sm-2" ><label for="addre1">GB</label></div></div>
                            <label for="addre">Hardisk Total</label>
                            <div class="row">
                             <div class="col-sm-6" ><input type="text" class="form-control txt1" name="addre1" id="t12" disabled></div>
                            <div class="col-sm-2" ><label for="addre1">GB</label></div></div>
                            <label for="addre">Hardisk Used</label>
                            <div class="row">
                             <div class="col-sm-6" ><input type="text" class="form-control txt1" name="addre1" id="t13" disabled></div>
                            <div class="col-sm-2" ><label for="addre1">GB</label></div></div>
                            <label for="email">สถานที่ตั้ง</label>
                            <input type="text" class="form-control txt1" name="email1" id="t15" disabled>
                            <label for="addre">ค่าซ่อมบำรุง</label>
                          <div class="row">
                          <div class="col-sm-5" > <input type="text" class="form-control txt1" name="addre1" id="t16" size="10" disabled>  </div>
                           <div class="col-sm-3" ><label for="addre1">บาท/ต่อปี</label></div></div>
                           <label for="addre">เจ้าของ/ผู้ดูแล</label>
                            <input type="text" class="form-control txt1" name="email1" id="t41" disabled>                           
                            <label for="addre">รายละเอียด</label>
                            <textarea type="text" class="form-control txt1" name="addre" id="t17" disabled disabled style="height: 90px;"></textarea>
                            <label for="">ความสัมพันธ์หับระบบสารสนเทศ</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="rela" disabled disabled style="height: 90px;"></textarea>
                        
                </div>
            </div>

        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

                </div>
    </div>
</div>
    </div>
</div>
<!--Modal add -->
<div class="modal fade" id="AddTech" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
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

                            <label for="lname">ชื่ออุปกรณ์</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t111" disabled>
                            <label for="name">ประเภท</label>
                            <input type="text" class="form-control txt1" name="name1" id="t140" disabled>
                            <label for="divi">สเปค</label>
                            <input type="text" class="form-control txt1" name="divi1" id="t112" disabled>
                            <label for="email">รุ่น</label>
                            <input type="text" class="form-control txt1" name="email1" id="t113" disabled>
                            <label for="email">ยี่ห้อ</label>
                            <input type="text" class="form-control txt1" name="email1" id="t114" disabled>
                            <label for="addre">จำนวน</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t117" disabled>
                            <label for="email">สถานที่ตั้ง</label>
                            <input type="text" class="form-control txt1" name="email1" id="t115" disabled>
                            <label for="addre">ค่าซ่อมบำรุง</label>
                            <div class="row">
                                <div class="col-sm-2" > <input type="text" class="form-control txt1" name="addre1" id="t116" size="10" disabled>  </div>
                                <div class="col-sm-3" ><label for="addre">บาท/ต่อปี </label></div></div>
                                 <label for="addre">เจ้าของ/ผู้ดูแล</label>
                            <input type="text" class="form-control txt1" name="email1" id="t441" disabled>                           
                            <label for="addre">รายละเอียด</label>
                            <textarea type="text" class="form-control txt1" name="addre" id="t1117" disabled disabled style="height: 90px;"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

                </div>
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
    $a3[$i] = $a1->technology_layer_id;
    $i++;
}?>
<?php
$i = 0 ;
$p2 = array();
$p3 = array();
foreach($p as $p1) {
    $p2[$i] = $p1->name;
    $p3[$i] = $p1->technology_layer_id;
    $i++;
}?>
<?php
$i = 0 ;
$br2 = array();
$br3 = array();
foreach($br as $br1) {
    $br2[$i] = $br1->name;
    $br3[$i] = $br1->technology_layer_id;
    $i++;
}?>
<?php
$i = 0 ;
$t2 = array();
$t3 = array();
foreach($t as $t1) {
    $t2[$i] = $t1->name;
    $t3[$i] = $t1->technology_layer_id;
    $i++;
}?>
<class="container">
  			<div class="form-group"><h1 style="font-size:38px;">ระดับเทคโนโลยี</h1></div>





    @if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif<br>

                  <p></p>
<div class="bs-example" data-example-id="bordered-table">
    <div class="row">
        <div class="col-lg-12">
<div class="panel panel-default" >
    <div class="panel-heading">
        <div class="col-lg-3">ตารางระบบสารสนเทศ</div><div class="col-lg-5"></div><a href="{{ action('TechController@test' ,[$t ='1'] )}}" class="btn btn-primary">เพิ่มเครื่องแม่ข่าย</a>
                     <a href="{{ action('TechController@test' ,[$t ='2'] )}}" class="btn btn-primary">เพิ่มอุปกรณ์</a>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
                  <tr>
                    <th>ชื่ออุปกรณ์</th>
                      <th>ประเภทเทคโนโลยี</th>
                    <th>สเปค</th>
                    <th>รุ่น</th>
                    <th>ยี่ห้อ</th>
                    <th>จัดการ</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($techs as $tech)
          <tr>
            <td>{{ $tech->name}}  </td>
              @if($tech->type == 1)
                  <td>เครื่องแม่ข่าย</td>
              @else
                  <td>อุปกรณ์</td>
              @endif
            <td>{{ $tech->tech_spec}}  </td>
            <td>{{ $tech->model}}  </td>
              <td>{{ $tech->brand}}
              </td>
             <td class="col-lg-3">
                  {!! Form::open(array('route'=>['tech.destroy',$tech->id],'method'=>'DELETE')) !!}
                 @if($tech->type == 1)
                  <button type="button" class="btn btn-default add"  data-toggle="modal" data-target="#Add" data-id="{{ $tech->id}}" data-id1="{{ $tech->name}}"   data-id2="{{ $tech->tech_spec}}"
                          data-id3="{{ $tech->model}}"   data-id4="{{ $tech->brand}}"   data-id7="{{ $tech->amount}}"  data-id8="{{ $tech->operating_system}}" data-id9="{{ $tech->cpu_use}}" 
                          data-id10="{{ $tech->memory_total}}"   data-id8="{{ $tech->cpu_use}}"  
                          data-id11="{{ $tech->memory_used}}" data-id12="{{ $tech->hardisk_total}}" data-id15="{{ $tech->tech_location}}"	data-id14="{{ $tech->utility_app}}"  data-id13="{{ $tech->hardisk_used}}"
                          data-id16="{{ $tech->	ma_cost}}" data-id17="{{ $tech->remark}}" data-id40="{{ $tech->type}}" data-id41="{{ $tech->owner}}"
                  ><i class="fa fa fa-eye po4" aria-hidden="true"></i></button>
                 @else
                 <button type="button" class="btn btn-default add"  data-toggle="modal" data-target="#AddTech" data-id="{{ $tech->id}}" data-id1="{{ $tech->name}}"   data-id2="{{ $tech->tech_spec}}"
                         data-id3="{{ $tech->model}}"   data-id4="{{ $tech->brand}}"   data-id7="{{ $tech->amount}}"  data-id8="{{ $tech->operating_system}}" data-id9="{{ $tech->cpu_use}}"
                         data-id10="{{ $tech->memory_total}}"   data-id8="{{ $tech->cpu_use}}"
                         data-id11="{{ $tech->memory_used}}" data-id12="{{ $tech->hardisk_total}}" data-id15="{{ $tech->tech_location}}"	data-id14="{{ $tech->utility_app}}"  data-id13="{{ $tech->hardisk_used}}"
                         data-id16="{{ $tech->	ma_cost}}" data-id17="{{ $tech->remark}}" data-id40="{{ $tech->type}}" data-id41="{{ $tech->owner}}"
                 ><i class="fa fa fa-eye po4" aria-hidden="true"></i></button>
                 @endif
                  <a href="{{ action('TechController@edit' ,[$tech->id] )}}" class="btn btn-default po5" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
            $('#rela0').val('');
            $('#rela11').val('');
            $('#rela12').val('');
            $('#rela13').val('');
            var id = $(this).attr('data-id');
            var a = <?php echo json_encode($a2); ?>;
            var aid = <?php echo json_encode($a3); ?>;
            var count = [];
            var count1 = [];
            var count2 = [];
            var count3 = [];

            // alert(id);
            var length = aid.length;
            for (var i = 0; i < aid.length; i++) {
                if (aid[i] == id) {
                    count.push(a[i]);
                    //alert(count[i]);
                    $('#rela').val(count);
                    $('#rela0').val(count);
                    // document.getElementById("rela").innerHTML = fruits.toString();
                }
            }
            var br = <?php echo json_encode($br2); ?>;
            var brid = <?php echo json_encode($br3); ?>;
            for (var i = 0; i < brid.length; i++) {
                if (brid[i] == id) {
                    count1.push(br[i]);
                    //alert(a[i]);
                    $('#rela1').val(count1);
                    $('#rela11').val(count1);
                }
            }
            var p = <?php echo json_encode($p2); ?>;
            var pid = <?php echo json_encode($p3); ?>;
            for (var i = 0; i < pid.length; i++) {
                if (pid[i] == id) {
                    count2.push(p[i]);
                    // alert(d[i]);
                    $('#rela2').val(count2);
                    $('#rela12').val(count2);
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

        });
        //    });


    });

</script>
@stop
