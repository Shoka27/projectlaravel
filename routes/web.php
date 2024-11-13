<?php

use App\Models\User;
use App\Models\Article;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('Welcome',['title' => 'Nocturnal Sanctuary']);
})->name('welcome');

Route::get('/dashboard', function () {
    return view('Dashboard');
})->name('dashboard');

Route::get('/articles', function () {
    return view('articles',['title' => 'Articles','articles'=> Article::all()]);
})->name('articles');

Route::get('/articles/{article}',function(Article $article){   
    return view('article',['title'=> 'Single Article' , 'article' => $article]);
});

Route::get('/Authors/{user}',function(User $user){   
    return view('author.index',
    ['title'=> 'Post by '.$user->name ,
     'articles' => $user->articles ,
     'galleries'=> $user->galleries
    ]); 
});

Route::get('image/{gallery}', function (Gallery $gallery) {
    return view('galleries.Gallery',['title' => 'Single Gallery','gallery'=>$gallery]);
})->name('gallery');

Route::get('galleries', function () {
    return view('galleries.Galleries',['title' => 'Galleries', 'galleries'=> Gallery::all()]);
})->name('galleries');




Route::group(['middleware' => ['auth']], function() {
// Gallrerys thing
Route::resource('galleries', GalleryController::class);
Route::get      ('/tablegallery/index',     [GalleryController::class, 'index'])->  name('gallery.index') ;
Route::get      ('/tablegallery/create',    [GalleryController::class, 'create'])-> name('gallery.create');
Route::post     ('/tablegallery/index',     [GalleryController::class, 'store'])->  name('gallery.store');
Route::get      ('/tablegallery/{id}/edit', [GalleryController::class, 'edit'])->   name('gallery.edit');
Route::put      ('/tablegallery/{id}',      [GalleryController::class, 'update'])-> name('gallery.update');
Route::delete   ('/tablegallery/{id}',      [GalleryController::class, 'destroy'])->name('gallery.destroy');
Route::get      ('/tablegallery/{id}',      [GalleryController::class, 'show'])->   name('gallery.show');


// Articles thing
Route::get('/tablearticle/index', [ArticleController::class, 'index'])->name('article.index') ;
Route::get('/tablearticle/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/tablearticle/index', [ArticleController::class, 'store'])->name('article.store');
Route::get('/tablearticle/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/tablearticle/{id}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/tablearticle/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
Route::get('/tablearticle/{id}', [ArticleController::class, 'show'])->name('article.show');


// dashboard
Route::get('profile/index',[ProfileController::class,'index'])->name('profile.index');
Route::delete('users/{id}', [ProfileController::class, 'destroy'])->name('users.destroy');

});


 
Route::get('gallery', function (Gallery $gallery) {
    return view('galleries.Gallery',['title' => 'Single Gallery','gallery'=>$gallery]);
})->name('gallery');

Route::get('galleries', function () {
    return view('galleries.Galleries',['title' => 'Galleries', 'galleries'=> Gallery::all()]);
})->name('galleries');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');


    

require __DIR__.'/auth.php';