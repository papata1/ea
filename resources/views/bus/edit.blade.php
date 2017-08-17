@extends('admin.layouts.template')
@section('page_heading','Update')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-7 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">กระบวนการ </div>

                   <div class="panel-body">


                     {!! Form::model($bus,array('route'=>['bus.update',$bus->id],'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}

                             <div class="form-group">
                                      {!! Form::label('lv3_id','ระดับกระบวนการ') !!}
                                        {!! Form::select('lv3_id',['' => ''] + $lv, null, ['class' => 'form-control datar']) !!}
                                    </div>
                                   <div class="form-group">
                                       {!! Form::label('ids','รหัสกระบวนการ') !!}
                                   </div>
                       <div class="form-group">
                           @if($bus->type ==1 )
                               <td class="col-lg-1">S0{{ $bus->ids}}  </td>
                           @elseif($bus->type ==2 )
                               <td class="col-lg-1">A0{{ $bus->ids}}  </td>
                           @elseif($bus->type ==3 )
                               <td class="col-lg-1">C0{{ $bus->ids}}  </td>
                           @elseif($bus->type ==4 )
                               <td class="col-lg-1">T0{{ $bus->ids}}  </td>
                           @else
                               <td class="col-lg-1">O0{{ $bus->ids}}  </td>
                           @endif
                       </div>
                       <div class="form-group">
                                        {!! Form::label('name','ชื่อกระบวนการ') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                     <div class="form-group">
                                      {!! Form::label('type','ประเภทกระบวนการ') !!}
                                         {!! Form::select('type', ['' => ''] +$list, null, ['class' => 'form-control datar']) !!}
                                    </div>
                                    <div class="form-group">

                                    @if ($bus->workflow_path)
                                       {!! Form::label('file','รูปกระบวนการทำงาน') !!}<br>
                                        <p><img src="{{ URL::to('/') }}/images/bus/{{ $bus->workflow_path }}"  width="600" height="600" /></p>
                                        {!! Form::file('file',null,['class'=>'form-control']) !!}
                                    @else

                                        {!! Form::label('file','รูปกระบวนการทำงาน') !!}<br ><p>ไม่มีรูปภาพ </p>
                                        {!! Form::file('file',null,['class'=>'form-control']) !!}
                                   @endif

                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('remark','รายละเอียด') !!}
                                        {!! Form::textarea('remark',null,['class'=>'form-control']) !!}
                                    </div>
                       {!! Form::label('','ความสัมพันธ์') !!}
                       {!! Form::label('','หน่วยงาน') !!}
                       <div class="panel panel-default" >
                           <div class="panel-heading">
                               หน่วยงาน
                           </div>
                           <div class="panel-body" style="margin-right:20px;">
                       <table width="100%" class="table">
                           <thead>
                           <tr>
                               <td>หน่วยงาน</td>
                               <td>ลบ</td>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($its as $it)
                               <tr>
                                   <td>{{ $it->name}}  </td>
                                   <td>
                            <a href="{{ action('BusController@dep' ,[$bus,$it->id,$it->business_layer_id,$it->comp_id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                           </div>
                       </div>
                       <div class="form-group">
                           <select  id="de" name="de" class="datar">
                               <option value=""></option>
                               <?php
                               $len = sizeof($its);
                               ?>
                               @if(count($its))
                                   @foreach($items as $item)
                                       <?php $sta = 0; ?>
                                       <?php $re = 0; ?>
                                       @foreach($its as $it)
                                           <?php $re++; ?>
                                           @if($item->id != $it->comp_id)
                                               <?php   $sta++; ?>
                                               @if($re == $len)
                                                   @if($sta == $len)
                                                       <option value="{{ $item->id}}">{{ $item->name}}</option>
                                                   @endif
                                               @endif
                                           @endif
                                       @endforeach
                                   @endforeach
                               @else
                                   @foreach($items as $item)
                                       <option value="{{ $item->id}}">{{ $item->name}}</option>
                                   @endforeach
                               @endif
                           </select></div><br><br>
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
                           <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                           <!-- /.panel--------------------------------------------------------------------------------------------------------- -->
                           {!! Form::label('','ระบบสารสนเทศ') !!}<br>
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
                                                   <a href="{{ action('BusController@dep' ,[$bus,$a->id,$a->business_layer_id,$a->comp_id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
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
                           <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                       <!-- /.panel--------------------------------------------------------------------------------------------------------- -->
                           {!! Form::label('','ข้อมูล') !!}
                           <div class="panel panel-default" >
                               <div class="panel-heading">
                                   ข้อมูล
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
                                       @foreach($ds as $d)
                                           <tr>
                                               <td>{{ $d->name}}  </td>
                                               <td>
                                                   <a href="{{ action('BusController@dep' ,[$bus,$d->id,$d->business_layer_id,$d->comp_id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                               </td>
                                           </tr>
                                       @endforeach
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       <div class="form-group">
                           <select  id="data" name="busRelation" class="datar">
                               <option value=""></option>
                               <?php
                               $lend = sizeof($dq1);
                               ?>
                               @if(count($dq1))
                                   @foreach($dats as $ds)
                                       <?php $sta = 0; ?>
                                       <?php $re = 0; ?>
                                       @foreach($dq1 as $dq)
                                           <?php $re++; ?>
                                           @if($ds->id != $dq->comp_id)
                                               <?php   $sta++; ?>
                                               @if($re == $lend)
                                                   @if($sta == $lend)
                                                       <option value="{{ $ds->id}}">{{ $ds->name}}</option>
                                                   @endif
                                               @endif
                                           @endif
                                       @endforeach
                                   @endforeach
                               @else
                                   @foreach($dats as $ds)
                                       <option value="{{ $ds->id}}">{{ $ds->name}}</option>
                                   @endforeach
                               @endif


                           </select></div><br>
                       <div class="bs-example" data-example-id="bordered-table">
                           <div class="panel panel-default" >
                               <div class="panel-heading">
                                   เพิ่มความสัมพันธ์ข้อมูล
                               </div>
                               <!-- /.panel-heading -->
                               <div class="panel-body" style="margin-right:20px;">
                                   <div class="data"><table class="table"></table></div>
                               </div>
                               <!-- /.panel-body -->
                           </div>
                           <!-- /.panel -->
                       </div>

                           <div class="form-group">

                           {!! Form::hidden('department', null,['id' => 'department']) !!}
                           {!! Form::hidden('app2', null,['id' => 'app2']) !!}
                           {!! Form::hidden('data2', null,['id' => 'data2']) !!}
                                    </div>


                                    <div class="form-group">
                                        {!! Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary','id' => 'add1']) !!}
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
                $('.app table').append("<tr><td>" + valueapp1[i5] + "</td><td><button type='button'' class='btn btn-danger arraydel1' data-id='" + valueapp1[i5] + "'" +
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
