<?php

namespace App\Http\Controllers\Backend\About;

use App\DataTables\About\AboutDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About\About;
use App\Http\Requests\About\AboutRequest;
use Alert;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $wl = new AboutDatatables;
            return $wl->index($request);
        }

        return view('about.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRequest $request)
    {
        //
        $about = new About();
        $about->deskripsi = trim($request->input('deskripsi'));
        $about->save();

        Alert::success('Sukses', 'About Berhasil Ditambahkan');
        return redirect()->route('about.index');
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
        $about = About::findOrFail($id);
        return view('about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request, $id)
    {
        //
        $about = About::findOrFail($id);
        $about->deskripsi = trim($request->input('deskripsi'));
        $about->save();

        Alert::success('Sukses', 'About Berhasil Diubah');
        return redirect()->route('about.index');
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
            $about = About::findOrFail($id);
            $about->delete();

            return response()->json(array(
                'title' => 'Sukses Hapus About',
                'text' => "Klik Oke Untuk Reload Page",
                'icon' => 'success'
            ), 200);
        }
    }
}
