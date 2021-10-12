<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'name',
        'legs',
        'color',
        'height',
        'has_back_rest',
    ];
}
