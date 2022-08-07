<?php
/**
 * Application Helper functions defines here.
 * the function name should be start with group type.
 */
use App\Models\Service;


/**---------------- Model: Service ----------------*/
 if (!function_exists('ServiceGetInfo')) {
    function ServiceGetInfo($select_key, $operator ,$value) {
        return Service::where($select_key, $operator, $value)->get();
    }
 }
 /**---------------- Model: Service ----------------*/



 /**---------------- Utility: String ----------------*/
 if (!function_exists('PersianNumber')) {
    function PersianNumber($input) {
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $fa = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $output = str_replace($en, $fa, $input);
        return $output;
    }
 }
 /**---------------- Utility: String ----------------*/