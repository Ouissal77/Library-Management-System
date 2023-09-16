<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct(Author $author)
    {
        $this->author = $author;
    }
    public function index(){
        $authors=Author::all();
        return view('authors.index')->with([
            'authors' =>  $authors,
        ]);
    }

    public function create(){

        return view('authors.form')->with([
            'model'=> $this->author,
            'action'=> route('admin.authors.store'),


        ]);
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            // Add other validation rules for book attributes
        ]);
        $author = new Author();
        $author->fill($request->all());
        $author->save();
        return redirect()->route('admin.authors.index')->with('success', 'Book created successfully!');


    }

    public function edit($id){
        $author=Author::find($id);

        return view('authors.form')->with([
            'model'=>$author,
            'action'=> route('admin.authors.update',$id),


        ]);
    }

    public function update(Request $request,$id){
        $author=Author::find($id);
        $author->update($request->all());
        return redirect(route('admin.authors.index'))->with(['success'=>'Product updated successfully']);

    }
    public function delete($id){
        $author=Author::find($id);
        if($author){
            $author->delete();
            return redirect(route('admin.authors.index'))->with(['success'=>'Product deleted successfully']);
        }else{
            return redirect(route('admin.authors.index'))->with(['error'=>'Product Not found']);

        }
    }
    public function show($id){
        $author=Author::find($id);
        return view( 'authors.details'

        );
    }
}
