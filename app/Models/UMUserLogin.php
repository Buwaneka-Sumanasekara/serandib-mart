<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class UMUserLogin extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'um_user_login';
    protected $fillable = ['id','username','password','um_user_id'];
    public $incrementing = false;

    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function user()
    {
        return $this->hasOne(UmUser::class,"id","um_user_id");
    }


     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


     /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
   public function getJWTCustomClaims()
{
      return [];
}
}
