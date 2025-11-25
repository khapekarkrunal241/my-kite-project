<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController as UserProductController;

// ========================
// FRONTEND ROUTES
// ========================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// Products Routes
Route::get('/products', [UserProductController::class, 'index'])->name('products.index');
Route::get('/products/search', [UserProductController::class, 'search'])->name('products.search');
Route::get('/products/{id}', [UserProductController::class, 'show'])->name('products.show');
Route::post('/products/{id}/add-to-cart', [UserProductController::class, 'addToCart'])->name('products.addToCart');

// Cart Routes
Route::get('/cart', [UserProductController::class, 'cart'])->name('cart');
Route::post('/cart/update/{id}', [UserProductController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/remove/{id}', [UserProductController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/clear', [UserProductController::class, 'clearCart'])->name('cart.clear');

// ========================
// AUTHENTICATION ROUTES
// ========================

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Illuminate\Http\Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/products');
    }
    
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
});

Route::post('/logout', function (Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Illuminate\Http\Request $request) {
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/admin/products')->with('success', 'Registration successful! Welcome to KRK Kite Hub!');
        
    } catch (\Exception $e) {
        return back()->withErrors(['email' => 'Registration failed. Please try again.']);
    }
});

// ========================
// ADMIN ROUTES (Protected with Auth)
// ========================

Route::prefix('admin')->middleware('auth')->group(function () {
    // Product Management
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});