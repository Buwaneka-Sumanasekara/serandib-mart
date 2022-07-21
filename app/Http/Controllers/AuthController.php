<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\AuthResponse;
use App\Http\Resources\UserResource;
use App\Http\Resources\GeneralResource;
use App\Exceptions\AuthenticationException;
use App\Exceptions\UserNotFoundException;
use App\Models\UMUser;
use App\Models\CMCustomer;
use App\Models\UMUserLogin;
use Illuminate\Support\Facades\DB;


use App\Helpers\UserHelper;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','me']]);
    }


    
    public function me(Request $request)
    {   
        $user = auth('api')->user()->user;
        return $user;
    }

    
    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|email',
                'password' => 'required|string',
            ]);
            $credentials = $request->only('username', 'password');
    
            $token = auth('api')->setTTL(config('jwt.ttl'))->attempt($credentials);
            if (!$token) {
                throw new AuthenticationException();
            }
    
            $user = auth('api')->user()->user;
            
            return new AuthResponse((object)["token"=>$token,"user"=>$user]);
        } catch (\Exception $e) {
            return (new ErrorResource($e));
        }
        

    }

    public function register(Request $request){

        try {
            $request->validate([
                'firstName' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:um_user',
                'password' => 'required|string',
            ]);
            DB::beginTransaction();
            $nextUserId=UserHelper::getNextUserId();
    
            $user = UMUser::create([
                'id'=>$nextUserId,
                'first_name' => $request->firstName,
                'mid_name'=>$request->midName,
                'last_name'=>$request->lastName,
                'last_name'=>$request->lastName,
                'email' => $request->email,
                'um_user_status_id'=>config("global.user_status_active"),
                "um_user_role_id"=>config("global.user_role_customer"),
                "is_verified"=>1
            ]);
    
            UMUserLogin::create([
                "id"=>$user['id'],
                "username"=>$user['email'],
                "password"=>Hash::make($request->password),
                "um_user_id"=>$user['id']
            ]);
    
            if($user['um_user_role_id']===config("global.user_role_customer")){
                CMCustomer::create([
                    'id' => $user['id'],
                    "no_of_orders"=>0,
                    "total_order_value"=>0,
                    "um_user_id"=>$user['id']
                ]);
            }
            DB::commit();
            return new GeneralResource((object)array("message"=>"User registered successfully")); 
        } catch (\Exception $e) {
            DB::rollBack();
            return (new ErrorResource($e));
        }
       
    }

    public function logout()
    {
        auth('api')->logout();
        return new GeneralResource((object)array("message"=>"logout successfully"));
    }

    public function refresh()
    {

        $newToken = auth('api')->refresh();
        $user = auth('api')->user()->user;
        return new AuthResponse((object)["token"=>$newToken,"user"=>$user]);
    }

}
