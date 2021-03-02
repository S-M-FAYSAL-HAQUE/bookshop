<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Publisher;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function index()
    {
        $books = Book::orderBy('id','DESC')->take(4)->get();
        return view('frontend.index', compact('books'));
    }
    public function show($book)
    {
        $book =  Book::with('authors', 'categories')->findOrFail($book);

        return view('frontend.book.details', compact('book'));
    }

    public function signin()
    {
        return view('frontend.user.signin');
    }
    public function signup()
    {
        return view('frontend.user.signup');
    }
    public function newarival(){
        $books = Book::all();
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('frontend.pages.newarival',compact('books','publishers','categories','authors'));
    }
    public function allfilter(Request $request){

//        dd($request->query('author'));
        $books = Book::query();

        if ($request->input('publisher'))
        {
            $books->whereIn('publisher_id', $request->input('publisher'));
        }

        if ($request->input('category'))
        {
            $books->whereHas('categories',
            function ($query) use ($request)
            {
                $query->whereIn('id', $request->input('category'));
            });
        }
        if ($request->input('author'))
        {
            $books->whereHas('authors',
                function ($query) use ($request)
                {
                    $query->whereIn('id', $request->input('author'));
                });
        }

        $books = $books->get();
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('frontend.pages.newarivalfilter',compact('books','publishers','categories','authors'));
    }
    public function showcategory($id)
    {
        $book_category = Category::with('books')->findOrFail($id);
        return view('frontend.pages.categoryproduct',compact('book_category'));
    }

}
