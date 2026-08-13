<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use App\Models\Kategori;

class DestinasiController extends Controller
{

    public function index(Request $request)
{
    $keyword = $request->input('cari');
    $kategoriId = $request->input('kategori');
 
    $destinasiList = Destinasi::when($keyword, function ($query) use ($keyword) {
            $query->where('nama', 'like', '%' . $keyword . '%');
        })
        ->when($kategoriId, function ($query) use ($kategoriId) {
            $query->where('kategori_id', $kategoriId);
        })
        ->with('kategori')
        ->latest()
        ->paginate(2)
        ->appends($request->query());
 
    $kategoriList = Kategori::all();
 
    return view('destinasi', compact('destinasiList', 'keyword', 'kategoriId', 'kategoriList'));
}


    public function show($id)
    {
    $destinasi = Destinasi::with(['atraksi', 'ulasan.user', 'kategori'])->findOrFail($id);        return view('destinasi-detail', [
            'destinasi' => $destinasi,
        ]);
    }

    public function create()
{
    $kategoriList = Kategori::all();
    return view('destinasi-create', compact('kategoriList'));
}

    public function store(Request $request)
    {
       $validated = $request->validate([
    'kategori_id' => 'required|exists:kategori,id', 
    'nama' => 'required|min:3',
    'deskripsi' => 'required|string',
    'gambar' => 'required|image|max:2048',
    'jam_buka'   => 'nullable|required_with:jam_tutup|date_format:H:i',
    'jam_tutup'  => 'nullable|required_with:jam_buka|date_format:H:i|after:jam_buka',
    'lokasi'     => 'nullable|string|max:255',
    'harga_tiket'  => 'required|numeric|min:0',
], [
    'nama.required'         => 'Nama destinasi wajib diisi.',
    'nama.max'              => 'Nama destinasi maksimal 255 karakter.',
    'deskripsi.required' => 'Deskripsi destinasi wajib diisi.',
    'jam_buka.date_format'  => 'Format jam buka harus HH:MM, contoh 08:00.',
    'jam_buka.required_with'  => 'Jam buka wajib diisi jika jam tutup diisi (atau kosongkan keduanya jika buka 24 jam).',
    'jam_tutup.date_format' => 'Format jam tutup harus HH:MM, contoh 17:00.',
    'jam_tutup.required_with' => 'Jam tutup wajib diisi jika jam buka diisi (atau kosongkan keduanya jika buka 24 jam).',
    'jam_tutup.after'       => 'Jam tutup harus lebih besar dari jam buka.',
    'harga_tiket.required' => 'Harga tiket wajib diisi.',
    'harga_tiket.numeric'  => 'Harga tiket harus berupa angka.',
]);

        $validated['gambar'] = $request->file('gambar')->store('destinasi', 'public');
        Destinasi::create($validated);
        $destinasi = Destinasi::create($validated);
        return redirect()->route('destinasi.detail', $destinasi->id)
            ->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function edit($id)
{
    $destinasi = Destinasi::findOrFail($id);
    $kategoriList = Kategori::all();
    return view('destinasi-edit', compact('destinasi', 'kategoriList'));
}


    public function update(Request $request, $id)
    {
        $destinasi = Destinasi::findOrFail($id);

       $validated = $request->validate([
    'kategori_id' => 'nullable|exists:kategori,id',
    'nama'       => 'required|string|max:255',
    'deskripsi'  => 'nullable|string',
    'gambar'     => 'nullable|image|max:2048',
    'jam_buka'   => 'nullable|required_with:jam_tutup|date_format:H:i',
    'jam_tutup'  => 'nullable|required_with:jam_buka|date_format:H:i|after:jam_buka',
    'lokasi'     => 'nullable|string|max:255',
    'harga_tiket'  => 'required|numeric|min:0',
], [
    'nama.required'         => 'Nama destinasi wajib diisi.',
    'nama.max'              => 'Nama destinasi maksimal 255 karakter.',
    'jam_buka.date_format'  => 'Format jam buka harus HH:MM, contoh 08:00.',
    'jam_buka.required_with'  => 'Jam buka wajib diisi jika jam tutup diisi (atau kosongkan keduanya jika buka 24 jam).',
    'jam_tutup.date_format' => 'Format jam tutup harus HH:MM, contoh 17:00.',
    'jam_tutup.required_with' => 'Jam tutup wajib diisi jika jam buka diisi (atau kosongkan keduanya jika buka 24 jam).',
    'jam_tutup.after'       => 'Jam tutup harus lebih besar dari jam buka.',
    'harga_tiket.required' => 'Harga tiket wajib diisi.',
    'harga_tiket.numeric'  => 'Harga tiket harus berupa angka.',
]);
if ($request->hasFile('gambar')) {
    $validated['gambar'] = $request->file('gambar')->store('destinasi', 'public');
} else {
    unset($validated['gambar']);
}
 
$destinasi->update($validated);

        $destinasi->update($validated);
        return redirect()->route('destinasi.detail', $destinasi->id)
            ->with('success', 'Destinasi berhasil diperbarui!');
    }

    function destroy($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        $destinasi->delete();
        return redirect()->route('destinasi')
            ->with('success', 'Destinasi berhasil dihapus!');
    }

}