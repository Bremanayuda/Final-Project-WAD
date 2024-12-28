<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Comment;
use Illuminate\Http\Request;


class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::with('comments')->get();
        return view('forums.index', compact('forums'));
    }

    public function create()
    {
        return view('forums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('forums', 'public') : null;

        Forum::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath
        ]);

        return redirect()->route('forums.index')->with('success', 'Post created successfully!');
    }

    public function show(Forum $forum)
    {
        return view('forums.show', compact('forum'));
    }

    public function edit(Forum $forum)
    {
        return view('forums.edit', compact('forum'));
    }

    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $forum->title = $request->title;
        $forum->content = $request->content;

        // Update image jika ada file baru
        if ($request->hasFile('image')) {
            // Hapus file lama
            if ($forum->image) {
                Storage::disk('public')->delete($forum->image);
            }
            $forum->image = $request->file('image')->store('uploads', 'public');
        }

        $forum->save();

        return redirect()->route('forums.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Forum $forum)
    {
        if ($forum->image) {
            Storage::disk('public')->delete($forum->image);
        }

        $forum->delete();
        return redirect()->route('forums.index')->with('success', 'Post deleted successfully!');
    }

    public function storeComment(Request $request, Forum $forum)
    {
        $request->validate([
            'author' => 'required|max:255',
            'content' => 'required'
        ]);

        $forum->comments()->create($request->only('author', 'content'));

        return redirect()->route('forums.show', $forum)->with('success', 'Comment added successfully!');
    }
    

}
