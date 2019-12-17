<?php

namespace App\DataTables\Service;

use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Service\Service;

class ServiceDatatables
{
    public function index($request)
    {
        try {
            $service = Service::all();
            return DataTables::of($service)
                ->addIndexColumn()
                ->addColumn('images', function ($service) {
                    $act = '';
                    $act .= '<img src="' . asset($service->path) . '" width="150" heigt="180">';
                    return $act;
                })
                ->addColumn('desc', function ($service) {
                    $act = '';
                    $act .= htmlspecialchars_decode($service->deskripsi);
                    return $act;
                })
                ->addColumn('action', function ($service) {
                    $act = '';
                    if (Auth::user()->can('show service')) {
                        $act .= '<div class="btn btn-group"><a href="service/' . $service->id . '/edit" class="btn btn-md btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>';
                    }

                    if (Auth::user()->can('edit service')) {
                        $act .= '<a href="service/' . $service->id . '/edit" class="btn btn-md btn-round btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if (Auth::user()->can('delete service')) {
                        $act .= '<button class="btn btn-danger btn-round btn-md confirmDeleteService" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="' . $service->id . '" type="submit" title="Delete"><i class="fa fa-trash"> </i></button></div>';
                    }

                    return $act;
                })
                ->rawColumns(['images', 'desc', 'action'])
                ->addIndexColumn()->make(true);
        } catch (\Exception $e) {
            throw new \ErrorException($e->getMessage());
        }
    }
}
