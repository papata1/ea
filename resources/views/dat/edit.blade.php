@extends('admin.layouts.template')
@section('page_heading','Update')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-10 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">Data</div>

                   <div class="panel-body">


                     {!! Form::model($dat,array('route'=>['dat.update',$dat->id],'method'=>'PUT')) !!}


                                    <div class="form-group">
                                        {!! Form::label('name','name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('remark','remark') !!}
                                        {!! Form::text('remark',null,['class'=>'form-control']) !!}
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
