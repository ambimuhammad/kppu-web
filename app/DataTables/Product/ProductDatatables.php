<?php

namespace App\DataTables\Product;

use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Product\Product;

class ProductDatatables
{
    public function index($request)
    {
        try {
            $product = Product::all();
            return DataTables::of($product)
                ->addIndexColumn()
                ->addColumn('kategori', function ($product) {
                    $act = '';
                    $act .= $product->kategori->nama_kategori;
                    return $act;
                })
                ->addColumn('desc', function ($product) {
                    $act = '';
                    $act .= htmlspecialchars_decode(\Str::limit($product->deskripsi_produk, '200', '( ... )'));
                    return $act;
                })
                ->addColumn('action', function ($product) {
                    $act = '';
                    if (Auth::user()->can('show product')) {
                        $act .= '<div class="btn btn-group"><a href="product/' . $product->id . '/edit" class="btn btn-md btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>';
                    }

                    if (Auth::user()->can('edit product')) {
                        $act .= '<a href="product/' . $product->id . '/edit" class="btn btn-md btn-round btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if (Auth::user()->can('delete product')) {
                        $act .= '<button class="btn btn-danger btn-round btn-md confirmDeleteproduct" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="' . $product->id . '" type="submit" title="Delete"><i class="fa fa-trash"> </i></button></div>';
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
