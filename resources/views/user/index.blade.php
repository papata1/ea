@extends('admin.layouts.template')
@section('page_heading')
@section('content')
<class="container">
  			<div class="form-group"><h1 style="font-size:38px;">สมาชิก</h1></div>
    @if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<p>
</p>
<div class="bs-example" data-example-id="bordered-table">.
    <div class="row">
        <div class="col-lg-10">
<div class="panel panel-default" >
    <div class="panel-heading">
        <div class="col-lg-2">ตารางสมาชิก</div><div class="col-lg-9"></div>{{ link_to_route('user.create','เพิ่ม ',null,['class'=>'btn btn-success']) }}
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>อีเมลล์</th>
                <th>ตำแหน่ง</th>
                <th>จัดการ</th>
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
                        {{ link_to_route('user.edit','แก้ไข',[$user->id],['class'=>'btn btn-primary']) }}
                           {!! Form::button('ลบ',['class'=>'btn btn-danger del','type'=>'submit']) !!}
                           {!! Form::close() !!}
                         </td>
                 </tr>
                @endforeach
              </tbody>
        </table>
    </div>   </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->

</div>


@stop
