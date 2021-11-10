<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Livewire\Home\Home\Index::class)
    ->name('home.index');

Route::get('/login', function () {
    return redirect(\route('user.login-register'));
})->name('login');

Route::get('/register', function () {
    return redirect(\route('user.login-register'));
})->name('register');

//=====================================>//category and Subcategory
Route::middleware('web')->prefix('main')->group(function () {
    Route::get('/{category}', \App\Http\Livewire\Home\Category\Index::class);

    //Multi-database part
//Route::get('/electronic-devices',\App\Http\Livewire\Home\Category\Electronic\Index::class)
//->name('category.electronic.index');

//Route::get('/vehicles',\App\Http\Livewire\Home\Category\Vehicle\Index::class)
//->name('category.electronic.index');

//Route::get('/apparel',\App\Http\Livewire\Home\Category\Apparel\Index::class)
//->name('category.apparel.index');

//Route::get('/mother-and-child/',\App\Http\Livewire\Home\Category\Child\Index::class)
//->name('category.child.index');
});

Route::middleware('web')->prefix('search')->group(function () {
    Route::get('/{category}', \App\Http\Livewire\Home\SubCategory\Index::class);
});

//=====================================>//single Product page
Route::middleware('web')->prefix('product')->group(function () {
    Route::get('/dkp-{id}/{product}', \App\Http\Livewire\Home\Product\Index::class);
});


//=====================================>//User page
Route::middleware('web')->prefix('users')->group(function () {
    Route::get('/login-register', \App\Http\Livewire\Home\User\Register::class)
        ->name('user.login-register');

    Route::get('/login/confirm/{user}', \App\Http\Livewire\Home\User\Confirm::class)
        ->name('users.confirm');

    Route::get('/login/confirm/password/{user}', \App\Http\Livewire\Home\User\ConfirmPassword::class)
        ->name('users.confirm.password');

    Route::get('/login/confirm/password/verify/{user}', \App\Http\Livewire\Home\User\ConfirmPasswordVerify::class)
        ->name('users.confirm.password.verify');

    Route::get('/register/confirm/{user}', \App\Http\Livewire\Home\User\Registerconfirm::class)
        ->name('users.register.confirm');

    Route::get('/password/forgot/{user}', \App\Http\Livewire\Home\User\ForgetPassword::class)
        ->name('users.password.confirm');

    Route::get('/password/forgot/phone/{user}', \App\Http\Livewire\Home\User\ForgetPasswordPhone::class)
        ->name('users.password.forgetPhone');

    Route::get('/password/reset/{user}', \App\Http\Livewire\Home\User\PasswordReset::class)
        ->name('users.password.reset');

    Route::get('/welcome', \App\Http\Livewire\Home\User\Welcome::class)
        ->name('users.welcome');

    Route::get('/logout', function () {
        auth()->logout();
        return redirect('/');
    });
});

//=====================================>//User Profile
Route::middleware('web')->prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', \App\Http\Livewire\Home\Profile\Index::class)
        ->name('profile.index');

    Route::get('/personal-info', \App\Http\Livewire\Home\Profile\PersonalInfo::class)
        ->name('profile.personal-info');

    Route::get('/favorites', \App\Http\Livewire\Home\Profile\Favorite::class)
        ->name('profile.favorite');

    Route::get('/wishlist/{favlist}/details/', \App\Http\Livewire\Home\Profile\FavlistShow::class)
        ->name('profile.fav;ist.show');

    Route::get('/addresses', \App\Http\Livewire\Home\Profile\Address::class)
        ->name('address.index');

    Route::get('/addresses/edit/{address}', \App\Http\Livewire\Home\Profile\AddressEdit::class)
        ->name('address.edit');

    Route::get('/user-history', \App\Http\Livewire\Home\Profile\UserHistory::class)
        ->name('user-history.index');

    Route::get('/notification', \App\Http\Livewire\Home\Profile\Notification::class)
        ->name('user-history.index');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//=====================================>//Post
Route::post('/newsletter', [PostController::class, 'newsletter'])
    ->name('post.newsletter');
