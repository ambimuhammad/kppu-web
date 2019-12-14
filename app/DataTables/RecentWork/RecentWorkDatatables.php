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
                ->addColumn('desc', function ($recent) {
                    $act = '';
                    $act .= htmlspecialchars_decode($recent->deskripsi_recent_work);
                    return $act;
                })
                ->addColumn('images', function ($recent) {
                    $act = '';
                    foreach($recent->galleries->take(1) as $galleri) {
                        $act .= '<img src="' . asset($galleri->path) . '" width="150" heigt="180">';
                    }
                    return $act;
                })
                ->addColumn('action', function ($recent) {
                    $act = '';
                    if (Auth::user()->can('show recent work')) {
                        $act .= '<div class="btn btn-group"><a href="recent/' . $recent->id . '/edit" class="btn btn-md btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>';
                    }

                    if (Auth::user()->can('edit recent work')) {
                        $act .= '<a href="recent/' . $recent->id . '/edit" class="btn btn-md btn-round btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if (Auth::user()->can('delete recent work')) {
                        $act .= '<button class="btn btn-danger btn-round btn-md confirmDeleteRecent" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="' . $recent->id . '" type="submit" title="Delete"><i class="fa fa-trash"> </i></button></div>';
                    }

                    return $act;
                })
                ->rawColumns(['desc', 'images', 'action'])
                ->addIndexColumn()->make(true);
        } catch (\Exception $e) {
            throw new \ErrorException($e->getMessage());
        }
    }
}
