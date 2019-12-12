<?php

namespace App\Http\Controllers\Backend\Kategori;

use App\DataTables\Kategori\KategoriDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori\Kategori;
use App\Http\Requests\Kategori\KategoriRequest;
use Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $wl = new KategoriDatatables;
            return $wl->index($request);
        }

        return view('kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriRequest $request)
    {
        //
        $kategori = new Kategori();
        $kategori->nama_kategori = trim($request->input('nama_kategori'));
        $kategori->save();

        Alert::success('Sukses', 'Kategori Berhasil Ditambahkan');
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriRequest $request, $id)
    {
        //
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = trim($request->input('nama_kategori'));
        $kategori->save();

        Alert::success('Sukses', 'Kategori Berhasil Diubah');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $kategori = Kategori::findOrFail($id);
            $kategori->delete();

            // $notify = Alert::alert('Sukses', 'Data Berhasil Di Hapus', '');
            return response()->json(array(
                'title' => 'Sukses Hapus Kategori',
                'text' => "Klik Oke Untuk Reload Page",
                'icon' => 'success'
            ), 200);
        }
    }
}
