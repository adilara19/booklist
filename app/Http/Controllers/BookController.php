<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('author', 'ASC')
            ->paginate(10);

        return view('book.list', compact('books'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $book = new Book();
            $book->author = $request->input('author');
            $book->title = $request->input('title');
            $book->body = $request->input('body');

            $book->save();

            return redirect()->back()->with('messages', 'Book has been added successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the book.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('book.detail', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Formdan gelen verileri kontrol et
        $this->validate($request, [
            'author' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $book = Book::find($request->id);

        if (!$book) {
            return redirect()->back()->with('error', 'Book not found.');
        }

        $book->author = $request->author;
        $book->title = $request->title;
        $book->body = $request->body;

        $book->update();
        return redirect()->back()->with('messages', 'Book has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->back()->with('messages', 'Book has been deleted successfully!');
    }
}
