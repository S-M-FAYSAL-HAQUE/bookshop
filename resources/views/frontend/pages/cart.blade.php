

@extends('frontend.layout.master')

@section('title','Home Page')

@section('content')

<section class="cart">
    <div class="container cart-body">
        <div class="sidebar">
            <div class="container checkout">
                <h4 style="">Checkout Summary</h4>
            </div>
            <div class="container checkout-summary" style="">
                <div class="payment-breakdown">
                    <div class="payment-breakdown-content">
                        <table class="payment-table">
                            <tbody>

                            <tr class="total-area">
                                <td class="total-line">Total</td>
                                <td class="total"><p>{{ \Cart::getSubTotal() }} Tk.</p></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        @if (Session::has('message'))
                            <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                    </div>
                </div>
            <div class="container my-cart">
                <p id="numberofproduct">My Cart ({{ \Cart::getContent()->count() }} Items)</p>
            </div>
            @if (\Cart::isEmpty())
                <p class="alert alert-warning">Your shopping cart is empty.</p>
            @else
            @foreach(\Cart::getContent() as $item)
                <div class="container cart-item">
                    <div class="row no-gutters">
                        <div class="col-2 col-xl-2">
                            <div class="book-cover">
                                <a href="{{ route('frontend.book.show',$item->id) }}"><img src="{{ asset('storage/book_photos').'/'. $item->attributes->book_photo }}" alt=""></a>
                            </div>
                            <div class="col-10 col-xl-10 col-md-12 col-sm-12 pl-lg-1 pl-xl-0">
                                <div class="book-info">
                                    <div class="book-info-content">
                                        <div class="book-info-content-book-meta">
                                            <a href="{{ route('frontend.book.show',$item->id) }}"> {{ $item->name }} </a>

                                        </div>

                                        <div class="book-info-content-quantity">
                                            <p>{{ $item->quantity }}</p>
                                        </div>

                                        <div class="book-info-content-book-action">
                                            <a href="{{ route('checkout.cart.remove', $item->id) }}" class="btn btn-outline-danger"> Remove </a>
                                        </div>

                                        <div class="book-info-content-price">
                                            <div class="price-info d-flex justify-content-between">
                                                <p class="price">
                                                    {{ $item->price }}
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif




        </div>
    </div>
</section>
@endsection
