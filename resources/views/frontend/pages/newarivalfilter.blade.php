@extends('frontend.layout.master')

@section('title','Home Page')

@section('content')

<section class="new-arrival-book">
    <div class="container new-arrival-book-body">
        <div class="sidebar">
            <form method="GET" action="{{ route('allfilter') }}">
                <div class="container filter">
                    <img src="{{ asset('images/filter.svg') }}" alt="">
                    <h4 style="">Filter</h4>
                </div>
                <div class="container subject" style="">
                    <h4 style="">Subject</h4>
                </div>
                <div class="container subject-name" style="">
                    @foreach( \App\Category::all() as $category)
                        <input type="checkbox" id="category-{{ $category->id }}" name="category[]" value="{{ $category->id }}"
                        @if(request()->has('category'))
                            {{ in_array($category->id,request()->query('category')) ? 'checked' : ''}}
                        @endif
                        >
                        <label for="category-{{ $category->id }}">{{ $category->name }}</label><br>
                    @endforeach
                </div>
                <div class="container writter" style="">
                    <h4 style="">Writter</h4>
                </div>
                <div class="container writter-name" style="">
                    @foreach(\App\Author::all() as $author)
                        <input type="checkbox" id="author-{{ $author->id }}" name="author[]" value="{{ $author->id }}"
                            @if(request()->has('author'))
                                {{ in_array( $author->id, request()->query('author') ) ? 'checked' : '' }}
                            @endif
                        >
                        <label for="author-{{ $author->id }}"> {{ $author->author_name }}</label><br>
                    @endforeach
                </div>

                <div class="container publishers" style="">
                    <h4 style="">Publishers</h4>
                </div>
                <div class="container publishers-name" style="">
                    @foreach(\App\Publisher::all() as $publisher)
                        <input type="checkbox" class="custom-control-input" id="publisher-{{ $publisher->id}}" name="publisher[]" value="{{ $publisher->id }}"
                        @if(request()->has('publisher'))
                            {{ in_array( $publisher->id, request()->query('publisher') ) ? 'checked' : '' }}
                        @endif
                        >
                        <label for="publisher-{{ $publisher->id }}"> {{ $publisher->publisher_name }}</label><br>
                    @endforeach
                </div>
                <button class="btn btn-primary" type="submit">Apply filter</button>
            </form>
        </div>
        <div class="main">
            <div class="container new-arrival-books">
                <p>New Arrival Books</p>
            </div>

            <div class="container new-arrival-books-body-block">
                @forElse($books as $book)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/book_photos').'/'. $book->book_photo }}" class="rounded" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->book_title }}</h5>
                            <p class="card-text">{{ $book->book_description }}</p>
                            <a href="{{ route('frontend.book.show',$book) }}" class="btn btn-primary">Book Details</a>
                        </div>
                    </div>
                    @empty
                        <h2 class="no-book">NO Books availabe with this filter</h2>
                @endforelse

            </div>
        </div>
    </div>
</section>
@endsection
