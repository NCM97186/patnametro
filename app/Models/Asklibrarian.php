<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asklibrarian extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email',
        'phone',
        'address',
        'suggestions',
        'request_ip',
        'resuest_date',
        'status',
];
}
