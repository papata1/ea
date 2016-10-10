<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DatRequest;
use App\data_layer;
use Illuminate\Support\Facades\DB;

class DatController extends Controller
{
    public function index(){
      //$dat = data_layer::all();
      $dats = DB::table('data_layer')->get();
      return view('dat.index', compact('dats'));
    }
    public function create(){
    return view('dat.create');
    }
    public function store(DatRequest $request)
     {

       $dat = new data_layer(array(
         'name' => $request->get('name'),
         'remark' => $request->get('remark'),
       ));
         $dat->save();

       //data_layer::create($request->all());
       return redirect()->route('dat.index')->with('message','item has been added successfully');

     }

     public function show($id)
     {

     }

     public function edit(data_layer $dat)
    {
        return view('dat.edit',compact('dat'));
    }

    public function update(DatRequest $request, data_layer $dat)
   {
       $dat->update($request->all());
       return redirect()->route('dat.index')->with('message','item has been updated successfully');
   }

     public function destroy(data_layer $dat)
     {
        $dat->delete();
        return redirect()->route('dat.index')->with('message','item has been deleted successfully');
     }
}
