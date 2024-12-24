
@extends('front.layout.app')

@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('{{ asset('front') }}/assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Login</h1>
                    <span class="subheading">Have questions? I have answers.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Login</p>
                <div class="my-5">
                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login.user') }}">
                        @csrf
                        @include('front._partials.message') <!-- Message display partial -->

                        <div class="form-floating">
                            <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email..." />
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input class="form-control" id="password" type="password" name="password" placeholder="Enter your password..." />
                            <label for="password">Password</label>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit button -->
                        <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection