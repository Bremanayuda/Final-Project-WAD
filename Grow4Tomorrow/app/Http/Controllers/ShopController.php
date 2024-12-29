<?php
namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    // Tampilkan Semua Data
    public function index(Request $request)
    {
    // Membuat query dasar
    $query = Shop::query();

    // Menangani pencarian produk berdasarkan nama
    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Menangani filter harga
    if ($request->has('price_filter') && $request->price_filter != '') {
        if ($request->price_filter == 'asc') {
            $query->orderBy('price', 'asc'); // Harga Murah ke Mahal
        } elseif ($request->price_filter == 'desc') {
            $query->orderBy('price', 'desc'); // Harga Mahal ke Murah
        }
    }

    // Ambil data produk yang sudah difilter (jika ada pencarian atau filter)
    $shops = $query->get();

    return view('shop.index', compact('shops'));
    }


    // Tampilkan Detail
    public function show($id)
    {
        $shop = Shop::findOrFail($id);
        return view('shop.show', compact('shop'));
    }

    // Tampilkan Form Tambah
    public function getCreateForm()
    {
        return view('shop.form');
    }

    // Simpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Proses upload gambar
        $image = $request->file('image');
        $path = $image->store('uploads', 'public');

        // Simpan data produk
        Shop::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $path, // Simpan path gambar
        ]);

        return redirect()->route('shop.index')->with('success', 'Data produk berhasil ditambahkan.');
    }

    // Tampilkan Form Edit
    public function getEditForm($id)
    {
        $shop = Shop::findOrFail($id);
        return view('shop.edit', compact('shop'));
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        $shop = Shop::findOrFail($id);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($shop->image && Storage::disk('public')->exists($shop->image)) {
                Storage::disk('public')->delete($shop->image);
            }

            // Simpan gambar baru
            $image = $request->file('image');
            $path = $image->store('uploads', 'public');

            // Perbarui path gambar
            $shop->image = $path;
        }

        // Update data lainnya
        $shop->update($request->except('image'));

        return redirect()->route('shop.index')->with('success', 'Data produk berhasil diperbarui.');
    }

    // Hapus Data
    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);

        // Hapus gambar jika ada
        if ($shop->image && Storage::disk('public')->exists($shop->image)) {
            Storage::disk('public')->delete($shop->image);
        }

        // Hapus data produk
        $shop->delete();

        return redirect()->route('shop.index')->with('success', 'Data produk berhasil dihapus.');
    }
}
