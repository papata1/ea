@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-7 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">สมาชิก</div>

                   <div class="panel-body">

                     {!! Form::open(array('route'=>'user.store','class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)) !!}

                                  <div class="form-group">
                                      {!! Form::label('name','ชื่อ') !!}
                                      {!! Form::text('name',null,['class'=>'form-control']) !!}


                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('email','อีเมล') !!}
                                      {!! Form::text('email',null,['class'=>'form-control']) !!}
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('password','รหัสผ่าน') !!}
                                      <input type="password" id="password" name="password" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('password_confirmation','ยืนยันรหัสผ่าน') !!}
                                      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">

                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('role','สถานะ') !!}
                                      <select id="role" name="role" class="form-control">
                                          <option value=""></option>
                                          <option value="Super Admin">Super Admin</option>
                                          <option value="Admin">Admin</option>
                                      </select>
                                  </div>
                                    <div class="form-group">
                                        {!! Form::button('เพิ่ม',['type'=>'submit','class'=>'btn btn-primary']) !!}
                                        {{ link_to_route('user.index','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}
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
