<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'importance', 'is_boss', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function entities(){
        return $this->belongsToMany('App\Models\Entity');
    }
}
