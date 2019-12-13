<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tags';
    protected $fillable = ['nama_tag'];
    protected $primaryKey = 'id';
}
