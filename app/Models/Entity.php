<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'identifier'];

    public function jobs(){
        return $this->belongsToMany('App\Models\Job');
    }

    public function workers(){
        return $this->belongsToMany('App\Models\Worker');
    }
}
