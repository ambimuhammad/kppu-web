<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
use App\Models\Kategori\Kategori;
use App\Models\Tag\Tag;

class Artikel extends Model
{
    protected $table = 'artikels';
    protected $fillable = ['judul', 'slug', 'deskripsi', 'featured_image', 'status'];
    protected $primaryKey = 'id';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class, 'artikel_kategori', 'artikel_id', 'kategori_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'artikel_tag', 'artikel_id', 'tag_id');
    }
}
