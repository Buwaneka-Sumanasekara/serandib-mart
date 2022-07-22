<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMStock extends Model
{
  protected $table = 'sm_stock';
  public $incrementing = false;
  protected $primaryKey = 'id';
  protected $fillable = ['id', 'sm_product_id', 'batch', 'unique_name', 'cost_price', 'sell_price', 'active', 'stock_in_hand', 'exp_date', 'barcode',];

  public function product()
  {
    return $this->belongsTo(SMProduct::class, 'sm_product_id', "id");
  }
}
