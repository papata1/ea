<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\LangRequest;
use App\Develop_language;
use Illuminate\Support\Facades\DB;

class LangController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
      $lang1 = DB::table('Develop_language')->get();
      return view('lang.index', compact('lang1'));
    }
    public function create(){
    return view('/lang.create');
    }
    public function store(LangRequest $request)
     {
         Develop_language::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

    /* $u = department::create([
           'name' => $request['name'],
           'remark' => $request['remark'],

       ]);*/
        return redirect()->route('lang.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit(Develop_language $lang)
    {
        return view('lang.edit',compact('lang'));
    }

    public function update(DeRequest $request,Develop_language $lang)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       $lang->update($request->all());
       return redirect()->route('lang.index')->with('message','item has been updated successfully');
   }

     public function destroy(Develop_language $lang)
     {
        $lang->delete();
        return redirect()->route('lang.index')->with('message','item has been deleted successfully');
     }
}
