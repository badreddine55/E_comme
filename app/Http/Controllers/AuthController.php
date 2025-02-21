<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\ThrottleRequests;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login'); // Create this view
    }

    // Handle login request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',// Add Google reCAPTCHA validation
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->id]);
            return redirect()->route('home.index');
        }

        return back()->with('error', 'Invalid email or password');
    }

    // Logout function
    public function logout()
    {
        session()->forget('user_id');
        return redirect()->route('login');
    }

    // Show forgot password form
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password'); // Create this view
    }

    // Send password reset link
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'g-recaptcha-response' => 'required|captcha', // Add Google reCAPTCHA validation
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    // Show reset password form
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password', ['token' => $token]); // Create this view
    }

    // Handle password reset
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed|different:email', // Ensure password is different from email
            'password_confirmation' => 'required',
            'g-recaptcha-response' => 'required|captcha', // Add Google reCAPTCHA validation
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}