<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\PlaceRequest;
use App\Place;
use Illuminate\Support\Facades\DB;

class PlaceController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
      $place1 = DB::table('Place')->get();
      return view('place.index', compact('place1'));
    }
    public function create(){
    return view('/place.create');
    }
    public function store(PlaceRequest $request)
     {
         Place::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

    /* $u = department::create([
           'name' => $request['name'],
           'remark' => $request['remark'],

       ]);*/
        return redirect()->route('place.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit(Place $place)
    {
        return view('place.edit',compact('place'));
    }

    public function update(DeRequest $request,Place $place)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       $place->update($request->all());
       return redirect()->route('place.index')->with('message','item has been updated successfully');
   }

     public function destroy(Place $place)
     {
        $place->delete();
        return redirect()->route('place.index')->with('message','item has been deleted successfully');
     }
}
