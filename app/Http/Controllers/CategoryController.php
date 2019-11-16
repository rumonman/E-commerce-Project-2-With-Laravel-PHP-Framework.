<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;
class CategoryController extends Controller
{
public function __construct()
 {
    $this->middleware('auth');
 }

public function index()
{
	$all_category=Category::all();
	return view('category.view',compact('all_category'));
}
public function add()
{
	return view('category.add');
}
public function addcategoryform(Request $request)
{
$validatedData = $request->validate([
'category_name' => 'required|unique:categories,category_name',
]);
	
	if(isset($request->manu_status)){
		Category::insert([
'category_name'=>$request->category_name,
'manu_status'=>true,
'created_at'=>Carbon::now()
]);
	}else{
		Category::insert([
'category_name'=>$request->category_name,
'manu_status'=>false,
'created_at'=>Carbon::now()
]);
	}

return back()->with('insert','Your Category Insert Successfully!');
}
public function categoryeditform($id)
{
	$edits=Category::find($id);
	return view('category.edit',compact('edits'));
}
public function update(Request $request)
{
	Category::findOrFail($request->id)->update([
'category_name'=>$request->category_name
	]);
return back()->with('update','Your Category Update Successfully!');
}

public function exchange($id)
{
	if(Category::find($id)->manu_status==0){
      Category::find($id)->update([
       'manu_status'=> true
      ]);
	}else{
     Category::find($id)->update([
       'manu_status'=> false
      ]);
	}
	return back();
}
  public function softdelete($id)
  {
  	Category::find($id)->delete();
  	return back()->with('delete','Your Category Soft Delete Successfully!');
  }

  public function deletecategoryview()
  {
  	$delete_categorys=Category::onlyTrashed()->get();
  	return view('category.delete',compact('delete_categorys'));
  }

  public function restore($id)
  {
  	 Category::onlyTrashed()->find($id)->restore();
  	 return back()->with('restore','Your Category Restore Successfully!');
  }

  public function forsedelete($id)
  {
  	Category::onlyTrashed()->find($id)->forceDelete();
  	return back()->with('force','Your Category Parmanently Delete Successfully!');
  }
  
}