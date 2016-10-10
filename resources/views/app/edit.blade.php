@extends('admin.layouts.template')
@section('page_heading','Update')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-10 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">Application</div>

                   <div class="panel-body">


                     {!! Form::model($app,array('route'=>['app.update',$app->id],'method'=>'PUT')) !!}


                      <div class="form-group">
                        {!! Form::label('name','name') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('develop_language','develop_language') !!}
                        {!! Form::text('develop_language',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('app_database','app_database') !!}
                        {!! Form::text('app_database',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('develop_company','develop_company') !!}
                        {!! Form::text('develop_company',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('getting_start_years','getting_start_years') !!}
                        {!! Form::text('getting_start_years',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('app_relation','app_relation') !!}
                        {!! Form::text('app_relation',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('remark','remark') !!}
                        {!! Form::text('remark',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('ma_cost','ma_cost') !!}
                        {!! Form::text('ma_cost',null,['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::label('department_id','department_id') !!}
                        {!! Form::text('department_id',null,['class'=>'form-control']) !!}
                      </div>

                                    <div class="form-group">
                                        {!! Form::button('Update',['type'=>'submit','class'=>'btn btn-primary']) !!}
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
