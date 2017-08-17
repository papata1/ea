@extends('admin.layouts.template')
@section('page_heading')
@section('content')
<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">ข้อมูลหลัก</h1></div>
<div class="bs-example" data-example-id="bordered-table">.
    <div class="row">
        <div class="col-lg-10">
<div class="panel panel-default" >
    <div class="panel-heading">
        เมนู
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <div class="form-group"><h4 >โปรดเลือกหน้าที่ต้องการ</h4></div>
        <select id="master" name="master" class="form-control info">
            <option selected=\"selected\"></option>
            <option value="b" href="{{ url ('de') }}">หน่วยงานที่เกี่ยวข้อง</option>
            <option value="a" href="{{ url ('brand') }}">ยี่ห้อ</option>
            <option value="d" href="{{ url ('coll') }}">ประเภทการเก็บข้อมูล</option>
            <option value="r" href="{{ url ('lang') }}">ภาษาที่ใช้พัฒนา</option>
            <option value="q" href="{{ url ('place') }}">สถานที่ตั้ง</option>
            <option value="w" href="{{ url ('proc') }}">ประเภทกระบวนการ</option>
            <option value="g" href="{{ url ('ud') }}">ฐานข้อมูลที่ใช้</option>
            <option value="" href="{{ url ('InApp') }}">ตัวย่อระบบสารสนเทศ</option>
            <option value="" href="{{ url ('InDat') }}">ตัวย่อข้อมูล</option>
        </select>

    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
    <br>
      @foreach($lv as $de)
                <tr>

                     <td>{{ $de->lv4}}  </td>
                      <td>{{ $de->lv3}}  </td>
                       <td>{{ $de->lv2}}  </td>
                        <td>{{ $de->lv1}}  </td><br>
                @endforeach

</div>
    </div>
</div>
</div>
<script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {
        document.getElementById('master').onchange = function() {
            window.location.href = this.children[this.selectedIndex].getAttribute('href');
           // alert('4');
        };
    });

</script>


@stop
