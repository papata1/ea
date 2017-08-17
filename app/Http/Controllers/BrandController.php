<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\BrandRequest;
use App\Http\Requests\DeRequest;
use App\Brand;
use Illuminate\Support\Facades\DB;
use  Illuminate\Database\Eloquent\Model;

class BrandController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
      $brand1 = DB::table('brand')->get();
      return view('brand.index', compact('brand1'));
    }

    public function create(){

    return view('brand.create');

    }

    public function store(BrandRequest $request)
     {
         Brand::create($request->all());
       //return redirect()->route('de.index')->with('message','item has been added successfully');

    /* $u = department::create([
           'name' => $request['name'],
           'remark' => $request['remark'],

       ]);*/
        return redirect()->route('brand.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit(Brand $brand)
    {

        return view('brand.edit',compact('brand'));
    }

    public function update(DeRequest $request,Brand $brand)
   {
    //  $affectedRows = de::where('id',$de->id)->update(['name' => $de->name,'email' => $de->email,'role' => $de->role ]);
      /*$ue =   DB::table('des')
         ->where('id',$de->id)
         ->update(['name' => $de->name,'email' => $de->email,'role' => $de->role  ]

       );*/
       $brand->update($request->all());
       return redirect()->route('brand.index')->with('message','item has been updated successfully');
   }

     public function destroy(Brand $brand)
     {
        $brand->delete();
        return redirect()->route('brand.index')->with('message','item has been deleted successfully');
     }
}
