@extends('admin.layouts.template')
@section('page_heading','Update')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-6 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">ตัวย่อ</div>

                   <div class="panel-body">
                       @foreach($brand1 as $brand)

                           <form action="updateDat" method = "post" >
                               <input type="hidden" name="_token" value="{{csrf_token()}}" >
                       {!! Form::label('name','ชื่อ') !!}
                       <p> {{$brand->name}}</p>
                                    <div class="form-group">
                                        {!! Form::label('initial','ตัวย่อ') !!}
                                  <p><input type="text" id="initial" name="initial" value="{{$brand->initial}}" class="form-control">   </p>
                                    </div>

                                        <input type="submit" value="บันทึก" class="btn btn-primary" >


                                        @endforeach
                           </form>

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
