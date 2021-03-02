@extends('frontend.layout.master')

@section('title','Home Page')

@section('content')
    <section class="photo-text-search">
        <div class="container photo-text-search-area">
            <p id="photo-text">Find and Read any kind of Book <br><br>
                <input id="search-area" placeholder="Search your Book" type="search" name="" id="">
                <button id="search-button" type="submit">Search</button>
            </p>

        </div>
    </section>
    <section class="block-text">
        <div class="container" style="height: 70px; width: auto;">
            <ul >
                <li style="float: left; font-family: Georgia, 'Times New Roman', Times, serif; font-style: oblique; list-style: none;"><a href="{{ route('newarival') }}"><h2>New Arrival Books</h2></a></li>
                <li style="float: right; font-family: Georgia, 'Times New Roman', Times, serif; font-style: oblique; list-style: none; padding-right: 30px; padding-top: 10px;"><a href="{{ route('newarival') }}">View All</a></li>
            </ul>
        </div>
    </section>
    <section class="block-card">
        <div class="container d-flex justify-content-start block-card-area">
            <div class="row">

                @foreach($books as $book)
                    <div class="col">
                        <div class="card single-card" >
                            <img src="{{ asset('storage/book_photos').'/'. $book->book_photo }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->book_title }}</h5>
                                <p class="card-text"> {{ $book->book_description }}</p>
                                <a href="{{ route('frontend.book.show',$book->id) }}" class="btn btn-primary">Book Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
