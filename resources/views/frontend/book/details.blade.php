
@extends('frontend.layout.master')

@section('title','Home Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
            </div>
        </div>
    </div>

    <section class="book-detail">
    <div class="container book-detail-body">
        <div class="row">
            <div class="headline-book-detail"><p>Book Details</p></div>
            <div class="col-4 book-detail-sigment">
                <div class="text-center img-thumbnail img-thumb">
                    <img src="{{ asset('storage/book_photos').'/'. $book->book_photo }}" class="rounded" alt="...">
                </div>
            </div>
            <div class="col-8 book-detail-information">
                <p class="book-name">{{ $book->book_title }}</p>
                <p>by
                    @foreach($book->authors as $author)
                        <a href="">{{  $author->author_name }} </a>
                    @endforeach
                </p>
                <p class="category-name">Category:
                    @foreach($book->categories as $category)
                        <a href="">{{  $category->name }} </a>
                    @endforeach
                </p>
                <p>{{ $book->book_description }}</p>
                <p class="price-tag">Price: {{ $book->price }} Tk.</p>
                <form class="kt-form kt-form--label-right" action="{{ route('cart.store') }}" method="post" >
                    @csrf
                <div class="cart-image quantity">
                    <button class="minus-btn" type="button" name="button">
                        <img src="{{ asset('images/minus.svg') }}" alt="" />
                    </button>

                    <input type="text" name="quantity" value="1">

                    <button class="plus-btn" type="button" name="button">
                        <img src="{{ asset('images/plus.svg') }}" alt="" />
                    </button>
                </div>
                    <input type="hidden" name="id" value="{{ $book->id }}">
                    <input type="hidden" name="name" value="{{ $book->book_title }}">
                    <input type="hidden" name="price" value="{{ $book->price }}">

                    <button type="submit" class="addtocart-btn">
                        <img class="image" src="{{ asset('images/shopping-cart-empty-side-view.svg') }}" alt="">
                        <p>Add to Cart</p>
                    </button>
                </form>

            </div>
        </div>
    </div>

</section>
@endsection

@section('page-script')
    <script type="text/javascript">
        $('.minus-btn').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('div').find('input');
            var value = parseInt($input.val());

            if (value > 1) {
                value = value - 1;
            } else {
                value = 0;
            }

            $input.val(value);

        });

        $('.plus-btn').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('div').find('input');
            var value = parseInt($input.val());

            if (value < 100) {
                value = value + 1;
            } else {
                value =100;
            }

            $input.val(value);
        });
    </script>
@stop



