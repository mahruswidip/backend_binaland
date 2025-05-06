<?php
namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        return view('artikel.layout', compact('artikel'));
    }

    public function create()
    {
        return view('artikel.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'kategori' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date',
        ]);
        $gambarPath = $request->file('gambar')->store('artikel', 'public');
        Artikel::create([
            'company' => $request->company,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambarPath,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('artikel.layout')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $request->validate([
            'company' => 'required',
            'kategori' => 'required',
            'judul' => 'required',
            'tanggal' => 'required|date',
            'isi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $artikel->company = $request->company;
        $artikel->kategori = $request->kategori;
        $artikel->judul = $request->judul;
        $artikel->tanggal = $request->tanggal;
        $artikel->isi = $request->isi;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('artikel', 'public');
            $artikel->gambar = $path;
        }

        $artikel->save();
        return redirect()->route('artikel.layout')->with('success', 'Artikel berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        Artikel::reorderIdArtikel();
        return redirect()->route('artikel.layout')->with('success', 'Artikel berhasil dihapus.');
    }
    public function add()
    {
        return view('artikel.add');
    }
    public function detail($id)
    {
        $artikel = Artikel::where('id_artikel', $id)->firstOrFail();
        return view('artikel.detail', compact('artikel'));
    }
}

