<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class Artikel extends Model
{
    protected $table = 'artikels';
    protected $fillable = ['judul', 'slug', 'deskripsi', 'featured_image', 'status'];
    protected $primaryKey = 'id';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
