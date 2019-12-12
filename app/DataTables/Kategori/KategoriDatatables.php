<?php

namespace App\DataTables\Kategori;

use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori\Kategori;

class KategoriDatatables
{
    public function index($request)
    {
        try {
            $kategori = Kategori::all();
            return DataTables::of($kategori)
                ->addIndexColumn()
                ->addColumn('action', function ($kategori) {
                    $act = '';
                    if (Auth::user()->can('show kategori')) {
                        $act .= '<div class="btn btn-group"><a href="kategori/' . $kategori->id . '/edit" class="btn btn-md btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>';
                    }

                    if (Auth::user()->can('edit kategori')) {
                        $act .= '<a href="kategori/' . $kategori->id . '/edit" class="btn btn-md btn-round btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if (Auth::user()->can('delete kategori')) {
                        $act .= '<button class="btn btn-danger btn-round btn-md confirmDeleteKategori" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="' . $kategori->id . '" type="submit" title="Delete"><i class="fa fa-trash"> </i></button></div>';
                    }

                    return $act;
                })
                ->rawColumns(['multipledelete', 'action'])
                ->addIndexColumn()->make(true);
        } catch (\Exception $e) {
            throw new \ErrorException($e->getMessage());
        }
    }
}
