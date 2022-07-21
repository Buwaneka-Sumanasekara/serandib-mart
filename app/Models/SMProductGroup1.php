<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMProductGroup1 extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sm_product_group1';
    protected $fillable = ['id','name','active'];
    protected $primaryKey = 'id';
    public $incrementing = false;

    public function products()
    {
        return $this->hasMany(SMProduct::class,'sm_products','id');
    }
}
