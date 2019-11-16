<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contuct;
Use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        
        return view('admin.index');
    }

    public function contuctmessageview()
    {
       $all_messages=Contuct::all();
       return view('contuct.view',compact('all_messages'));
    }

     public function deletecontuctmessage($id)
   {
       Contuct::where('id',$id)->delete();
       return back()->with('delete','Your Message Delete Successfully!');
   }

   public function view()
   {
     $delete_contuct= Contuct::onlyTrashed()->get();
    return view('contuct.delete', compact('delete_contuct'));
   }

   public function restore($id)
   {
     Contuct::onlyTrashed()->find($id)->restore();
     return back()->with('restore','Your Message Restore Successfully!');
   }

   public function forsedelete($id)
   {
     Contuct::onlyTrashed()->find($id)->forceDelete();
     return back()->with('force','Your Message Parmanently Delete Successfully!');
   }
}
