<?php

namespace App\Http\Controllers\Backend\Product;

use App\DataTables\Product\ProductDatatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Kategori\Kategori;
use App\Http\Requests\Product\ProductRequest;
use Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $wl = new ProductDatatables;
            return $wl->index($request);
        }

        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('product.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $produk = new Product();
        $produk->kategori_id = trim($request->input('kategori_id'));
        $produk->deskripsi_produk = trim($request->input('deskripsi_produk'));
        $produk->save();

        Alert::success('Sukses', 'Product Berhasil Ditambahkan');
        return redirect()->route('product.index');
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
        $product = Product::findOrFail($id);
        $kategori = Kategori::all();
        return view('product.edit', compact('product', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
        $produk = Product::findOrFail($id);
        $produk->kategori_id = trim($request->input('kategori_id'));
        $produk->deskripsi_produk = trim($request->input('deskripsi_produk'));
        $produk->save();

        Alert::success('Sukses', 'Product Berhasil Diubah');
        return redirect()->route('product.index');
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
            $produk = Product::findOrFail($id);
            $produk->delete();

            return response()->json(array(
                'title' => 'Sukses Hapus Product',
                'text' => "Klik Oke Untuk Reload Page",
                'icon' => 'success'
            ), 200);
        }
    }
}
