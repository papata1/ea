<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\BuslvRequest;
use App\Department;
use App\Buslv2;
use App\Buslv1;
use App\Http\Requests\DepartRequest;
use Illuminate\Support\Facades\DB;

class Bus_lv2Controller extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
      $des = DB::table('business_layer_lv2')
       ->leftJoin('business_layer_lv1','business_layer_lv1.id', '=', 'business_layer_lv2.lv1_id')
       ->select('business_layer_lv2.*','business_layer_lv1.short as lv1')
      ->get();
      return view('bus_lv2.index', compact('des'));
    }
    public function create(){

    $lv = Buslv1::pluck('name', 'id')->toArray();
    return view('/bus_lv2.create', compact('lv'));
    }
    public function store(BuslvRequest $request)
     {
       Buslv2::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

        return redirect()->route('lv2.index');
     }

     public function show($id)
     {

     }

     public function edit($id)
    {
       //ddd($de123);
     $de = Buslv2::findOrFail($id);
    $lv = Buslv1::pluck('name', 'id')->toArray();
            //ddd($de); 

        return view('bus_lv2.edit',compact('de','lv'));
    }

    public function update(BuslvRequest $request,$id)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       //$de->update($request->all());
        $candidate = Buslv2::findOrFail($id);
        $input = $request->all();
        $candidate->update($input);
       return redirect()->route('lv2.index')->with('message','item has been updated successfully');
   }

     public function destroy($id)
     {
        $del = Buslv2::findOrFail($id);
        $del->delete();
        return redirect()->route('lv2.index')->with('message','item has been deleted successfully');
     }
}
