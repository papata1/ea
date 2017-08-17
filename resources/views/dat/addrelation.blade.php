@extends('admin.layouts.template')
@section('page_heading')
@section('content')
<div class="container">
    <div class="form-group"><h1 style="font-size:38px;">ข้อมูล</h1></div>
  			<div class="form-group"><h1 style="font-size:38px;">เพิ่มความสัมพันธ์</h1></div>
    <div class="row">
        <div class="col-md-7"></div><div class="form-group"><button id="reset"  class="btn btn-danger">Reset</button></div>
        <form action="addrelation" method = "post" >
         <div class="col-md-8">
             <p class="form-group">ระบบสารสนเทศ</p>
            <div class="dropdown">
            <select  id="app" name="appRelation" class="appr">
                <option value=""></option>
                <?php
                $len = sizeof($aq1);
                ?>
                @if(count($aq1))
                @foreach($apps as $ap)
                <?php $sta = 0; ?>
                <?php $re = 0; ?>
                @foreach($aq1 as $aq)
                <?php $re++; ?>
                @if($ap->id != $aq->comp_id)
                <?php   $sta++; ?>
                @if($re == $len)
                @if($sta == $len)
                <option value="{{ $ap->id}}">{{ $ap->name}}</option>
                @endif
                @endif
                @endif
                @endforeach
                @endforeach
                @else
                @foreach($apps as $ap)
                <option value="{{ $ap->id}}">{{ $ap->name}}</option>
                @endforeach
                @endif

            </select></div><br>
            <div class="bs-example" data-example-id="bordered-table">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        เพิ่มความสัมพันธ์ระบบสารสนเทศ
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="margin-right:20px;">
                        <div class="app"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            </div>
            <div class="col-md-8">
                <p class="form-group">กระบวนการ</p>
                <div class="dropdown">
            <select  id="bus" name="busRelation" class="busr">
                <option value=""></option>
                <?php
                $lenb = sizeof($bq1);
                ?>
                @if(count($bq1))
                @foreach($buss as $bs)
                <?php $sta = 0; ?>
                <?php $re = 0; ?>
                @foreach($bq1 as $bq)
                <?php $re++; ?>
                @if($bs->id != $bq->comp_id)
                <?php   $sta++; ?>
                @if($re == $lenb)
                @if($sta == $lenb)
                <option value="{{ $bs->id}}">{{ $bs->name}}</option>
                @endif
                @endif
                @endif
                @endforeach
                @endforeach
                @else
                @foreach($buss as $bs)
                <option value="{{ $bs->id}}">{{ $bs->name}}</option>
                @endforeach
                @endif


            </select></div><br>
            <div class="bs-example" data-example-id="bordered-table">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        เพิ่มความสัมพันธ์กระบวนการ
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="margin-right:20px;">
                        <div class="bus"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            </div>

            <div class="col-md-8">
                <p class="form-group">ประเภทการเก็บข้อมูล</p>
                <div class="dropdown">
                    <select  id="tp" name="busRelation" class="techr" >
                        <option value=""></option>
                        <?php
                        $lent = sizeof($tp1);
                        ?>
                        @if(count($tp1))
                            @foreach($tps as $tp)
                                <?php $sta = 0; ?>
                                <?php $re = 0; ?>
                                @foreach($tp1 as $t1)
                                    <?php $re++; ?>
                                    @if($tp->id != $t1->comp_id)
                                        <?php   $sta++; ?>
                                        @if($re == $lent)
                                            @if($sta == $lent)
                                                <option value="{{ $tp->id}}">{{ $tp->name}}</option>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        @else
                            @foreach($tps as $tp)
                                <option value="{{ $tp->id}}">{{ $tp->name}}</option>
                            @endforeach
                        @endif

                    </select></div><br>
                <div class="bs-example" data-example-id="bordered-table">
                    <div class="panel panel-default" >
                        <div class="panel-heading">
                             เพิ่มความสัมพันธ์ประเภทการเก็บข้อมูล
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="margin-right:20px;">
                            <div class="tp"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <input type="hidden" id="id" name="id" value="{{$app}}" >
            <input type="hidden" id="ar" name="ar" value="" >
            <input type="hidden" id="br" name="br" value="" >


            <input type="hidden" id="tpr" name="tpr" value="" >

            <input type="hidden" name="_token" value="{{csrf_token()}}" >
            <div class="col-md-6">
            <input type="submit" value="ตกลง" id = "add1"  class=" btn btn-success" >
            </div>
            <br>
    </form>

    </div>
</div>

 <br>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var a=0;
        var i = 0;
        var i1 = 0;
        var i2 = 0;
        var i3 = 0;
        var i5 = 0;
        var value = new Array();
        var value1 = new Array();
        var valueb = new Array();
        var valueb1 = new Array();
        var valued = new Array();
        var valued1 = new Array();
        var valuet = new Array();
        var valuet1 = new Array();
        var valuetp = new Array();
        var valuetp1 = new Array();

         $('#clear').click(function () {
            alert("aa")
            location.reload();
            false;
        });
        $('#tp').change(function () {
            var tpq = document.getElementById("tp");
            var selectedTexttp1 = tpq.options[tpq.selectedIndex].text;
            var selectedTexttp = tpq.options[tpq.selectedIndex].value;
            //    var selectedText = $(this).find("option:selected").value();
            valuetp[i5] =  selectedTexttp ;
            valuetp1[i5] =  selectedTexttp1 ;

            $(".tp").text(valuetp1);

            i5++;

        });
        $('#app').change(function () {
          var e = document.getElementById("app");
          var selectedText1 = e.options[e.selectedIndex].text;
          var selectedText = e.options[e.selectedIndex].value;
        //    var selectedText = $(this).find("option:selected").value();
            value[i] =  selectedText ;
            value1[i] =  selectedText1 ;

            $(".app").text(value1);

            i++;

        });
        $('#bus').change(function () {
          var b = document.getElementById("bus");
          var selectedTextb1 = b.options[b.selectedIndex].text;
          var selectedTextb = b.options[b.selectedIndex].value;
        //    var selectedText = $(this).find("option:selected").value();
            valueb[i1] =  selectedTextb ;
            valueb1[i1] =  selectedTextb1 ;

            $(".bus").text(valueb1);

            i1++;

        });
        $('#data').change(function () {
          var d = document.getElementById("data");
          var selectedTextd1 = d.options[d.selectedIndex].text;
          var selectedTextd = d.options[d.selectedIndex].value;
        //    var selectedText = $(this).find("option:selected").value();
            valued[i2] =  selectedTextd ;
            valued1[i2] =  selectedTextd1 ;

            $(".data").text(valued1);

            i2++;

        });

        $('#tech').change(function () {
          var t = document.getElementById("tech");
          var selectedTextt1 = t.options[t.selectedIndex].text;
          var selectedTextt = t.options[t.selectedIndex].value;
        //    var selectedText = $(this).find("option:selected").value();
            valuet[i3] =  selectedTextt ;
            valuet1[i3] =  selectedTextt1 ;

            $(".tech").text(valuet1);

            i3++;

        });
        $('#add1').click(function () {
            $('#ar').val(JSON.stringify(value));
            $('#br').val(JSON.stringify(valueb));
            $('#dr').val(JSON.stringify(valued));
            $('#tr').val(JSON.stringify(valuet));
            $('#tpr').val(JSON.stringify(valuetp));
            /*  var text = "";
              var len = value.length;

              for (i = 0; i < len; i++) {
                  text += "<td>" + value[i] + "</td>";
              }
              document.getElementById("content").innerHTML = text;*/
        });
        $('#reset').click(function () {
            location.reload();
        });

    });
</script>
@stop
