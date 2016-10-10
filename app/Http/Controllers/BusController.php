<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\BusRequest;
use App\Business_layer;
use Illuminate\Support\Facades\DB;

class BusController extends Controller
{
    public function index(){
      //$bus = Business_layer::all();
      $buss = DB::table('Business_layer')->get();
      return view('bus.index', compact('buss'));
    }
    public function create(){
    return view('bus.create');
    }
    public function store(BusRequest $request)
     {

       $bus = new Business_layer(array(
         'name' => $request->get('name'),
         'remark' => $request->get('remark'),
         'department_id'  => $request->get('department_id')
       ));
         $bus->save();

        $fileName = $bus->id . '.' .
        $request->file('file')->getClientOriginalExtension();

        $request->file('file')->move(
        base_path() . '/public/images/bus/', $fileName

      );
      $busfile =  DB::table('Business_layer')
            ->where('id', $bus->id)
            ->update(['workflow_path' => $fileName]);
       //Business_layer::create($request->all());
       return redirect()->route('bus.index')->with('message','item has been added successfully');

     }

     public function show($id)
     {

     }

     public function edit(Business_layer $bus)
    {
        return view('bus.edit',compact('bus'));
    }

    public function update(BusRequest $request, Business_layer $bus)
   {
       $bus->update($request->all());
       return redirect()->route('bus.index')->with('message','item has been updated successfully');
   }

     public function destroy(Business_layer $bus)
     {
        $bus->delete();
        return redirect()->route('bus.index')->with('message','item has been deleted successfully');
     }
}
