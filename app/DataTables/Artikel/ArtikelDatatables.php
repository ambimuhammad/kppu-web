<?php

namespace App\DataTables\Artikel;

use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Artikel\Artikel;

class ArtikelDatatables
{
    public function index($request)
    {
        try {
            if (Auth::user()->hasRole('admin')) {
                $artikel = Artikel::all();
            } else {
                $artikel = Artikel::where('user_id', Auth::user()->id);
            }
            return DataTables::of($artikel)
                ->addIndexColumn()
                ->addColumn('pembuat', function ($artikel) {
                    $act = '';
                    $act .= ucfirst($artikel->users->name);
                    return $act;
                })
                ->addColumn('desc', function ($artikel) {
                    $act = '';
                    $act .= htmlspecialchars_decode(\Str::limit($artikel->deskripsi, 200, ' ...'));
                    return $act;
                })
                ->addColumn('images', function ($artikel) {
                    $act = '';
                    $act .= '<img src="' . asset($artikel->path) . '" width="150" heigt="180">';
                    return $act;
                })
                ->addColumn('action', function ($artikel) {
                    $act = '';
                    if (Auth::user()->can('show artikel')) {
                        $act .= '<div class="btn btn-group"><a href="artikel/' . $artikel->id . '/edit" class="btn btn-md btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>';
                    }

                    if (Auth::user()->can('edit artikel')) {
                        $act .= '<a href="artikel/' . $artikel->id . '/edit" class="btn btn-md btn-round btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if (Auth::user()->can('delete artikel')) {
                        $act .= '<button class="btn btn-danger btn-round btn-md confirmDeleteArtikel" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="' . $artikel->id . '" type="submit" title="Delete"><i class="fa fa-trash"> </i></button></div>';
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
