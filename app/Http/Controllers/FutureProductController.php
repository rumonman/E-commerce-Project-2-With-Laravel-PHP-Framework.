<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Futureproduct;
use Image;
class FutureProductController extends Controller
{
  public function __construct()
 {
    $this->middleware('auth');
 }
public function index()
{
  $future_product=futureproduct::all();
  return view('futureproduct.index',compact('future_product'));
}
public function productcreate()
{
return view('futureproduct.create');
}

public function productinsert(Request $request)
{
  $validatedData = $request->validate([
'name' =>'required',
'title' =>'required',
'description' =>'required',
'code' =>'required',
]);
$future_product_id=futureproduct::insertGetId([
'name'=>$request->name,
'title'=>$request->title,
'description'=>$request->description,
'code'=>$request->code,
  ]);
if($request->hasFile('product_image')){
$future_photo_to_upload= $request->product_image;
$filename= $future_product_id.".".$future_photo_to_upload->getClientOriginalExtension();

Image::make($future_photo_to_upload)->resize(800,850)->save(base_path('public/upload/future/main/'.$filename));
futureproduct::find($future_product_id)->update([
'product_image'=> $filename
]);

  return back()->with('insert','Your Future Product Insert Successfully!');
}
}
public function productdelete($id)
{
  futureproduct::where('id',$id)->delete();
  return back()->with('delete','Your Future Product delete Successfully!');
}
public function view()
{
$future_products=Futureproduct::onlyTrashed()->get();
  return view('futureproduct.delete',compact('future_products'));
}
public function restore($id)
{
Futureproduct::onlyTrashed()->find($id)->restore();
return back()->with('restore','Your Future Product Restore Successfully!');
}
public function edit($id)
{
$edit_future=Futureproduct::findOrFail($id);
return view('futureproduct.edit',compact('edit_future'));
}
public function update(Request $request)
{
if($request->hasFile('product_image')){
if(Futureproduct::find($request->id)->product_image == 'defaultfutureimage.jpg'){
$future_photo_to_upload= $request->product_image;
$filename= $request->id.".".$future_photo_to_upload->getClientOriginalExtension();
Image::make($future_photo_to_upload)->resize(800,850)->save(base_path('public/upload/future/main/'.$filename));
futureproduct::find($request->id)->update([
'product_image'=> $filename
]);
}else{

 $delete_future_product=Futureproduct::find($request->id)->product_image;
 unlink(base_path('public/upload/future/main/'.$delete_future_product));
 $future_photo_to_upload= $request->product_image;
$filename= $request->id.".".$future_photo_to_upload->getClientOriginalExtension();
Image::make($future_photo_to_upload)->resize(800,850)->save(base_path('public/upload/future/main/'.$filename));
Futureproduct::find($request->id)->update([
'product_image'=> $filename
]);
}
}
Futureproduct::find($request->id)->update([
    'name'=>$request->name,
    'title'=>$request->title,
    'description'=>$request->description,
    'code'=>$request->code
  ]);
  return back()->with('update','Your Future Product Update Successfully!');
}

public function parmanentlydelete($id)
{
  $delete_future_product=Futureproduct::onlyTrashed()->find($id)->product_image;
 unlink(base_path('public/upload/future/main/'.$delete_future_product));

  Futureproduct::onlyTrashed()->find($id)->forceDelete();
  return back()->with('force','Your Future Product Force Delete Successfully!');
}
}