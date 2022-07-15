<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UMUser extends Model
{
    use  HasFactory, Notifiable;

    protected $table = 'um_user';
    protected $fillable = ['id', 'first_name','mid_name', 'last_name','is_verified', 'um_user_status_id', 'um_user_role_id'];
    public $incrementing = false;

    public function userRole()
    {
        return $this->belongsTo(UmUserRole::class, 'um_user_role_id', 'id');
    }

    public function userStatus()
    {
        return $this->belongsTo(UmUserRole::class, 'um_user_status_id', 'id');
    }
}
