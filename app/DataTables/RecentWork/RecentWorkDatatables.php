<?php

namespace App\DataTables\RecentWork;

use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\RecentWork\RecentWork;

class RecentWorkDatatables
{
    public function index($request)
    {
        try {
            $recent = RecentWork::with('galleries');
            return DataTables::of($recent)
                ->addIndexColumn()
                ->addColumn('pembuat', function ($recent) {
                    $act = '';
                    $act .= ucfirst($recent->users->name);
                    return $act;
                })
                ->addColumn('desc', function ($recent) {
                    $act = '';
                    $act .= htmlspecialchars_decode($recent->deskripsi);
                    return $act;
                })
                ->addColumn('images', function ($recent) {
                    $act = '';
                    $act .= '<img src="' . asset($recent->path) . '" width="150" heigt="180">';
                    return $act;
                })
                ->addColumn('action', function ($recent) {
                    $act = '';
                    if (Auth::user()->can('show artikel')) {
                        $act .= '<div class="btn btn-group"><a href="artikel/' . $recent->id . '/edit" class="btn btn-md btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>';
                    }

                    if (Auth::user()->can('edit artikel')) {
                        $act .= '<a href="artikel/' . $recent->id . '/edit" class="btn btn-md btn-round btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if (Auth::user()->can('delete artikel')) {
                        $act .= '<button class="btn btn-danger btn-round btn-md confirmDeleteArtikel" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="' . $recent->id . '" type="submit" title="Delete"><i class="fa fa-trash"> </i></button></div>';
                    }

                    return $act;
                })
                ->rawColumns(['multipledelete', 'pembuat', 'desc', 'images', 'action'])
                ->addIndexColumn()->make(true);
        } catch (\Exception $e) {
            throw new \ErrorException($e->getMessage());
        }
    }
}
