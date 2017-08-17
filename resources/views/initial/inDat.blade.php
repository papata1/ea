@extends('admin.layouts.template')
@section('page_heading')
@section('content')
    <div class="row">
        <div class="col-lg-10">
    <div class="form-group"><h1 style="font-size:38px;">ข้อมูลหลัก</h1></div>
    <div class="panel panel-default" >
        <div class="panel-heading">
            เมนู
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body" style="margin-right:20px;">
            <div class="form-group"><h4 >โปรดเลือกหน้าที่ต้องการ</h4></div>
            <select id="master" name="master" class="form-control info">
                <option value="b" href="{{ url ('de') }}"  >หน่วยงานที่เกี่ยวข้อง</option>
                <option value="a" href="{{ url ('brand') }}">ยี่ห้อ</option>
                <option value="d" href="{{ url ('coll') }}">ประเภทการเก็บข้อมูล</option>
                <option value="r" href="{{ url ('lang') }}">ภาษาที่ใช้พัฒนา</option>
                <option value="q" href="{{ url ('place') }}">สถานที่ตั้ง</option>
                <option value="g" href="{{ url ('ud') }}">ฐานข้อมูลที่ใช้</option>
                <option value="" href="{{ url ('InApp') }}" >ตัวย่อระบบสารสนเทศ</option>
                <option value="" href="{{ url ('InDat') }}" selected=\"selected\" >ตัวย่อข้อมูล</option>
                <option value="" href="{{ url ('lv1') }}">กระบวนการระดับ 1</option>
                <option value="" href="{{ url ('lv2') }}" >กระบวนการระดับ 2</option>
                <option value="" href="{{ url ('lv3') }}">กระบวนการระดับ 3</option>
            </select>
        </div></div>
        </div>
        <!-- /.panel-body -->
    </div>
<class="container">
  			<div class="form-group"><h1 style="font-size:38px;">ตัวย่อสถาปัตยกรรมข้อมูล</h1></div>

<div class="row">
    @if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<p>
</p><br>
<div class="bs-example" data-example-id="bordered-table">
    <div class="row">
        <div class="col-lg-10">
<div class="panel panel-default" >

    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
                <th>ชื่อ</th>
                <th>ตัวย่อ</th>
                <th>จัดการ</th>

            </tr>
              </thead>
              <tbody>
                <tr>
                    @foreach($brand1 as $brand)

                         <td>
                            {{$brand->name}}

                         </td>
                        <td>
                            {{$brand->initial}}

                        </td>
                        <td>
                            <a href="{{ action('InController@editDat'  )}}" class="btn btn-primary">แก้ไข</a>

                        </td>
                    @endforeach

                </tr>
              </tbody>
        </table>
    </div> </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
</div>
    <script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script>
        $(document).ready(function() {

            document.getElementById("file").onchange = function () {
                document.getElementById("uploadFile").value = this.value;
            };

        });

    </script>

        <style>
            .a {

                margin: 10px;
            }
            .file {
                position: relative;
                overflow: hidden;
                margin: 10px;
            }
            .file label {
                background: #39D2B4;
                padding: 5px 20px;
                color: #fff;
                font-weight: bold;
                font-size: .9em;
                transition: all .4s;
            }
            .file input {
                position: absolute;
                display: inline-block;
                left: 0;
                top: 0;
                opacity: 0.01;
                cursor: pointer;
            }
            .file input:hover + label,
            .file input:focus + label {
                background: #34495E;
                color: #39D2B4;
            }


   </style>
@stop
