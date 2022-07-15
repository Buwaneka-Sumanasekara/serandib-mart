<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMUserStatus extends Model
{
  
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'um_user_status';
    public $incrementing = false;

    public function users()
    {
        return $this->hasMany(UmUser::class,'um_user_status_id','id');
    }
}
