<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        
        return view('tablegallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('tablegallery.create');
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
        ]);
    
        // Handle the file upload with custom filename using storeAs()
        if ($request->hasFile('image')) {
            // Get the file from the request
            $file = $request->file('image');
    
            // Create a custom filename (you can customize this as needed)
            $filename = time() . '-' . $file->getClientOriginalName();
    
            // Store the file in the 'public/galleries' directory
            // This will store the file in the specified directory and return the file path.
            $file->storeAs('public/galleries', $filename);
        }
    
        // Store the gallery information in the database
        $gallery = new Gallery();
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
        
        // Store only the filename, not the full path
        $gallery->image = $filename;
                
        $gallery->user_id = Auth::id();
        $gallery->save();
    
        // Redirect or return a response
        return redirect('tablegallery/index')->with('success', 'Gallery created successfully!');
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

    public function show($id)
    {
        $gallery = Gallery::find($id);
        return view('tablegallery.show', compact('gallery'));
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
        if ( (Auth::user()->id == $gallery->user_id || Auth::user()->usertype == 'admin')){
            return view('tablegallery.edit', compact('gallery'));
        }

        return redirect('tablegallery/index');
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
        if ($request->hasFile('image')) {
            $gallery->image = $request->file('image')->store('public/galleries');
        }
        $gallery->save();
        return redirect('tablegallery/index');
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if ( (Auth::user()->id == $gallery->user_id 
                || Auth::user()->usertype == 'admin')){
        $gallery->delete();
        return redirect('tablegallery/index');  
    }
        return redirect('tablegallery/index');  
}}