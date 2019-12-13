<?php

namespace App\Http\Controllers\Backend\Tag;

use App\DataTables\Tag\TagDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag\Tag;
use App\Http\Requests\Tag\TagRequest;
use Alert;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $wl = new TagDatatables;
            return $wl->index($request);
        }

        return view('tag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        //
        $tag = new Tag();
        $tag->nama_tag = trim($request->input('nama_tag'));
        $tag->save();

        Alert::success('Sukses', 'Tag Berhasil Ditambahkan');
        return redirect()->route('tag.index');
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
        $tag = Tag::findOrFail($id);
        return view('tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        //
        $tag = Tag::findOrFail($id);
        $tag->nama_tag = trim($request->input('nama_tag'));
        $tag->save();

        Alert::success('Sukses', 'Tag Berhasil Diubah');
        return redirect()->route('tag.index');
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
            $tag = Tag::findOrFail($id);
            $tag->delete();

            // $notify = Alert::alert('Sukses', 'Data Berhasil Di Hapus', '');
            return response()->json(array(
                'title' => 'Sukses Hapus Tag',
                'text' => "Klik Oke Untuk Reload Page",
                'icon' => 'success'
            ), 200);
        }
    }
}
