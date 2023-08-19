<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussionforum extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
        'postdate',
        'poststatus',
        'language',
        'parent',
        'userdiscussion',
        'userdiscussionreply',
        'dateadded',
        'datereply',
        'deleted',
        'deletedon'
         ];
}
