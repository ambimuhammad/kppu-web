<?php

namespace App\DataTables\Contact;

use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact\Contact;

class ContactDatatables
{
    public function index($request)
    {
        try {
            $contact = Contact::all();
            return DataTables::of($contact)
                ->addIndexColumn()
                ->addColumn('desc', function ($contact) {
                    $act = '';
                    $act .= htmlspecialchars_decode($contact->deskripsi);
                    return $act;
                })
                ->addColumn('action', function ($contact) {
                    $act = '';
                    if (Auth::user()->can('show contact')) {
                        $act .= '<div class="btn btn-group"><a href="contact/' . $contact->id . '/edit" class="btn btn-md btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>';
                    }

                    if (Auth::user()->can('edit contact')) {
                        $act .= '<a href="contact/' . $contact->id . '/edit" class="btn btn-md btn-round btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if (Auth::user()->can('delete contact')) {
                        $act .= '<button class="btn btn-danger btn-round btn-md confirmDeleteContact" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="' . $contact->id . '" type="submit" title="Delete"><i class="fa fa-trash"> </i></button></div>';
                    }

                    return $act;
                })
                ->rawColumns(['desc', 'action'])
                ->addIndexColumn()->make(true);
        } catch (\Exception $e) {
            throw new \ErrorException($e->getMessage());
        }
    }
}
