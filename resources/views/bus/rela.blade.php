@extends('admin.layouts.template')
@section('page_heading','Update')
@section('content')

<div class="container">
       <div class="row">

               <div class="panel panel-default">
            <?php $type = '1' ; ?>
                   <div class="panel-heading">กระบวนการ </div>

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
                                               <a href="{{ action('BusController@delb' ,[$bus,$a1->id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       @endforeach
                                       @foreach($b as $b1)
                                       <tr>
                                           <td>{{ $b1->name}}  </td>
                                           <td>
                                               <a href="{{ action('BusController@delb' ,[$bus,$b1->id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       @endforeach
                                       @foreach($d as $d1)
                                       <tr>
                                           <td>{{ $d1->name}}  </td>
                                           <td>
                                               <a href="{{ action('BusController@delb' ,[$bus,$d1->id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       @endforeach
                                       @foreach($t as $t1)
                                       <tr>
                                           <td>{{ $t1->name}}  </td>
                                           <td>
                             <a href="{{ action('BusController@delb' ,[$bus,$t1->id] )}}" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                       </tr>
                                       @endforeach
                                       @foreach($de as $de1)
                                           <?php $type = 'de' ; ?>
                                           <tr>
                                               <td>{{ $de1->name}}  </td>
                                               <td>
                                                   <a href="{{ action('BusController@delb' ,[$bus,$de1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
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
