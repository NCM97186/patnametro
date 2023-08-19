<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    use HasFactory;
    protected $fillable =['event_name','page_url','language','txtuplode','event_type','menutype','pdf_upload','txtstatus','sortdesc','description','admin_id','start_date','end_date'];
}
