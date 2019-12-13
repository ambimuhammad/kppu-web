<?php

namespace App\DataTables\Slider;

use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider\Slider;

class SliderDatatables
{
    public function index($request)
    {
        try {
            
            $slider = Slider::all();
            return DataTables::of($slider)
                ->addIndexColumn()
                ->addColumn('name_slider', function ($slider) {
                    $act = '';
                    $act .= '<img src="' . asset($slider->path) . '" width="150" heigt="180">';
                    return $act;
                })
                ->addColumn('desc', function ($slider) {
                    $act = '';
                    $act .= strip_tags($slider->deskripsi);
                    return $act;
                })
                ->addColumn('action', function ($slider) {
                    $act = '';
                    if (Auth::user()->can('show slider')) {
                        $act .= '<div class="btn btn-group"><a href="slider/' . $slider->id . '/edit" class="btn btn-md btn-round btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>';
                    }

                    if (Auth::user()->can('edit slider')) {
                        $act .= '<a href="slider/' . $slider->id . '/edit" class="btn btn-md btn-round btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if (Auth::user()->can('delete slider')) {
                        $act .= '<button class="btn btn-danger btn-round btn-md confirmDeleteSlider" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="' . $slider->id . '" type="submit" title="Delete"><i class="fa fa-trash"> </i></button></div>';
                    }

                    return $act;
                })
                ->rawColumns(['name_slider', 'desc', 'action'])
                ->addIndexColumn()->make(true);
        } catch (\Exception $e) {
            throw new \ErrorException($e->getMessage());
        }
    }
}
