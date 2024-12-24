<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendVerificatinCode;
use Illuminate\Support\Facades\Mail;



class AuthController extends Controller
{
    // Show the registration form
    public function register() {
        return view('front.auth.register'); // Make sure this view exists
    }

    // Handle the user registration logic
    public function storeUser(Request $request) {
        // Validate the request data with custom error messages in English
        $data = $request->validate([
            'name' => 'required|string|max:255', // Name is required and must be a string with a max length of 255
            'email' => 'required|email|unique:users,email', // Email must be valid and unique in the users table
            'password' => 'required|string|min:8|confirmed', // Password must be at least 8 characters and match the confirmation field
        ], [
            'name.required' => 'Please enter your name', // Custom error message for the 'name' field
            'email.required' => 'Please enter your email', // Custom error message for the 'email' field if not provided
            'email.email' => 'The email address is invalid', // Custom error message if the email format is invalid
            'email.unique' => 'The email address is already taken', // Custom error message if the email is already registered
            'password.required' => 'Please enter your password', // Custom error message for the 'password' field
            'password.min' => 'The password must be at least 8 characters', // Custom error message if the password is too short
            'password.confirmed' => 'The password confirmation does not match', // Custom error message if password confirmation fails
        ]);

        // Encrypt the password before saving it to the database
        $data['password'] = bcrypt($data['password']);

        // Create a new user in the database
        $user = User::create($data);
        $user->code=500515;

        // Automatically log in the user after registration
        Mail::to($user->email)->send(new SendVerificatinCode($user));

        Auth::login($user);

      

        // Redirect to the home page with a success message
        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    // Show the login form
    public function login(Request $request) {
        return view('front.auth.login'); // Make sure this view exists
    }

    // Handle the login logic
    public function loginUser(Request $request) {
        // Validate the request data
        $request->validate([
            'email' => 'required|email', // Email must be valid and provided
            'password' => 'required', // Password must be provided
        ]);

        // Attempt to log in the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            // Redirect to the home page with a success message if login is successful
            return redirect()->route('home')->with('success', 'Login successful!');
        } else {
            // Redirect back with an error message if login fails
            return back()->withErrors(['error' => 'Invalid credentials, please try again.']);
        }
    }

    // Log out the user
    public function logout() {
        Auth::logout(); // Log out the currently authenticated user
        // Redirect to the login page after logging out
        return redirect()->route('login');
    }
}
