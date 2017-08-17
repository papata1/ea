<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type_collection;
use App\Http\Requests\DatRequest;
use App\Application_layer;
use App\Business_layer;
use App\Data_layer;
use App\Technology_layer;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DeRequest;

class DatController extends Controller
{
        public function __construct()
  {
     $this->middleware('auth');
     // $this->middleware('roles');
  }
    public function index(){
      //$dat = data_layer::all();
     // $dats = DB::table('data_layer')->get();
        $in = DB::table('Initial')
            ->where('id',2)
            ->select('initial')
            ->get();
        $cs = DB::table('data_layer')
            ->leftJoin('data_relation','data_relation.data_layer_id', '=', 'data_layer.id')
            ->leftJoin('Type_collection','Type_collection.id', '=', 'data_relation.comp_id')
            ->select('data_layer.id','Type_collection.name as type')
            ->where('frag', 'st')
            ->get();
        $dats = DB::table('data_layer')
            ->leftJoin('Type_collection', 'Type_collection.id', '=', 'data_layer.type')
            ->select('data_layer.*','Type_collection.name as type')
            ->get();
        $a = DB::table('data_relation')
            ->join('Application_layer','Application_layer.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*','Application_layer.name')
            ->where('frag','a')
            ->get();
        $b = DB::table('data_relation')
            ->join('Business_layer','Business_layer.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*','Business_layer.name')
            ->where('frag','b')
            ->get();
        $d = DB::table('data_relation')
            ->join('Data_layer','Data_layer.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*','Data_layer.name')
            ->where('frag','d')
            ->get();
        $t = DB::table('data_relation')
            ->join('Technology_layer','Technology_layer.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*','Technology_layer.name')
            ->where('frag','t')
            ->get();
             $c = DB::table('data_relation')
            ->join('type_collection','type_collection.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*','type_collection.name')
            ->where('frag','st')
            ->get();
           /* $c = DB::table('type_collection_relation')
                ->join('Application_layer','Application_layer.id', '=', 'type_collection_relation.type_collection_id')
                ->join('type_collection','type_collection.id', '=', 'type_collection_relation.comp_id')
                ->select('type_collection_relation.type_collection_id','type_collection.name')
                ->where('frag','d')
                ->get();*/
      return view('dat.index', compact('dats','a','b','d','t','c','cs','in'));
    }
    public function create(){
        $list = Type_collection::pluck('name', 'id')->toArray();
        $tech456 = Type_collection::pluck('name', 'id')->toArray();
        $tech456 = Type_collection::all();
        $bus456  = Business_layer::pluck('name')->toArray();
        $bus456 = Business_layer::all();
        $app456 = Application_layer::pluck('name', 'id')->toArray();
        $app456 = Application_layer::all();
        return view('dat.create', compact('list','bus456','app456','tech456'));
    }
    public function store(DatRequest $request)
     {

       $dat = new data_layer(array(
         'name' => $request->get('name'),
         'remark' => $request->get('remark'),
          //'type' => $request->get('type'),
       ));
         $dat->save();
         DB::table('data_layer')
             ->where('id', $dat->id)
             ->update(['attr_id' => $dat->id]);
         $bus = $request->get('bus2') ;
         $buss = json_decode($bus, TRUE);
         $techs = $request->get('tech2') ;
         $techss = json_decode($techs, TRUE);
         $apps = $request->get('app2') ;
         $appss = json_decode($apps, TRUE);
         foreach ((array) $appss as $ap) {
             DB::table('data_relation')->insert(
                 ['data_layer_id' => $dat->id, 'comp_id' => $ap, 'frag' => 'a']
             );
         }
         foreach ((array) $buss as $bus) {
             DB::table('data_relation')->insert(
                 ['data_layer_id' => $dat->id, 'comp_id' => $bus, 'frag' => 'b']
             );
         }
         foreach ((array) $techss as $techs) {
             DB::table('data_relation')->insert(
                 ['data_layer_id' => $dat->id, 'comp_id' => $techs, 'frag' => 'st']
             );
         }
          if($request->hasFile('data')) {
      $fileName = 'data'.$dat->id . '.' .
        $request->file('data')->getClientOriginalExtension();

        $request->file('data')->move(
        base_path() . '/public/images/data/', $fileName  );
              $busfile =  DB::table('data_layer')
                  ->where('id',$dat->id)
                  ->update(['data' => $fileName]);
    }
       if($request->hasFile('dic')) {
      $fileName1 = 'dic'.$dat->id . '.' .
        $request->file('dic')->getClientOriginalExtension();

        $request->file('dic')->move(
        base_path() . '/public/images/data/', $fileName1);
           $busfile =  DB::table('data_layer')
               ->where('id',$dat->id)
               ->update(['data_dic' => $fileName1]);
      }


       //data_layer::create($request->all());
       return redirect()->route('dat.index')->with('message','item has been added successfully');

     }

     public function show($id)
     {

     }
      public function relation($app)
    {
        $apps = application_layer::all();
        // DB::setFetchMode(PDO::FETCH_ASSOC);
        $aq1 = DB::table('data_relation')
            ->select('comp_id')
            ->where('frag', 'a')
            ->where('data_layer_id', $app)
            ->get();
        $buss = Business_layer::all();
        $bq1 = DB::table('data_relation')
            ->select('comp_id')
            ->where('frag', 'b')
            ->where('data_layer_id', $app)
            ->get();
        /*$dats = Data_layer::all();
        $dq1 = DB::table('data_relation')
            ->select('comp_id')
            ->where('frag', 'd')
            ->where('data_layer_id', $app)
            ->get();
        $techs = Technology_layer::all();
        $tq1 = DB::table('data_relation')
            ->select('comp_id')
            ->where('frag', 't')
            ->where('data_layer_id', $app)
            ->get();*/
        $tps = type_collection::all();
        $tp1 = DB::table('data_relation')
            ->select('comp_id')
            ->where('frag', 'st')
            ->where('data_layer_id', $app)
            ->get();
        return view('dat.addrelation',compact('app'),compact('apps','buss','aq1','bq1','tps','tp1'));
    }
    public function addrelation()
    {   $id = $_POST['id'];
        $ar = json_decode($_POST['ar'], true);
        foreach($ar as  $app){
          DB::table('data_relation')->insert(
          ['data_layer_id' =>$id,'comp_id' => $app ,'frag' => 'a']
          );
        }
        $br = json_decode($_POST['br'], true);
        foreach($br as  $bus){
          DB::table('data_relation')->insert(
          ['data_layer_id' =>$id,'comp_id' => $bus ,'frag' => 'b']
          );
        }
       /* $dr = json_decode($_POST['dr'], true);
        foreach($dr as  $dat){
          DB::table('data_relation')->insert(
          ['data_layer_id' =>$id,'comp_id' => $dat ,'frag' => 'd']
          );
        }
        $tr = json_decode($_POST['tr'], true);
        foreach($tr as  $tech){
          DB::table('data_relation')->insert(
          ['data_layer_id' =>$id,'comp_id' => $tech ,'frag' => 't']
          );
        }*/
        $tpr = json_decode($_POST['tpr'], true);
       /* foreach($tpr as  $tpr2){
            DB::table('type_collection_relation')->insert(
                ['type_collection_id' =>$id,'comp_id' => $tpr2 ,'frag' => 'd']
            );
        }*/
        foreach($tpr as  $tpr3){
            DB::table('data_relation')->insert(
                ['data_layer_id' =>$id,'comp_id' => $tpr3 ,'frag' => 'st']
            );
        }

      //$a = $str[1];
        return redirect()->route('dat.index')->with('message','relation has been create successfully');
    }
    public function moved()
    {
        $asd = $_POST['a'];
        $b = $_POST['b'];
        //$id1q = $_POST['bus'];
        $num1 = json_decode($_POST['json'], true);
        if ($num1[0] != null) {
            $num = $num1[0];
            if($num<$asd){
            //$num2 = $num++;
            DB::table('Data_layer')
                ->where('attr_id', $asd)
                ->update(['attr_id' => $num]);
            DB::table('Data_layer')
                ->where('attr_id','>', $num)
                ->increment('attr_id');
             $n = DB::table('Data_layer')
                    ->where('attr_id', $num)
                    ->where('id','<>', $b)
                    ->first();
                    $num2 = $num1[0];
                    $num2++;
                    DB::table('Data_layer')
                        ->where('id', $n->id)
                        ->update(['attr_id' => $num2]);
      }else{
              DB::table('Data_layer')
                  ->where('attr_id', $asd)
                  ->update(['attr_id' => $num]);
              DB::table('Data_layer')
                  ->where('attr_id','<', $num)
                  ->decrement('attr_id');
               $n = DB::table('Data_layer')
                      ->where('attr_id', $num)
                      ->where('id','<>', $b)
                      ->first();
                      $num3 = $num1[0];
                      $num3--;
                      DB::table('Data_layer')
                          ->where('id', $n->id)
                          ->update(['attr_id' => $num3]);
  }
          /*  DB::table('Data_layer')
                ->where('id', $num)
                ->update(['id' => 9999]);
            DB::table('Data_layer')
                ->where('id', $asd)
                ->update(['id' => $num]);
            DB::table('Data_layer')
                ->where('id', 9999)
                ->update(['id' => $asd]);*/
            return redirect()->route('dat.index')->with('message', 'item has been move successfully');
        }
    }
     public function moveup($dat)
    {
        $idapp =$dat;
        $idapp--;
        DB::table('data_layer')
            ->where('attr_id',$dat)
            ->update(['attr_id' => 9999]);
        DB::table('data_layer')
            ->where('attr_id',$idapp)
            ->update(['attr_id' => $dat]);
        DB::table('data_layer')
            ->where('attr_id', 9999)
            ->update(['attr_id' => $idapp]);
        return redirect()->route('dat.index')->with('message','item has been move successfully');
    }
    public function movedown($dat)
    {
        $idapp =$dat;
        $idapp++;
        DB::table('data_layer')
            ->where('attr_id',$dat)
            ->update(['attr_id' => 9999]);
        DB::table('data_layer')
            ->where('attr_id',$idapp)
            ->update(['attr_id' => $dat]);
        DB::table('data_layer')
            ->where('attr_id',9999)
            ->update(['attr_id' => $idapp]);
        return redirect()->route('dat.index')->with('message','item has been move successfully');
    }

     public function edit(data_layer $dat)
    {

        $aps = DB::table('data_relation')
            ->join( 'application_layer','application_layer.id', '=', 'data_relation.comp_id')
            ->where('data_layer_id', $dat->id)
            ->where('frag', 'a')
            ->select('application_layer.name','data_relation.*')
            ->get();
        $ts = DB::table('data_relation')
            ->join('Type_collection', 'Type_collection.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*', 'Type_collection.name')
            ->where('frag', 'st')
            ->where('data_layer_id', $dat->id)
            ->get();
        $bs = DB::table('data_relation')
            ->join('Business_layer', 'Business_layer.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*', 'Business_layer.name')
            ->where('frag', 'b')
            ->where('data_layer_id', $dat->id)
            ->get();
       // ddd($ts);
        $apps = Application_layer::all();
        $aq1 = DB::table('data_relation')
            ->select('comp_id')
            ->where('frag', 'a')
            ->where('data_layer_id', $dat->id)
            ->get();
        $techs = Type_collection::all();
        $tq1 = DB::table('data_relation')
            ->select('comp_id')
            ->where('frag', 'st')
            ->where('data_layer_id', $dat->id)
            ->get();
        $buss = Business_layer::all();
        $bq1 = DB::table('data_relation')
            ->select('comp_id')
            ->where('frag', 'b')
            ->where('data_layer_id', $dat->id)
            ->get();
        $list = Type_collection::pluck('name', 'id');
        return view('dat.edit',compact('dat','list','aps','ts','bs','apps','aq1','techs','tq1','buss','bq1'));
    }

    public function update(DeRequest $request, data_layer $dat)
   {
       $data1 =  DB::table('data_layer')
            ->where('id',$dat->id)
            ->update(['name' => $request->get('name'),'remark' => $request->get('remark'),'type' =>$request->get('type')]);
       $bus = $request->get('bus2') ;
       $buss = json_decode($bus, TRUE);
       $techs = $request->get('tech2') ;
       $techss = json_decode($techs, TRUE);
       $apps = $request->get('app2') ;
       $appss = json_decode($apps, TRUE);
       foreach ((array) $appss as $ap) {
           DB::table('data_relation')->insert(
               ['data_layer_id' => $dat->id, 'comp_id' => $ap, 'frag' => 'a']
           );
       }
       foreach ((array) $buss as $bus) {
           DB::table('data_relation')->insert(
               ['data_layer_id' => $dat->id, 'comp_id' => $bus, 'frag' => 'b']
           );
       }
       foreach ((array) $techss as $techs) {
           DB::table('data_relation')->insert(
               ['data_layer_id' => $dat->id, 'comp_id' => $techs, 'frag' => 'st']
           );
       }

  if($request->hasFile('data')) {

        $fileName = 'data'.$dat->id . '.' .
        $request->file('data')->getClientOriginalExtension();

        $request->file('data')->move(
        base_path() . '/public/images/data/', $fileName

      );
         $busfile1 =  DB::table('data_layer')
            ->where('id',$dat->id)
            ->update(['data' => $fileName]);
        }

  if($request->hasFile('dic')) {

        $fileName = 'dic'.$dat->id . '.' .
        $request->file('dic')->getClientOriginalExtension();

        $request->file('dic')->move(
        base_path() . '/public/images/data/', $fileName

      );
         $busfile1 =  DB::table('data_layer')
            ->where('id',$dat->id)
            ->update(['data_dic' => $fileName]);
        }


       //$dat->update($request->all());
       return redirect()->route('dat.index')->with('message','item has been updated successfully');
   }

     public function destroy(data_layer $dat)
     {
        $dat->delete();
        return redirect()->route('dat.index')->with('message','item has been deleted successfully');
     }

    public function deld($dat,$q=null)
    {
        
        DB::table('data_relation')->where('id',$q)->delete();
        $a = DB::table('data_relation')
            ->join('Application_layer','Application_layer.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*','Application_layer.name')
            ->where('frag','a')
            ->where('data_layer_id',$dat)
            ->get();
        $b = DB::table('data_relation')
            ->join('Business_layer','Business_layer.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*','Business_layer.name')
            ->where('frag','b')
            ->where('data_layer_id',$dat)
            ->get();
        $d = DB::table('data_relation')
            ->join('Data_layer','Data_layer.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*','Data_layer.name')
            ->where('frag','d')
            ->where('data_layer_id',$dat)
            ->get();
        $t = DB::table('data_relation')
            ->join('Technology_layer','Technology_layer.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*','Technology_layer.name')
            ->where('frag','t')
            ->where('data_layer_id',$dat)
            ->get();
            $c = DB::table('data_relation')
            ->join('type_collection','type_collection.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*','type_collection.name')
            ->where('frag','st')
            ->where('data_layer_id',$dat)
            ->get();
       /* $c = DB::table('type_collection_relation')
            ->join('Application_layer','Application_layer.id', '=', 'type_collection_relation.type_collection_id')
            ->join('type_collection','type_collection.id', '=', 'type_collection_relation.comp_id')
            ->select('type_collection_relation.*','type_collection.name')
            ->where('frag','d')
            ->where('type_collection_id',$dat)
            ->get();*/
        return view('dat.rela',compact('dat','a','b','d','t','c'));
        //return redirect()->route('app.index');


    }
    public function dep(data_layer $dat ,$q = null)
    {
        DB::table('data_relation')->where('id',$q)->delete();
        $aps = DB::table('data_relation')
            ->join( 'application_layer','application_layer.id', '=', 'data_relation.comp_id')
            ->where('data_layer_id', $dat->id)
            ->where('frag', 'a')
            ->select('application_layer.name','data_relation.*')
            ->get();
        $ts = DB::table('data_relation')
            ->join('Type_collection', 'Type_collection.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*', 'Type_collection.name')
            ->where('frag', 'st')
            ->where('data_layer_id', $dat->id)
            ->get();
        $bs = DB::table('data_relation')
            ->join('Business_layer', 'Business_layer.id', '=', 'data_relation.comp_id')
            ->select('data_relation.*', 'Business_layer.name')
            ->where('frag', 'b')
            ->where('data_layer_id', $dat->id)
            ->get();
        // ddd($ts);
        $apps = Application_layer::all();
        $aq1 = DB::table('data_relation')
            ->select('comp_id')
            ->where('frag', 'a')
            ->where('data_layer_id', $dat->id)
            ->get();
        $techs = Type_collection::all();
        $tq1 = DB::table('data_relation')
            ->select('comp_id')
            ->where('frag', 'st')
            ->where('data_layer_id', $dat->id)
            ->get();
        $buss = Business_layer::all();
        $bq1 = DB::table('data_relation')
            ->select('comp_id')
            ->where('frag', 'b')
            ->where('data_layer_id', $dat->id)
            ->get();
        $list = Type_collection::pluck('name', 'id');
        return view('dat.edit',compact('dat','list','aps','ts','bs','apps','aq1','techs','tq1','buss','bq1'));
    }

}
