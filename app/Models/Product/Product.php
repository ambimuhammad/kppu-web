<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori\Kategori;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['kategori_id', 'deskripsi_produk'];
    /** 
     * @Author: flydreame 
     * @Date: 2019-12-18 10:14:51 
     * @Desc:  
     */    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
