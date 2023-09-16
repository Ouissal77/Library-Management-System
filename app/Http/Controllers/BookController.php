<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Conversions\ImageGenerators\Pdf;

class BookController extends Controller
{
    public function __construct(Book $book)
    {
        $this->book = $book;
    }


    public function index(){
        $books = Book::all();
        return view('books.index')->with([
            'books' =>  $books,
        ]);
    }

    public function create(){
        $authors = Author::all();
        $categories = Category::all();
        return view('books.form')->with([
            'model'=> $this->book,
            'action'=> route('admin.books.store'),
            'authors'=>$authors,
            'categories' => $categories,

        ]);
    }
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            // Add other validation rules for book attributes
        ]);
        $image = $request->file('book_image');


        $book = new Book();
        $book->fill($request->all());
        if($request->hasFile('book_image')){
            $file=$request->file('book_image')->getClientOriginalName();
        }
        if($request->quantity>0){
            $book->status=1;
        }else {
            $book->status=0;

        }
        $book->save();


        $book->addMediaFromRequest('book_image')->toMediaCollection();

        // Attach the selected categories to the book using the `attach` method
        $categories = $request->input('categories'); // This should be an array of selected category IDs
        $book->categories()->attach($categories);

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully!');
   }


    public function edit($id){
        $book=Book::find($id);
        $authors = Author::all();
        $categories = Category::all();
        return view('books.form')->with([
            'model'=>$book,
            'action'=> route('admin.books.update',$id),
            'authors'=>$authors,
            'categories' => $categories,

        ]);
    }
    public function update(Request $request , $id){
        $book=Book::find($id);
        $book->status = $request->has('status') ? 1:0;
        $book->update($request->all());
        $categories = $request->input('categories'); // This should be an array of selected category IDs
        $book->categories()->detach();
        $book->categories()->attach($categories);
        return redirect(route('admin.books.index'))->with(['success'=>'Product updated successfully']);
    }

    public function delete($id){
        $book=Book::find($id);
        if($book){
            $book->delete();
            return redirect(route('admin.books.index'))->with(['success'=>'Product deleted successfully']);
        }else{
            return redirect(route('admin.books.index'))->with(['error'=>'Product Not found']);

        }
    }

    public function show($id){
        $book=Book::find($id);
        return view( 'books.details')->with([
            'book'=>$book,
        ]);
    }


}
