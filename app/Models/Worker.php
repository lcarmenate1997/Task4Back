<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'last_name', 'dni', 'date_birth', 'address', 'image', 'user_id'];

    public function entities(){
        return $this->belongsToMany('App\Models\Entity');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
