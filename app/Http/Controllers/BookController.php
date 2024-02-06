<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.book.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.book.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //

        Book::create($request->validated());
        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        return view('admin.book.edit',[ 'book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', "Book  updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', "Book $book->title delete successfully");
    }


    public function all()
    {
        //
        return view('index',[ 'books'=>Book::paginate(5)]);
    }
}
