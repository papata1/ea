@extends('admin.layouts.template')
@section('page_heading','Update')
@section('content')

<div class="container">
       <div class="row">
           <div class="form-group"><h1 style="font-size:38px;">ความสัมพันธ์</h1></div>
           <div class="panel panel-default">
<?php $type = '1' ; ?>
                   <div class="panel-heading">ระบบสารสนเทศ</div>

                               <!-- /.panel-heading -->
                               <div class="panel-body" style="margin-right:20px;">
                                   <table width="100%" class="table">
                                       <thead>
                                       <tr>
                                           <th>ชื่อ</th>
                                           <th>ลบ</th>
                                       </tr>
                                       </thead>
                                       @foreach($a as $a1)
                                       <tr>
                                           <td>{{ $a1->name}}  </td>
                                           <td>

                                               <a href="{{ action('TechController@delt' ,[$tech,$a1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       @endforeach
                                       @foreach($b as $b1)
                                       <tr>
                                           <td>{{ $b1->name}}  </td>
                                           <td>
                                               <a href="{{ action('TechController@delt' ,[$tech,$b1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       @endforeach
                                       @foreach($d as $d1)
                                       <tr>
                                           <td>{{ $d1->name}}  </td>
                                           <td>
                                               <a href="{{ action('TechController@delt' ,[$tech,$d1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       @endforeach
                                       @foreach($t as $t1)
                                       <tr>
                                           <td>{{ $t1->name}}  </td>
                                           <td>
                                               <a href="{{ action('TechController@delt' ,[$tech,$t1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                       </tr>
                                       @endforeach
                                       @foreach($p as $p1)
                                           <?php $type = 'p' ; ?>
                                           <tr>
                                               <td>{{ $p1->name}}  </td>
                                               <td>
                                                   <a href="{{ action('TechController@delt' ,[$tech,$p1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </tr>
                                       @endforeach
                                       @foreach($br as $br1)
                                           <?php $type = 'br' ; ?>
                                           <tr>
                                               <td>{{ $br1->name}}  </td>
                                               <td>
                                                   <a href="{{ action('TechController@delt' ,[$tech,$br1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </tr>
                                       @endforeach

                                   </table>

                               </div>

                   </div>
               </div>

           </div>

    <script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script>
        $(document).ready(function() {



    </script>

    @stop
