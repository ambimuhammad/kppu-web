<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Model;
use App\Models\Artikel\Artikel;

class Kategori extends Model
{
    //
    protected $table = 'kategoris';
    protected $fillable = ['nama_kategori'];
    protected $primaryKey = 'id';

    public function artikels()
    {
        return $this->belongsToMany(Artikel::class, 'artikel_kategori', 'kategori_id', 'artikel_id');
    }
}