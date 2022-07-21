<?php
namespace App\Helpers;
use App\Models\UMUser;


class UserHelper
{
   
    
    public static function getNextUserId(): ?int
    {
        $lastId=UMUser::max("id");
        $nextNo=1;
        if($lastId!==null){
            $nextNo=($lastId+1);
        }
        return $nextNo;
    }
      

}
