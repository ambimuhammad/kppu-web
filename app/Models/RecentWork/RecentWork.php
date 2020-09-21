<?php

namespace App\Models\RecentWork;

use Illuminate\Database\Eloquent\Model;

class RecentWork extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recent_works';
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
    protected $fillable = ['name_recent_work'];

    public function galleries()
    {
        return $this->hasMany('App\Models\RecentWorkGalleries\RecentWorkGalleries');
    }
}
