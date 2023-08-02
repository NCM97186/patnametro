<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planyourvisit extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'email',
        'phone',
        'address',
        'txt_os_visitdate',
        'suggestions',
        'request_ip',
        'request_date'
    ];

}
