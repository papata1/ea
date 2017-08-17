<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\devlopment_group;
use Illuminate\Support\Facades\DB;

class DevgController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
      $devg1 = DB::table('devlopment_group')->get();
      return view('devg.index', compact('devg1'));
    }
    public function create(){
    return view('/devg.create');
    }
    public function store(DeRequest $request)
     {
         Devlopment_group::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

    /* $u = department::create([
           'name' => $request['name'],
           'remark' => $request['remark'],

       ]);*/
        return redirect()->route('devg.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit(Devlopment_group $devg)
    {
        return view('devg.edit',compact('devg'));
    }

    public function update(DeRequest $request,Devlopment_group $devg)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       $devg->update($request->all());
       return redirect()->route('devg.index')->with('message','item has been updated successfully');
   }

     public function destroy(Devlopment_group $devg)
     {
        $devg->delete();
        return redirect()->route('devg.index')->with('message','item has been deleted successfully');
     }
}
