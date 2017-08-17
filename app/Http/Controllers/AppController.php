<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DeRequest;
use App\Http\Requests\AppRequest;
use App\Application_layer;
use App\Business_layer;
use App\Develop_language;
use App\Use_data;
use App\Data_layer;
use App\Technology_layer;
use App\Department;
use App\Devlopment_group;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
     // $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
        $in = DB::table('Initial')
            ->where('id',1)
            ->select('initial')
            ->get();
        $devl = DB::table('application_layer')
            ->leftJoin('application_relation','application_relation.application_layer_id', '=', 'application_layer.id')
            ->leftJoin('Develop_language','Develop_language.id', '=', 'application_relation.comp_id')
            ->select('application_layer.id','Develop_language.name as develop_language')
            ->where('frag', 'la')
            ->get();
        $des = DB::table('application_layer')
            ->leftJoin('application_relation','application_relation.application_layer_id', '=', 'application_layer.id')
            ->leftJoin('department','department.id', '=', 'application_relation.comp_id')
            ->select('application_layer.id','department.name as department_id')
            ->where('frag', 'dp')
            ->get();
        $a = DB::table('application_relation')
            ->join('Application_layer','Application_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.application_layer_id','Application_layer.name')
            ->where('frag','a')
            ->get();
        $b = DB::table('application_relation')
            ->join('Business_layer','Business_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.application_layer_id','Business_layer.name')
            ->where('frag','b')
            ->get();
        $d = DB::table('application_relation')
            ->join('Data_layer','Data_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.application_layer_id','Data_layer.name')
            ->where('frag','d')
            ->get();
        $t = DB::table('application_relation')
            ->join('Technology_layer','Technology_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.application_layer_id','Technology_layer.name')
            ->where('frag','t')
            ->get();
            $ud = DB::table('application_relation')
                ->join('Application_layer','Application_layer.id', '=', 'application_relation.application_layer_id')
                  ->join('Use_data','Use_data.id', '=', 'application_relation.comp_id')
                ->select('application_relation.application_layer_id','Use_data.name')
                ->where('frag','db')
                ->get();

                    $de = DB::table('application_relation')
                        ->join('Application_layer','Application_layer.id', '=', 'application_relation.application_layer_id')
                        ->join('department','department.id', '=', 'application_relation.comp_id')
                        ->select('application_relation.application_layer_id','department.name')
                        ->where('frag','dp')
                        ->get();
                        $deg = DB::table('application_relation')
                            ->join('Application_layer','Application_layer.id', '=', 'application_relation.application_layer_id')
                            ->join('devlopment_group','devlopment_group.id', '=', 'application_relation.comp_id')
                            ->select('application_relation.application_layer_id','devlopment_group.name')
                            ->where('frag','c')
                            ->get();
                            //ddd($b);

      //$apps = DB::table('application_layer')->get();
        $apps = DB::table('application_layer')
            ->leftJoin('department', 'department.id', '=', 'application_layer.department_id')
            ->leftJoin('Develop_language', 'Develop_language.id', '=', 'application_layer.Develop_language')
            ->leftJoin('Use_data', 'Use_data.id', '=', 'application_layer.app_database')
            ->select('application_layer.*','department.name as department_id','Develop_language.name as develop_language','Use_data.name as app_database','application_layer.name as app_relation' )
            ->get();
      return view('app.index', compact('apps','a','b','d','t','ud'  ,'de','deg','des','devl','in'));
    }
    public function create(){
        //$department =  DB::table('Department')->get();
       // $items  = Department::pluck('name', 'id')->toArray();
        $devg  = Devlopment_group::pluck('name', 'id')->toArray();
        $lang  = Develop_language::pluck('name', 'id')->toArray();
        $usedata  = Use_data::pluck('name', 'id')->toArray();
        $bus456  = Business_layer::pluck('name')->toArray();
        $tech456 = Technology_layer::pluck('name')->toArray();
        //$app456 = Application_layer::pluck('name', 'id')->toArray();
       // $data456 = Data_layer::pluck('name', 'id');
        $items = Department::all();
        $tech456 = Technology_layer::all();
        $app456 = Application_layer::all();
        $data456 = Data_layer::all();
        return view('app.create', compact('id', 'items','app456','lang','usedata','devg','bus456','tech456','data456'));
    }
    public function store(AppRequest $request)
    {
        $langs =  $request->get('develop_language');
        $lops =  $request->get('app_database');
        $app = new application_layer(array(
            'name' => $request->get('name'),
            'develop_language' => $request->get('develop_language'),
            'app_database' => $request->get('app_database'),
            'develop_company' => $request->get('develop_company'),
            'getting_start_years' => $request->get('getting_start_years'),
           // 'app_relation' => $request->get('app_relation'),
            'remark' => $request->get('remark'),
            'ma_cost' => $request->get('ma_cost'),
          //  'department_id' => $request->get('department_id')
        ));

        $app->save();
        DB::table('application_layer')
            ->where('id', $app->id)
            ->update(['attr_id' => $app->id]);
        if ($langs != null){
        DB::table('application_relation')->insert(
            ['application_layer_id' => $app->id, 'comp_id' => $langs, 'frag' => 'la']
        );}
        if ($lops != null){
        DB::table('application_relation')->insert(
            ['application_layer_id' => $app->id, 'comp_id' => $lops, 'frag' => 'db']
        );}
      /*  if ($request->hasFile('file')) {
            $fileName = $app->id . '.' .
                $request->file('file')->getClientOriginalExtension();

            $request->file('file')->move(
                base_path() . '/public/images/app/', $fileName

            );
            $appfile = DB::table('application_layer')
                ->where('id', $app->id)
                ->update(['file' => $fileName]);
        }*/
        $des = $request->get('department') ;
        $dess = json_decode($des, TRUE);
        $apps = $request->get('app2') ;
        $appss = json_decode($apps, TRUE);
        $datas = $request->get('data2') ;
        $datass = json_decode($datas, TRUE);
        /*$bus = $request->get('bus2') ;
        $buss = json_decode($bus, TRUE);*/
        $techs = $request->get('tech2') ;
        $techss = json_decode($techs, TRUE);
        //$devgs = $request->get('devg2') ;
        //$devgss = json_decode($devgs, TRUE);
       // $langs = $request->get('lang2') ;
       // $langss = json_decode($langs, TRUE);
       // $lops = $request->get('lop2') ;
      //  $lopss = json_decode($lops, TRUE);
        foreach ((array) $dess as $de) {
            DB::table('bus_depart')->insert(
                ['id_bus' => $app->id,'department_id' => $de]
            );
        }
        foreach ((array) $dess as $de) {
            DB::table('application_relation')->insert(
                ['application_layer_id' => $app->id, 'comp_id' => $de, 'frag' => 'dp']
            );
        }
        foreach ((array) $dess as $de) {
            DB::table('application_relation')->insert(
                ['application_layer_id' => $app->id, 'comp_id' => $de, 'frag' => 'dp']
            );
        }
        foreach ((array) $appss as $ap) {
            DB::table('application_relation')->insert(
                ['application_layer_id' => $app->id, 'comp_id' => $ap, 'frag' => 'a']
            );
        }
        foreach ((array) $datass as $da) {
            DB::table('application_relation')->insert(
                ['application_layer_id' => $app->id, 'comp_id' => $da, 'frag' => 'd']
            );
        }
      /*  foreach ((array) $buss as $bus) {
            DB::table('application_relation')->insert(
                ['application_layer_id' => $app->id, 'comp_id' => $bus, 'frag' => 'b']
            );
        }*/
        foreach ((array) $techss as $techs) {
            DB::table('application_relation')->insert(
                ['application_layer_id' => $app->id, 'comp_id' => $techs, 'frag' => 't']
            );
        }
        /*foreach ((array) $devgss as $devgs) {
            DB::table('application_relation')->insert(
                ['application_layer_id' => $app->id, 'comp_id' => $devgs, 'frag' => 'c']
            );
        }*/

                  if($request->hasFile('data')) {
      $fileName = 'data'.$app->id . '.' .
        $request->file('data')->getClientOriginalExtension();

        $request->file('data')->move(
        base_path() . '/public/images/app/', $fileName  );
              $busfile =  DB::table('application_layer')
                ->where('id', $app->id)
                  ->update(['data' => $fileName]);
    }
       if($request->hasFile('dic')) {
      $fileName1 = 'dic'.$app->id . '.' .
        $request->file('dic')->getClientOriginalExtension();

        $request->file('dic')->move(
        base_path() . '/public/images/app/', $fileName1);
           $busfile =  DB::table('application_layer')
                ->where('id', $app->id)
               ->update(['dic' => $fileName1]);
      }
            //application_layer::create($request->all());
            return redirect()->route('app.index')->with('message', 'item has been added successfully');


    }
     public function show($id)
     {

     }
    public function relation($app)
    {
      /*  $apps = application_layer::all();
        // DB::setFetchMode(PDO::FETCH_ASSOC);
        $aq1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'a')
            ->where('application_layer_id', $app)
            ->get();*/
        $buss = Business_layer::all();
        $bq1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'b')
            ->where('application_layer_id', $app)
            ->get();
        $dats = Data_layer::all();
        $dq1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'd')
            ->where('application_layer_id', $app)
            ->get();
        $techs = Technology_layer::all();
        $tq1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 't')
            ->where('application_layer_id', $app)
            ->get();
        $devs = develop_language::all();
        $dev1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'la')
            ->where('application_layer_id', $app)
            ->get();
        $uds = use_data::all();
        $ud1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'db')
            ->where('application_layer_id', $app)
            ->get();
        $des = department::all();
        $de1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'dp')
            ->where('application_layer_id', $app)
            ->get();
        $tps = devlopment_group::all();
        $tp1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'c')
            ->where('application_layer_id', $app)
            ->get();
        return view('app.addrelation',compact('app'),compact('buss','dats','techs','bq1','dq1','tq1','devs','dev1','uds','ud1','des','de1','tps','tp1'));
    }
    public function addrelation()
    {   $id = $_POST['id'];
        /*$ar = json_decode($_POST['ar'], true);
        foreach($ar as  $app){
          DB::table('application_relation')->insert(
          ['application_layer_id' =>$id,'comp_id' => $app ,'frag' => 'a']
          );
        }*/
        $br = json_decode($_POST['br'], true);
        foreach($br as  $bus){
          DB::table('application_relation')->insert(
          ['application_layer_id' =>$id,'comp_id' => $bus ,'frag' => 'b']
          );
        }
        $dr = json_decode($_POST['dr'], true);
        foreach($dr as  $dat){
          DB::table('application_relation')->insert(
          ['application_layer_id' =>$id,'comp_id' => $dat ,'frag' => 'd']
          );
        }
        $tr = json_decode($_POST['tr'], true);
        foreach($tr as  $tech){
          DB::table('application_relation')->insert(
          ['application_layer_id' =>$id,'comp_id' => $tech ,'frag' => 't']
          );
        }
        $devr = json_decode($_POST['devr'], true);
      /*  foreach($devr as  $dev2){
            DB::table('develop_language_relation')->insert(
                ['develop_language_id' =>$id,'comp_id' => $dev2 ,'frag' => 'a']
            );
        }*/
        foreach($devr as  $dev3){
            DB::table('application_relation')->insert(
                ['application_layer_id' =>$id,'comp_id' => $dev3 ,'frag' => 'la']
            );
        }
        $udr = json_decode($_POST['udr'], true);
       /* foreach($udr as  $udr2){
            DB::table('use_data_relation')->insert(
                ['use_data_id' =>$id,'comp_id' => $udr2 ,'frag' => 'a']
            );
        }*/
          foreach($udr as  $udr3){
            DB::table('application_relation')->insert(
                ['application_layer_id' =>$id,'comp_id' => $udr3 ,'frag' => 'db']
            );
        }
        $der = json_decode($_POST['der'], true);
       /* foreach($der as  $der2){
            DB::table('department_relation')->insert(
                ['department_id' =>$id,'comp_id' => $der2 ,'frag' => 'a']
            );
        }*/
        foreach($der as  $der3){
            DB::table('application_relation')->insert(
                ['application_layer_id' =>$id,'comp_id' => $der3 ,'frag' => 'dp']
            );
        }
        $tpr = json_decode($_POST['tpr'], true);
       /* foreach($tpr as  $tpr2){
            DB::table('devlopment_group_relation')->insert(
                ['devlopment_group_id' =>$id,'comp_id' => $tpr2 ,'frag' => 'a']
            );
        }*/
        foreach($tpr as  $tpr3){
            DB::table('application_relation')->insert(
                ['application_layer_id' =>$id,'comp_id' => $tpr3 ,'frag' => 'c']
            );
        }

      //$a = $str[1];
        return redirect()->route('app.index');
    }
    public function movea()
    {
      /*  $asd = $_POST['a'];
        //$id1q = $_POST['bus'];
        $num1 = json_decode($_POST['json'], true);
        if($num1[0] != null){
        $num =  $num1[0];
            DB::table('Application_layer')
                ->where('attr_id', $asd)
                ->update(['attr_id' => $num]);
        DB::table('Application_layer')
            ->where('attr_id','>', $num)
            ->increment('attr_id');
       /* DB::table('Application_layer')
            ->where('id', 9999)
            ->update(['id' => $asd]);*/
            $asd = $_POST['a'];
            $b = $_POST['b'];
            //$id1q = $_POST['bus'];
            $num1 = json_decode($_POST['json'], true);
            if ($num1[0] != null) {
                $num = $num1[0];
                if($num<$asd){
                //$num2 = $num++;
                DB::table('Application_layer')
                    ->where('attr_id', $asd)
                    ->update(['attr_id' => $num]);
                DB::table('Application_layer')
                    ->where('attr_id','>', $num)
                    ->increment('attr_id');
                 $n = DB::table('Application_layer')
                        ->where('attr_id', $num)
                        ->where('id','<>', $b)
                        ->first();
                        $num2 = $num1[0];
                        $num2++;
                        DB::table('Application_layer')
                            ->where('id', $n->id)
                            ->update(['attr_id' => $num2]);
          }else{
                  DB::table('Application_layer')
                      ->where('attr_id', $asd)
                      ->update(['attr_id' => $num]);
                  DB::table('Application_layer')
                      ->where('attr_id','<', $num)
                      ->decrement('attr_id');
                   $n = DB::table('Application_layer')
                          ->where('attr_id', $num)
                          ->where('id','<>', $b)
                          ->first();
                          $num3 = $num1[0];
                          $num3--;
                          DB::table('Application_layer')
                              ->where('id', $n->id)
                              ->update(['attr_id' => $num3]);
      }
        return redirect()->route('app.index');
    }
  }
    public function moveup($app)
    {
        $idapp =$app;
        $idapp--;
        DB::table('application_layer')
            ->where('attr_id',$app)
            ->update(['attr_id' => 9999]);
        DB::table('application_layer')
            ->where('attr_id',$idapp)
            ->update(['attr_id' => $app]);
        DB::table('application_layer')
            ->where('attr_id', 9999)
            ->update(['attr_id' => $idapp]);
        return redirect()->route('app.index');
    }
    public function movedown($app)
    {
        $idapp =$app;
        $idapp++;
        DB::table('application_layer')
            ->where('attr_id',$app)
            ->update(['attr_id' => 9999]);
        DB::table('application_layer')
            ->where('attr_id',$idapp)
            ->update(['attr_id' => $app]);
        DB::table('application_layer')
            ->where('attr_id',9999)
            ->update(['attr_id' => $idapp]);
        return redirect()->route('app.index');
    }

     public function edit(application_layer $app)
    {
        $aps = DB::table('application_relation')
            ->join( 'application_layer','application_layer.id', '=', 'application_relation.comp_id')
            ->where('application_layer_id', $app->id)
            ->where('frag', 'a')
            ->select('application_layer.name','application_relation.*')
            ->get();
        $ds = DB::table('application_relation')
            ->join('Data_layer', 'Data_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*', 'Data_layer.name')
            ->where('frag', 'd')
            ->where('application_layer_id', $app->id)
            ->get();
        $ts = DB::table('application_relation')
            ->join('Technology_layer', 'Technology_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*', 'Technology_layer.name')
            ->where('frag', 't')
            ->where('application_layer_id', $app->id)
            ->get();
        $bs = DB::table('application_relation')
            ->join('Business_layer', 'Business_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*', 'Business_layer.name')
            ->where('frag', 'b')
            ->where('application_layer_id', $app->id)
            ->get();
        $uds1 = DB::table('application_relation')
            ->join('Use_data', 'Use_data.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*', 'Use_data.name')
            ->where('frag', 'db')
            ->where('application_layer_id', $app->id)
            ->get();
        $ls = DB::table('application_relation')
            ->join('Develop_language', 'Develop_language.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*', 'Develop_language.name')
            ->where('frag', 'la')
            ->where('application_layer_id', $app->id)
            ->get();
        $cs = DB::table('application_relation')
            ->join('Devlopment_group', 'Devlopment_group.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*', 'Devlopment_group.name')
            ->where('frag', 'c')
            ->where('application_layer_id', $app->id)
            ->get();
        $apps = Application_layer::all();
        $aq1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'a')
            ->where('application_layer_id', $app->id)
            ->get();
        $dats = Data_layer::all();
        $dq1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'd')
            ->where('application_layer_id', $app->id)
            ->get();
        $buss = Business_layer::all();
        $bq1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'b')
            ->where('application_layer_id', $app->id)
            ->get();

        $techs = Technology_layer::all();
        $tq1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 't')
            ->where('application_layer_id', $app->id)
            ->get();
        $devs = develop_language::all();
        $dev1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'la')
            ->where('application_layer_id', $app->id)
            ->get();
        $uds = use_data::all();
        $ud1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'db')
            ->where('application_layer_id', $app->id)
            ->get();
        $des = department::all();
        $de1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'dp')
            ->where('application_layer_id', $app->id)
            ->get();
        $tps = devlopment_group::all();
        $tp1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'c')
            ->where('application_layer_id', $app->id)
            ->get();
        //----------------------------relation------------------------------------//
       // $list = Type_process::pluck('name', 'id')->toArray();
        $items = DB::table('Department')
            ->get();
        $its = DB::table('application_relation')
            ->join( 'department','department.id', '=', 'application_relation.comp_id')
            ->where('application_layer_id', $app->id)
            ->where('frag', 'dp')
            ->select('department.name','application_relation.*')
            ->get();
        $devg  = Devlopment_group::pluck('name', 'id');
        $lang  = Develop_language::pluck('name', 'id')->toArray();
        $data  = Use_data::pluck('name', 'id')->toArray();

          $appname  = application_layer::pluck('name');
        return view('app.edit',compact('app','items','appname','data','lang','devg','bus', 'items', 'its', 'id', 'apps', 'aps', 'b',
            'ds','t','list', 'aq1', 'dats','dq1','ts', 'bs','ls','uds1','cs','buss','dats','techs','bq1','dq1','tq1','devs','dev1','uds','ud1','des','de1','tps','tp1'));
    }

    public function update(DeRequest $request, application_layer $app)
   {
         $bus1 =  DB::table('application_layer')
            ->where('id',$app->id)
            ->update([  'name' => $request->get('name'),
        'develop_language' => $request->get('develop_language'),
        'app_database' => $request->get('app_database'),
        'develop_company' => $request->get('develop_company'),
        'getting_start_years' => $request->get('getting_start_years'),
        'app_relation' => $request->get('app_relation'),
        'remark' => $request->get('remark'),
        'ma_cost' => $request->get('ma_cost'),
        'department_id' => $request->get('department_id')]);

       $langs =  $request->get('develop_language');
       $lops =  $request->get('app_database');
       if ($langs != null &&$app->develop_language!=$langs){
           DB::table('application_relation')->where(['application_layer_id' => $app->id,'frag' => 'la'])->delete();
           DB::table('application_relation')->insert(
               ['application_layer_id' => $app->id, 'comp_id' => $langs, 'frag' => 'la']
           );}
       if ($lops != null &&$app->app_database!= $lops){
           DB::table('application_relation')->where(['application_layer_id' => $app->id,'frag' => 'db'])->delete();
           DB::table('application_relation')->insert(
               ['application_layer_id' => $app->id, 'comp_id' => $lops, 'frag' => 'db']
           );}

       $des = $request->get('department') ;
       $dess = json_decode($des, TRUE);
       $apps = $request->get('app2') ;
       $appss = json_decode($apps, TRUE);
       $datas = $request->get('data2') ;
       $datass = json_decode($datas, TRUE);
       $bus = $request->get('bus2') ;
       $buss = json_decode($bus, TRUE);
       $techs = $request->get('tech2') ;
       $techss = json_decode($techs, TRUE);
      /* $devgs = $request->get('devg2') ;
       $devgss = json_decode($devgs, TRUE);
       $langs = $request->get('lang2') ;
       $langss = json_decode($langs, TRUE);
       $lops = $request->get('lop2') ;
       $lopss = json_decode($lops, TRUE);*/
       foreach ((array) $dess as $de) {
           DB::table('application_relation')->insert(
               ['application_layer_id' => $app->id, 'comp_id' => $de, 'frag' => 'dp']
           );
       }
       foreach ((array) $appss as $ap) {
           DB::table('application_relation')->insert(
               ['application_layer_id' => $app->id, 'comp_id' => $ap, 'frag' => 'a']
           );
       }
       foreach ((array) $datass as $da) {
           DB::table('application_relation')->insert(
               ['application_layer_id' => $app->id, 'comp_id' => $da, 'frag' => 'd']
           );
       }
       foreach ((array) $buss as $bus) {
           DB::table('application_relation')->insert(
               ['application_layer_id' => $app->id, 'comp_id' => $bus, 'frag' => 'b']
           );
       }
       foreach ((array) $techss as $techs) {
           DB::table('application_relation')->insert(
               ['application_layer_id' => $app->id, 'comp_id' => $techs, 'frag' => 't']
           );
       }
     /*  foreach ((array) $devgss as $devgs) {
           DB::table('application_relation')->insert(
               ['application_layer_id' => $app->id, 'comp_id' => $devgs, 'frag' => 'c']
           );
       }
       foreach ((array) $langss as $langs) {
           DB::table('application_relation')->insert(
               ['application_layer_id' => $app->id, 'comp_id' => $langs, 'frag' => 'la']
           );
       }
       foreach ((array) $lopss as $lops) {
           DB::table('application_relation')->insert(
               ['application_layer_id' => $app->id, 'comp_id' => $lops, 'frag' => 'db']
           );
       }*/
        /* if($request->hasFile('file')) {

        $fileName = $app->id . '.' .
        $request->file('file')->getClientOriginalExtension();

        $request->file('file')->move(
        base_path() . '/public/images/bus/', $fileName

      );
         $appfile1 =  DB::table('application_layer')
            ->where('id',$app->id)
            ->update(['file' => $fileName]);
        }*/
        $i = mt_rand(0,100);
     if($request->hasFile('file')) {

      //$fileName = 'data'.$app->id . '.' .
      $fileName = 'edit data'.$app->id.'-'.$i. '.' .
          $request->file('file')->getClientOriginalExtension();

        $request->file('file')->move(
        base_path() . '/public/images/app/', $fileName  );
              $busfile =  DB::table('application_layer')
                ->where('id', $app->id)
                  ->update(['data' => $fileName]);
    }
       if($request->hasFile('dic')) {
      //$fileName1 = 'dic'.$app->id . '.' .
      $fileName1 = 'edit dic'.$app->id.'-'.$i. '.' .
          $request->file('file')->getClientOriginalExtension();

        $request->file('dic')->move(
        base_path() . '/public/images/app/', $fileName1);
           $busfile =  DB::table('application_layer')
                ->where('id', $app->id)
               ->update(['dic' => $fileName1]);
      }
       //$app->update($request->all());
       return redirect()->route('app.index')->with('message', 'item has been edit successfully');
   }

     public function destroy(application_layer $app)
     {
        $app->delete();
        return redirect()->route('app.index')->with('message', 'item has been deleted successfully');
     }
    public function del($app,$q = null)
    {
        DB::table('application_relation')->where('id',$q)->delete();
        $a = DB::table('application_relation')
            ->join('Application_layer','Application_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*','Application_layer.name')
            ->where('frag','a')
            ->where('application_layer_id',$app)
            ->get();
        $b = DB::table('application_relation')
            ->join('Business_layer','Business_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*','Business_layer.name')
            ->where('frag','b')
            ->where('application_layer_id',$app)
            ->get();
        $d = DB::table('application_relation')
            ->join('Data_layer','Data_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*','Data_layer.name')
            ->where('frag','d')
            ->where('application_layer_id',$app)
            ->get();
        $t = DB::table('application_relation')
            ->join('Technology_layer','Technology_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*','Technology_layer.name')
            ->where('frag','t')
            ->where('application_layer_id',$app)
            ->get();
             $ud = DB::table('application_relation')
            ->join('Use_data','Use_data.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*','Use_data.name')
            ->where('frag','db')
            ->where('application_layer_id',$app)
            ->get();
             $dev = DB::table('application_relation')
            ->join('develop_language','develop_language.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*','develop_language.name')
            ->where('frag','la')
            ->where('application_layer_id',$app)
            ->get();
             $de = DB::table('application_relation')
            ->join('department','department.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*','department.name')
            ->where('frag','dp')
            ->where('application_layer_id',$app)
            ->get();
             $deg = DB::table('application_relation')
            ->join('devlopment_group','devlopment_group.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*','devlopment_group.name')
            ->where('frag','c')
            ->where('application_layer_id',$app)
            ->get();

        return view('app.rela',compact('app','a','b','d','t','ud','dev','de','deg'));
        //return redirect()->route('app.index');


    }
    public function dep(Application_layer $app,$q = null)
    {
        DB::table('application_relation')->where('id',$q)->delete();
        $aps = DB::table('application_relation')
            ->join( 'application_layer','application_layer.id', '=', 'application_relation.comp_id')
            ->where('application_layer_id', $app->id)
            ->where('frag', 'a')
            ->select('application_layer.name','application_relation.*')
            ->get();
        $ds = DB::table('application_relation')
            ->join('Data_layer', 'Data_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*', 'Data_layer.name')
            ->where('frag', 'd')
            ->where('application_layer_id', $app->id)
            ->get();
        $ts = DB::table('application_relation')
            ->join('Technology_layer', 'Technology_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*', 'Technology_layer.name')
            ->where('frag', 't')
            ->where('application_layer_id', $app->id)
            ->get();
        $bs = DB::table('application_relation')
            ->join('Business_layer', 'Business_layer.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*', 'Business_layer.name')
            ->where('frag', 'b')
            ->where('application_layer_id', $app->id)
            ->get();
        $uds1 = DB::table('application_relation')
            ->join('Use_data', 'Use_data.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*', 'Use_data.name')
            ->where('frag', 'db')
            ->where('application_layer_id', $app->id)
            ->get();
        $ls = DB::table('application_relation')
            ->join('Develop_language', 'Develop_language.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*', 'Develop_language.name')
            ->where('frag', 'la')
            ->where('application_layer_id', $app->id)
            ->get();
        $cs = DB::table('application_relation')
            ->join('Devlopment_group', 'Devlopment_group.id', '=', 'application_relation.comp_id')
            ->select('application_relation.*', 'Devlopment_group.name')
            ->where('frag', 'c')
            ->where('application_layer_id', $app->id)
            ->get();
        $apps = Application_layer::all();
        $aq1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'a')
            ->where('application_layer_id', $app->id)
            ->get();
        $dats = Data_layer::all();
        $dq1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'd')
            ->where('application_layer_id', $app->id)
            ->get();
        $buss = Business_layer::all();
        $bq1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'b')
            ->where('application_layer_id', $app->id)
            ->get();

        $techs = Technology_layer::all();
        $tq1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 't')
            ->where('application_layer_id', $app->id)
            ->get();
        $devs = develop_language::all();
        $dev1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'la')
            ->where('application_layer_id', $app->id)
            ->get();
        $uds = use_data::all();
        $ud1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'db')
            ->where('application_layer_id', $app->id)
            ->get();
        $des = department::all();
        $de1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'dp')
            ->where('application_layer_id', $app->id)
            ->get();
        $tps = devlopment_group::all();
        $tp1 = DB::table('application_relation')
            ->select('comp_id')
            ->where('frag', 'c')
            ->where('application_layer_id', $app->id)
            ->get();
        //----------------------------relation------------------------------------//
        // $list = Type_process::pluck('name', 'id')->toArray();
        $items = DB::table('Department')
            ->get();
        $its = DB::table('application_relation')
            ->join( 'department','department.id', '=', 'application_relation.comp_id')
            ->where('application_layer_id', $app->id)
            ->where('frag', 'dp')
            ->select('department.name','application_relation.*')
            ->get();
        $devg  = Devlopment_group::pluck('name', 'id');
        $lang  = Develop_language::pluck('name', 'id');
        $data  = Use_data::pluck('name', 'id');
        $appname  = application_layer::pluck('name');
        $lang  = Develop_language::pluck('name', 'id')->toArray();
        $data  = Use_data::pluck('name', 'id')->toArray();

        return view('app.edit',compact('app','items','appname','data','lang','devg','bus', 'items', 'its', 'id', 'apps', 'aps', 'b',
            'ds','t','list', 'aq1', 'dats','dq1','ts', 'bs','ls','uds1','cs','buss','dats','techs','bq1','dq1','tq1','devs','dev1','uds','ud1','des','de1','tps','tp1'));
    }
    public function download($app)
    {
        $filePath = public_path('images/app/'.$app);

        if(file_exists($filePath)) {
            $fileName = basename($filePath);
            $fileSize = filesize($filePath);

            // Output headers.
            header("Cache-Control: private");
            header("Content-Type: application/stream");
            header("Content-Disposition: attachment; filename=".$fileName);

            // Output file.
            readfile ($filePath);
            exit();
        }
        else {
            die('The provided file path is not valid.');
        }
    }

}
