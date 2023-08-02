<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library_form_list extends Model
{
    use HasFactory;
    protected $fillable =['membership_no','bar_code','valid_upto','name','permanent_id','designation','retirement_date','office_address','section','room_no','building','area','category','patna_pin','residence_addr','residence_pin','email','telephone','mobile','govtemptype','diary_no','diary_date','ppo_no','ppo_date','ppo_copy','specialmemtype','upload_idproof','upload_instituteletter','upload_anyfirst_idproof','upload_anysecond_idproof','image','img_sign','old_ticket','request_ip','request_date','final_doc','administrative_head','imgFwd_id','status'];
}
