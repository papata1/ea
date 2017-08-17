@extends('admin.layouts.template')
@section('page_heading')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-7 col-md-offset-1">.

               <div class="panel panel-default">
                  @if($t==2)
                  <div class="panel-heading">อุปกรณ์</div>

                  <div class="panel-body">

                    {!! Form::open(array('route'=>'tech.store','class' => 'form',
       'novalidate' => 'novalidate',
       'files' => true)) !!}


                  <div class="form-group">
                    {!! Form::label('name','ชื่อ') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('model','รุ่น') !!}
                    {!! Form::text('model',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('tech_spec','สเปค') !!}
                    {!! Form::text('tech_spec',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('amount','จำนวน') !!}
                      {!! Form::text('amount',null,['class'=>'form-control']) !!}
                  </div>
                    <div class="form-group">
                    {!! Form::label('ma_cost',' ค่าซ่อมบำรุง') !!}
                        <input type="text" id="ma_cost" name="ma_cost" size="10"> บาท/ต่อปี
                    </div>
                      <div class="form-group">
                          {!! Form::label('tech_location',' สถานที่ตั้ง') !!}
                          {!! Form::select('tech_location',[''=>''] + $tt, null, ['class' => 'form-control datar']) !!}
                      </div>
                      <div class="form-group">
                          {!! Form::label('brand','ยี่ห้อ') !!}
                          {!! Form::select('brand', [''=>''] + $dd, null, ['class' => 'form-control datar']) !!}
                      </div>
                    <div class="form-group">
                    {!! Form::label('owner','เจ้าของ/ผู้ดูแล') !!}
                    {!! Form::text('owner',null,['class'=>'form-control']) !!}
                  </div>
                   <div class="form-group">
                    {!! Form::label('remark',' รายละเอียด') !!}
                    {!! Form::textarea('remark',null,['class'=>'form-control']) !!}
                  </div>
                      <div class="form-group">
                    {!! Form::label('file','Specification') !!}
                    {!! Form::file('file',null,['class'=>'form-control']) !!}
                  </div>

                   {!! Form::hidden('type','2',['class'=>'form-control']) !!}


                      @else
                      <div class="panel-heading">เครื่องแม่ข่าย</div>

                      <div class="panel-body">

                        {!! Form::open(array('route'=>'tech.store','class' => 'form',
           'novalidate' => 'novalidate',
           'files' => true)) !!}


                         <div class="form-group">
                           {!! Form::label('name','ชื่อ') !!}
                           {!! Form::text('name',null,['class'=>'form-control']) !!}
                         </div>
                         <div class="form-group">
                           {!! Form::label('model','รุ่น') !!}
                           {!! Form::text('model',null,['class'=>'form-control']) !!}
                         </div>
                         <div class="form-group">
                           {!! Form::label('tech_spec','สเปค') !!}
                           {!! Form::text('tech_spec',null,['class'=>'form-control']) !!}
                         </div>
                         <div class="form-group">
                           {!! Form::label('amount','จำนวน') !!}
                           {!! Form::text('amount',null,['class'=>'form-control']) !!}
                         </div>
                         <div class="form-group">
                           {!! Form::label('operating_system','ระบบปฏิบัติการ') !!}
                           {!! Form::text('operating_system',null,['class'=>'form-control']) !!}
                         </div>
                         <div class="form-group">
                           {!! Form::label('cpu_use','ซีพียูที่ใช้') !!}
                           {!! Form::text('cpu_use',null,['class'=>'form-control ']) !!}
                         </div>
                         <div class="form-group">
                           {!! Form::label('memory_total',' เมมโมรี่ทั้งหมด') !!}
                             <input type="text" id="memory_total" name="memory_total" size="10"> GB
                         </div>
                         <div class="form-group">
                           {!! Form::label('memory_used','เมมโมรี่ที่ใช้') !!}
                             <input type="text" id="memory_used" name="memory_used" size="10"> GB

                         </div>
                           <div class="form-group">
                           {!! Form::label('hardisk_total','หน่วนความจำที่มี') !!}
                               <input type="text" id="hardisk_total" name="hardisk_total" size="10"> GB
                           </div>
                           <div class="form-group">
                           {!! Form::label(' hardisk_used',' หน่วนความจำที่ใช้') !!}
                               <input type="text" id="hardisk_used" name="hardisk_used" size="10"> GB
                           </div>
                           <div class="form-group">
                           {!! Form::label('ma_cost',' ค่าซ่อมบำรุง') !!}
                           <input type="text" id="ma_cost" name="ma_cost" size="10"> บาท/ต่อปี
                         </div>
                          <div class="form-group">
                              {!! Form::label('tech_location',' สถานที่ตั้ง') !!}
                              {!! Form::select('tech_location',[''=>''] + $tt, null, ['class' => 'form-control datar']) !!}
                          </div>
                          <div class="form-group">
                              {!! Form::label('brand','ยี่ห้อ') !!}
                              {!! Form::select('brand', [''=>''] + $dd, null, ['class' => 'form-control datar']) !!}
                          </div>
                        <div class="form-group">
                    {!! Form::label('owner','เจ้าของ/ผู้ดูแล') !!}
                    {!! Form::text('owner',null,['class'=>'form-control']) !!}
                  </div>
                          <div class="form-group">
                           {!! Form::label('remark',' รายละเอียด') !!}
                           {!! Form::textarea('remark',null,['class'=>'form-control']) !!}
                         </div>
                         <div class="form-group">
                           {!! Form::label('file','Specification') !!}
                           {!! Form::file('file',null,['class'=>'form-control']) !!}
                         </div>
                           {!! Form::hidden('type','1') !!}
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
                      @endif


                          {!! Form::hidden('app2', null,['id' => 'app2']) !!}
                          {!! Form::hidden('bus2', null,['id' => 'bus2']) !!}
                          {!! Form::hidden('tech2', null,['id' => 'tech2']) !!}


                      <div class="form-group">
                        {!! Form::button('เพิ่ม',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']) !!}
                          {{ link_to_route('tech.index','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}
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
