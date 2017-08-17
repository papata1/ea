@extends('admin.layouts.template')
@section('page_heading')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-10 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">Technology</div>

                   <div class="panel-body">

                     {!! Form::open(array('route'=>'tech.store','class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)) !!}


                      <div class="form-group">
                        {!! Form::label('name','ชื่อ') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('brand','ยีืห้อ') !!}
                        {!! Form::text('brand',null,['class'=>'form-control']) !!}
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
                        {!! Form::label('tech_location',' สถานที่ตั้ง') !!}
                         {!! Form::select('tech_location', array(
                        'กทม' => 'กทม','ปราจีน' => 'ปราจีน','ระยอง' => 'ระยอง'),null,['class'=>'form-control']) !!}
                      </div>
                        <div class="form-group">
                        {!! Form::label('ma_cost',' ค่าซ่อมบำรุ') !!}
                        {!! Form::text('ma_cost',null,['class'=>'form-control']) !!}
                      </div>
                       <div class="form-group">
                        {!! Form::label('remark',' ข้อเสอนแนะ') !!}
                        {!! Form::text('remark',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('file','file') !!}
                        {!! Form::file('file',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::button('Create',['type'=>'submit','class'=>'btn btn-primary']) !!}
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
@stop
