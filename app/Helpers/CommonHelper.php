<?php
namespace App\Helpers;
use App\Models\UMUser;


class CommonHelper
{
    public static function getSuffixNumbers($prevNo,$length)
    {
        try {
            $NextInt=((int)$prevNo)+1;
            return str_pad((string)$NextInt,$length,"0",STR_PAD_LEFT);
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    

   
}
