<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{

    public function index()
    {
        $benefits = Benefit::all();

        return view('benefit.index', compact('benefits'));
    }

    public function create()
    {
        return view('benefit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'benefit' => 'required',
        ]);

        Benefit::create([
            'judul' => $request->judul,
            'benefit' => $request->benefit,
            'flagged' => $request->flagged,
        ]);

        return redirect()->route('benefit.index');
    }

    public function show(Benefit $benefit)
    {
        return view('benefit.show', compact('benefit'));
    }
    public function edit(Benefit $benefit)
    {
        return view('benefit.edit', compact('benefit'));
    }

    public function update(Request $request, Benefit $benefit)
    {

        $request->validate([
            'judul' => 'required',
            'benefit' => 'required',
        ]);

        $benefit->update([
            'judul' => $request->judul,
            'benefit' => $request->benefit,
            'flagged' => $request->flagged,
        ]);

        return redirect()->route('benefit.index');
    }

    public function destroy(Benefit $benefit)
    {
        $benefit->delete();

        return redirect()->route('benefit.index');
    }
}
