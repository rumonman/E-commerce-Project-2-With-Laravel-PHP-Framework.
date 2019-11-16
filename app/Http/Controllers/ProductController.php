<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use Image;
use App\Category;
class ProductController extends Controller
{
public function __construct()
{
$this->middleware('auth');
}
public function index()
{
$all_products=Product::all();
$productsall=Product::all()->count();
$all_categorys=Category::all();
return view('product.view',compact('all_products','productsall','all_categorys'));
}
public function crated()
{
 $categorys=Category::all();
return view('product.create',compact('categorys'));
}
public function addproductinsert(Request $request)
{
$validatedData = $request->validate([
'name' =>'required',
'category_id' =>'required',
'title' =>'required',
'description' =>'required',
'quantity' =>'required|numeric',
'code' =>'required',
'price' =>'required|numeric',
]);
$product_id=Product::insertGetId([
'name'=>$request->name,
'category_id'=>$request->category_id,
'title'=>$request->title,
'description'=>$request->description,
'quantity'=>$request->quantity,
'code'=>$request->code,
'price'=>$request->price
]);
if($request->hasFile('product_image')){
$photo_to_upload= $request->product_image;
$filename= $product_id.".".$photo_to_upload->getClientOriginalExtension();
Image::make($photo_to_upload)->resize(800,850)->save(base_path('public/upload/photos/main/'.$filename));
Product::find($product_id)->update([
'product_image'=> $filename
]);
return back()->with('insert','Your Product Insert Successfully!');
}
}
public function deleteproduct($id)
{
Product::where('id',$id)->delete();
return back()->with('delete','Your Product Delete Successfully!');
}
public function deleteproductview()
{
$delete_products=Product::onlyTrashed()->get();
return view('product.delete',compact('delete_products'));
}
public function restoreproductview($id)
{
Product::onlyTrashed()->where('id',$id)->restore();
return back()->with('restore','Your Product Restore Successfully!');
}
public function edit($id)
{
$edit_product=Product::findOrFail($id);
return view('product.edit',compact('edit_product'));
}
public function productupdate(Request $request)
{
if($request->hasFile('product_image')){
if(Product::find($request->id)->product_image == 'defaultimage.jpg'){
$photo_to_upload= $request->product_image;
$filename= $request->id.".".$photo_to_upload->getClientOriginalExtension();
Image::make($photo_to_upload)->resize(800,850)->save(base_path('public/upload/photos/main/'.$filename));
Product::find($request->id)->update([
'product_image'=> $filename
]);
}else{
$delete_product=Product::find($request->id)->product_image;
unlink(base_path('public/upload/photos/main/'.$delete_product));
$photo_to_upload= $request->product_image;
$filename= $request->id.".".$photo_to_upload->getClientOriginalExtension();
Image::make($photo_to_upload)->resize(800,850)->save(base_path('public/upload/photos/main/'.$filename));
Product::find($request->id)->update([
'product_image'=> $filename
]);
}
}
Product::find($request->id)->update([
'name'=>$request->name,
'title'=>$request->title,
'description'=>$request->description,
'quantity'=>$request->quantity,
'code'=>$request->code,
'price'=>$request->price
]);
return back()->with('update','Your Product Update Successfully!');
}
public function parmanentlydelete($id)
{
$delete_product=Product::onlyTrashed()->find($id)->product_image;
unlink(base_path('public/upload/photos/main/'.$delete_product));
Product::onlyTrashed()->find($id)->forceDelete();
return back()->with('force','Your Product Force Delete Successfully!');
}
}