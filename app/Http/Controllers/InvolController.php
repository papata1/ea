<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Involved;
use Illuminate\Support\Facades\DB;

class InvolController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
      $invol1 = DB::table('Involved')->get();
      return view('invol.index', compact('invol1'));
    }
    public function create(){
    return view('/invol.create');
    }
    public function store(DeRequest $request)
     {
         Involved::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

    /* $u = department::create([
           'name' => $request['name'],
           'remark' => $request['remark'],

       ]);*/
        return redirect()->route('invol.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit(Involved $invol)
    {
        return view('invol.edit',compact('invol'));
    }

    public function update(DeRequest $request,Involved $invol)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       $invol->update($request->all());
       return redirect()->route('invol.index')->with('message','item has been updated successfully');
   }

     public function destroy(Involved $invol)
     {
        $invol->delete();
        return redirect()->route('invol.index')->with('message','item has been deleted successfully');
     }
}
