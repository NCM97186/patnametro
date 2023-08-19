<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minister extends Model
{
    use HasFactory;
      protected $fillable =['title','url','page_url','language','description','metakeyword','metadescription','description','txtuplode','txtweblink','txtstatus','admin_id','create_date','update_date'];
}
