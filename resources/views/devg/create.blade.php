@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-6 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">บริษัทที่พัฒนา
                   </div>

                   <div class="panel-body">

                     {!! Form::open(array('route'=>'devg.store','class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)) !!}

                                  <div class="form-group">
                                      {!! Form::label('name','ชื่อ') !!}
                                      {!! Form::text('name',null,['class'=>'form-control']) !!}
                                  </div>
                                    <div class="form-group">
                                        {!! Form::button('เพิ่มบริษัทที่พัฒนา',['type'=>'submit','class'=>'btn btn-primary']) !!}
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
