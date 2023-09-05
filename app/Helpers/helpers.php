<?php
  
use Carbon\Carbon;
use App\Models\admin\Audit_trail;
use App\Models\admin\Menu;
use Illuminate\Support\Facades\DB;
use App\Models\admin\WebsiteSetting;
use Illuminate\Support\Str;


  
/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertYmdToMdy')) {
    function convertYmdToMdy($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }
}
  
/**
 * Write code on Method
 * //dd(convertYmdToMdy('2022-02-12'));
 * @return response()
 */
if (! function_exists('convertMdyToYmd')) {
    function convertMdyToYmd($date)
    {
        return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
    }
}


if (! function_exists('get_setting')) {
    function get_setting()
    { 
		$user_login_id=Auth()->user()->id;
        $websiteSetting=WebsiteSetting::firstWhere('user_login_id', $user_login_id);
        return $websiteSetting;
    }
}
if(! function_exists('clean_single_input'))
{
	function clean_single_input($content_desc)
	{
			//$content_desc = trim($content_desc);
			$$content_desc = Str::of($content_desc)->trim();
			$content_desc = str_replace('\'','',$content_desc);
			$content_desc = str_replace('&lt;script',' ',$content_desc);
			$content_desc = str_replace('&lt;iframe',' ',$content_desc);
			$content_desc = str_replace('&lt;script&gt;','',$content_desc);
			$content_desc = str_replace('&lt;SCRIPT&gt;','',$content_desc);
			$content_desc = str_replace('&lt;SCRIPT',' ',$content_desc);
			$content_desc = str_replace('&lt;ScRiPt&gt','',$content_desc);
			$content_desc = str_replace('&lt;ScRiPt &gt','',$content_desc);
			$content_desc = str_replace('&lt;IFRAME',' ',$content_desc);
			
			$content_desc = str_replace('sleep','',$content_desc);
			$content_desc = str_replace('waitfor delay','',$content_desc);

			$content_desc = str_replace('iframe','',$content_desc);
			$content_desc = str_replace('script','',$content_desc);
			$content_desc = str_replace('window.','',$content_desc);
			$content_desc = str_replace('prompt','',$content_desc);
			$content_desc = str_replace('Prompt','',$content_desc);
			
			$content_desc = str_replace('confirm','',$content_desc);
			$content_desc = str_replace('CONTENT=','',$content_desc);
			$content_desc = str_replace('HTTP-EQUIV','',$content_desc);
			$content_desc = str_replace('&lt;meta','',$content_desc);
			$content_desc = str_replace('&lt;META','',$content_desc);
			$content_desc = str_replace('data:text/html','',$content_desc);
			$content_desc = str_replace('document.','',$content_desc);
			$content_desc = str_replace('url','',$content_desc);
			$content_desc = str_replace('document.createTextNode','',$content_desc);
			$content_desc = str_replace('document.writeln','',$content_desc);
			$content_desc = str_replace('document.write','',$content_desc);
			$content_desc = str_replace('alert','',$content_desc);
			$content_desc = str_replace('javascript','',$content_desc);
			$content_desc = str_replace('DROP','',$content_desc);
			$content_desc = str_replace('CREATE','',$content_desc);
			$content_desc = str_replace('onsubmit','',$content_desc);
			$content_desc = str_replace('onblur','',$content_desc);
			$content_desc = str_replace('onclick','',$content_desc);
			$content_desc = str_replace('ondatabinding','',$content_desc);
			$content_desc = str_replace('ondblclick','',$content_desc);
			$content_desc = str_replace('ondisposed','',$content_desc);
			$content_desc = str_replace('onfocus','',$content_desc);
			$content_desc = str_replace('onkeydown','',$content_desc);
			$content_desc = str_replace('onkeyup','',$content_desc);
			$content_desc = str_replace('onload','',$content_desc);
			$content_desc = str_replace('onmousedown','',$content_desc);
			$content_desc = str_replace('onmousemove','',$content_desc);
			$content_desc = str_replace('onmouseout','',$content_desc);
			$content_desc = str_replace('onmouseover','',$content_desc);
			$content_desc = str_replace('onmouseup','',$content_desc);
			$content_desc = str_replace('onprerender','',$content_desc); 
			$content_desc = str_replace('onserverclick','',$content_desc);
			$content_desc = str_replace('[removed]','',$content_desc);
			
			$content_desc = str_replace('A=A','',$content_desc);
			$content_desc = str_replace('1=1','',$content_desc);
			
			$content_desc = str_replace('<','',$content_desc);
			$content_desc = str_replace('>','',$content_desc);
			$content_desc = str_replace('< >','',$content_desc);
			$content_desc = str_replace("<''>","",$content_desc);

			$content_desc = str_replace("%","",$content_desc);
			
			$content_desc = str_replace("'or'","",$content_desc);
			$content_desc = str_replace("'OR'","",$content_desc);
			$content_desc = str_replace('"OR"','',$content_desc);
			$content_desc = str_replace('"or"','',$content_desc);
			$content_desc = str_replace("'A","",$content_desc);
			$content_desc = str_replace("A'","",$content_desc);
			$content_desc = str_replace('"A','',$content_desc);
			$content_desc = str_replace('A"','',$content_desc);
			
			$content_desc = str_replace("'1","",$content_desc);
			$content_desc = str_replace("1'","",$content_desc);
			$content_desc = str_replace('"1','',$content_desc);
			$content_desc = str_replace('1"','',$content_desc);
			
			$content_desc = str_replace('(','',$content_desc);
			$content_desc = str_replace(')','',$content_desc);
			//$content_desc = str_replace("(", "",$content_desc);
			//$content_desc = str_replace(")", "",$content_desc);
			
			$content_desc = str_replace('||','',$content_desc);
			$content_desc = str_replace('|','',$content_desc);
			$content_desc = str_replace('&&','',$content_desc);
			$content_desc = str_replace('&','',$content_desc);
			$content_desc = str_replace(';','',$content_desc);
			$content_desc = str_replace('%','',$content_desc);
			$content_desc = str_replace('$','',$content_desc);
			$content_desc = str_replace('"','',$content_desc);
			$content_desc = str_replace("'",'',$content_desc);
			$content_desc = str_replace('\"','',$content_desc);
			$content_desc = str_replace("\'", "", $content_desc);
			$content_desc = str_replace('+','',$content_desc);
			//$content_desc = str_replace('CR','',$content_desc);
			//$content_desc = str_replace('LF','',$content_desc);
			$content_desc = str_replace('*','',$content_desc);
			$content_desc = str_replace("'<","",$content_desc);
			$content_desc = str_replace("'>","",$content_desc);
			$content_desc = str_replace("<'","",$content_desc);
			$content_desc = str_replace("'>'","",$content_desc);
			$content_desc = str_replace("#40","",$content_desc);
			$content_desc = str_replace("#41","",$content_desc);
			
			return $content_desc;
		
	}
	
}
if(! function_exists('replaceSpecialChar'))
{
	function replaceSpecialChar($content_desc)
	{

		$returnText = preg_replace('/[^A-Za-z0-9-.\s]/', '', $content_desc);
		
		return $returnText;
	}
}

if(! function_exists('clean_data_array'))
{
	function clean_data_array($aRR)
	{
		$retArr = array();
		foreach($aRR as $key=>$content_desc){	
			
			//$content_desc = trim($content_desc);
			//$content_desc = Str::of($content_desc)->trim();
			$content_desc = str_replace('\'','',$content_desc);
			$content_desc = str_replace('&lt;script',' ',$content_desc);
			$content_desc = str_replace('&lt;iframe',' ',$content_desc);
			$content_desc = str_replace('&lt;script&gt;','',$content_desc);
			$content_desc = str_replace('&lt;SCRIPT&gt;','',$content_desc);
			$content_desc = str_replace('&lt;SCRIPT',' ',$content_desc);
			$content_desc = str_replace('&lt;ScRiPt&gt','',$content_desc);
			$content_desc = str_replace('&lt;ScRiPt &gt','',$content_desc);
			$content_desc = str_replace('&lt;IFRAME',' ',$content_desc);
			
			$content_desc = str_replace('sleep','',$content_desc);
			$content_desc = str_replace('waitfor delay','',$content_desc);

			$content_desc = str_replace('iframe','',$content_desc);
			$content_desc = str_replace('script','',$content_desc);
			$content_desc = str_replace('window.','',$content_desc);
			$content_desc = str_replace('prompt','',$content_desc);
			$content_desc = str_replace('Prompt','',$content_desc);
			
			$content_desc = str_replace('confirm','',$content_desc);
			$content_desc = str_replace('CONTENT=','',$content_desc);
			$content_desc = str_replace('HTTP-EQUIV','',$content_desc);
			$content_desc = str_replace('&lt;meta','',$content_desc);
			$content_desc = str_replace('&lt;META','',$content_desc);
			$content_desc = str_replace('data:text/html','',$content_desc);
			$content_desc = str_replace('document.','',$content_desc);
			$content_desc = str_replace('url','',$content_desc);
			$content_desc = str_replace('document.createTextNode','',$content_desc);
			$content_desc = str_replace('document.writeln','',$content_desc);
			$content_desc = str_replace('document.write','',$content_desc);
			$content_desc = str_replace('alert','',$content_desc);
			$content_desc = str_replace('javascript','',$content_desc);
			$content_desc = str_replace('DROP','',$content_desc);
			$content_desc = str_replace('CREATE','',$content_desc);
			$content_desc = str_replace('onsubmit','',$content_desc);
			$content_desc = str_replace('onblur','',$content_desc);
			$content_desc = str_replace('onclick','',$content_desc);
			$content_desc = str_replace('ondatabinding','',$content_desc);
			$content_desc = str_replace('ondblclick','',$content_desc);
			$content_desc = str_replace('ondisposed','',$content_desc);
			$content_desc = str_replace('onfocus','',$content_desc);
			$content_desc = str_replace('onkeydown','',$content_desc);
			$content_desc = str_replace('onkeyup','',$content_desc);
			$content_desc = str_replace('onload','',$content_desc);
			$content_desc = str_replace('onmousedown','',$content_desc);
			$content_desc = str_replace('onmousemove','',$content_desc);
			$content_desc = str_replace('onmouseout','',$content_desc);
			$content_desc = str_replace('onmouseover','',$content_desc);
			$content_desc = str_replace('onmouseup','',$content_desc);
			$content_desc = str_replace('onprerender','',$content_desc); 
			$content_desc = str_replace('onserverclick','',$content_desc);
			$content_desc = str_replace('[removed]','',$content_desc);
			
			$content_desc = str_replace('A=A','',$content_desc);
			$content_desc = str_replace('1=1','',$content_desc);
			
			//$content_desc = str_replace('<','',$content_desc);
			//$content_desc = str_replace('>','',$content_desc);
			$content_desc = str_replace('< >','',$content_desc);
			$content_desc = str_replace("<''>","",$content_desc);

			$content_desc = str_replace("%","",$content_desc);
			
			$content_desc = str_replace("'or'","",$content_desc);
			$content_desc = str_replace("'OR'","",$content_desc);
			$content_desc = str_replace('"OR"','',$content_desc);
			$content_desc = str_replace('"or"','',$content_desc);
			$content_desc = str_replace("'A","",$content_desc);
			$content_desc = str_replace("A'","",$content_desc);
			$content_desc = str_replace('"A','',$content_desc);
			$content_desc = str_replace('A"','',$content_desc);
			
			$content_desc = str_replace("'1","",$content_desc);
			$content_desc = str_replace("1'","",$content_desc);
			$content_desc = str_replace('"1','',$content_desc);
			$content_desc = str_replace('1"','',$content_desc);
			
			$content_desc = str_replace('(','',$content_desc);
			$content_desc = str_replace(')','',$content_desc);
			//$content_desc = str_replace("(", "",$content_desc);
			//$content_desc = str_replace(")", "",$content_desc);
			
			$content_desc = str_replace('||','',$content_desc);
			$content_desc = str_replace('|','',$content_desc);
			$content_desc = str_replace('&&','',$content_desc);
			$content_desc = str_replace('&','',$content_desc);
			$content_desc = str_replace(';','',$content_desc);
			$content_desc = str_replace('%','',$content_desc);
			$content_desc = str_replace('$','',$content_desc);
			$content_desc = str_replace('"','',$content_desc);
			$content_desc = str_replace("'",'',$content_desc);
			$content_desc = str_replace('\"','',$content_desc);
			$content_desc = str_replace("\'", "", $content_desc);
			$content_desc = str_replace('+','',$content_desc);
			//$content_desc = str_replace('CR','',$content_desc);
			//$content_desc = str_replace('LF','',$content_desc);
			$content_desc = str_replace('*','',$content_desc);
			$content_desc = str_replace("'<","",$content_desc);
			$content_desc = str_replace("'>","",$content_desc);
			$content_desc = str_replace("<'","",$content_desc);
			$content_desc = str_replace("'>'","",$content_desc);
			$content_desc = str_replace("#40","",$content_desc);
			$content_desc = str_replace("#41","",$content_desc);
			
			//print_R($content_desc); die();
			$retArr[$key] = $content_desc;
		}
		
		return $retArr;

	}
	
}
if(!function_exists('checkFileExtention'))
{
        function checkFileExtention($file)
        {
            $gfex = explode('.', $file);
			if(strtolower(end($gfex)) == 'pdf'){
				return 1;
			}else{
				return 0;
			}
        }
}
if(!function_exists('audit_trail'))
{
	function audit_trail( $data_array = array() )
	{
		
		$whEre 	= array('user_login_id' => isset($data_array['user_login_id'])?$data_array['user_login_id']:'',
					'page_id'           => isset($data_array['page_id'])?$data_array['page_id']:0,
					'page_name'         => isset($data_array['page_name'])?$data_array['page_name']:'',
					'page_action'       => isset($data_array['page_action'])?$data_array['page_action']:'',
					'page_category'     => isset($data_array['page_category'])?$data_array['page_category']:'',
					'page_action_date'  => date('Y-m-d h:i:s'),
					'ip_address'        => $_SERVER['REMOTE_ADDR'],
					'lang'              => isset($data_array['lang'])?$data_array['lang']:1,
					'page_title'        => isset($data_array['page_title'])?$data_array['page_title']:'',
					'approve_status'    => isset($data_array['approve_status'])?$data_array['approve_status']:1,
					'usertype'          => isset($data_array['usertype'])?$data_array['usertype']:''
				 );
		
		$numRows =  Audit_trail::create($whEre);
		return $numRows;
	}
}
if ( ! function_exists('primarylink_menu'))
{
	function primarylink_menu($language_id, $menu_positions='')
	{
		

		$selected = "";
		if($menu_positions != '')
		{
			if( $menu_positions == 0 )
				$selected="selected";
		}

		$returnValue = '<div class="col-lg-3 col-md-3 col-xm-3">
							<div class="form-group">
								<label>Primary Link:</label>
								<span class="star">*</span>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-xm-6">
							<div class="form-group">
								<select name="menucategory" class="input_class form-control" id="menucategory" autocomplete="off">
									<option value=""> Select </option>
									<option value ="0" '.$selected.'>It is Root Category</option>';
			
			$whEre = array(	'approve_status'	=> 3,
							//'m_flag_id'			=> 0,
							'language_id'		=> $language_id
						);
			$nav_query =DB::table('menus')->select('*')->where($whEre)->get();
			
			foreach($nav_query as $row)
			{
				$selected = "";
				if($menu_positions != '')
				{
					if($row->id == $menu_positions)
						$selected="selected";
				}
				$returnValue .= '<option value="'.$row->id.'" '.$selected.'><strong>'.$row->m_name.'</strong></option>';
				$returnValue .= build_child($row->id, '', $menu_positions);
			}
		$returnValue .=    		'</select>
							</div>
						</div>';

		return $returnValue;
	}
}
if ( ! function_exists('build_child'))
{
	function build_child($parent_id, $tempReturnValue, $menu_positions)
	{
		$tempReturnValue .= $tempReturnValue;
		

		$whEre = array(	'approve_status'	=> 3,
						'm_flag_id'			=> $parent_id
						);
		$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
		foreach($nav_query as $row)
		{
			$selected = "";
			if($menu_positions != '')
			{
				if($row->id == $menu_positions)
					$selected="selected";
			}
			$tempReturnValue .= '<option value="'.$row->id.'" '.$selected.'>'.$row->m_name.'</option>';
			$tempReturnValue .= build_child($row->id, $tempReturnValue='', $menu_positions);
		}

		return $tempReturnValue;
	}
}
if ( ! function_exists('seo_url'))
{
	function seo_url($seo_url){

		$seo_url = preg_replace('/\s+/', ' ',$seo_url);
		$seo_url = str_replace('&','-',$seo_url);
		$seo_url = str_replace('amp;','and',$seo_url);
		$seo_url = str_replace('/','',$seo_url);
		$seo_url = str_replace('%','',$seo_url);
		$seo_url = str_replace('*','',$seo_url);
		$seo_url = str_replace('(','',$seo_url);
		$seo_url = str_replace(')','',$seo_url);
		$seo_url = str_replace('!','',$seo_url);
		$seo_url = str_replace('@','',$seo_url);
		$seo_url = str_replace('#','',$seo_url);
		$seo_url = str_replace('}','',$seo_url);
		$seo_url = str_replace('{','',$seo_url);
		$seo_url = str_replace(']','',$seo_url);
		$seo_url = str_replace('[','',$seo_url);
		$seo_url = str_replace(',','-',$seo_url);
		$seo_url = str_replace('.','',$seo_url);
		$seo_url = str_replace('?','',$seo_url);
		$seo_url = str_replace("'",'',$seo_url);
		$seo_url = str_replace(' ','-',$seo_url);
		return strtolower($seo_url).'.php';
	}
}
if ( ! function_exists('get_status'))
{
	function get_status()
	{

		$status = array(
					'1'	=> "Draft",
					'2'	=> "Aproval",
					'3'	=> "Publish"
						);
		return $status;
	}
}
if ( ! function_exists('get_content_postion'))
{
	function get_content_postion()
	{

		$postion = array(
			        '1'	=> "Header Menu",
					'2'	=> "Left Menu",
					'3'	=> "Footer Menu"
						);
		return $postion;
	}
}
if ( ! function_exists('get_language'))
{
	function get_language()
	{

		$language = array(
			        '1'	=> "Header Menu",
					'2'	=> "Left Menu"
					 );
		return $language;
	}
}
if ( ! function_exists('has_child'))
{
	function has_child( $pid,$langid=1 ){
		
		$fetchResult = DB::table('menus')->select('*')->where(`m_flag_id = '".$pid."' AND language_id = '".$langid."' AND approve_status = '3' `)->get();
		
		return $fetchResult;
		
	}
}
function language($val)
	{
	if($val=='2')
	echo "Hindi";
	else if($val=='3')
		echo "Marathi";
	else if($val=='4')
		echo "Gujarati";
	else if($val=='5')
		echo "Telugu";
	else if($val=='6')
		echo "Tamil";
	else if($val=='7')
		echo "Kannada";
	else
	echo "English";
}
function status($val){
		if($val=='1')
		{
		echo "Draft";
		}
		else if($val=='2')
		{
		echo "For Approval";
		}
		else if($val=='3')
		{
		echo "Publish";
		}else
		  echo "Review";
     	}
	
