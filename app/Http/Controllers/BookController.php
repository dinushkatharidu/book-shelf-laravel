<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = auth()->user()->books;

        return view('books.index', ['allBooks' => $books]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:3',
            'author' => 'required',
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'user_id' => auth()->id()
        ]);
        return redirect('/books')->with('success', "Book Stored Successfuly!");
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        if ($book->user_id !== auth()->id()) {
            abort(403, 'Unauthrized Action');
        }

        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|min:3',
            'author' => 'required',
        ]);

        $book = Book::findOrFail($id);

        if($book->user_id !== auth()->id()){
            abort(403, 'Unautharized Action');
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
        ]);

        return redirect('/books')->with('success', "Book Details Changed Successfuly");
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if($book->user_id !== auth()->id()){
            abort(403, 'Unautharized Action!');
        }

        $book->delete();
        return redirect('/books')->with('success', "Book Removed Succesfuly!");
    }
}
