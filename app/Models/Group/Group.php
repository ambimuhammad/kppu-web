<?php

namespace App\Models\Group;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Group extends Model
{
    //
    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function permissions()
    {
        return $this->hasMany('Spatie\Permission\Models\Permission');
    }
}
