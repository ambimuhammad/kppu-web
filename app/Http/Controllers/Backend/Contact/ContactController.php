<?php

namespace App\Http\Controllers\Backend\Contact;

use App\DataTables\Contact\ContactDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact\Contact;
use App\Http\Requests\Contact\ContactRequest;
use Alert;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $wl = new ContactDatatables;
            return $wl->index($request);
        }

        return view('contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        //
        $contact = new Contact();
        $contact->alamat = trim($request->input('alamat'));
        $contact->email = trim($request->input('email'));
        $contact->telepon = trim($request->input('telepon'));
        $contact->fax = trim($request->input('fax'));
        $contact->google_maps_api_key = trim($request->input('fax'));
        $contact->save();

        Alert::success('Sukses', 'Contact Berhasil Ditambahkan');
        return redirect()->route('contact.index');
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
        $contact = Contact::findOrFail($id);
        return view('contact.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        //
        $contact = Contact::findOrFail($id);
        $contact->alamat = trim($request->input('alamat'));
        $contact->email = trim($request->input('email'));
        $contact->telepon = trim($request->input('telepon'));
        $contact->fax = trim($request->input('fax'));
        $contact->google_maps_api_key = trim($request->input('google_maps_api_key'));
        $contact->save();

        Alert::success('Sukses', 'Contact Berhasil Diubah');
        return redirect()->route('contact.index');
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
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return response()->json(array(
                'title' => 'Sukses Hapus Contact',
                'text' => "Klik Oke Untuk Reload Page",
                'icon' => 'success'
            ), 200);
        }
    }
}
