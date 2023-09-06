<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
    use HasFactory;
    protected $fillable=[
        'role_id',
        'role_name',
        'module_id',
        'role_status',
        'role_type',
        'user_id'
];
}
