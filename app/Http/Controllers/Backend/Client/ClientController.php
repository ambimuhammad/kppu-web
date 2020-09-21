<?php

namespace App\Http\Controllers\Backend\Client;

use App\DataTables\Client\ClientDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client\Client;
use App\Http\Requests\Client\ClientRequest;
use Alert;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $wl = new ClientDatatables;
            return $wl->index($request);
        }

        return view('client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        //
        $client = new Client();
        $client->nama_client = trim($request->input('nama_client'));
        $client->link_client = trim($request->input('link_client'));

        if ($request->hasFile('logo_client')) {
            $file = $request->file('logo_client');
            $name = $file->getClientOriginalName();
            $client->logo_client = trim($name);
            $client->size = $file->getSize();
            $client->path = trim('Client/'. $request->input('nama_client'). '/' . $name);
            $file->move('Client/'. $request->input('nama_client'). '/', $name);
        }

        $client->save();

        Alert::success('Sukses', 'Client Berhasil Ditambahkan');
        return redirect()->route('client.index');
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
        $client = Client::findOrFail($id);
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        //
        $client = Client::findOrFail($id);
        $client->nama_client = trim($request->input('nama_client'));
        $client->link_client = trim($request->input('link_client'));
        if ($request->hasFile('logo_client')) {
            $file = $request->file('logo_client');
            $name = $file->getClientOriginalName();
            $client->logo_client = trim($name);
            $client->size = $file->getSize();
            $client->path = trim('Client/'. $request->input('nama_client'). '/' . $name);
            $file->move('Client/'. $request->input('nama_client'). '/', $name);
        }
        
        $client->save();

        Alert::success('Sukses', 'Client Berhasil Diubah');
        return redirect()->route('client.index');
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
            $client = Client::findOrFail($id);
            $client->delete();

            return response()->json(array(
                'title' => 'Sukses Hapus Client',
                'text' => "Klik Oke Untuk Reload Page",
                'icon' => 'success'
            ), 200);
        }
    }
}
