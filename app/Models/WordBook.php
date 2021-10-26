<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function chapter(){
        return $this->hasMany('App\Models\Chapter');
    }
}
