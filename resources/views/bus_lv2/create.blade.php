@extends('admin.layouts.template')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-6 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">กระบวนการระดับ2</div>

                   <div class="panel-body">

                     {!! Form::open(array('route'=>'lv2.store','class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)) !!}

                                  <div class="form-group">
                                      {!! Form::label('name','ชื่อ') !!}
                                      {!! Form::text('name',null,['class'=>'form-control']) !!}
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('short','ตัวย่อ') !!}
                                      {!! Form::text('short',null,['class'=>'form-control']) !!}
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('remark','เพิ่มเติม') !!}
                                      {!! Form::text('remark',null,['class'=>'form-control']) !!}
                                  </div>
                                   <div class="form-group">
                                      {!! Form::label('lv1_id','ประเภทกระบวนการ') !!}
                                        {!! Form::select('lv1_id',['' => ''] + $lv, null, ['class' => 'form-control datar']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::button('เพิ่มกระบวนการระดับ1',['type'=>'submit','class'=>'btn btn-primary']) !!}
                                        {{ link_to_route('lv2.index','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}
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
