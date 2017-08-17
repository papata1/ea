<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\ProRequest;
use App\Type_process;
use Illuminate\Support\Facades\DB;

class ProcController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
      $proc1 = DB::table('Type_process')->get();
      return view('proc.index', compact('proc1'));
    }
    public function create(){
    return view('/proc.create');
    }
    public function store(ProRequest $request)
     {
         Type_process::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

    /* $u = department::create([
           'name' => $request['name'],
           'remark' => $request['remark'],

       ]);*/
        return redirect()->route('proc.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit(Type_process $proc)
    {
        return view('proc.edit',compact('proc'));
    }

    public function update(DeRequest $request,Type_process $proc)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       $proc->update($request->all());
       return redirect()->route('proc.index')->with('message','item has been updated successfully');
   }

     public function destroy(Type_process $proc)
     {
        $proc->delete();
        return redirect()->route('proc.index')->with('message','item has been deleted successfully');
     }
}
