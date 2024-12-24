
        @extends('front.layout.app')
        @section('content')
        

     
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>New User</p>
                        <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <form method="POST" action="{{route('store.user')}}">
                                @csrf
                                @include('front._partials.message')
                                <div class="form-floating">
                                    <input class="form-control" id="name" value="{{old('name')}}" type="text" placeholder="Enter your name..." data-sb-validations="required" name="name" />
                                    <label for="name">Name</label>
                                    @error('name')
                                    <div class="text-danger" data-sb-feedback="name:required">{{$message}}</div>
                                      @enderror
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="email" type="email"  value="{{old('email')}}" placeholder="Enter your email..." data-sb-validations="required,email" name="email"/>
                                    <label for="email">Email address</label>
                                    @error('email')
                                    <div class="text-danger" data-sb-feedback="email:required">{{$message}}.</div>
                            
                                        @enderror
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="password" type="tel" placeholder="Enter your password ..." data-sb-validations="required" name="password"/>
                                    <label for="password">password </label>
                                    @error('password')
                                    <div class="text-danger" data-sb-feedback=" password:required">{{$message}}</div>
                                    @enderror
                                    <div class="form-floating">
                                        <input class="form-control" id="password_confirmation" type="password" placeholder="Enter your confirmed password ..." data-sb-validations="required" name="password_confirmation"/>
                                        <label for="password_confirmation">Confirmed Password</label>
                                        @error('password_confirmation')
                                        <div class="text-danger" data-sb-feedback="password_confirmation:required">{{$message}}</div>
                                        @enderror
                                    </div>
             
                                <!---->
                                <!-- This is what your users will see when the form-->
                                <!-- has successfully submitted-->
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Form submission successful!</div>
                                        To activate this form, sign up at
                                        <br />
                                        <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                    </div>
                                </div>
                               
                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @endsection
        