<?php

namespace App\Models\RecentWorkGalleries;

use Illuminate\Database\Eloquent\Model;
use App\Models\RecentWork\RecentWork;
class RecentWorkGalleries extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recent_work_galleries';
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
    protected $fillable = ['recent_work_id', 'galleries_name', 'path', 'size'];

    public function recentwork()
    {
        return $this->belongsTo(RecentWork::class, 'recent_work_id', 'id');
    }
}
