<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
     $users=User::all();
      return view('user.all',compact('users'));
    }

    public function softdelete($id)
    {
    	User::where('id',$id)->delete();

    	return back()->with('delete','Your User Delete Successfully!!!');
    }

    public function view()
    {
       $deleteing=User::onlyTrashed()->get();
      
       return view('user.delete', compact('deleteing'));
    }

    public function restore($id)
    {
       User::onlyTrashed()->where('id',$id)->restore();

       return back()->with('restore','Your User Restore Successfully!!!');
    }

    public function edit($id)
    {
    	$edit_user=User::find($id);

    	return view('user.edit', compact('edit_user'));
    }

    public function update(Request $Request)
    {
    	User::findOrFail($Request->id)->update([
         'first_name'=>$Request->first_name,
         'last_name'=>$Request->last_name,
         'email'=>$Request->email
    	]);
    	return back()->with('edit','Your Edited Successfully!!!');
    }

    public function forcedelete($id)
    {
       User::onlyTrashed()->where('id',$id)->forceDelete();

       return back()->with('forceDelete','Your User Parmanently Delete Successfully!!!');	
    }

    
}
