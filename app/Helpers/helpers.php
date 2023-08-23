<?php
  
use Carbon\Carbon;
  
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

if (! function_exists('convertMdyToYmd')) {
    function convertMdyToYmd($date)
    { 
        return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
    }
}
