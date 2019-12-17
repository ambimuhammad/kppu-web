<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;
use App\Models\Artikel\Artikel;

class Tag extends Model
{
    //
    protected $table = 'tags';
    protected $fillable = ['nama_tag'];
    protected $primaryKey = 'id';

    public function artikels()
    {
        return $this->belongsToMany(Artikel::class, 'artikel_tag', 'tag_id', 'artikel_id');
    }
}
