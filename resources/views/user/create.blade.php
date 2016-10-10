@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-10 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">User</div>

                   <div class="panel-body">

                     {!! Form::open(array('route'=>'user.store','class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)) !!}

                                  <div class="form-group">
                                      {!! Form::label('name','name') !!}
                                      {!! Form::text('name',null,['class'=>'form-control']) !!}
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('email','email') !!}
                                      {!! Form::text('email',null,['class'=>'form-control']) !!}
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('password','password') !!}
                                      {!! Form::text('password',null,['class'=>'form-control']) !!}
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('password_confirmation','password_confirmation') !!}
                                      {!! Form::text('password_confirmation',null,['class'=>'form-control']) !!}
                                  </div>
                                  <div class="form-group">
                                      {!! Form::label('role','role') !!}
                                      {!! Form::select('role',array('user' => 'user', 'admin' => 'admin'),['class'=>'form-control']) !!}
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
