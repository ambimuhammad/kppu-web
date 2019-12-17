<?php

namespace App\DataTables\Client;

use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Client\Client;

class ClientDatatables
{
    public function index($request)
    {
        try {
            $client = Client::all();
            return DataTables::of($client)
                ->addIndexColumn()
                ->addColumn('images', function ($client) {
                    $act = '';
                    $act .= '<img src="' . asset($client->path) . '" width="150" heigt="180">';
                    return $act;
                })
                ->addColumn('action', function ($client) {
                    $act = '';
                    if (Auth::user()->can('show client')) {
                        $act .= '<div class="btn btn-group"><a href="client/' . $client->id . '/edit" class="btn btn-md btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>';
                    }

                    if (Auth::user()->can('edit client')) {
                        $act .= '<a href="client/' . $client->id . '/edit" class="btn btn-md btn-round btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if (Auth::user()->can('delete client')) {
                        $act .= '<button class="btn btn-danger btn-round btn-md confirmDeleteClient" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="' . $client->id . '" type="submit" title="Delete"><i class="fa fa-trash"> </i></button></div>';
                    }

                    return $act;
                })
                ->rawColumns(['images', 'action'])
                ->addIndexColumn()->make(true);
        } catch (\Exception $e) {
            throw new \ErrorException($e->getMessage());
        }
    }
}
