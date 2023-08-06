<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'logs';
    #TODO: burada class işlemi yapan user vs bilgiler tutulabilir.
    #TODO: Hatta datanın eski halide tutulabilir ki bunun sayesinde recovery yapılabilir.
    protected $fillable = ['message'];

    protected $casts = [
        'message' => 'array',
    ];
}
