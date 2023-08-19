<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_plan_visits extends Model
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
