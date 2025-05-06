<?php
namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Lokasi;
use App\Models\Gambar_fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::with(['lokasi', 'gambarFasilitas'])->get();
        return view('fasilitas.layout', compact('fasilitas'));
    }
    public function add()
    {
        $lokasi = Lokasi::all();
        return view('fasilitas.add', compact('lokasi'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'fk_id_lokasi' => 'required|exists:lokasi,id_lokasi',
            'nama_fasilitas' => 'required|string',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $fasilitas = Fasilitas::create([
            'fk_id_lokasi' => $request->fk_id_lokasi,
            'nama_fasilitas' => $request->nama_fasilitas,
        ]);
    
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('fasilitas', 'public');
    
                Gambar_fasilitas::create([
                    'fk_id_fasilitas' => $fasilitas->id_fasilitas,
                    'gambar' => $path,
                ]);
            }
        }
    
        return redirect()->route('fasilitas.layout')->with('success', 'Fasilitas berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $fasilitas = Fasilitas::with('gambarFasilitas')->findOrFail($id);
        $lokasi = Lokasi::all();
        return view('fasilitas.edit', compact('fasilitas', 'lokasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fk_id_lokasi' => 'required',
            'nama_fasilitas' => 'required|string|max:255',
            'gambar.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->update([
            'fk_id_lokasi' => $request->fk_id_lokasi,
            'nama_fasilitas' => $request->nama_fasilitas,
        ]);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('gambar_fasilitas', 'public');
                GambarFasilitas::create([
                    'fk_id_fasilitas' => $fasilitas->id_fasilitas,
                    'gambar' => $path
                ]);
            }
        }

        return redirect()->route('fasilitas.layout')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Fasilitas::findOrFail($id)->delete();
        return redirect()->route('fasilitas.layout')->with('success', 'Data berhasil dihapus');
    }

    public function detail($id)
    {
        $fasilitas = Fasilitas::with('lokasi', 'gambarFasilitas')->findOrFail($id);
        return view('fasilitas.detail', compact('fasilitas'));
    }

}
