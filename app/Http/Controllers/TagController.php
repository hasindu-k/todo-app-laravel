<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    // Show the form for creating a new tag
    public function create()
    {
        return view('tags.create');
    }

    // Store a newly created tag in storage
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        $newTag = Tag::create($data);
        return redirect()->route('tags.index');
    }

    // Show the form for editing the specified tag
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    // Update the specified tag in storage
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        $tag->update($data);

        return redirect()->route('tags.index');
    }

    // Remove the specified tag from storage
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
