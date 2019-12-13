<?php

namespace App\DataTables\Tag;

use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag\Tag;

class TagDatatables
{
    public function index($request)
    {
        try {
            $tag = Tag::all();
            return DataTables::of($tag)
                ->addIndexColumn()
                ->addColumn('action', function ($tag) {
                    $act = '';
                    if (Auth::user()->can('show tag')) {
                        $act .= '<div class="btn btn-group"><a href="tag/' . $tag->id . '/edit" class="btn btn-md btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>';
                    }

                    if (Auth::user()->can('edit tag')) {
                        $act .= '<a href="tag/' . $tag->id . '/edit" class="btn btn-md btn-round btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if (Auth::user()->can('delete tag')) {
                        $act .= '<button class="btn btn-danger btn-round btn-md confirmDeleteTag" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="' . $tag->id . '" type="submit" title="Delete"><i class="fa fa-trash"> </i></button></div>';
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
