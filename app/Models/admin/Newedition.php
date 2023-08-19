<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newedition extends Model
{
    use HasFactory;
    protected $fillable =['book_name','language','  txtuplode','txtstatus','isbn_no','admin_id','create_date','update_date','edited_by']
}
