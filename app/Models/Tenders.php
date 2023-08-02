<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenders extends Model
{
    use HasFactory;
    protected $fillable =[' title','url','page_url','is_new','language','menutype','metakeyword','metadescription','description','txtuplode','txtweblink','txtstatus','admin_id','start_date','end_date'];

}
