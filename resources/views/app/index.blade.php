@extends('admin.layouts.template')
@section('page_heading')
@section('content')
<!--Modal add -->
<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Show</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="name">id</label>
                            <input type="text" class="form-control txt1" name="name1" id="t0">
                            <label for="lname">name</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t1">
                            <label for="divi">develop_language</label>
                            <input type="text" class="form-control txt1" name="divi1" id="t2">
                            <label for="email">app_database</label>
                            <input type="text" class="form-control txt1" name="email1" id="t3">
                            <label for="tel">develop_company</label>
                            <input type="text" class="form-control txt1" name="tel1" id="t4">
                            <label for="addre">getting_start_years</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t5">
                            <label for="addre">app_relation</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t6">
                            <label for="addre">remark</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t7">
                            <label for="addre">ma_cost</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t8">
                            <label for="addre">department_id</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t9">
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>
<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">Application</h1></div>

            <h2>Import</h2>
    <div class="row">
            <form action="appImport" method = "post" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                <input type="file" name="appImport" class="form-group col-xs-3">
                <input type="submit" value="Import" >
     </div>
            </form>



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
                    <th>qqq</th>
                    <th>name</th>
                    <th>develop_language</th>
                    <th>app_database</th>
                    <th>develop_company</th>
                      <th>Move</th>
                    <th>action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($apps as $app)
          <tr>
            <td>{{ $app->id}}  </td>
            <td>{{ $app->name}}  </td>
            <td>{{ $app->develop_language}}  </td>
            <td>{{ $app->app_database}}  </td>
            <td>{{ $app->develop_company}}  </td>
              <td>                  <a href="{{ action('AppController@moveup' ,[$app->id] )}}" class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span></a>
                  <a href="{{ action('AppController@movedown' ,[$app->id] )}}" class="btn btn-default"><span class="glyphicon glyphicon-arrow-down"></span></a> </td>
              <td>
                  {!! Form::open(array('route'=>['app.destroy',$app->id],'method'=>'DELETE')) !!}
                  <button type="button" class="btn btn-success"  id="add" data-id="{{ $app->id}}" data-id1="{{ $app->name}}"   data-id2="{{ $app->develop_language}}"
                          data-id3="{{ $app->app_database}}"   data-id4="{{ $app->develop_company}}"    data-id5="{{ $app->getting_start_years}}"  data-id6="{{ $app->app_relation}}"
                          data-id7="{{ $app->remark}}"   data-id8="{{ $app->ma_cost}}"    data-id9="{{ $app->department_id}}"
                  >Show</button>
                  {{ link_to_route('app.edit','Edit',[$app->id],['class'=>'btn btn-primary']) }}
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
{{ link_to_route('app.create','Add New ',null,['class'=>'btn btn-success']) }}
</div>
</div>
@stop
