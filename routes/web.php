<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/dashboard', function () {
    return redirect('/admin/dashboard');
});

Route::get('/admin/registrations', function () {
    return view('admin.registrations');
});

Route::get('/admin/runners', function () {
    return view('admin.runners');
});

Route::get('/admin/categories', function () {
    return view('admin.categories');
});

Route::get('/admin/reports', function () {
    return view('admin.reports');
});

Route::get('/admin/settings', function () {
    return view('admin.settings');
});

Route::get('/admin/sms-logs', function () {
    return view('admin.sms-logs');
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
