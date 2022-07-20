<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMProductGroup2 extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sm_product_group2';
    protected $fillable = ['id','name','active'];
    public $incrementing = false;

    public function products()
    {
        return $this->hasMany(SMProduct::class,'sm_products','id');
    }
}
