<div id="main">
  <div class="container">
    <h1 style="font-size:38px;">Application</h1></div>

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
                      <th>develop_language</th>
                      <th>app_database</th>
                      <th>develop_company</th>
                      <th>getting_start_years</th>
                      <th>app_relation</th>
                      <th>remark</th>
                      <th>ma_cost</th>
                      <th>department_id</th>
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
              <td>{{ $app->getting_start_years}}  </td>
              <td>{{ $app->app_relation}}  </td>
              <td>{{ $app->remark}}  </td>
              <td>{{ $app->ma_cost}}  </td>
              <td>{{ $app->department_id}}  </td>
                  <td>
                    {!! Form::open(array('route'=>['app.destroy',$app->id],'method'=>'DELETE')) !!}
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
