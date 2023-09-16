<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index(){
        $categories = Category::all();
        return view('categories.index')->with([
            'categories'=>$categories,
        ]);
    }
    public function create()
    {
        return view('categories.form')->with([
            'model'=> $this->category,
            'action'=> route('admin.categories.store'),

        ]);
    }

    public function store(Request $request){
        $category = new Category();
        $category->fill($request->all());
        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'Book created successfully!');

    }
    public function edit($id){
        $category=Category::find($id);

        return view('categories.form')->with([
            'model'=>$category,
            'action'=> route('admin.categories.update',$id),


        ]);
    }

    public function update(Request $request,$id){
        $category=Category::find($id);
        $category->update($request->all());
        return redirect(route('admin.categories.index'))->with(['success'=>'Product updated successfully']);

    }
    public function delete($id){
        $category=Category::find($id);
        if($category){
            $category->delete();
            return redirect(route('admin.categories.index'))->with(['success'=>'Product deleted successfully']);
        }else{
            return redirect(route('admin.categories.index'))->with(['error'=>'Product Not found']);

        }
    }

    public function show($id){
        $category=Category::find($id);
        return view( 'categories.details'

        );
    }

}
