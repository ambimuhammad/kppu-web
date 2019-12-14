<?php

namespace App\Http\Controllers\Backend\RecentWork;

use App\DataTables\RecentWork\RecentWorkDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecentWork\RecentWork;
use App\Models\RecentWorkGalleries\RecentWorkGalleries;
use App\Http\Requests\RecentWork\RecentWorkRequest;
use Alert;
use Carbon\Carbon;
use Auth;
use File;

class RecentWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $wl = new RecentWorkDatatables;
            return $wl->index($request);
        }

        return view('recent-work.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('recent-work.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecentWorkRequest $request)
    {
        $recent = new RecentWork();
        $recent->kategori_recent_work = trim($request->input('kategori_recent_work'));
        $recent->name_recent_work = trim($request->input('name_recent_work'));
        $recent->deskripsi_recent_work = trim($request->input('deskripsi_recent_work'));
        $recent->save();

        $data = [];
        if ($request->hasFile('galleries_name')) {
            foreach ($request->file('galleries_name') as $file) {
                $name = $file->getClientOriginalName();
                $data[] = [
                    'recent_work_id' => trim($recent->id),
                    'galleries_name' => trim($name),
                    'path' => trim('Recent Work/' . trim($request->input('name_recent_work')) . '/' . $name),
                    'size' => trim($file->getSize()),
                    'created_at' => trim(Carbon::now()),
                    'updated_at' => trim(Carbon::now()),
                ];    
                $file->move('Recent Work/' . trim($request->input('name_recent_work')) . '/', $name);
            }
        }

        // prose insert ke tabel recent gallery
        RecentWorkGalleries::insert($data);

        Alert::success('Sukses', 'Recent Work Berhasil Ditambahkan');
        return redirect()->route('recent.index');
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
        $artikel = RecentWork::findOrFail($id);
        return view('recent-work.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecentWorkRequest $request, $id)
    {
        //
        $artikel = RecentWork::findOrFail($id);
        $artikel->nama_artikel = trim($request->input('nama_artikel'));
        $artikel->save();

        Alert::success('Sukses', 'Recent Work Berhasil Diubah');
        return redirect()->route('recent.index');
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
            $artikel = RecentWork::findOrFail($id);
            $file_path = 'Artikel/' . $artikel->judul . '/' . $artikel->featured_image;
            if (File::exists($file_path)) {
                File::delete($file_path);
                File::deleteDirectory(public_path('Artikel/' . $artikel->judul));
            }
            $artikel->delete();

            return response()->json(array(
                'title' => 'Sukses Hapus artikel',
                'text' => "Klik Oke Untuk Reload Page",
                'icon' => 'success'
            ), 200);
        }
    }
}
