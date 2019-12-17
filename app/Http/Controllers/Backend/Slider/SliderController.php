<?php

namespace App\Http\Controllers\Backend\Slider;

use App\DataTables\Slider\SliderDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider\Slider;
use App\Http\Requests\Slider\SliderRequest;
use Alert;
use Carbon\Carbon;
use Auth;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $wl = new SliderDatatables;
            return $wl->index($request);
        }

        return view('slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        //
        $slider = new Slider();
        $slider->deskripsi = trim($request->input('deskripsi'));

        if ($request->hasfile('name_slider')) {
            // lebih baik jangan direplace nama filenya
            // file dipisahkan sesuai foldernya, buat foldernya ketika surat dibuat.
            $file = $request->file('name_slider');
            $name = $file->getClientOriginalName();
            $slider->name_slider = trim($name);
            $slider->size = $file->getSize();
            $slider->path = trim('Slider/' . strip_tags($request->input('deskripsi')) . '/' . $name);
            $file->move('Slider/' . strip_tags($request->input('deskripsi')) . '/', $name);
        }
        $slider->periode = trim($request->input('periode'));
        $slider->save();

        Alert::success('Sukses', 'Slider Berhasil Ditambahkan');
        return redirect()->route('slider.index');
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
        $slider = Slider::findOrFail($id);
        return view('slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        //
        $slider = Slider::findOrFail($id);
        $slider->nama_artikel = trim($request->input('nama_artikel'));
        if ($request->hasfile('name_slider')) {
            $file = $request->file('name_slider');
            $name = $file->getClientOriginalName();
            $slider->name_slider = trim($name);
            $slider->size = $file->getSize();
            $slider->path = trim('Slider/' . strip_tags($request->input('deskripsi')) . '/' . $name);
            $file->move('Slider/' . strip_tags($request->input('deskripsi')) . '/', $name);
        }
        $slider->periode = trim($request->input('periode'));
        $slider->save();

        Alert::success('Sukses', 'Slider Berhasil Diubah');
        return redirect()->route('slider.index');
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
            $slider = Slider::findOrFail($id);
            $file_path = 'Slider/' . $slider->judul . '/' . $slider->featured_image;
            if (File::exists($file_path)) {
                File::delete($file_path);
                File::deleteDirectory(public_path('Slider/' . $slider->judul));
            }
            $slider->delete();

            return response()->json(array(
                'title' => 'Sukses Hapus Slider',
                'text' => "Klik Oke Untuk Reload Page",
                'icon' => 'success'
            ), 200);
        }
    }
}
