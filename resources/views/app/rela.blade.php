@extends('admin.layouts.template')
@section('page_heading','Update')
@section('content')

<div class="container">
       <div class="row">
           <div class="form-group"><h1 style="font-size:38px;">ความสัมพันธ์</h1></div>
           <div class="panel panel-default">

                   <div class="panel-heading">ระบบสารสนเทศ</div>
                      <?php $type = '1' ; 
                             $a; 
                      ?>
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

                                               <a href="{{ action('AppController@del' ,[$app,$a1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       @endforeach
                                       @foreach($b as $b1)
                                       <tr>
                                           <td>{{ $b1->name}}  </td>
                                           <td>
                                               <a href="{{ action('AppController@del' ,[$app,$b1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       @endforeach
                                       @foreach($d as $d1)
                                       <tr>
                                           <td>{{ $d1->name}}  </td>
                                           <td>
                                               <a href="{{ action('AppController@del' ,[$app,$d1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       @endforeach
                                       @foreach($t as $t1)
                                       <tr>
                                           <td>{{ $t1->name}}  </td>
                                           <td>
                                               <a href="{{ action('AppController@del' ,[$app,$t1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                       </tr>
                                       @endforeach
                                       @foreach($ud as $ud1)
                                     
                                           <tr>
                                               <td>{{ $ud1->name}}  </td>
                                               <td>
                                                   <a href="{{ action('AppController@del' ,[$app,$ud1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </tr>
                                       @endforeach
                                       @foreach($de as $de1)
                                       
                                           <tr>
                                               <td>{{ $de1->name}}  </td>
                                               <td>
                                                   <a href="{{ action('AppController@del' ,[$app,$de1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </tr>
                                       @endforeach
                                       @foreach($dev as $dev1)
                                      
                                           <tr>
                                               <td>{{ $dev1->name}}  </td>
                                               <td>
                                                   <a href="{{ action('AppController@del' ,[$app,$dev1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </tr>
                                       @endforeach
                                       @foreach($deg as $deg1)
                                       
                                           <tr>
                                               <td>{{ $deg1->name}}  </td>
                                               <td>
                                                   <a href="{{ action('AppController@del' ,[$app,$deg1->id] )}}" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
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
