<?php
namespace App\Helpers;
use App\Models\SMProduct;
use App\Models\SMStock;
use App\Helpers\CommonHelper;

class ProductHelper
{
    
    static function createSeoLink($text) {
        $letters = array(
            '–', '—', '"', '"', '"', '\'', '\'', '\'',
            '«', '»', '&', '÷', '>',    '<', '$', '/'
        );
    
        $text = str_replace($letters, " ", $text);
        $text = str_replace("&", "and", $text);
        $text = str_replace("?", "", $text);
        $text = strtolower(str_replace(" ", "-", $text));
    
        return ($text);
    }
    public static function getNextProductId(): ?string
    {
        $numberLength=5;
        $lastId=SMProduct::max("id");
        $nextNo="";
        if($lastId===null){
           $nextNo=str_pad("1",$numberLength,"0",STR_PAD_LEFT);     
        }else{
            $nextNo=$nextNo."".CommonHelper::getSuffixNumbers($lastId,$numberLength);   
        }
        return $nextNo;
    }

    
      
    public static function getNextStockBatchId(SMProduct $prod): ?int
    {
        $lastId=SMStock::where('sm_product_id', $prod->id)->max("batch"); 
        $currentId=($lastId!==null?$lastId:1);    
        if($prod->has_batch){
            $nextNo=($lastId+1);
            return $nextNo;
        }else{
            return $currentId;
        }
    }

    public static function getStockId(SMProduct $prod,int $batch): ?string
    {
        return $prod->id."-".$batch;
    }
    
    public static function getUniqueName(SMProduct $prod,int $batch): ?string
    {
        $productName=$prod->name;
        $productId=$prod->id;
        $stockBatch=$batch;

        return self::createSeoLink($productName."-".$productId."-".$stockBatch);
    }
   
}
