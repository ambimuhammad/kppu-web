<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'abouts';
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
    protected $fillable = ['deskripsi'];
}
