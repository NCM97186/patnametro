<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_ask_librarians extends Model
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
