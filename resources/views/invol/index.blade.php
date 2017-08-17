@extends('admin.layouts.template')
@section('page_heading')
@section('content')
{!! Html::style('/packages/dropzone/dropzone.css') !!}
{!! Html::script('/packages/dropzone/dropzone.js') !!}
{!! Html::script('/assets/js/dropzone-config.js') !!}
<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">หน่วยงานที่เกี่ยวข้อง
                </h1></div>

         <h3>Import</h3>
    <form action="involImport" method = "post" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                <input type="file" id="file_upload" name="file_upload"class="dropzone">
                <input type="submit" value="Import" class="btn btn-success">
            </form>
            <h3>download template ที่ใช้ในการ upload</h3>
            <button class="btn btn-primary">Download</button><br><br>
    @if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<p>{{ link_to_route('invol.create','Add New ',null,['class'=>'btn btn-success']) }}
</p>
<div class="bs-example" data-example-id="bordered-table">
    <div class="row">
        <div class="col-lg-10">
<div class="panel panel-default" >
    <div class="panel-heading">
        Involved Tables
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>หมายเหตุ</th>
            </tr>
              </thead>
              <tbody>
                @foreach($invol1 as $invol)
                <tr>
                     <td>{{ $invol->id}}  </td>
                     <td>{{ $invol->name}}  </td>
                     <td>{{ $invol->remark}}  </td>
                         <td>
                           {!! Form::open(array('route'=>['invol.destroy',$invol->id],'method'=>'DELETE')) !!}
                        {{ link_to_route('invol.edit','Edit',[$invol->id],['class'=>'btn btn-primary','id'=>'a']) }}
                           {!! Form::button('Delete',['class'=>'btn btn-danger del','type'=>'submit']) !!}
                           {!! Form::close() !!}
                         </td>
                 </tr>
                @endforeach
              </tbody>
        </table>
    </div> </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->

</div>
   
@stop
