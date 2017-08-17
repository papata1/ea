<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\BuslvRequest;
use App\Department;
use App\Buslv3;
use App\Buslv2;
use App\Http\Requests\DepartRequest;
use Illuminate\Support\Facades\DB;

class Bus_lv3Controller extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
      $des = DB::table('business_layer_lv3')
             ->leftJoin('business_layer_lv2','business_layer_lv2.id', '=', 'business_layer_lv3.lv2_id')
             ->leftJoin('business_layer_lv1','business_layer_lv1.id', '=', 'business_layer_lv2.lv1_id')
      ->select('business_layer_lv3.*','business_layer_lv2.short as lv2','business_layer_lv1.short as lv1')
      ->get();
      return view('bus_lv3.index', compact('des'));
    }
    public function create(){

    $lv = Buslv2::where('select_lv','!=','2')
          ->join('business_layer_lv1', 'business_layer_lv2.lv1_id', '=', 'business_layer_lv1.id')
          ->pluck('business_layer_lv2.name','business_layer_lv2.id')
          ->all();

    return view('/bus_lv3.create', compact('lv'));
    }
    public function store(BuslvRequest $request)
     {
       Buslv3::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

        return redirect()->route('lv3.index');
     }

     public function show($id)
     {

     }

     public function edit($id)
    {
       //ddd($de123);
     $de = Buslv3::findOrFail($id);
    $lv = Buslv2::pluck('name', 'id')->toArray();
            //ddd($de); 

        return view('bus_lv3.edit',compact('de','lv'));
    }

    public function update(BuslvRequest $request,$id)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       //$de->update($request->all());
        $candidate = Buslv3::findOrFail($id);
        $input = $request->all();
        $candidate->update($input);
       return redirect()->route('lv3.index')->with('message','item has been updated successfully');
   }

     public function destroy($id)
     {
        $del = Buslv3::findOrFail($id);
        $del->delete();
        return redirect()->route('lv3.index')->with('message','item has been deleted successfully');
     }
}
