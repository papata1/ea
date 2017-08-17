<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\BuslvRequest;
use App\Department;
use App\Buslv1;
use App\Http\Requests\DepartRequest;
use Illuminate\Support\Facades\DB;

class Bus_lv1Controller extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
      $des = DB::table('business_layer_lv1')->get();
      return view('bus_lv1.index', compact('des'));
    }
public function create(){


    return view('/bus_lv1.create');
    }
    public function store(BuslvRequest $request)
     {
       Buslv1::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

        return redirect()->route('lv1.index');
     }

     public function show($id)
     {

     }

     public function edit($id)
    {
       //ddd($de123);
     $de = Buslv1::findOrFail($id);
            //ddd($de); 

        return view('bus_lv1.edit',compact('de'));
    }

    public function update(BuslvRequest $request,$id)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       //$de->update($request->all());
        $candidate = Buslv1::findOrFail($id);
        $input = $request->all();
        $candidate->update($input);
       return redirect()->route('lv1.index')->with('message','item has been updated successfully');
   }

     public function destroy($id)
     {
        $del = Buslv1::findOrFail($id);
        $del->delete();
        return redirect()->route('lv1.index')->with('message','item has been deleted successfully');
     }
     public function all(){
       $lv = DB::table('business_layer')
            ->leftJoin('business_layer_lv3','business_layer_lv3.id', '=', 'business_layer.lv3_id')
            ->leftJoin('business_layer_lv2','business_layer_lv2.id', '=', 'business_layer_lv3.lv2_id')
            ->leftJoin('business_layer_lv1','business_layer_lv1.id', '=', 'business_layer_lv2.lv1_id')
            ->select('business_layer.name as lv4','business_layer_lv3.name as lv3','business_layer_lv2.name as lv2','business_layer_lv1.name as lv1')
            ->get();

             $lvtest = DB::table('business_layer_lv3')
            ->leftJoin('business_layer_lv2','business_layer_lv2.id', '=', 'business_layer_lv3.lv2_id')
            ->leftJoin('business_layer_lv1','business_layer_lv1.id', '=', 'business_layer_lv2.lv1_id')
            ->select('business_layer_lv3.id as idv3','business_layer_lv3.name as lv3','business_layer_lv2.name as lv2','business_layer_lv1.name as lv1')
            ->get();

      
      // foreach($lvtest as $key => $value){

      // $lv[$value->idv3] = $value->lv1."-".$value->lv2."-".$value->lv3;

      // }
            
       // ddd($lv);

    return view('busall',compact('lv'));
    }
}
