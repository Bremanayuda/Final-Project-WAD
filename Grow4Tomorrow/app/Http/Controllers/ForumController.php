<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;


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

    public function exportToPDF($id)
    {
        $forum = Forum::findOrFail($id);
        $pdf = Pdf::loadView('forums.pdf', compact('forum'));
        return $pdf->download('forum_post.pdf');
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

        if ($request->hasFile('image')) {
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
