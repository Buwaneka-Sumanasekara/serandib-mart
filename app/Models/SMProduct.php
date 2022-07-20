<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMProduct extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sm_product';
    public $incrementing = false;
    protected $fillable = ['id', 'unique_name','name','description','image_url','active','cr_by','updated_by','has_expire_date','has_batch','sm_product_group1_id','sm_product_group2_id','sm_product_group3_id'];

    
    public function group1()
    {
        return $this->belongsTo(SMProductGroup1::class, 'sm_product_group1_id', 'id');
    }
    public function group2()
    {
        return $this->belongsTo(SMProductGroup1::class, 'sm_product_group2_id', 'id');
    }
    public function group3()
    {
        return $this->belongsTo(SMProductGroup1::class, 'sm_product_group3_id', 'id');
    }

    public function productImages()
    {
        return $this->hasMany(SMProductImages::class,'sm_product_images','id');
    }

}
