<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\UserRequest;
use App\Http\Requests\User1Request;
use App\User;
use App\Users;
use App\UserEdit;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function __construct()
  {
    //  $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function index(){
      //$app = application_layer::all();
      $users = DB::table('Users')->get();
      return view('user.index', compact('users'));
    }
    public function create(){
    return view('/user.create');
    }
    public function store(UserRequest $request)
     {
       //user::create($request->all());
       //return redirect()->route('user.index')->with('message','item has been added successfully');

     $u = User::create([
           'name' => $request['name'],
           'email' => $request['email'],
            'role' => $request['role'],
           'password' => bcrypt($request['password']),

       ]);
        return redirect()->route('user.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit(user $user)
    {
        return view('user.edit',compact('user'));
    }

    public function update(User1Request $request,User $user)
   {
    //  $affectedRows = User::where('id',$user->id)->update(['name' => $user->name,'email' => $user->email,'role' => $user->role ]);
      /*$ue =   DB::table('users')
         ->where('id',$user->id)
         ->update(['name' => $user->name,'email' => $user->email,'role' => $user->role  ]

       );*/
       $user->update($request->all());
       return redirect()->route('user.index')->with('message','item has been updated successfully');
   }

     public function destroy(user $user)
     {
        $user->delete();
        return redirect()->route('user.index')->with('message','item has been deleted successfully');
     }
}
