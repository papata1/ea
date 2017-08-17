@extends('admin.layouts.template')
@section('page_heading','Update')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-7 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">ข้อมูล</div>

                   <div class="panel-body">


                     {!! Form::model($dat,array('route'=>['dat.update',$dat->id],'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}


                                    <div class="form-group">
                                        {!! Form::label('name','ชื่อข้อมูล') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('remark','รายละเอียด') !!}
                                        {!! Form::textarea('remark',null,['class'=>'form-control']) !!}
                                    </div>

                       {!! Form::label('','ประเภทการจัดเก็บ') !!}

                       <div class="panel panel-default" >
                           <div class="panel-heading">
                               ประเภทการจัดเก็บ
                           </div>
                           <div class="panel-body" style="margin-right:20px;">
                               <table width="100%" class="table">
                                   <thead>
                                   <tr>
                                       <td>ชื่อ</td>
                                       <td>ลบ</td>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($ts as $t)
                                       <tr>
                                           <td>{{ $t->name}}  </td>
                                           <td>
                                               <a href="{{ action('DatController@dep' ,[$dat,$t->id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>
                       <div class="form-group">
                           <select  id="tech" name="busRelation" class="techr" >
                               <option value=""></option>
                               <?php
                               $lent = sizeof($tq1);
                               ?>
                               @if(count($tq1))
                                   @foreach($techs as $ts)
                                       <?php $sta = 0; ?>
                                       <?php $re = 0; ?>
                                       @foreach($tq1 as $tq)
                                           <?php $re++; ?>
                                           @if($ts->id != $tq->comp_id)
                                               <?php   $sta++; ?>
                                               @if($re == $lent)
                                                   @if($sta == $lent)
                                                       <option value="{{ $ts->id}}">{{ $ts->name}}</option>
                                                   @endif
                                               @endif
                                           @endif
                                       @endforeach
                                   @endforeach
                               @else
                                   @foreach($techs as $ts)
                                       <option value="{{ $ts->id}}">{{ $ts->name}}</option>
                                   @endforeach
                               @endif

                           </select></div><br>
                       <div class="bs-example" data-example-id="bordered-table">
                           <div class="panel panel-default" >
                               <div class="panel-heading">
                                   เพิ่มความสัมพันธ์ประเภทการจัดเก็บ
                               </div>
                               <!-- /.panel-heading -->
                               <div class="panel-body" style="margin-right:20px;">
                                   <div class="tech"><table class="table"></table> </div>
                               </div>
                               <!-- /.panel-body -->
                           </div>
                           <!-- /.panel -->
                       </div>
                       <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                       {!! Form::label('','กระบวนการ') !!}

                       <div class="panel panel-default" >
                           <div class="panel-heading">
                               กระบวนการ
                           </div>
                           <div class="panel-body" style="margin-right:20px;">
                               <table width="100%" class="table">
                                   <thead>
                                   <tr>
                                       <td>ชื่อ</td>
                                       <td>ลบ</td>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($bs as $b)
                                       <tr>
                                           <td>{{ $b->name}}  </td>
                                           <td>
                                               <a href="{{ action('DatController@dep' ,[$dat,$b->id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>
                       <div class="form-group">
                           <select  id="bus" name="busRelation" class="busr" >
                               <option value=""></option>
                               <?php
                               $lenb = sizeof($bq1);
                               ?>
                               @if(count($bq1))
                                   @foreach($buss as $bs)
                                       <?php $sta = 0; ?>
                                       <?php $re = 0; ?>
                                       @foreach($bq1 as $bq)
                                           <?php $re++; ?>
                                           @if($bs->id != $bq->comp_id)
                                               <?php   $sta++; ?>
                                               @if($re == $lenb)
                                                   @if($sta == $lenb)
                                                       <option value="{{ $bs->id}}">{{ $bs->name}}</option>
                                                   @endif
                                               @endif
                                           @endif
                                       @endforeach
                                   @endforeach
                               @else
                                   @foreach($buss as $bs)
                                       <option value="{{ $bs->id}}">{{ $bs->name}}</option>
                                   @endforeach
                               @endif


                           </select></div><br>
                       <div class="bs-example" data-example-id="bordered-table">
                           <div class="panel panel-default" >
                               <div class="panel-heading">
                                   เพิ่มความสัมพันธ์กระบวนการ
                               </div>
                               <!-- /.panel-heading -->
                               <div class="panel-body" style="margin-right:20px;">
                                   <div class="bus"><table class="table"></table> </div>
                               </div>
                               <!-- /.panel-body -->
                           </div>
                           <!-- /.panel -->
                       </div>
                       <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                       {!! Form::label('','ระบบสารสนเทศ') !!}
                       <div class="panel panel-default" >
                           <div class="panel-heading">
                               ระบบสารสนเทศ
                           </div>
                           <div class="panel-body" style="margin-right:20px;">
                               <table width="100%" class="table">
                                   <thead>
                                   <tr>
                                       <td>ชื่อ</td>
                                       <td>ลบ</td>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($aps as $a)
                                       <tr>
                                           <td>{{ $a->name}}  </td>
                                           <td>
                                               <a href="{{ action('DatController@dep' ,[$dat,$a->id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>
                       <div class="form-group">
                           <select  id="app" name="appRelation" class="appr">
                               <option value=""></option>
                               <?php
                               $len = sizeof($aq1);
                               ?>
                               @if(count($aq1))
                                   @foreach($apps as $ap)
                                       <?php $sta = 0; ?>
                                       <?php $re = 0; ?>
                                       @foreach($aq1 as $aq)
                                           <?php $re++; ?>
                                           @if($ap->id != $aq->comp_id)
                                               <?php   $sta++; ?>
                                               @if($re == $len)
                                                   @if($sta == $len)
                                                       <option value="{{ $ap->id}}">{{ $ap->name}}</option>
                                                   @endif
                                               @endif
                                           @endif
                                       @endforeach
                                   @endforeach
                               @else
                                   @foreach($apps as $ap)
                                       <option value="{{ $ap->id}}">{{ $ap->name}}</option>
                                   @endforeach
                               @endif
                           </select></div><br>
                       <div class="bs-example" data-example-id="bordered-table">
                           <div class="panel panel-default" >
                               <div class="panel-heading">
                                   เพิ่มความสัมพันธ์ระบบสารสนเทศ
                               </div>
                               <!-- /.panel-heading -->
                               <div class="panel-body" style="margin-right:20px;">
                                   <div class="app"><table class="table"></table></div>
                               </div>
                               <!-- /.panel-body -->
                           </div>
                           <!-- /.panel -->
                       </div>





                       {!! Form::hidden('app2', null,['id' => 'app2']) !!}
                       {!! Form::hidden('bus2', null,['id' => 'bus2']) !!}
                       {!! Form::hidden('tech2', null,['id' => 'tech2']) !!}
                                    <div class="form-group">
                                        {!! Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
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
