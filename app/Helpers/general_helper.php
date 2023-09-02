<?php
  
use App\Models\admin\Menu;
use Illuminate\Support\Facades\DB;
if ( ! function_exists('has_child'))
{
	function has_child( $pid,$langid=1 ){
		
		
		$whEre  = "";
		$whEre .= " m_flag_id = '".$pid."' AND language_id = '".$langid."' AND approve_status = '3' ";

		$fetchResult = DB::table('menus')->select('*')->where($whEre)->get();
		
		return $fetchResult;
		
	}
}

