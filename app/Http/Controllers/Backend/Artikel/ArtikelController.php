<?php

namespace App\Http\Controllers\Backend\Artikel;

use App\DataTables\Artikel\ArtikelDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel\Artikel;
use App\Models\Kategori\Kategori;
use App\Models\Tag\Tag;
use App\Http\Requests\Artikel\ArtikelRequest;
use Alert;
use Carbon\Carbon;
use Auth;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $wl = new ArtikelDatatables;
            return $wl->index($request);
        }

        return view('artikel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('artikel.create', compact('kategori', 'tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtikelRequest $request)
    {
        //
        $artikel = new Artikel();
        $artikel->user_id = trim(Auth::user()->id);
        $artikel->judul = trim($request->input('judul'));
        $artikel->slug = trim($request->input('slug'));
        $artikel->deskripsi = trim($request->input('deskripsi'));
        $artikel->meta_name = trim($request->input('meta_name'));
        $artikel->meta_description = trim($request->input('meta_description'));
        $artikel->meta_tags = trim($request->input('meta_tags'));
        $artikel->status = trim($request->input('status'));
        $artikel->published_at = trim($request->input('published_at'));

        if ($request->hasfile('featured_image')) {
            // lebih baik jangan direplace nama filenya
            // file dipisahkan sesuai foldernya, buat foldernya ketika surat dibuat.
            $file = $request->file('featured_image');
            $name = $file->getClientOriginalName();
            $artikel->featured_image = trim($name);
            $artikel->size = $file->getSize();
            $artikel->path = trim('Artikel/' . $request->input('judul') . '/' . $name);
            $file->move('Artikel/' . $request->input('judul') . '/', $name);
        }

        $artikel->save();

        Alert::success('Sukses', 'Artikel Berhasil Ditambahkan');
        return redirect()->route('artikel.index');
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
        $artikel = Artikel::findOrFail($id);
        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtikelRequest $request, $id)
    {
        //
        $artikel = Artikel::findOrFail($id);
        $artikel->nama_artikel = trim($request->input('nama_artikel'));
        $artikel->save();

        Alert::success('Sukses', 'artikel Berhasil Diubah');
        return redirect()->route('artikel.index');
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
            $artikel = Artikel::findOrFail($id);
            $artikel->delete();

            // $notify = Alert::alert('Sukses', 'Data Berhasil Di Hapus', '');
            return response()->json(array(
                'title' => 'Sukses Hapus artikel',
                'text' => "Klik Oke Untuk Reload Page",
                'icon' => 'success'
            ), 200);
        }
    }
}
