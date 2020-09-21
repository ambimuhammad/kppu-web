<?php

namespace App\Http\Controllers\Backend\Service;

use App\DataTables\Service\ServiceDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service\Service;
use App\Http\Requests\Service\ServiceRequest;
use Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $wl = new ServiceDatatables;
            return $wl->index($request);
        }

        return view('service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        //
        $service = new Service();
        $service->jenis_service = trim($request->input('jenis_service'));
        $service->deskripsi = trim($request->input('deskripsi'));

        if ($request->hasFile('service_image')) {
            $file = $request->file('service_image');
            $name = $file->getClientOriginalName();
            $service->service_image = trim($name);
            $service->size = $file->getSize();
            $service->path = trim('Service/'. $request->input('jenis_service'). '/' . $name);
            $file->move('Service/'. $request->input('jenis_service'). '/', $name);
        }

        $service->save();

        Alert::success('Sukses', 'Service Berhasil Ditambahkan');
        return redirect()->route('service.index');
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
        $service = Service::findOrFail($id);
        return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        //
        $service = Service::findOrFail($id);
        $service->jenis_service = trim($request->input('jenis_service'));
        $service->deskripsi = trim($request->input('deskripsi'));
        if ($request->hasFile('service_image')) {
            $file = $request->file('service_image');
            $name = $file->getClientOriginalName();
            $service->service_image = trim($name);
            $service->size = $file->getSize();
            $service->path = trim('Service/'. $request->input('jenis_service'). '/' . $name);
            $file->move('Service/'. $request->input('jenis_service'). '/', $name);
        }
        
        $service->save();

        Alert::success('Sukses', 'Service Berhasil Diubah');
        return redirect()->route('service.index');
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
            $service = Service::findOrFail($id);
            $service->delete();

            return response()->json(array(
                'title' => 'Sukses Hapus Service',
                'text' => "Klik Oke Untuk Reload Page",
                'icon' => 'success'
            ), 200);
        }
    }
}
