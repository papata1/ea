
<style>
	.ice{background-color: #DBDBDB;}
	.active{background-color: #CECECE;}
  .dropdown-menu{background-color: #DBDBDB; color: #428bca;}
  .nav>li>a:hover, .nav>li>a:focus {
    background-color: #B0CACE;
  }
  .btn-custom:hover, .btn-custom:focus, .btn-custom:active, .btn-custom.active, .open>.dropdown-toggle.btn-custom {
    background-color: #B0CACE;
    border-color: white;
  }
  .btn-custom {
    background-color: white;
    border-color: white;
  }
  .cusbtn {
    display: inline-block;
    padding: 3px 8px;
    margin-bottom: 0;
    font-size: 20px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 7px;
  }
</style>
<link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico') }}" />
<!-- Brand and toggle get grouped for better mobile display -->
<div class="panel panel-default ice">
  <div class="panel-body ">

    <!-- Brand and toggle get grouped for better mobile display -->


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo url(''); ?>" style="padding: 0px 0px;">{!! Html::image('images\logo.png') !!}</a>
       </li>
       <li class="dropdown cusbtn btn-custom
       {{ Request::is('/') ? 'active' : '' }} 
       {{ Request::is('main/Bus') ? 'active' : '' }} 
       {{ Request::is('Bustype/*') ? 'active' : '' }}
       {{ Request::is('main/BusDetail/*') ? 'active' : '' }}
       ">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">กระบวนการ<span class="caret"></span></a>
       <ul class="dropdown-menu"class="dropdown-menu" role="menu" aria-labelledby="dLabel">
        <li class="dropdown {{ Request::is('main/Bus') ? 'active' : '' }} "><a href="<?php echo url('main/Bus'); ?>">กระบวนการทั้งหมด</a></li>
        <li role="separator" class="divider"></li>
        <li class="dropdown {{ Request::is('Bustype/1') ? 'active' : '' }}"><a href="<?php echo url('Bustype/1'); ?>">กระบวนการนักศึกษา</a></li>
        <li class="dropdown {{ Request::is('Bustype/2') ? 'active' : '' }}"><a href="<?php echo url('Bustype/2'); ?>">กระบวนการอาจารย์</a></li>
        <li class="dropdown {{ Request::is('Bustype/4') ? 'active' : '' }}"><a href="<?php echo url('Bustype/4'); ?>">กระบวนการฝ่ายสนับสนุนวิชาการ</a></li>
        <li class="dropdown {{ Request::is('Bustype/3') ? 'active' : '' }}"><a href="<?php echo url('Bustype/3'); ?>">กระบวนการสนับสนุน</a></li>
        <li class="dropdown {{ Request::is('Bustype/5') ? 'active' : '' }}"><a href="<?php echo url('Bustype/5'); ?>">กระบวนการอื่น ๆ</a></li>
        <li class="dropdown {{ Request::is('Bustype/6') ? 'active' : '' }}"><a href="<?php echo url('Bustype/6'); ?>">excel</a></li>
      </ul>
    </li><li>&nbsp;&nbsp;</li>
    <li class=" cusbtn btn-custom
    {{ Request::is('main/App') ? 'active' : '' }}
    {{ Request::is('main/AppDetail/*') ? 'active' : '' }}
    "><a href="<?php echo url('main/App'); ?>">ระบบสารสนเทศ<span class="sr-only">(current)</span></a></li><li>&nbsp;&nbsp;</li>
    <li class="dropdown cusbtn btn-custom
    {{ Request::is('main/Dat') ? 'active' : '' }}
    {{ Request::is('Dattype/*') ? 'active' : '' }}
    {{ Request::is('main/DatDetail/*') ? 'active' : '' }}
    ">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ข้อมูล<span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li class="dropdown {{ Request::is('main/Dat') ? 'active' : '' }}"><a href="<?php echo url('main/Dat'); ?>">ข้อมูลทั้งหมด</a></li>
      <li role="separator" class="divider"></li>
      <li class="dropdown {{ Request::is('Dattype/1') ? 'active' : '' }}"><a href="<?php echo url('Dattype/1'); ?>">ข้อมูลฐานข้อมูลกลาง</a></li>
      <li class="dropdown {{ Request::is('Dattype/2') ? 'active' : '' }}"><a href="<?php echo url('Dattype/2'); ?>">ข้อมูลฐานข้อมูลอื่น</a></li>
      <li class="dropdown {{ Request::is('Dattype/3') ? 'active' : '' }}"><a href="<?php echo url('Dattype/3'); ?>">ข้อมูลอิเล็กทรอนิกส์ไฟล์</a></li>
      <li class="dropdown {{ Request::is('Dattype/4') ? 'active' : '' }}"><a href="<?php echo url('Dattype/4'); ?>">ข้อมูลเอกสาร</a></li>
    </ul>
  </li><li>&nbsp;&nbsp;</li>
  <li class="dropdown cusbtn btn-custom
  {{ Request::is('main/Tec') ? 'active' : '' }}
  {{ Request::is('Tectype/*') ? 'active' : '' }}
  {{ Request::is('main/TecDetail/*') ? 'active' : '' }}
  ">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">เทคโนโลยี<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li class="dropdown {{ Request::is('main/Tec') ? 'active' : '' }}"><a href="<?php echo url('main/Tec'); ?>">เทคโนโลยีทั้งหมด</a></li>
    <li role="separator" class="divider"></li>
    <li class="dropdown {{ Request::is('Tectype/1') ? 'active' : '' }}"><a href="<?php echo url('Tectype/1'); ?>">เครื่องแม่ข่าย</a></li>
    <li class="dropdown {{ Request::is('Tectype//') ? 'active' : '' }}"><a href="<?php echo url('Tectype/2'); ?>">อุปกรณ์</a></li>
  </ul>
</li><li>&nbsp;&nbsp;</li>
<li class="dropdown cusbtn btn-custom
{{ Request::is('menurelation') ? 'active' : '' }}
"><a href="<?php echo url('menurelation'); ?>">ตารางแสดงความสัมพันธ์</a></li>
</ul>
</div><!-- /.navbar-collapse -->


</div>
</div>
