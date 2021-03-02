<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Publisher;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     *
     */
    public function index()
    {
        //
        $books = Book::all();
        return view('admin.pages.book.index', compact('books'));
    }

    /**
     *
     */
    public function create()
    {
        //
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('admin.pages.book.create',compact('publishers','authors','categories'));
    }

    /**
     *
     */
    public function store(Request $request)
    {

        $book = new Book();
        $book->book_title = $request->book_title;
        $book->book_description = $request->book_description;
        $book->quantity = $request->quantity;
        $book->publisher_id = $request->publisher_id;
        $book->price = $request->price;

        if ($request->hasFile('book_photo')){
            $filename = $request->file('book_photo')->getClientOriginalName();
            $request->file('book_photo')->storeAs('public/book_photos', $filename);
            $book->book_photo = $filename;
        }

        $book->save();

        $book->categories()->attach($request->categories);
        $book->authors()->attach($request->authors);

        return redirect()->route('books.index');
    }

    /**
     * @param Book $book
     * @return Book
     */
    public function show(Book $book)
    {
        //
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Book $book)
    {
        //
        Storage::disk('public')->delete('/book_photos/'.$book->book_photo);
        $book->delete();

        return redirect()->route('books.index');

    }
}
