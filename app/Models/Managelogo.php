<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Managelogo extends Model
{
    use HasFactory;
    protected $fillable=['title','language','txtuplode','txtstatus','admin_id','create_date','update_date','page_url'];
}
