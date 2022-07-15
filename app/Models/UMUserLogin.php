<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMUserLogin extends Model
{
    use HasFactory;
    protected $table = 'um_user_login';
    protected $fillable = ['id','username','password','um_user_id'];
    public $incrementing = false;


    public function user()
    {
        return $this->hasOne(UmUser::class,"id","um_user_id");
    }
}
