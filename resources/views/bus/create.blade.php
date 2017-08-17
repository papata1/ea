@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-7 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">กระบวนการ</div>

                   <div class="panel-body">

                     {!! Form::open(array('route'=>'bus.store','class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)) !!}


                                 
                                        <div class="form-group">
                                      {!! Form::label('lv3_id','ระดับกระบวนการ') !!}
                                        {!! Form::select('lv3_id',['' => ''] + $lv, null, ['class' => 'form-control datar']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('name','ชื่อกระบวนการ') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                      {!! Form::label('type','ประเภทกระบวนการ') !!}
                                        {!! Form::select('type',['' => ''] + $list, null, ['class' => 'form-control datar']) !!}
                                    </div>
                                    <div class="form-group">
                                      {{ Form::label('file','Workflow') }}
                                      {{ Form::file('file',null,['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('remark','รายละเอียด') !!}
                                        {!! Form::textarea('remark',null,['class'=>'form-control']) !!}
                                    </div>
                       {!! Form::label('','ความสัมพันธ์') !!}
                                    <div class="form-group">
                                        {!! Form::label('department_id','หน่วยงานที่เกี่ยวข้อง') !!}
                                    </div>
                                       <div class="form-group">
                                           <select  id="de" name="busRelation" class="datar">
                                               <option value=""></option>
                                               @foreach($items as $is)
                                                   <option value="{{ $is->id}}">{{ $is->name}}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                       <div class="panel panel-default" >
                                           <div class="panel-heading">
                                              หน่วยงาน
                                           </div>
                                           <!-- /.panel-heading -->
                                           <div class="panel-body" style="margin-right:20px;">
                                               <div class="de"><table class="table"></table></div>
                                           </div>
                                           <!-- /.panel-body -->
                                       </div>
                                       <!-- /.panel -->
                       <div class="form-group">
                           {!! Form::label('department_id','ระบบสารสนเทศ') !!}
                       </div>
                       <div class="form-group">
                           <select  id="app" name="busRelation" class="datar">
                               <option value=""></option>
                               @foreach($app456 as $as)
                                   <option value="{{ $as->id}}">{{ $as->name}}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="panel panel-default" >
                           <div class="panel-heading">
                               ระบบสารสนเทศ
                           </div>
                           <!-- /.panel-heading -->
                           <div class="panel-body" style="margin-right:20px;">
                               <div class="app"><table class="table"></table></div>
                           </div>
                           <!-- /.panel-body -->
                       </div>
                       <!-- /.panel -->
                       <div class="form-group">
                           {!! Form::label('','ข้อมูล') !!}
                       </div>
                       <div class="form-group">
                           <select  id="data" name="busRelation" class="datar">
                               <option value=""></option>
                               @foreach($data456 as $ds)
                                   <option value="{{ $ds->id}}">{{ $ds->name}}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="panel panel-default" >
                           <div class="panel-heading">
                               ข้อมูล
                           </div>
                           <!-- /.panel-heading -->
                           <div class="panel-body" style="margin-right:20px;">
                               <div class="data"><table class="table"></table></div>
                           </div>
                           <!-- /.panel-body -->
                       </div>
                       <!-- /.panel -->



                         {!! Form::hidden('department', null,['id' => 'department']) !!}
                       {!! Form::hidden('app2', null,['id' => 'app2']) !!}
                       {!! Form::hidden('data2', null,['id' => 'data2']) !!}
                      <div class="form-group">
                          {!! Form::button('เพิ่มกระบวนการ',['type'=>'submit','class'=>'btn btn-primary','id' => 'add1']) !!}
                          {{ link_to_route('bus.index','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}
                                    </div>
                                {!! Form::close() !!}
                   </div>
               </div>
                                     @if($errors->any())
                                    <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    @endif
           </div>
       </div>
   </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var valuede = new Array();
        var valuede1 = new Array();
        var valueapp = new Array();
        var valueapp1 = new Array();
        var valuedata = new Array();
        var valuedata1 = new Array();
        var i6 = 0;
        var i5 = 0;
        var i4 = 0;
        $('#de').change(function () {
           // alert("aa");
            var aom = 0 ;
            var deq = document.getElementById("de");
            var selectedTextde1 = deq.options[deq.selectedIndex].text;
            var selectedTextde = deq.options[deq.selectedIndex].value;
            for (i = 0; i < valuede.length; i++) {
                if (valuede[i] == selectedTextde ) {
                    var aom = '1';
                }
            }
            if (aom == '1' ){}else {
            valuede[i6] =  selectedTextde ;
            valuede1[i6] =  selectedTextde1 ;
            //$(".de").text(valuede1);

                $('.de table').append("<tr><td>" + valuede1[i6] + "</td><td><button type='button' class='btn btn-danger arraydel' data-id='" + valuede1[i6] + "'" +
                        " data-id1='" + valuede[i6] + "' ><span class='glyphicon glyphicon-remove'></span></button></td></tr><br>");
                i6++;
                $('.de').on('click', '.arraydel', function () {
                   var data = $(this).attr('data-id');
                    var data1 = $(this).attr('data-id1');
                    //alert(data1);
                    valuede1 = jQuery.grep(valuede1, function (value) {
                        return value != data;
                    });
                    valuede = jQuery.grep(valuede, function (value) {
                        return value != data1;
                    });
                    $(this).closest('tr').remove();

                });
            }

        });
        $('#app').change(function () {
            // alert("aa");
            var aom = 0 ;
            var app = document.getElementById("app");
            var selectedTextapp1 = app.options[app.selectedIndex].text;
            var selectedTextapp = app.options[app.selectedIndex].value;
            for (i = 0; i < valueapp.length; i++) {
                if (valueapp[i] == selectedTextapp ) {
                    var aom = '1';
                }
            }
            if (aom == '1' ){}else {
                valueapp[i5] =  selectedTextapp ;
                valueapp1[i5] =  selectedTextapp1 ;
                $('.app table').append("<tr><td>" + valueapp1[i5] + "</td><td><button type='button' class='btn btn-danger arraydel1' data-id='" + valueapp1[i5] + "'" +
                        " data-id1='" + valueapp[i5] + "' ><span class='glyphicon glyphicon-remove'></span></button></td></tr><br>");
                i5++;
                $('.app').on('click', '.arraydel1', function () {
                    var data = $(this).attr('data-id');
                    var data1 = $(this).attr('data-id1');
                    //alert(data1);
                    valueapp1 = jQuery.grep(valueapp1, function (value) {
                        return value != data;
                    });
                    valueapp = jQuery.grep(valueapp, function (value) {
                        return value != data1;
                    });
                    $(this).closest('tr').remove();

                });
            }

        });
        $('#data').change(function () {
            // alert("aa");
            var aom = 0 ;
            var data = document.getElementById("data");
            var selectedTextdata1 = data.options[data.selectedIndex].text;
            var selectedTextdata = data.options[data.selectedIndex].value;
            for (i = 0; i < valuedata.length; i++) {
                if (valuedata[i] == selectedTextdata ) {
                    var aom = '1';
                }
            }
            if (aom == '1' ){}else {
                valuedata[i4] =  selectedTextdata ;
                valuedata1[i4] =  selectedTextdata1 ;
                $('.data table').append("<tr><td>" + valuedata1[i4] + "</td><td><button type='button' class='btn btn-danger arraydel2' data-id='" + valuedata1[i4] + "'" +
                        " data-id1='" + valuedata[i4] + "' ><span class='glyphicon glyphicon-remove'></span></button></td></tr><br>");
                i4++;
                $('.data').on('click', '.arraydel2', function () {
                    var data = $(this).attr('data-id');
                    var data1 = $(this).attr('data-id1');
                    //alert(data1);
                    valuedata1 = jQuery.grep(valuedata1, function (value) {
                        return value != data;
                    });
                    valuedata = jQuery.grep(valuedata, function (value) {
                        return value != data1;
                    });
                    $(this).closest('tr').remove();

                });
            }

        });
        $('#add1').click(function () {
            $('#department').val(JSON.stringify(valuede));
            $('#app2').val(JSON.stringify(valueapp));
            $('#data2').val(JSON.stringify(valuedata));
           //alert(valuedata);
        });


    });
</script>
@stop
