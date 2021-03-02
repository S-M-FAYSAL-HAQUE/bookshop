
@extends('frontend.layout.master')

@section('title','Home Page')

@section('content')


    <section class="sign-up-book-image">
        <div class="container sign-up-book-image-body">
            <img src="images/book-image2.jpg" alt="">
        </div>
    </section>

    <section class="sign-up">
        <div class="container sign-in-body">
            <div class="signup">
                <h1 class="container signup-test-1  col-8 col-sm-8 col-md-6">SIGN UP</h1>
                <h3 class="container signup-test-2  col-8 col-sm-8 col-md-6">Register fast with your google</h3>
                <div class="container google-photo">
                    <img class="container col-2 col-sm-8 col-md-6" src="{{ asset('images/google.svg') }}" alt="">
                </div>
                <h2 class="container signup-test-3  col-8 col-sm-8 col-md-6"> <b>OR</b></h2>
                <h3 class="container signup-test-4  col-8 col-sm-8 col-md-6">Register with your information</h3>
                <form method="POST" action="{{ route('customer.register') }}">
                    @csrf
                    <section class="container-fluid emmail-password">
                        <section class="row justify-content-center">
                            <section class="col-8 col-sm-8 col-md-6">
                                <div class="emmail-password-body">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        <small id="emailHelp" class="form-text text-muted ">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword2">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>


                                </div>
                            </section>
                        </section>
                    </section>

                    <div class="container sign-up-button">
                        <div class="container text-sign-up-button col-12 col-sm-8 col-md-6">
                            <button type="submit">Create Account</button>
                        </div>
                    </div>
                </form>
                <h3 class="container signup-test-5  col-8 col-sm-8 col-md-6">Already have an account?</h3>
                <h1 class="container signup-test-6  col-8 col-sm-8 col-md-6"> <a href="signin.html">Login Now!</a></h1>



            </div>
        </div>
    </section>

@endsection
