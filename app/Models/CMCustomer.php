<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CMCustomer extends Model
{
    use HasFactory;
    protected $table = 'cm_customer';
    protected $fillable = ['id','no_of_orders','total_order_value','um_user_id'];
    public $incrementing = false;


    public function user()
    {
        return $this->hasOne(UmUser::class,"id","um_user_id");
    }
}
