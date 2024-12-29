<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function index()
    {

        $education = Education::orderBy('id', 'desc')->get();
        return view('education.index', compact('education')); 
    }

    public function create()
    {
        return view('education.create');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'image' => 'required|image|max:1024|mimes:jpg,jpeg,png,webp',  
            'desc' => 'required|min:20',
        ], [
            'judul.required' => 'Judul wajib diisi!',
            'image.required' => 'Image wajib diisi!',
            'desc.required' => 'Deskripsi wajib diisi!',
        ]);

        
        $education = new Education();
        $education->judul = $validatedData['judul']; 
        $education->desc = $validatedData['desc'];  
        
        
        if ($request->hasFile('image')) {
            
            $imagePath = $request->file('image')->storeAs('artikel', $request->file('image')->getClientOriginalName(), 'public');
            $education->image = str_replace('public/', '', $imagePath); // Simpan nama file gambar tanpa prefix public/
        }

        
        $education->save();

        
        return redirect()->route('education.index')->with('success', 'Artikel berhasil disimpan!');
    }

    public function show($id)
    {
        
        $education = Education::findOrFail($id);
        return view('education.show', compact('education'));
    }

    public function exportPdf($id)
{
    
    $education = Education::findOrFail($id);

    
    $pdf = \PDF::loadView('education.pdf', compact('education'))->setPaper('a4', 'portrait');

    
    return $pdf->download('Artikel - ' . $education->judul . '.pdf');
}


    public function edit($id)
    {
        $education = Education::findOrFail($id);
        return view('education.edit', compact('education'));
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'image' => 'nullable|image|max:1024|mimes:jpg,jpeg,png,webp',  // Gambar optional untuk update
            'desc' => 'required|min:20',
        ]);

        // Menemukan artikel berdasarkan ID
        $education = Education::findOrFail($id);
        $education->judul = $validatedData['judul'];
        $education->desc = $validatedData['desc'];

        // Jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($education->image) {
                // Menghapus gambar lama
                Storage::delete('public/artikel/' . $education->image); // Menghapus file gambar yang lama
            }

            // Menyimpan gambar baru
            $imagePath = $request->file('image')->storeAs('artikel', $request->file('image')->getClientOriginalName(), 'public');
            $education->image = str_replace('public/', '', $imagePath); // Simpan nama file gambar tanpa prefix public/
        }

        // Update data di database
        $education->save();

        // Redirect dengan pesan sukses
        return redirect()->route('education.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Menghapus artikel berdasarkan ID
        $education = Education::findOrFail($id);

        // Menghapus gambar jika ada
        if ($education->image) {
            // Menghapus gambar dari storage
            Storage::delete('public/artikel/' . $education->image); // Menghapus file gambar dari storage
        }

        // Menghapus data dari database
        $education->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('education.index')->with('success', 'Artikel berhasil dihapus!');
    }


}
