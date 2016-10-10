<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AppRequest;
use App\Application_layer;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
  public function __construct()
  {
      //$this->middleware('auth');
      //$this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
      $apps = DB::table('application_layer')->get();
      return view('app.index', compact('apps'));
    }
    public function create(){
    return view('app.create');
    }
    public function store(AppRequest $request)
     {

       $app = new application_layer(array(
        'name' => $request->get('name'),
        'develop_language' => $request->get('develop_language'),
        'app_database' => $request->get('app_database'),
        'develop_company' => $request->get('develop_company'),
        'getting_start_years' => $request->get('getting_start_years'),
        'app_relation' => $request->get('app_relation'),
        'remark' => $request->get('remark'),
        'ma_cost' => $request->get('ma_cost'),
        'department_id' => $request->get('department_id')
       ));
         $app->save();

       //application_layer::create($request->all());
       return redirect()->route('app.index')->with('message','item has been added successfully');

     }

     public function show($id)
     {

     }
    public function moveup($app)
    {
        $idapp =$app;
        $idapp--;
        DB::table('application_layer')
            ->where('id', $app)
            ->update(['id' => 9999]);
        DB::table('application_layer')
            ->where('id', $idapp)
            ->update(['id' => $app]);
        DB::table('application_layer')
            ->where('id', 9999)
            ->update(['id' => $idapp]);
        return redirect()->route('app.index')->with('message','item has been move successfully');
    }
    public function movedown($app)
    {
        $idapp =$app;
        $idapp++;
        DB::table('application_layer')
            ->where('id', $app)
            ->update(['id' => 9999]);
        DB::table('application_layer')
            ->where('id', $idapp)
            ->update(['id' => $app]);
        DB::table('application_layer')
            ->where('id', 9999)
            ->update(['id' => $idapp]);
        return redirect()->route('app.index')->with('message','item has been move successfully');
    }

     public function edit(application_layer $app)
    {
        return view('app.edit',compact('app'));
    }

    public function update(AppRequest $request, application_layer $app)
   {
       $app->update($request->all());
       return redirect()->route('app.index')->with('message','item has been updated successfully');
   }

     public function destroy(application_layer $app)
     {
        $app->delete();
        return redirect()->route('app.index')->with('message','item has been deleted successfully');
     }
}
