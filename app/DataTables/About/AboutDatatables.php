<?php

namespace App\DataTables\About;

use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\About\About;

class AboutDatatables
{
    public function index($request)
    {
        try {
            $about = About::all();
            return DataTables::of($about)
                ->addIndexColumn()
                ->addColumn('images', function ($about) {
                    $act = '';
                    $act .= '<img src="' . asset($about->path) . '" width="150" heigt="180">';
                    return $act;
                })
                ->addColumn('desc', function ($about) {
                    $act = '';
                    $act .= htmlspecialchars_decode(\Str::limit($about->deskripsi, '200', '( ... )'));
                    return $act;
                })
                ->addColumn('action', function ($about) {
                    $act = '';
                    if (Auth::user()->can('show about')) {
                        $act .= '<div class="btn btn-group"><a href="about/' . $about->id . '/edit" class="btn btn-md btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>';
                    }

                    if (Auth::user()->can('edit about')) {
                        $act .= '<a href="about/' . $about->id . '/edit" class="btn btn-md btn-round btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if (Auth::user()->can('delete about')) {
                        $act .= '<button class="btn btn-danger btn-round btn-md confirmDeleteAbout" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="' . $about->id . '" type="submit" title="Delete"><i class="fa fa-trash"> </i></button></div>';
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
