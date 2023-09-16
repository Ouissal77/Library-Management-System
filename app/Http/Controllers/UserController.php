<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class UserController extends Controller
{
    public function index(){
        $books=Book::all();
       return view('users.home')-> with([
           'books'=>$books
       ]);
    }

    public function bookInfo($id){
        $book=Book::findOrFail($id);
        $user = Auth::user();

        return view('users.book-details')->with([
            'book'=>$book,
            'user'=>$user
        ]);

    }




    public function borrow(Request $request, $bookId, $userId)
    {

        if($request->terms==1){
            set_time_limit(120); // Set to 120 seconds (2 minutes)

            // Get the authenticated user
            $user = Auth::user();

            // Find the book and user based on the IDs
            $book = Book::findOrFail($bookId);

            // Calculate expiration date
            $expirationDate = now()->addDays(7);

            $book->decrement('quantity');
            if ($book->quantity <= 0) {
                $book->status = 0; // All copies are borrowed
                $book->save();
            }
            $user->borrowedBooks()->attach($book, ['expiration_date' => $expirationDate]);


            // Generate PDF ticket
            $pdf = PDF::loadView('users.ticket', [
                'user' => $user,
                'book' => $book,
                'expirationDate' => $expirationDate,
            ]);
           // redirect('/users')->with('success', 'Book borrowed successfully.');
            $pdfFileName = 'ticket.pdf';
            $pdf->save(storage_path('app/public/' . $pdfFileName)); // Save the PDF to storage
            return redirect('/users')->with('pdf_path', 'storage/' . $pdfFileName)->with('success', 'Book borrowed successfully.');

            //  return  $pdf->download('ticket.pdf');
//            return     redirect('/users')->with('success', 'Book borrowed successfully.');

        }
        else{
            return redirect('/users')->with('error', 'Please agree to the borrowing terms first.');
;
        }




    }

    public function ticket($bookId){
        // Get the authenticated user
        $user = Auth::user();

        // Find the book and user based on the IDs
        $book = Book::findOrFail($bookId);
        $expirationDate = $user->borrowedBooks->find($book->id)->pivot->expiration_date;
        return view('users.ticket')->with([
            'book'=>$book,
            'user'=>$user,
            'expirationDate' => $expirationDate,

        ]);
    }


}
