<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online_suggestions_list extends Model
{
    use HasFactory;
    protected $fillable ['name','email','phone','address','suggestcat','suggestions','request_ip','resuest_date'];
}
