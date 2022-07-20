<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMProductImages extends Model
{
    protected $table = 'sm_product_images';
    public $incrementing = false;
    protected $fillable = ['id', 'image_url','active','sm_product_id'];

    public function product()
    {
      return $this->belongsTo(SMProduct::class,'sm_product',"sm_product_id",'id');
    }
    

}
