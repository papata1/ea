@extends('admin.layouts.template')
@section('page_heading')
@section('content')
<!--Modal add -->
<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
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
                            <label for="name">รหัสกระบวนการ</label>
                            <input type="text" class="form-control txt1" name="name1" id="t0" disabled>
                            <label for="name">ชื่อกระบวนการ</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t1" disabled>
                            <label for="divi">กระบวนการทำงาน</label>
                            <input type="text" class="form-control txt1" name="divi1" id="t2" disabled>
                           <label for="divi">ประเภทกระบวนการ</label>
                            <input type="text" class="form-control txt1" name="divi1" id="t5" disabled>
                            <label for="tel">หน่วยงานที่เกี่ยวข้อง</label>
                            <input type="text" class="form-control txt1" name="tel1" id="t4" disabled>
                            <label for="email">รายละเอียดเพิ่มเติม</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="t3" disabled></textarea>
                            <label for="">ความสัมพันธ์ Application</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="rela" disabled></textarea>
                            <label for="">ความสัมพันธ์ Business</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="rela1" disabled></textarea>
                            <label for="">ความสัมพันธ์ Data</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="rela2" disabled></textarea>
                            <label for="">ความสัมพันธ์ Technology</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="rela3" disabled></textarea>


                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="pic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
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
                        <div class="modal-body">
                            <img src="" id="imagepreview" style="width: 400px; height: 264px;" >
                            <div id="t01"></div>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>
<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">BUSSINESS</h1></div>
    <?php
    $i = 0 ;
    $a2 = array();
    $a3 = array();
    foreach($a as $a1) {
        $a2[$i] = $a1->name;
        $a3[$i] = $a1->business_layer_id;
        $i++;
    }?>
    <?php
    $i = 0 ;
    $b2 = array();
    $b3 = array();
    foreach($b as $b1) {
        $b2[$i] = $b1->name;
        $b3[$i] = $b1->business_layer_id;
        $i++;
    }?>
    <?php
    $i = 0 ;
    $d2 = array();
    $d3 = array();
    foreach($d as $d1) {
        $d2[$i] = $d1->name;
        $d3[$i] = $d1->business_layer_id;
        $i++;
    }?>
    <?php
    $i = 0 ;
    $t2 = array();
    $t3 = array();
    foreach($t as $t1) {
        $t2[$i] = $t1->name;
        $t3[$i] = $t1->business_layer_id;
        $i++;
    }?>


    @if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<p>{{ link_to_route('bus.create','Add New ',null,['class'=>'btn btn-success']) }}</p>
<div class="bs-example" data-example-id="bordered-table">
    <div class="row">
        <div class="col-lg-10">
<div class="panel panel-default" >
    <div class="panel-heading">
        Bussiness Tables
    </div>

    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">

        <table width="100%" class="table" id="dataTables-example">
          <thead>
            <tr>
                <th>รหัสกระบวนการ</th>
                <th>ชื่อกระบวนการ</th>
                <th>จัดการลำดับ</th>
                <th>จัดการ</th>
            </tr>
              </thead>
              <tbody>
                @foreach($buss as $bus)
                <tr>
                     <td class="col-lg-1">{{ $bus->id}}  </td>
                     <td class="col-lg-4">{{ $bus->name}}  </td>
                      <td class="col-lg-2"> <form action="moved" method = "post" enctype="multipart/form-data" >
                              <input type="hidden" name="_token" value="{{csrf_token()}}" >
                              <input type="hidden" id="a" name="a" value="{{$bus->id}}">
                              <input type="hidden" id="json" class="json" name="json" value="">
                             <input type="submit" value="M" id = "move" class="btn btn-default move">
                              <a href="{{ action('BusController@moveup' ,[$bus->id] )}}" class="btn btn-default"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                              <a href="{{ action('BusController@movedown' ,[$bus->id] )}}" class="btn btn-default"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a> </td>
                          </form>
                         <td class="col-lg-4">
                           {!! Form::open(array('route'=>['bus.destroy',$bus->id],'method'=>'DELETE')) !!}
                             <button type="button" class="btn btn-default pic" data-id="{{ $bus->name}}" src="{{ URL::to('/') }}/images/bus/{{$bus->workflow_path}}"><i class="fa fa-file-pdf-o pic" aria-hidden="true"></i></button>
                             <a href="{{ action('BusController@delb' ,[$bus->id] )}} " class="btn btn-default"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                             <a href="{{ action('BusController@relation' ,[$bus->id] )}}" class="btn btn-default"><i class="fa fa-sitemap " aria-hidden="true"></i></a>
                           <button type="button" class="btn btn-default add"  data-toggle="modal" data-target="#Add" data-id="{{ $bus->id}}" data-id1="{{ $bus->name}}" data-id2="{{ $bus->workflow_path}}"   data-id3="{{ $bus->remark}}" data-id4="{{ $bus->department_id}}"
                               ><i class="fa fa fa-eye " aria-hidden="true"></i></button>
                             <a href="{{ action('BusController@edit' ,[$bus->id] )}} " class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                             <i class="btn btn-default" aria-hidden="true">{!! Form::button('',['class'=>'fa fa-trash del','type'=>'submit']) !!}</i>
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

            });
            //    });



        });

    </script>
    @stop
