<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class BookController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->query('search');

        $books = auth()->user()->books()
            ->with('category')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('author', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        return view('books.index', [
            'allBooks' => $books,
            'search' => $search
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:3',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
        }

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'image' => $imagePath,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
        ]);
        return redirect('/books')->with('success', "Book Stored Successfuly!");
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();

        if ($book->user_id !== auth()->id()) {
            abort(403, 'Unauthrized Action');
        }

        // return view('books.edit', ['book' => $book]);
        return view('books.edit', compact('book', 'categories'), ['book' => $book]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|min:3',
            'author' => 'required',
        ]);

        $book = Book::findOrFail($id);

        if ($book->user_id !== auth()->id()) {
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

        if ($book->user_id !== auth()->id()) {
            abort(403, 'Unautharized Action!');
        }

        $book->delete();
        return redirect('/books')->with('success', "Book Removed Succesfuly!");
    }
}
