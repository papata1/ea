@extends('admin.layouts.template')
@section('page_heading')
@section('content')
<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">User</h1></div>
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
                <th>Name</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                     <td>{{ $user->id}}  </td>
                     <td>{{ $user->name}}  </td>
                     <td>{{ $user->email}}  </td>
                    <td>{{ $user->role}}  </td>
                         <td>
                           {!! Form::open(array('route'=>['user.destroy',$user->id],'method'=>'DELETE')) !!}
                        {{ link_to_route('user.edit','Edit',[$user->id],['class'=>'btn btn-primary']) }}
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
{{ link_to_route('user.create','Add New ',null,['class'=>'btn btn-success']) }}

</div>


@stop
