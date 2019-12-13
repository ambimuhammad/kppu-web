<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $table = 'kategoris';
    protected $fillable = ['nama_kategori'];
    protected $primaryKey = 'id';

}