<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mean extends Model
{
    use HasFactory;
    protected $fillable = [
        'mean',
        'word_id',
        'word_class_id'
    ];
}
