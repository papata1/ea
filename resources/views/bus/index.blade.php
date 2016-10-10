@extends('admin.layouts.template')
@section('page_heading')
@section('content')
<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">BUSSINESS</h1></div>
    @if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<div class="bs-example" data-example-id="bordered-table">
<div class="panel panel-default" >
    <div class="panel-heading">
        Application Tables
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>id</th>
                <th>name</th>
                <th>Action</th>
            </tr>
              </thead>
              <tbody>
                @foreach($buss as $bus)
                <tr>
                     <td>{{ $bus->id}}  </td>
                     <td>{{ $bus->name}}  </td>
                         <td>
                           {!! Form::open(array('route'=>['bus.destroy',$bus->id],'method'=>'DELETE')) !!}
                           {{ link_to_route('bus.edit','Edit',[$bus->id],['class'=>'btn btn-primary']) }}
                           {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}
                           {!! Form::close() !!}
                         </td>
                 </tr>
                @endforeach
              </tbody>
        </table>

    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
{{ link_to_route('bus.create','Add New ',null,['class'=>'btn btn-success']) }}
</div>


@stop
