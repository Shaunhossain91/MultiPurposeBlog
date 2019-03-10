<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class admin_role extends Model
{
    public function admins(){
        return $this->belongsToMany('App\Model\Admin\admin','admin_roles')->withTimestamps();
    }
}
