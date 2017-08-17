@extends('admin.layouts.template')
@section('page_heading')
@section('content')
<div class="container">
    <div class="form-group"><h1 style="font-size:38px;">ระบบสารสนเทศ</h1></div>
    <div class="form-group"><h1 style="font-size:38px;">เพิ่มความสัมพันธ์</h1></div>
    <div class="row">
        <div class="col-md-7"></div><div class="form-group"><button id="reset"  class="btn btn-danger">Reset</button></div>
        <form action="addrelation" method = "post" >

            <div class="col-md-8">
                <p class="form-group">กระบวนการ</p>
                <div class="dropdown">
            <select  id="bus" name="busRelation" class="busr" >
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
                <p class="form-group">ข้อมูล</p>
                <div class="dropdown">
            <select  id="data" name="busRelation" class="datar">
                <option value=""></option>
                <?php
                $lend = sizeof($dq1);
                ?>
                @if(count($dq1))
                @foreach($dats as $ds)
                <?php $sta = 0; ?>
                <?php $re = 0; ?>
                @foreach($dq1 as $dq)
                <?php $re++; ?>
                @if($ds->id != $dq->comp_id)
                <?php   $sta++; ?>
                @if($re == $lend)
                @if($sta == $lend)
                <option value="{{ $ds->id}}">{{ $ds->name}}</option>
                @endif
                @endif
                @endif
                @endforeach
                @endforeach
                @else
                @foreach($dats as $ds)
                <option value="{{ $ds->id}}">{{ $ds->name}}</option>
                @endforeach
                @endif

            </select></div><br>
            <div class="bs-example" data-example-id="bordered-table">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        เพิ่มความสัมพันธ์ข้อมูล
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="margin-right:20px;">
                        <div class="data"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            </div>
            <div class="col-md-8">
                <p class="form-group">เทคโนโลยี</p>
                <div class="dropdown">
            <select  id="tech" name="busRelation" class="techr" >
                <option value=""></option>
                <?php
                $lent = sizeof($tq1);
                ?>
                @if(count($tq1))
                @foreach($techs as $ts)
                <?php $sta = 0; ?>
                <?php $re = 0; ?>
                @foreach($tq1 as $tq)
                <?php $re++; ?>
                @if($ts->id != $tq->comp_id)
                <?php   $sta++; ?>
                @if($re == $lent)
                @if($sta == $lent)
                <option value="{{ $ts->id}}">{{ $ts->name}}</option>
                @endif
                @endif
                @endif
                @endforeach
                @endforeach
                @else
                @foreach($techs as $ts)
                <option value="{{ $ts->id}}">{{ $ts->name}}</option>
                @endforeach
                @endif

            </select></div><br>
            <div class="bs-example" data-example-id="bordered-table">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        เพิ่มความสัมพันธ์เทคโนโลยี
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="margin-right:20px;">
                        <div class="tech"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            </div>
            <div class="col-md-8">
                <p class="form-group">ฐานข้อมูล</p>
                <div class="dropdown">
                    <select  id="ud" name="busRelation" class="techr" >
                        <option value=""></option>
                        <?php
                        $lent = sizeof($ud1);
                        ?>
                        @if(count($ud1))
                            @foreach($uds as $ud)
                                <?php $sta = 0; ?>
                                <?php $re = 0; ?>
                                @foreach($ud1 as $u)
                                    <?php $re++; ?>
                                    @if($ud->id != $u->comp_id)
                                        <?php   $sta++; ?>
                                        @if($re == $lent)
                                            @if($sta == $lent)
                                                <option value="{{ $ud->id}}">{{ $ud->name}}</option>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        @else
                            @foreach($uds as $ud)
                                <option value="{{ $ud->id}}">{{ $ud->name}}</option>
                            @endforeach
                        @endif

                    </select></div><br>
                <div class="bs-example" data-example-id="bordered-table">
                    <div class="panel panel-default" >
                        <div class="panel-heading">
                            เพิ่มความสัมพันธ์ฐานข้อมูล
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="margin-right:20px;">
                            <div class="ud"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <div class="col-md-8">
                <p class="form-group">ภาษาที่ใช้พัฒนา</p>
                <div class="dropdown">
                    <select  id="dev" name="busRelation" class="techr" >
                        <option value=""></option>
                        <?php
                        $lent = sizeof($dev1);
                        ?>
                        @if(count($dev1))
                            @foreach($devs as $dev)
                                <?php $sta = 0; ?>
                                <?php $re = 0; ?>
                                @foreach($dev1 as $dv)
                                    <?php $re++; ?>
                                    @if($dev->id != $dv->comp_id)
                                        <?php   $sta++; ?>
                                        @if($re == $lent)
                                            @if($sta == $lent)
                                                <option value="{{ $dev->id}}">{{ $dev->name}}</option>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        @else
                            @foreach($devs as $dev)
                                <option value="{{ $dev->id}}">{{ $dev->name}}</option>
                            @endforeach
                        @endif

                    </select></div><br>
                <div class="bs-example" data-example-id="bordered-table">
                    <div class="panel panel-default" >
                        <div class="panel-heading">
                            เพิ่มความสัมพันธ์ภาษาที่ใช้พัฒนา
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="margin-right:20px;">
                            <div class="dev"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <div class="col-md-8">
                <p class="form-group">หน่วยงาน</p>
                <div class="dropdown">
                    <select  id="de" name="busRelation" class="techr" >
                        <option value=""></option>
                        <?php
                        $lent = sizeof($de1);
                        ?>
                        @if(count($de1))
                            @foreach($des as $de)
                                <?php $sta = 0; ?>
                                <?php $re = 0; ?>
                                @foreach($de1 as $d)
                                    <?php $re++; ?>
                                    @if($de->id != $d->comp_id)
                                        <?php   $sta++; ?>
                                        @if($re == $lent)
                                            @if($sta == $lent)
                                                <option value="{{ $de->id}}">{{ $de->name}}</option>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        @else
                            @foreach($des as $de)
                                <option value="{{ $de->id}}">{{ $de->name}}</option>
                            @endforeach
                        @endif

                    </select></div><br>
                <div class="bs-example" data-example-id="bordered-table">
                    <div class="panel panel-default" >
                        <div class="panel-heading">
                             เพิ่มความสัมพันธ์หน่วยงาน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="margin-right:20px;">
                            <div class="de"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <div class="col-md-8">
                <p class="form-group">บริษัทที่พัฒนา</p>
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
                            เพิ่มความสัมพันธ์บริษัทที่พัฒนา
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="margin-right:20px;">
                           <div class="tp"> <table class="table">
                               </table></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <input type="hidden" id="id" name="id" value="{{$app}}" >
            <input type="hidden" id="br" name="br" value="" >
            <input type="hidden" id="dr" name="dr" value="" >
            <input type="hidden" id="tr" name="tr" value="" >

            <input type="hidden" id="tpr" name="tpr" value="" >
            <input type="hidden" id="devr" name="devr" value="" >
            <input type="hidden" id="udr" name="udr" value="" >
            <input type="hidden" id="der" name="der"  value="" >

            <input type="hidden" name="_token" value="{{csrf_token()}}" >
            <div class="col-md-6">
            <input type="submit" value="ตกลง" id = "add1"  class=" btn btn-success" >
            </div>
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
        var i1 = 0;
        var i2 = 0;
        var i3 = 0;
        var i4 = 0;
        var i5 = 0;
        var i6 = 0;
        var i7 = 0;

        var value = new Array();
        var value1 = new Array();
        var valueb = new Array();
        var valueb1 = new Array();
        var valued = new Array();
        var valued1 = new Array();
        var valuet = new Array();
        var valuet1 = new Array();

        var valuedev = new Array();
        var valuedev1 = new Array();
        var valueud = new Array();
        var valueud1 = new Array();
        var valuede = new Array();
        var valuede1 = new Array();
        var valuetp = new Array();
        var valuetp1 = new Array();

         $('#clear').click(function () {
           // alert("aa")
            location.reload();
            false;
        });
        $('#tp').change(function () {
            var aom = 0 ;
            var tpq = document.getElementById("tp");
            var selectedTexttp1 = tpq.options[tpq.selectedIndex].text;
            var selectedTexttp = tpq.options[tpq.selectedIndex].value;
            for (i = 0; i < valuetp.length; i++) {
                if (valuetp[i] == selectedTexttp ) {
                    var aom = '1';
                }
            }
           if (aom == '1' ){}else {
               valuetp[i7] = selectedTexttp;
               valuetp1[i7] = selectedTexttp1;
              // var vPool = "";
               $('.tp table').append("<tr><td>" + valuetp1[i7] + "</td><td><button class='btn btn-danger arraydel' data-id='" + valuetp1[i7] + "'" +
                       " data-id1='" + valuetp[i7] + "'><span class='glyphicon glyphicon-remove'></span></button></td></tr><br>");
               i7++;
               $('.tp').on('click', '.arraydel', function () {
                   var data = $(this).attr('data-id');
                   var data1 = $(this).attr('data-id1');
                   valuetp1 = jQuery.grep(valuetp1, function (value) {
                       return value != data;
                   });
                   valuetp = jQuery.grep(valuetp, function (value) {
                       return value != data1;
                   });
                   $(this).closest('tr').remove();
               });
           }
        });

        $('#ud').change(function () {
            var udqq = document.getElementById("ud");
            var selectedTextud1 = udqq.options[udqq.selectedIndex].text;
            var selectedTextud = udqq.options[udqq.selectedIndex].value;
            //    var selectedText = $(this).find("option:selected").value();
            valueud[i4] =  selectedTextud ;
            valueud1[i4] =  selectedTextud1 ;

            $(".ud").text(valueud1);

            i4++;

        });
        $('#dev').change(function () {
            var devq = document.getElementById("dev");
            var selectedTextdev1 = devq.options[devq.selectedIndex].text;
            var selectedTextdev = devq.options[devq.selectedIndex].value;
            //    var selectedText = $(this).find("option:selected").value();
            valuedev[i5] =  selectedTextdev ;
            valuedev1[i5] =  selectedTextdev1 ;

            $(".dev").text(valuedev1);

            i5++;

        });
        $('#de').change(function () {
            var deq = document.getElementById("de");
            var selectedTextde1 = deq.options[deq.selectedIndex].text;
            var selectedTextde = deq.options[deq.selectedIndex].value;
            //    var selectedText = $(this).find("option:selected").value();
            valuede[i6] =  selectedTextde ;
            valuede1[i6] =  selectedTextde1 ;

            $(".de").text(valuede1);

            i6++;

        });
       /* $('#app').change(function () {
          var e = document.getElementById("app");
          var selectedText1 = e.options[e.selectedIndex].text;
          var selectedText = e.options[e.selectedIndex].value;
        //    var selectedText = $(this).find("option:selected").value();
            value[i] =  selectedText ;
            value1[i] =  selectedText1 ;

            $(".app").text(value1);

            i++;

        });*/
        $('#bus').change(function () {
          //alert('asd');
          var b = document.getElementById("bus");
          var selectedTextb1 = b.options[b.selectedIndex].text;
          var selectedTextb = b.options[b.selectedIndex].value;
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
           // $('#ar').val(JSON.stringify(value));
            $('#br').val(JSON.stringify(valueb));
            $('#dr').val(JSON.stringify(valued));
            $('#tr').val(JSON.stringify(valuet));

            $('#devr').val(JSON.stringify(valuedev));
            $('#udr').val(JSON.stringify(valueud));
            $('#der').val(JSON.stringify(valuede));
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
