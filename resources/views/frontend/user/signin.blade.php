
@extends('frontend.layout.master')

@section('title','Sign in Page')

@section('content')

<section class="hello-image">
    <div class="container hello-image-body">
        <img src="images/hello-image.jpg" alt="">
    </div>
</section>

<section class="sign-in">
    <div class="container sign-in-body">
        <div class="signin">
            <h1 class="container signin-test-1  col-8 col-sm-8 col-md-6">SIGN IN</h1>
            <h3 class="container signin-test-2  col-8 col-sm-8 col-md-6">Login easily with your google account</h3>
            <div class="container google-photo">
                <img class="container col-2 col-sm-8 col-md-6" src="{{ asset('images/google.svg') }}" alt="">
            </div>
            <h2 class="container signin-test-3  col-8 col-sm-8 col-md-6"> <b>OR</b></h2>
            <h3 class="container signin-test-4  col-8 col-sm-8 col-md-6">Login with your email or phone number</h3>

            <form method="POST" action="{{ route('customer.login') }}">
                @csrf
                <section class="container-fluid emmail-password">
                    <section class="row justify-content-center">
                        <section class="col-8 col-sm-8 col-md-6">
                            <div class="emmail-password-body">
                                <div class="form-group">
                                    <label >Email address</label>
                                    <input type="email" class="form-control" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input"{{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div>
                            </div>
                        </section>
                    </section>
                </section>

                <div class="container sign-in-button">
                    <div class="container text-sign-in-button col-12 col-sm-8 col-md-6">
                        <button type="submit">SIGN IN</button>
                    </div>
                </div>
            </form>
            <h3 class="container signin-test-5  col-8 col-sm-8 col-md-6">Don’t have an account?</h3>
            <h1 class="container signin-test-6  col-8 col-sm-8 col-md-6"><a href="signup.html">Sign Up Now!</a></h1>



        </div>
    </div>
</section>

@endsection
