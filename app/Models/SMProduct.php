<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'description', 'image_url', 'active', 'cr_by', 'updated_by', 'has_expire_date', 'has_batch', 'sm_product_group1_id', 'sm_product_group2_id', 'sm_product_group3_id'];


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
        return $this->hasMany(SMProductImages::class, 'sm_product_images', 'id');
    }

    public function getImageUrl()
    {
        return url("/images/product/main/{$this->id}");
    }
    public function getImageFile()
    {
        return Storage::get('upload_files/products/' . $this->image_url);
    }

    public function products()
    {
        return $this->hasMany(SMProduct::class, 'sm_product_id', 'id');
    }
}
