<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Futureproduct;
use App\Contuct;
use Mail;
use App\Mail\ContuctMessage;
use App\card;
Use Carbon\Carbon;

class PageController extends Controller
{
 
    public function index()
    {
      $all_products= Product::all();
      $all_futures=Futureproduct::all();
    	return view('index',compact('all_products','all_futures'));
    }

    public function details($id)
    {
    $single_product= Product::find($id);
    
    	return view('product.details', compact('single_product'));
    }

    public function futuredetails($id)
    {
        $future_product= Futureproduct::find($id);
        return view('futureproduct.details', compact('future_product'));
    }

   public function collection($id)
   {
     $categorys=Product::where('category_id',$id)->get();
       return view('page', compact('categorys'));
   }

   public function contuct()
   {
     return view('contuct');
   }

   public function contuctinsert(Request $request)
   {
     Contuct::insert([
     'name'=>$request->name,
     'email'=>$request->email,
     'subject'=>$request->subject,
     'message'=>$request->message
     ]);
      $name= $request->name;
      $massage= $request->message;
      Mail::to('rumon105@gmail.com')->send(new ContuctMessage($name,$massage));
      return back()->with('send','Your Message Send Successfully!');
   }
   
   public function addtocard($id)
   {
     $ip_address=$_SERVER['REMOTE_ADDR'];
      
      if(Card::where('customer_ip',$ip_address)->where('product_id',$id)->exists()){
       
        Card::where('customer_ip',$ip_address)->where('product_id',$id)->increment('product_quantity',1);
      }
      else
      {
       Card::insert([
      'customer_ip'=>$ip_address,
      'product_id'=>$id,
      'created_at'=>Carbon::now()
     ]);
      }
     return back();
   }
   public function card()
   {
    $card_items=Card::where('customer_ip',$_SERVER['REMOTE_ADDR'])->get();
     return view('card.view',compact('card_items'));
   }

    public function deleteformcard($id)
    {
      Card::find($id)->delete();
      return back();
    }
}
