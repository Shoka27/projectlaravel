<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    

    public function index(Request $request)
    {
        $user = Auth::user();
    
        // Check if the user is an admin
        if ($user->usertype == 'admin') {
            // Admin can see all articles
            $articles = Article::query();
        } else {
            // Non-admin users can only see their own articles
            $articles = Article::where('author_id', $user->id);
        }
    
        // Apply search filter if present
        if ($request->has('search') && $request->search !== '') {
            $searchTerm = $request->search;
            $articles->where(function($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                      ->orWhere('body', 'like', '%' . $searchTerm . '%');
            });
        }
    
        // Get the articles
        $articles = $articles->get();
    
        return view('tablearticle.index', compact('articles'));
    }

    public function create()
    {
        return view('tablearticle.create');
    }
    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',  // Title must be a string and is required
        'body' => 'required|string',             // Body must be a string and is required
    ]);

    // Create a new Article instance
    $article = new Article();
    $article->title = $request->input('title'); // Get the title from the request
    $article->body = $request->input('body');   // Get the body from the request

    // Optionally, store the user ID if needed (for tracking who created the article)
    $article-> author_id = Auth::id(); // Store the user ID

    // Save the article to the database
    $article->save();

    // Redirect or return a response based on user type
    if (Auth::user()->usertype == 'admin') {
        return redirect('tablearticle/index')->with('success', 'Article created successfully!');
    } else {
        return redirect()->route('articles')->with('success', 'Article created successfully!'); // Redirect non-admins if needed
    }
}

    
    // public function store(Request $request)

    
    // {
    //     
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);        
    //     $gallery = new Gallery();
    //     $gallery->title = $request->input('title');
    //     $gallery->description = $request->input('description');
    //     $gallery->image = $request->file('image')->store('public/galleries');
    //     $gallery->user_id = $userId;
    //     $gallery->save();
    //     return redirect('tablegallery/index');    }
    //                                 @if (auth()->check() && (auth()->user()->id == $article->author_id || auth()->user()->usertype == 'admin'))


    public function show($id)
    {
        $article = Article::find($id);
        return view('tablearticle.show', compact('article'));
        if (Auth::user()->usertype == 'admin') {
            return redirect('tablearticle/index')->with('success', 'Article created successfully!');
        }
    }

    public function edit($id)
    {
        $article = Article::find($id);
        if  (Auth::user()->id == $article->author_id || Auth::user()->usertype == 'admin'){
            return view('tablearticle.edit', compact('article'));
        }

        return redirect('tablearticle/index');
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->save();
        return redirect('tablearticle/index');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('tablearticle/index');    
    }
}