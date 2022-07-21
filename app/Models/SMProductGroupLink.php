<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMProductGroupLink extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sm_product_group_link';
    protected $fillable = ['sm_product_group1_id','sm_product_group2_id','sm_product_group3_id','active'];
    public $incrementing = false;

    public function group1()
    {
        return $this->belongsTo(SMProductGroup1::class, 'sm_product_group1_id', 'id');
    }
    public function group2()
    {
        return $this->belongsTo(SMProductGroup2::class, 'sm_product_group2_id', 'id');
    }
    public function group3()
    {
        return $this->belongsTo(SMProductGroup3::class, 'sm_product_group3_id', 'id');
    }
}
