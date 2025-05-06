<?php
namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Gambar_lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = Lokasi::with('gambarLokasi')->get();
        return view('lokasi.layout', compact('lokasi'));
    }
    public function add()
    {
        return view('lokasi.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'company' => 'required',
            'deskripsi' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'alamat' => 'required',
            'gambar.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $lokasi = Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
            'company' => $request->company,
            'deskripsi' => $request->deskripsi,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'alamat' => $request->alamat
        ]);
        $lokasiId = $lokasi->id_lokasi;

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('lokasi', 'public');
                Gambar_lokasi::create([
                    'fk_id_lokasi' => $lokasiId,
                    'gambar' => $path
                ]);
            }
        }

        return redirect()->route('lokasi.layout')->with('success', 'Data lokasi dan gambar berhasil disimpan!');
    }

    public function edit($id)
    {
        $lokasi = Lokasi::with('gambarLokasi')->findOrFail($id);
        return view('lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'alamat' => 'required|string',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        DB::beginTransaction();
        try {
            $lokasi = Lokasi::findOrFail($id);
            $lokasi->update([
                'nama_lokasi' => $request->nama_lokasi,
                'company' => $request->company,
                'deskripsi' => $request->deskripsi,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'alamat' => $request->alamat,
            ]);

            if ($request->hasFile('gambar')) {
                foreach ($lokasi->gambarLokasi as $gambar) {
                    Storage::disk('public')->delete($gambar->gambar);
                    $gambar->delete();
                }

                foreach ($request->file('gambar') as $file) {
                    $path = $file->store('lokasi', 'public');

                    Gambar_lokasi::create([
                        'fk_id_lokasi' => $lokasi->id_lokasi,
                        'gambar' => $path,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('lokasi.layout')->with('success', 'Data lokasi berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();
        return redirect()->route('lokasi.layout')->with('success', 'Lokasi berhasil dihapus.');
    }

    public function detail($id)
    {
        $lokasi = Lokasi::with('gambarLokasi')->findOrFail($id);
        return view('lokasi.detail', compact('lokasi'));
    }
}
