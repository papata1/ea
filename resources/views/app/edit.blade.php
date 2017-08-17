@extends('admin.layouts.template')
@section('page_heading','Update')
@section('content')

<div class="container">
       <div class="row"><br>
           <div class="col-md-7 col-md-offset-1">

               <div class="panel panel-default">

                   <div class="panel-heading">ระบบสารสนเทศ</div>

                   <div class="panel-body">


                     {!! Form::model($app,array('route'=>['app.update',$app->id],'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}


                       <div class="form-group">
                        {!! Form::label('name','ชื่อระบบ') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('getting_start_years','ปี่ที่เริ่มใช้') !!}
                        {!! Form::select('getting_start_years', array('' => '',
                         '2559' => '2559','2558' => '2558','2557' => '2557',
                        '2556' => '2556','2555' => '2555','2554' => '2554','2553' => '2553','2552' => '2552','2551' => '2551','2550' => '2550',
                        '2549' => '2549','2548' => '2548','2547' => '2547','2546' => '2546','2545' => '2545','2544' => '2544','2543' => '2543',
                        '2542' => '2542','2541' => '2541','2540' => '2540','2539' => '2539','2538' => '2538','2537' => '2537','2536' => '2536',
                        '2535' => '2535','2534' => '2534' ,'2533' => '2533','2532' => '2532','2531' => '2531','2530' => '2530'
                       ),null,['class'=>'form-control datar']) !!}
                      </div>
                       <div class="form-group">
                           {!! Form::label('develop_language','ภาษาที่ใช้พัฒนา') !!}
                           {!! Form::select('develop_language',['' => '']+$lang, null, ['class' => 'form-control datar','id' => 'lang']) !!}
                       </div>
                       <div class="form-group">
                           {!! Form::label('app_database','ฐานข้อมูล') !!}
                           {!! Form::select('app_database', ['' => '']+$data, null, ['class' => 'form-control datar','id' => 'asd']) !!}
                       </div>
                       <div class="form-group">
                           {!! Form::label('develop_company','บริษัทที่พัฒนา') !!}
                           {!! Form::text('develop_company',null,['class'=>'form-control']) !!}
                       </div>
                      <div class="form-group">
                        {!! Form::label('remark','รายละเอียด') !!}
                        {!! Form::textarea('remark',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('ma_cost','ค่าซ่อมบำรุง') !!}
                          {!! Form::text('ma_cost',null,['class'=>'form-control']) !!}
                      </div>
                       <div class="form-group">

                           @if ($app->data)
                               {!! Form::label('file','ฐานข้อมูล') !!}<br>
                               <p><a href="{{ action('AppController@download' ,[$app->data]) }}">{{$app->data}}</a></p>
                               {!! Form::file('file',null,['class'=>'form-control']) !!}
                           @else

                               {!! Form::label('file','พจนานุกรมฐานข้อมูล') !!}<br ><p>ไม่มีไฟล์ </p>
                               {!! Form::file('file',null,['class'=>'form-control']) !!}
                           @endif

                       </div>
                       <div class="form-group">

                           @if ($app->dic)
                               {!! Form::label('dic','รูปกระบวนการทำงาน') !!}<br>
                               <p><a href="{{ action('AppController@download' ,[$app->dic]) }}">{{$app->dic}}</a></p>
                               {!! Form::file('dic',null,['class'=>'form-control']) !!}<p></p>
                           @else

                               {!! Form::label('dic','รูปกระบวนการทำงาน') !!}<br ><p>ไม่มีไฟล์ </p>
                               {!! Form::file('dic',null,['class'=>'form-control']) !!}
                           @endif

                       </div>
                    <div class="form-group">
                       {!! Form::label('','ความสัมพันธ์') !!}
                       {!! Form::label('','หน่วยงาน') !!}</div>
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
                                               <a href="{{ action('AppController@dep' ,[$app,$it->id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
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
                           </select><br><br>
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
                       </div>
                       <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                    <!-- /.panel--------------------------------------------------------------------------------------------------------- -->
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
                                                   <a href="{{ action('AppController@dep' ,[$app,$a->id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
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
                                                   <a href="{{ action('AppController@dep' ,[$app,$d->id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
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
                       <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                       {!! Form::label('','เทคโนโลยี') !!}

                       <div class="panel panel-default" >
                           <div class="panel-heading">
                               เทคโนโลยี
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
                                               <a href="{{ action('AppController@dep' ,[$app,$t->id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
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
                                   เพิ่มความสัมพันธ์เทคโนโลยี
                               </div>
                               <!-- /.panel-heading -->
                               <div class="panel-body" style="margin-right:20px;">
                                   <div class="tech"><table class="table"></table> </div>
                               </div>
                               <!-- /.panel-body -->
                           </div>
                           <!-- /.panel -->
                       </div>

                   <div class="form-group">

                       {!! Form::hidden('department', null,['id' => 'department']) !!}
                       {!! Form::hidden('app2', null,['id' => 'app2']) !!}
                       {!! Form::hidden('data2', null,['id' => 'data2']) !!}
                       {!! Form::hidden('tech2', null,['id' => 'tech2']) !!}

                   </div>

                                    <div class="form-group">
                                        {!! Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
                                        {{ link_to_route('app.index','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}
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
        var valuelang = new Array();
        var valuelang1 = new Array();
        var valuedevg = new Array();
        var valuedevg1 = new Array();
        var valueusedata = new Array();
        var valueusedata1 = new Array();
        var valuebus = new Array();
        var valuebus1 = new Array();
        var valuetech = new Array();
        var valuetech1 = new Array();
        var valuede = new Array();
        var valuede1 = new Array();
        var valueapp = new Array();
        var valueapp1 = new Array();
        var valuedata = new Array();
        var valuedata1 = new Array();
        var i8 = 0;
        var i7 = 0;
        var i6 = 0;
        var i5 = 0;
        var i4 = 0;
        var i3 = 0;
        var i2 = 0;
        var i1 = 0;
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
     /*   $('#lang').change(function () {
            // alert("aa");
            var aom = 0 ;
            var lang = document.getElementById("lang");
            var selectedTextlang1 = lang.options[lang.selectedIndex].text;
            var selectedTextlang = lang.options[lang.selectedIndex].value;
            for (i = 0; i < valuelang.length; i++) {
                if (valuelang[i] == selectedTextlang) {
                    var aom = '1';
                }
            }
            if (aom == '1' ){}else {
                valuelang[i3] =  selectedTextlang ;
                valuelang1[i3] =  selectedTextlang1 ;
                $('.lang table').append("<tr><td>" + valuelang1[i3] + "</td><td><a href='#' class='btn btn-danger arraydel' data-id='" + valuelang1[i3] + "'" +
                        " data-id1='" + valuelang[i3] + "' ><span class='glyphicon glyphicon-remove'></span></a></td></tr><br>");
                i3++;
                $('.lang').on('click', '.arraydel', function () {
                    var data = $(this).attr('data-id');
                    var data1 = $(this).attr('data-id1');
                    //alert(data1);
                    valuelang1 = jQuery.grep(valuelang1, function (value) {
                        return value != data;
                    });
                    valuelang = jQuery.grep(valuelang, function (value) {
                        return value != data1;
                    });
                    $(this).closest('tr').remove();

                });
            }

        });
        $('#devg').change(function () {
            // alert("aa");
            var aom = 0 ;
            var devg = document.getElementById("devg");
            var selectedTextdevg1 = devg.options[devg.selectedIndex].text;
            var selectedTextdevg = devg.options[devg.selectedIndex].value;
            for (i = 0; i < valuedevg.length; i++) {
                if (valuedevg[i] == selectedTextdevg ) {
                    var aom = '1';
                }
            }
            if (aom == '1' ){}else {
                valuedevg[i2] =  selectedTextdevg ;
                valuedevg1[i2] =  selectedTextdevg1 ;
                $('.devg table').append("<tr><td>" + valuedevg1[i2] + "</td><td><a href='#' class='btn btn-danger arraydel1' data-id='" + valuedevg1[i2] + "'" +
                        " data-id1='" + valuedevg[i2] + "' ><span class='glyphicon glyphicon-remove'></span></a></td></tr><br>");
                i2++;
                $('.devg').on('click', '.arraydel1', function () {
                    var data = $(this).attr('data-id');
                    var data1 = $(this).attr('data-id1');
                    //alert(data1);
                    valuedevg1 = jQuery.grep(valuedevg1, function (value) {
                        return value != data;
                    });
                    valuedevg = jQuery.grep(valuedevg, function (value) {
                        return value != data1;
                    });
                    $(this).closest('tr').remove();

                });
            }

        });
        $('#ud').change(function () {
            //alert("aa");
            var aom = 0 ;
            var asd = document.getElementById("ud");
            var selectedTextusedata1 = asd.options[asd.selectedIndex].text;
            var selectedTextusedata = asd.options[asd.selectedIndex].value;
            for (i = 0; i < valueusedata.length; i++) {
                if (valueusedata[i] == selectedTextusedata ) {
                    var aom = '1';
                }
            }
            if (aom == '1' ){}else {
                valueusedata[i1] =  selectedTextusedata ;
                valueusedata1[i1] =  selectedTextusedata1 ;
                $('.ud table').append("<tr><td>" + valueusedata1[i1] + "</td><td><a href='#' class='btn btn-danger arraydel2' data-id='" + valueusedata1[i1] + "'" +
                        " data-id1='" + valueusedata[i1] + "' ><span class='glyphicon glyphicon-remove'></span></a></td></tr><br>");
                i1++;
                $('.ud').on('click', '.arraydel2', function () {
                    var data = $(this).attr('data-id');
                    var data1 = $(this).attr('data-id1');
                    //alert(data1);
                    valueusedata1 = jQuery.grep(valueusedata1, function (value) {
                        return value != data;
                    });
                    valueusedata = jQuery.grep(valueusedata, function (value) {
                        return value != data1;
                    });
                    $(this).closest('tr').remove();

                });
            }

        });
        $('#bus').change(function () {
            //alert("aa");
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
                $('.bus table').append("<tr><td>" + valuebus1[i7] + "</td><td><a href='#' class='btn btn-danger arraydel1' data-id='" + valuebus1[i7] + "'" +
                        " data-id1='" + valuebus[i7] + "' ><span class='glyphicon glyphicon-remove'></span></a></td></tr><br>");
                i7++;
                $('.bus').on('click', '.arraydel1', function () {
                    var data = $(this).attr('data-id');
                    var data1 = $(this).attr('data-id1');
                    //alert(data1);
                    valuebus1 = jQuery.grep(valuebus1, function (value) {
                        return value != data;
                    });
                    valuebus = jQuery.grep(valuebus, function (value) {
                        return value != data1;
                    });
                    alert(valuebus);
                    $(this).closest('tr').remove();

                });
            }

        });*/
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
            $('#department').val(JSON.stringify(valuede));
            $('#app2').val(JSON.stringify(valueapp));
            $('#data2').val(JSON.stringify(valuedata));
          //  $('#bus2').val(JSON.stringify(valuebus));
            $('#tech2').val(JSON.stringify(valuetech));
           /* $('#lang2').val(JSON.stringify(valuelang));
            $('#devg2').val(JSON.stringify(valuedevg));
            $('#lop2').val(JSON.stringify(valueusedata));*/
        });

    });
</script>
@stop
