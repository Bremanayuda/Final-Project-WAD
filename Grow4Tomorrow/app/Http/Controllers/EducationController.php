<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function index()
    {
        // Menampilkan data education dengan urutan descending berdasarkan id
        $education = Education::orderBy('id', 'desc')->get();
        return view('education.index', compact('education')); // Menggunakan compact untuk mengirim variabel ke view
    }

    public function create()
    {
        return view('education.create');
    }

    public function store(Request $request)
    {
        // Aturan validasi input
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'image' => 'required|image|max:1024|mimes:jpg,jpeg,png,webp',  // Maksimal ukuran 1MB
            'desc' => 'required|min:20',
        ], [
            'judul.required' => 'Judul wajib diisi!',
            'image.required' => 'Image wajib diisi!',
            'desc.required' => 'Deskripsi wajib diisi!',
        ]);

        // Menyimpan data ke database
        $education = new Education();
        $education->judul = $validatedData['judul']; // Mendapatkan data yang sudah tervalidasi
        $education->desc = $validatedData['desc'];  // Menyimpan deskripsi yang sudah tervalidasi
        
        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            // Menyimpan gambar baru
            $imagePath = $request->file('image')->storeAs('artikel', $request->file('image')->getClientOriginalName(), 'public');
            $education->image = str_replace('public/', '', $imagePath); // Simpan nama file gambar tanpa prefix public/
        }

        // Simpan ke database
        $education->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('education.index')->with('success', 'Artikel berhasil disimpan!');
    }

    public function show($id)
    {
        // Menampilkan detail artikel berdasarkan ID (belum diimplementasikan)
        $education = Education::findOrFail($id);
        return view('education.show', compact('education'));
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
