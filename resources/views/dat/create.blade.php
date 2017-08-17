@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-7 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">ข้อมูล</div>

                   <div class="panel-body">

                     {!! Form::open(array('route'=>'dat.store','class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)) !!}


                                    <div class="form-group">
                                        {!! Form::label('name','ชื่อข้อมูล') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('remark','รายละเอียด') !!}
                                        {!! Form::textarea('remark',null,['class'=>'form-control']) !!}
                                    </div>

                       {!! Form::label('','ความสัมพันธ์') !!}
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
                           {!! Form::label('','กระบวนการ') !!}
                       </div>
                       <div class="form-group">
                           <select  id="bus" name="busRelation" class="datar">
                               <option value=""></option>
                               @foreach($bus456 as $bs)
                                   <option value="{{ $bs->id}}">{{ $bs->name}}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="panel panel-default" >
                           <div class="panel-heading">
                               กระบวนการ
                           </div>
                           <!-- /.panel-heading -->
                           <div class="panel-body" style="margin-right:20px;">
                               <div class="bus"><table class="table"></table></div>
                           </div>
                           <!-- /.panel-body -->
                       </div>
                       <div class="form-group">
                           {!! Form::label('','ประเภทการจัดเก็บ') !!}
                       </div>
                       <div class="form-group">
                           <select  id="tech" name="busRelation" class="datar">
                               <option value=""></option>
                               @foreach($tech456 as $ts)
                                   <option value="{{ $ts->id}}">{{ $ts->name}}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="panel panel-default" >
                           <div class="panel-heading">
                               ประเภทการจัดเก็บ
                           </div>
                           <!-- /.panel-heading -->
                           <div class="panel-body" style="margin-right:20px;">
                               <div class="tech"><table class="table"></table></div>
                           </div>
                           <!-- /.panel-body -->
                       </div>
                       <!-- /.panel -->
                       <!-- /.panel -->
                       {!! Form::hidden('app2', null,['id' => 'app2']) !!}
                       {!! Form::hidden('bus2', null,['id' => 'bus2']) !!}
                       {!! Form::hidden('tech2', null,['id' => 'tech2']) !!}
                                    <div class="form-group">
                                        {!! Form::button('เพิ่มข้อมูล',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
                                        {{ link_to_route('dat.index','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}
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
        var valuebus = new Array();
        var valuebus1 = new Array();
        var valuetech = new Array();
        var valuetech1 = new Array();
        var valueapp = new Array();
        var valueapp1 = new Array();
        var i5 = 0;
        var i7 = 0;
        var i8 = 0;

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
        $('#bus').change(function () {
            var aom = 0 ;
            var bus = document.getElementById("bus");
            var selectedTextbus1 = bus.options[bus.selectedIndex].text;
            var selectedTextbus = bus.options[bus.selectedIndex].value;
            for (i = 0; i < valuebus.length; i++) {
                if (valuebus[i] == selectedTextbus ) {
                    var aom = '1';
                }
            }
            if (aom == '1' ){}else {
                valuebus[i7] =  selectedTextbus ;
                valuebus1[i7] =  selectedTextbus1 ;
                $('.bus table').append("<tr><td>" + valuebus1[i7] + "</td><td><button type='button' class='btn btn-danger arraydel1' data-id='" + valuebus1[i7] + "'" +
                        " data-id1='" + valuebus[i7] + "' ><span class='glyphicon glyphicon-remove'></span></button></td></tr><br>");
                i7++;
                $('.bus').on('click', '.arraydel1', function () {
                    var data = $(this).attr('data-id');
                    var data1 = $(this).attr('data-id1');
                    valuebus1 = jQuery.grep(valuebus1, function (value) {
                        return value != data;
                    });
                    valuebus = jQuery.grep(valuebus, function (value) {
                        return value != data1;
                    });
                    $(this).closest('tr').remove();

                });
            }

        });
        $('#tech').change(function () {
            //alert("aa");
            var aom = 0 ;
            var tech = document.getElementById("tech");
            var selectedTexttech1 = tech.options[tech.selectedIndex].text;
            var selectedTexttech = tech.options[tech.selectedIndex].value;
            for (i = 0; i < valuetech.length; i++) {
                if (valuetech[i] == selectedTexttech ) {
                    var aom = '1';
                }
            }
            if (aom == '1' ){}else {
                valuetech[i8] =  selectedTexttech ;
                valuetech1[i8] =  selectedTexttech1 ;
                $('.tech table').append("<tr><td>" + valuetech1[i8] + "</td><td><button type='button' class='btn btn-danger arraydel2' data-id='" + valuetech1[i8] + "'" +
                        " data-id1='" + valuetech[i8] + "' ><span class='glyphicon glyphicon-remove'></span></button></td></tr><br>");
                i8++;
                $('.tech').on('click', '.arraydel2', function () {
                    var data = $(this).attr('data-id');
                    var data1 = $(this).attr('data-id1');
                    //alert(data1);
                    valuetech1 = jQuery.grep(valuetech1, function (value) {
                        return value != data;
                    });
                    valuetech = jQuery.grep(valuetech, function (value) {
                        return value != data1;
                    });
                    $(this).closest('tr').remove();

                });
            }

        });
        $('#add1').click(function () {
            $('#app2').val(JSON.stringify(valueapp));
            $('#bus2').val(JSON.stringify(valuebus));
            $('#tech2').val(JSON.stringify(valuetech));
            //alert(valuedata);
        });


    });
</script>
@stop
